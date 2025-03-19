<?php

namespace App\Http\Controllers;


use App\Helper\AlertHelper;
use App\Models\User;
use Carbon\Carbon;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Label\Font\OpenSans;
use Endroid\QrCode\Label\LabelAlignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    protected $menu ="Data Master";
    protected $submenu ="User";
    /**
     * Display a listing of the resource.
     */
    
     public function index()
    {
        $data = [
            'menu' => $this->menu,
            'submenu' => $this->submenu,
            'data_user' => User::where('roles', '!=', 'Member')->get()
        ];

        return view('user.data_user', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    private function generateCustomerCode()
    {
       
        $bulan = date('m'); // Bulan 2 digit
        $tahun = date('y'); // Tahun 2 digit belakang

        // Cek kode terakhir di database untuk hari ini
        $lastCustomer = User::whereDate('created_at', now()->toDateString())
            ->orderBy('id', 'desc')
            ->first();

        if ($lastCustomer) {
            // Ambil 5 digit terakhir dari kode sebelumnya
            $lastNumber = (int) substr($lastCustomer->kode_customer, -5);
            $newNumber = $lastNumber + 1;
        } else {
            // Jika belum ada customer hari ini, mulai dari 00001
            $newNumber = 1;
        }

        // Format nomor urut menjadi 5 digit (00001, 00002, dst.)
        $formattedNumber = str_pad($newNumber, 5, '0', STR_PAD_LEFT);

        // Gabungkan kode
        return "A{$bulan}{$tahun}{$formattedNumber}";
    }

     public function create()
    {
        $data =[
            'menu' => $this->menu,
            'submenu' => $this->submenu,
            'level' => 'Create',
        ];

        $adminCode = $this->generateCustomerCode();
        return view('user.data_create', compact('adminCode'), $data);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
       
        $request->validate([
            'file_gambar' => 'image|mimes:jpg,jpeg,png|max:2048', // Max 2MB
            'nama' => 'required|string|max:40',
            'username' => 'required|string|max:40|unique:users',
            'roles' => 'required|string',
            'email' => 'required|email|max:40|unique:users',
            'telepon' => 'nullable|string|max:18|unique:users',
        ]); 

         // Cek apakah data sudah ada dan berikan pesan spesifik
        if (User::where('kode', $request->kode)->exists()) {
            return back()->with('error', 'Kode sudah digunakan, silakan gunakan kode lain.');
        }

        if (User::where('email', $request->email)->exists()) {
            return back()->with('error', 'Email sudah terdaftar, gunakan email lain.');
        }

        if (User::where('username', $request->username)->exists()) {
            return back()->with('error', 'Username sudah digunakan, silakan pilih username lain.');
        }

        if ($request->telepon && User::where('telepon', $request->telepon)->exists()) {
            return back()->with('error', 'Nomor telepon sudah terdaftar.');
        }

        if (!$request->kode) {
            $bulan = Carbon::now()->format('m'); // Dua digit bulan (misal 02)
            $tahun = Carbon::now()->format('y'); // Dua digit tahun (misal 25)

            // Hitung jumlah user bulan ini
            $count = User::whereYear('created_at', Carbon::now()->year)
                        ->whereMonth('created_at', Carbon::now()->month)
                        ->count() + 1;

            // Format kode customer (C022500001)
            $request->merge([
                'kode' => sprintf('A%s%s%05d', $bulan, $tahun, $count)
            ]);
        }


        DB::beginTransaction();
        try {
            $namaFoto = null;

            if ($request->hasFile('file_gambar')) {
                $namaFoto = time() . '.' . $request->file_gambar->extension();
                $request->file_gambar->move(public_path('assets/user_foto'), $namaFoto);
            }

            $user = new User();
            $user->nama = $request->nama;
            $user->kode = $request->kode;
            $user->image = $namaFoto;
            $user->username = $request->username;
            $user->roles = $request->roles;
            $user->email = $request->email;
            $user->telepon = $request->telepon;
            $user->password = Hash::make($request->username);
            $user->status = 0;
            $user->save();

             // Buat array data user kecuali password
            $userData = $user->toArray();
            unset($userData['password']);

            // Ubah array menjadi string JSON
            $qrCodeData = json_encode($userData);

            $builder = new Builder(
                writer: new PngWriter(),
                writerOptions: [],
                validateResult: false,
                data: $qrCodeData, // Gunakan ID user sebagai data QR code
                encoding: new Encoding('UTF-8'),
                errorCorrectionLevel: ErrorCorrectionLevel::High,
                size: 300,
                margin: 10,
                roundBlockSizeMode: RoundBlockSizeMode::Margin,
                logoPath: public_path('assets/images/logo-sm.png'), // Sesuaikan path logo
                logoResizeToWidth: 50,
                logoPunchoutBackground: true,
                // labelText: 'Nama : ' . $user->nama,
                labelText: $user->nama,
                labelFont: new OpenSans(20),
                labelAlignment: LabelAlignment::Center
            );
        
            $result = $builder->build();
        
            // Simpan QR code ke storage (misalnya, storage/app/public/qrcodes)
            $qrCodePath = 'qrcodes/' . $user->nama . '_' . $user->id . '.png';
            Storage::disk('public')->put($qrCodePath, $result->getString());
        
            // Simpan path QR code ke database (jika diperlukan)
            $user->qr_code_path = $qrCodePath;
            $user->save();

            DB::commit();
            AlertHelper::addAlert(true);
            return redirect('/data_user');
        } catch (\Throwable $err) {
            DB::rollback();
            throw $err;
            AlertHelper::addAlert(false);
            return back();
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $id_decrypt = Crypt::decryptString($id);
        // dd($id_decrypt);

        $data = [
            'edit' => 'Edit Data Admin',
            'data_user' => User::findOrfail($id_decrypt),
        ];

        return view('user.data_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
