<?php

namespace App\Http\Controllers;

use App\Models\PenyimpananModel;
use Carbon\Carbon;
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
use Illuminate\Support\Facades\Storage;

class PenyimpananController extends Controller
{
    protected $menu ="Transaksi";
    protected $submenu ="Penyimpanan";

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'menu' => $this->menu,
            'submenu' => $this->submenu,
            'penyimpanan' => PenyimpananModel::whereNull('deleted_at')->get(),
        ];
        return view('penyimpanan.index', $data);
    }

    public function data_rak(Request $request)
    {
        $rak = DB::table('data_rak')
        ->whereNull('deleted_at')
        ->get();

        if (count($rak) > 0) {
            return response()->json([
                'code' => 200,
                'data' => $rak,
            ]);
        } else {
            return response()->json([
                'code' => 400,
                'data' => null,
            ]);
        }
    }

    public function data_buku(Request $request)
    {
        $rak = DB::table('data_buku')
        ->whereNull('deleted_at')
        ->get();

        if (count($rak) > 0) {
            return response()->json([
                'code' => 200,
                'data' => $rak,
            ]);
        } else {
            return response()->json([
                'code' => 400,
                'data' => null,
            ]);
        }
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
        return view('penyimpanan.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'data' => 'required|array',
            'data.*.id_rak' => 'required|exists:data_rak,id',
            'data.*.id_buku' => 'required|exists:data_buku,id',
            'data.*.jumlah' => 'required|integer|min:1',
        ]);
    
        DB::beginTransaction();
        try {
            $tanggalSekarang = date('dmy'); // Format: ddmmyy
            $nomor_urut = PenyimpananModel::whereDate('tanggal', Carbon::today())
                ->max(DB::raw("CAST(RIGHT(kode_simpan, 3) AS UNSIGNED)")) + 1; 
            
            $kode_simpan = $tanggalSekarang . str_pad($nomor_urut, 3, '0', STR_PAD_LEFT);
    
            $data_tersimpan = [];
            foreach ($request->data as $data) {
                $data_tersimpan[] = PenyimpananModel::create([
                    'tanggal' => Carbon::now(),
                    'kode_simpan' => $kode_simpan,
                    'jumlah' => $data['jumlah'],
                    'id_rak' => $data['id_rak'],
                    'id_buku' => $data['id_buku'],
                    'dibuat_oleh' => Auth::user()->id,
                    'status' => 0,
                ]);
            }
    
            // Generate QR Code untuk setiap data yang disimpan
            foreach ($data_tersimpan as $simpan) {
                $buat_data = $simpan->toArray();
                unset(
                    $buat_data['jumlah'], 
                    $buat_data['id_rak'], 
                    $buat_data['id_buku'], 
                    $buat_data['dibuat_oleh'], 
                    $buat_data['status'], 
                    $buat_data['created_at'], 
                    $buat_data['updated_at'], 
                    $buat_data['deleted_at'], 
                    $buat_data['nama_barcode'], 
                    $buat_data['tanggal']
                );
    
                // Ubah array menjadi JSON untuk QR Code
                $qrCodeData = json_encode($buat_data);
    
                $builder = new Builder(
                    writer: new PngWriter(),
                    writerOptions: [],
                    validateResult: false,
                    data: $qrCodeData, // Gunakan data rak sebagai isi QR code
                    encoding: new Encoding('UTF-8'),
                    errorCorrectionLevel: ErrorCorrectionLevel::High,
                    size: 300,
                    margin: 10,
                    roundBlockSizeMode: RoundBlockSizeMode::Margin,
                    logoPath: public_path('assets/images/logo-sm.png'), // Sesuaikan path logo
                    logoResizeToWidth: 50,
                    logoPunchoutBackground: true,
                    labelText: $buat_data['kode_simpan'], // Perbaikan akses array
                    labelFont: new OpenSans(20),
                    labelAlignment: LabelAlignment::Center
                );
    
                $result = $builder->build();
    
                // Simpan QR Code ke storage
                $qrCodePath = 'qr_penyimpanan/' . $buat_data['kode_simpan'] . '.png';
                Storage::disk('public')->put($qrCodePath, $result->getString());
    
                // Simpan path QR code ke database
                $simpan->update(['nama_barcode' => $qrCodePath]);
            }
    
            DB::commit();
            return response()->json([
                'code' => 200,
                'message' => 'Berhasil Input Data',
            ]);
        } catch (\Throwable $err) {
            DB::rollBack();
            return response()->json([
                'code' => 400,
                'message' => 'Gagal Input Data: ' . $err->getMessage(),
            ]);
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
