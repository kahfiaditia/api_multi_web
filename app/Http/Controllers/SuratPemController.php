<?php

namespace App\Http\Controllers;

use App\Models\SuratPemModel;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\Label\Font\OpenSans;
use Endroid\QrCode\Label\LabelAlignment;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Exports\SuratPemExport;

class SuratPemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'data_surat' => SuratPemModel::whereNull('deleted_at')->get()
        ];
        return view('surat.pemberitahuan', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('surat.pem_tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->input('data_kirim');

        // Validasi data
        $validator = Validator::make($data, [
            'tanggal_surat' => 'required|date',
            'pilih_nomor' => 'required|integer',
            'lampiran' => 'required|string',
            'nama_pengirim' => 'required|string|max:255',
            'jabatan_pengirim' => 'required|string|max:255',
            'nip_pengirim' => 'required|string|max:20',
            'perihal' => 'required|string|max:255',
            'untuk' => 'required|string',
            'tembusan' => 'nullable|string',
            'isi_surat' => 'required|string',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal!',
                'errors' => $validator->errors()
            ], 422);
        }

       
        // Simpan data ke database
        try {

            if (!isset($data['nomor_surat']) || empty($data['nomor_surat'])) {
                $lastSurat = SuratPemModel::latest()->first();
                $nomorUrut = $lastSurat ? intval(substr($lastSurat->nomor_surat, 0, 4)) + 1 : 201;
                $nomorUrutFormatted = str_pad($nomorUrut, 4, '0', STR_PAD_LEFT);
    
                // Ambil tiga digit terakhir dari NIP pengirim
                $nip_pengirim = $data['nip_pengirim'];
                $lastThreeDigitsNIP = substr($nip_pengirim, -3);
    
                // Ambil tanggal, bulan, dan tahun saat ini
                $tanggal = date('d'); // Dua digit tanggal
                $bulan = date('m');   // Dua digit bulan
                $tahun = date('Y');   // Empat digit tahun
    
                // Format nomor surat
                $data['nomor_surat'] = "{$nomorUrutFormatted}/S_PEM/{$lastThreeDigitsNIP}/{$tanggal}/{$bulan}/{$tahun}";
            }

            $surat = new SuratPemModel();
            $surat->tanggal_surat = $data['tanggal_surat'];
            $surat->pilih_nomor = $data['pilih_nomor'];
            $surat->nomor_surat = $data['nomor_surat'] ?? null;
            $surat->lampiran = $data['lampiran'];
            $surat->nama_pengirim = $data['nama_pengirim'];
            $surat->jabatan_pengirim = $data['jabatan_pengirim'];
            $surat->nip_pengirim = $data['nip_pengirim'];
            $surat->perihal = $data['perihal'];
            $surat->untuk = $data['untuk'];
            $surat->tembusan = $data['tembusan'] ?? null;
            $surat->isi_surat = $data['isi_surat'];
            $surat->status = 0;
            $surat->dibuat_oleh = Auth::user()->id;
            $surat->save();

            $data_surat = $surat->toArray();
            unset(
                $data_surat['tanggal_surat'],
                $data_surat['pilih_nomor'],
                $data_surat['nomor_surat'],
                $data_surat['lampiran'],
                $data_surat['perihal'],
                $data_surat['untuk'],
                $data_surat['tembusan'],
                $data_surat['isi_surat'],
                $data_surat['status'],
                $data_surat['dibuat_oleh']
            );

            // Ubah array menjadi string JSON
            $qrCodeData = json_encode($data_surat);

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
                labelText: $surat->nama_pengirim,
                labelFont: new OpenSans(20),
                labelAlignment: LabelAlignment::Center
            );
        
            $result = $builder->build();
        
            // Simpan QR code ke storage (misalnya, storage/app/public/qrcodes)
            $qrCodePath = 'surat_barcode/' . $surat->nip_pengirim . '.png';
            Storage::disk('public')->put($qrCodePath, $result->getString());

            $surat->barcode = $qrCodePath;
            $surat->save();

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

    public function download_surat($id)
    {

            $id_decrypt = Crypt::decrypt($id);
            $surat_pemberitahuan = SuratPemModel::findOrFail($id_decrypt);

            // dd($id, $id_decrypt, $surat_pemberitahuan);
    
            // Kirim ke Export
            $export_data = new SuratPemExport($surat_pemberitahuan);
            return $export_data->download_pdf();
    
        
    }

}
