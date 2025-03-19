<?php

namespace App\Http\Controllers;

use App\Helper\AlertHelper;
use App\Models\BukuModel;
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
use Illuminate\Support\Facades\Validator;

class BukuController extends Controller
{
    protected $menu ="Data Master";
    protected $submenu ="Buku";

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'menu' => $this->menu,
            'submenu' => $this->submenu,
            'buku' => BukuModel::whereNull('deleted_at')->get(),
        ];
        return view('buku.index', $data);
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
            'buku' => BukuModel::whereNull('deleted_at')->get(),
        ];
        return view('buku.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $validator = Validator::make($request->all(), [
            'kode_buku' => 'required|string|max:60',
            'nama_buku' => 'required|string|max:60',
            'kategori' => 'required|string|max:60',
            'jumlah' => 'required|integer',
            'harga' => 'required|numeric',
            'tgl_pembelian' => 'required|date',
            'pengarang' => 'required|string|max:70',
            'penerbit' => 'required|string|max:50',
            'tahun' => 'required|integer|min:1900|max:' . date('Y'),
            'deskripsi' => 'nullable|string',
        ]);

        // Jika validasi gagal, kembalikan dengan error
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Gunakan database transaction
        DB::beginTransaction();
        try {
            $buku = new BukuModel();
            $buku->kode = $request->kode_buku;
            $buku->nama_buku = $request->nama_buku;
            $buku->kategori = $request->kategori;
            $buku->jumlah = $request->jumlah;
            $buku->harga = $request->harga;
            $buku->tanggal_pembelian = $request->tgl_pembelian;
            $buku->pengarang = $request->pengarang;
            $buku->penerbit = $request->penerbit;
            $buku->tahun = $request->tahun;
            $buku->sumber_buku = $request->sumber;
            $buku->deskripsi = $request->deskripsi;
            $buku->save();

            $dataBuku = $buku->toArray();
            unset(
                $dataBuku['jumlah'], 
                $dataBuku['nama_barcode'], 
                $dataBuku['harga'], 
                $dataBuku['tanggal_pembelian'],
                $dataBuku['sumber_buku'],
                $dataBuku['deskripsi'],
                $dataBuku['barcode_rak'],
                $dataBuku['status'],
                $dataBuku['keterangan'],
                $dataBuku['created_at'],
                $dataBuku['updated_at'],
                $dataBuku['deleted_at']
            );

            // Ubah array menjadi string JSON
            $qrCodeData = json_encode($dataBuku);

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
                labelText: $buku->kode,
                labelFont: new OpenSans(20),
                labelAlignment: LabelAlignment::Center
            );
        
            $result = $builder->build();
        
            // Simpan QR code ke storage (misalnya, storage/app/public/qrcodes)
            $qrCodePath = 'qr_buku/' . $buku->kode . '.png';
            Storage::disk('public')->put($qrCodePath, $result->getString());
        
            // Simpan path QR code ke database (jika diperlukan)
            $buku->nama_barcode = $qrCodePath;
            $buku->save();

            DB::commit();
            AlertHelper::addAlert(true);
            return redirect('/buku');
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
