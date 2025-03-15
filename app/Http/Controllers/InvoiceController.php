<?php

namespace App\Http\Controllers;

use App\Exports\InvoiceExport;
use App\Helper\AlertHelper;
use App\Models\InvDataModel;
use App\Models\InvItemsModel;
use App\Models\InvoiceModel;
use App\Models\InvPenerimaModel;
use App\Models\InvPengirimModel;
use Carbon\Carbon;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\Label\Font\OpenSans;
use Endroid\QrCode\Label\LabelAlignment;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Endroid\QrCode\ErrorCorrectionLevel;
use Illuminate\Support\Facades\Crypt;
use Milon\Barcode\DNS1D;
use Milon\Barcode\DNS2D;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'data_pengirim' => InvPengirimModel::all(),
        ];

        return view('invoice.pengirim', $data);
    }

    public function index_penerima()
    {
        
        $data = [
            'data_penerima' => InvPenerimaModel::with('pengirim')->get(),
        ];
        
        return view('invoice.penerima_index', $data);
    }

    public function create_penerima()
    {
       $data = [
           'data_pengirim' => InvPengirimModel::all(),
       ];

        return view('invoice.penerima_create', $data);
    }

    public function get_penerima(Request $request)
    {
        $penerima_invoice = DB::table('invoice_pengirim')
        ->whereNull('deleted_at')
        ->where('status', 0)
        ->get();

        if (count($penerima_invoice) > 0) {
            return response()->json([
                'code' => 200,
                'data' => $penerima_invoice,
            ]);
        } else {
            return response()->json([
                'code' => 400,
                'data' => null,
            ]);
        }
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'dataform.pilih_pengirim'   => 'required',
            'dataform.nama_penerima'    => 'required|string|max:255',
            'dataform.email_penerima'   => 'required|email',
            'dataform.alamat_penerima'  => 'required|string|max:500',
        ]);
        
        $data = $request->dataform;
        
        DB::beginTransaction();
        try {
            $invoice = new InvPenerimaModel();
            $invoice->pilih_pengirim    = $data['pilih_pengirim'];
            $invoice->nama_penerima     = $data['nama_penerima'];
            $invoice->divisi_penerima   = $data['divisi_penerima'];
            $invoice->jabatan_penerima  = $data['jabatan_penerima'];
            $invoice->telepon_penerima  = $data['telepon_penerima'];
            $invoice->email_penerima    = $data['email_penerima'];
            $invoice->alamat_penerima   = $data['alamat_penerima'];
            $invoice->save();
        
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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            // 'data_user' => User::where('roles', '!=', 'Customer')->get()
        ];

        return view('invoice.add_data', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'nama_pengirim'   => 'required|string|max:40',
            'nama_perusahaan' => 'nullable|string|max:40',
            'jabatan'         => 'nullable|string|max:40',
            'telepon'         => 'nullable|string|max:18|unique:invoice_pengirim,telepon',
            'email'           => 'nullable|email|max:35|unique:invoice_pengirim,email',
            'alamat'          => 'nullable|string',
            'logo_perusahaan' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status'          => 'nullable|string|max:10',
        ]); 

         // Cek apakah data sudah ada dan berikan pesan spesifik
     
         $tanggal = Carbon::now()->format('d'); // Dua digit tanggal
         $bulan = Carbon::now()->format('m');   // Dua digit bulan
         $tahun = Carbon::now()->format('y');   // Dua digit tahun
         $jam = Carbon::now()->format('H');     // Dua digit jam
         $menit = Carbon::now()->format('i');   // Dua digit menit
 
         // Mendapatkan nomor urut terakhir dan menambahkannya
         $lastRecord = InvPengirimModel::withTrashed()->latest()->first();
         $nextNumber = $lastRecord ? (int)substr($lastRecord->kode_pengirim, -3) + 1 : 1;
         $nomorUrut = str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
 
         // Membentuk kode_pengiriman
         $kode_pengirim = "P{$tanggal}{$bulan}{$tahun}{$jam}{$menit}{$nomorUrut}";


        DB::beginTransaction();
        try {
            $logo_pengirim = null;

            if ($request->hasFile('logo_perusahaan')) {
                $logo_pengirim = time() . '.' . $request->logo_perusahaan->extension();
                $request->logo_perusahaan->move(public_path('assets/pengirim_gambar'), $logo_pengirim);
            }

            $pengiriman = new InvPengirimModel();
            $pengiriman->nama_pengirim = $request->nama_pengirim;
            $pengiriman->nama_perusahaan = $request->nama_perusahaan;
            $pengiriman->kode_pengirim = $kode_pengirim;
            $pengiriman->logo_perusahaan = $logo_pengirim;
            $pengiriman->jabatan = $request->jabatan;
            $pengiriman->telepon = $request->telepon;
            $pengiriman->email = $request->email;
            $pengiriman->alamat = $request->alamat;
            $pengiriman->status = 0;
            $pengiriman->save();

             // Buat array data user kecuali password
            $pengirimanData = $pengiriman->toArray();
            unset($pengirimanData['logo_perusahaan'], $pengirimanData['status'], $pengirimanData['alamat']);

            // Ubah array menjadi string JSON
            $qrCodeData = json_encode($pengirimanData);

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
                // labelText: 'Nama : ' . $pengiriman->nama,
                labelText: $pengiriman->nama_pengirim,
                labelFont: new OpenSans(20),
                labelAlignment: LabelAlignment::Center
            );
        
            $result = $builder->build();
        
            // Simpan QR code ke storage (misalnya, storage/app/public/qrcodes)
            $qrCodePath = 'qr_pengirim/' . $pengiriman->nama_pengirim . '_' . $pengiriman->id . '.png';
            Storage::disk('public')->put($qrCodePath, $result->getString());
        
            // Simpan path QR code ke database (jika diperlukan)
            $pengiriman->qr_code_pengirim = $qrCodePath;
            $pengiriman->save();

            DB::commit();
            AlertHelper::addAlert(true);
            return redirect('/data_invoice');
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

    public function index_invoice()
    {
        $data = [
            'data_invoice' => InvDataModel::all(),
        ];

        return view('invoice.index_invoice', $data);
    }

    public function buat_invoice()
    {
        return view('invoice.create_invoice');
    }

    public function simpan_invoice(Request $request)
    {
        // dd($request->all());    
        DB::beginTransaction();
        try {
            $data = $request->input('dataform');

            // Ambil ID pengirim dan penerima (digit terakhir jika 2 digit)
            $pengirim_id = substr($data['pilih_pengirim'], -1);
            $penerima_id = substr($data['pilih_penerima'], -1);

            // Ambil tanggal, bulan, dan tahun dari tanggal invoice
            $tanggal = date('d', strtotime($data['tanggal_invoice']));
            $bulan = date('m', strtotime($data['tanggal_invoice']));
            $tahun = date('y', strtotime($data['tanggal_invoice']));

            // Hitung nomor urut
            $lastInvoice = InvDataModel::orderBy('id', 'desc')->first();
            $nomor_urut = $lastInvoice ? str_pad(($lastInvoice->id + 1) % 100, 2, '0', STR_PAD_LEFT) : '50';

            // Format nomor invoice
            $nomor_invoice = "$pengirim_id$penerima_id$tanggal$bulan$tahun$nomor_urut";

            // Simpan invoice
            $invoice = new InvDataModel();
            $invoice->pengirim_id = $data['pilih_pengirim'];
            $invoice->penerima_id = $data['pilih_penerima'];
            $invoice->tanggal_invoice = $data['tanggal_invoice'];
            $invoice->status_lunas = $data['status_lunas'];
            $invoice->bank = $data['bank'];
            $invoice->atas_nama = $data['atas_nama'];
            $invoice->nomor_rekening = $data['nomor_rekening'];
            $invoice->nomor_invoice = $nomor_invoice;
            $invoice->save();

            $total = 0;
            foreach ($data['items'] as $item) {
                $subtotal = (float) str_replace('.', '', $item['subtotal']);
                $harga = (float) str_replace('.', '', $item['harga']);
                $total += $subtotal;
            
                $invoiceItem = new InvItemsModel();
                $invoiceItem->invoice_id = $invoice->id;
                $invoiceItem->deskripsi = $item['deskripsi'];
                $invoiceItem->harga = $harga;
                $invoiceItem->kuantiti = $item['kuantiti'];
                $invoiceItem->subtotal = $subtotal;
                $invoiceItem->save();
            }

            // Update total pada invoice
            $totalSubtotal = InvItemsModel::where('invoice_id', $invoice->id)->sum('subtotal');
            InvItemsModel::where('invoice_id', $invoice->id)->update(['total' => $totalSubtotal]);

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

public function lihat_invoice($id)
{

           // Dekripsi ID invoice
        $invoice_id = Crypt::decryptString($id);
        // DD($invoice_id);
        // Ambil data invoice beserta items-nya
        $invoice = InvDataModel::findOrFail($invoice_id);

        return view('invoice.lihat_invoice', compact('invoice'));
    
}

    public function data_penerima(Request $request)
    {
        $data_invoice = DB::table('invoice_penerima')
        ->whereNull('deleted_at')
        ->get();

        if (count($data_invoice) > 0) {
            return response()->json([
                'code' => 200,
                'data' => $data_invoice,
            ]);
        } else {
            return response()->json([
                'code' => 400,
                'data' => null,
            ]);
        }
    }

    public function download($id)
    {
        $id_decrypt = Crypt::decrypt($id);
        $invoice = InvDataModel::findOrFail($id_decrypt);
        $invoiceItems = InvItemsModel::where('invoice_id', $invoice->id)->get();

        // Kirim ke Export
        $export = new InvoiceExport($invoice, $invoiceItems);
        return $export->download();
    }

}
