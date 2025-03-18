<?php

namespace App\Http\Controllers;

use App\Models\RakModel;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\Label\Font\OpenSans;
use Endroid\QrCode\Label\LabelAlignment;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RakController extends Controller
{
    protected $menu ="Data Master";
    protected $submenu ="Rak";

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'menu' => $this->menu,
            'submenu' => $this->submenu,
            'rak' => RakModel::whereNull('deleted_at')->get(),
        ];
        return view('rak.index', $data);
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
            'rak' => RakModel::whereNull('deleted_at')->get(),
        ];
        return view('rak.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
       
            // Validasi input
            $request->validate([
                'rak' => 'required|array',
                'rak.*.kode_rak' => 'required|string|max:255',
                'rak.*.keterangan_rak' => 'required|string|max:255',
                'rak.*.jumlah_tingkat' => 'required|integer|min:1',
            ]);
    
            $dataRak = $request->input('rak');
    
            // Cek apakah ada kode_rak yang sudah ada di database untuk menghindari duplikasi
            $existingRak = RakModel::whereIn('kode_rak', array_column($dataRak, 'kode_rak'))->pluck('kode_rak')->toArray();
    
            if (!empty($existingRak)) {
                return response()->json([
                    'code' => 400,
                    'message' => 'Terdapat kode rak yang sudah ada: ' . implode(', ', $existingRak)
                ], 400);
            }
    
            // Mulai transaksi database
            DB::beginTransaction();
    
            try {
                $simpan_rak = [];
    
                // Simpan data rak ke database
                foreach ($dataRak as $rak) {
                    $simpan_rak[] = RakModel::create([
                        'kode_rak' => $rak['kode_rak'],
                        'keterangan_rak' => $rak['keterangan_rak'],
                        'jumlah_tingkat' => $rak['jumlah_tingkat'],
                        'status' => 0
                    ]);
                }
    
                // Loop untuk setiap rak yang disimpan, buat QR code
                foreach ($simpan_rak as $rak) {
                    $rakArray = $rak->toArray();
                    unset($rakArray['logo_perusahaan'], $rakArray['status'], $rakArray['alamat']);
    
                    // Ubah array menjadi string JSON untuk QR Code
                    $qrCodeData = json_encode($rakArray);
    
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
                        labelText: $rak->kode_rak,
                        labelFont: new OpenSans(20),
                        labelAlignment: LabelAlignment::Center
                    );
    
                    $result = $builder->build();
    
                    // Simpan QR code ke storage
                    $qrCodePath = 'qr_rak/' . $rak->kode_rak . '.png';
                    Storage::disk('public')->put($qrCodePath, $result->getString());
    
                    // Simpan path QR code ke database
                    $rak->qr_code_rak = $qrCodePath;
                    $rak->save();
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
