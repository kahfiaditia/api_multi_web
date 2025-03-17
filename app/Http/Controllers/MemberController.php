<?php

namespace App\Http\Controllers;

use App\Helper\AlertHelper;
use App\Models\MemberModel;
use App\Models\User;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\Label\Font\OpenSans;
use Endroid\QrCode\Label\LabelAlignment;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class MemberController extends Controller
{
    protected $menu ="Data Master";
    protected $submenu ="Member";
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'menu' => $this->menu,
            'submenu' => $this->submenu,
            'data_member' => MemberModel::whereNull('deleted_at')->get(),
        ];
        return view('member.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'menu' => $this->menu,
            'submenu' => $this->submenu,
            'level' => 'Create',
            // 'data_member' => MemberModel::whereNull('deleted_at')->get(),
        ];
        return view('member.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'foto_member' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'nis' => 'required|max:20',
            'nama' => 'required|max:40',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required|date',
            'telepon' => 'required|max:15',
            'email' => 'required|email',
            'alamat' => 'required',
        ]);

        DB::beginTransaction();
        try{

            $namaFoto = null;
            if ($request->hasFile('foto_member')) {
                $foto = $request->file('foto_member');
                $namaFoto = time() . '.' . $foto->getClientOriginalExtension();
                $foto->move(public_path('assets/member'), $namaFoto);
            }
           
            $user = new User();
            $user->nama = $request->nama;
            $user->kode = $request->nis;
            $user->image = $namaFoto;
            $user->username = $request->nis;
            $user->roles = 'Member';
            $user->email = $request->email;
            $user->telepon = $request->telepon;
            $user->password = Hash::make($request->nis);
            $user->status = 0;
            $user->save();
        
            $member = new MemberModel();
            $member->nis = $request->nis;
            $member->nama = $request->nama;
            $member->jenis_kelamin = $request->jenis_kelamin;
            $member->tgl_lahir = $request->tgl_lahir;
            $member->telepon = $request->telepon;
            $member->email = $request->email;
            $member->alamat = $request->alamat;
            $member->status = 0;
            $member->user_id = $user->id;
            $member->dibuat_oleh = Auth::user()->id;
            $member->save();

            $memberData = $member->toArray();
            unset(
                $memberData['password'],
                $memberData['status'],
                $memberData['alamat'],
                $memberData['id'],
                $memberData['telepon'],
                $memberData['tgl_lahir'],
                $memberData['jenis_kelamin'],
                $memberData['email'],
            );

            // Ubah array menjadi string JSON
            $qrCodeData = json_encode($memberData);

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
                labelText: $member->nama,
                labelFont: new OpenSans(20),
                labelAlignment: LabelAlignment::Center
            );
        
            $result = $builder->build();
        
            // Simpan QR code ke storage (misalnya, storage/app/public/qrcodes)
            $qrCodePath = 'qr_member/' . $member->nis . '.png';
            Storage::disk('public')->put($qrCodePath, $result->getString());
        
            // Simpan path QR code ke database (jika diperlukan)
            $member->qr_code = $qrCodePath;
            $member->save();

            DB::commit();
            AlertHelper::addAlert(true);
            return redirect('/member');
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
        //
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
