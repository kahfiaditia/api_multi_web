<?php

namespace App\Http\Controllers;

use App\Models\BukuModel;
use Illuminate\Support\Str;
use App\Models\DetilPinjamModel;
use App\Models\MemberModel;
use App\Models\PeminjamanModel;
use App\Models\PenyimpananModel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    protected $menu ="Transaksi";
    protected $submenu ="Peminjaman";

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penyimpanan = PeminjamanModel::where([
            ['deleted_at', '=', null],
            ['status', '=', 'dipinjam']
        ])->get();

        $data = [
            'menu' => $this->menu,
            'submenu' => $this->submenu,
            'penyimpanan' => $penyimpanan,
        ];
        return view('peminjaman.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'menu' => $this->menu,
            'submenu' => $this->submenu,
            'level' => 'create',
            'label' => 'create',
            'penyimpanan' => BukuModel::whereNull('deleted_at')->get(),
        ];
        return view('peminjaman.create', $data);
    }

    public function scanBarcode1(Request $request)
    {
        $val = 0;
        if ($request->peminjam == 'Siswa') {
            $data = MemberModel::where('kode', $request->barcode)->first();
            if ($data) {
                $id = $data->id;
                $class_id = $data->class_id;
                $type = $request->peminjam;
                $code = 200;
                $val = $val + 1;
            }
        }
        if ($request->peminjam == 'Guru') {
            $data = User::where('kode', $request->barcode)->first();
            if ($data) {
                $id = $data->id;
                $class_id = null;
                $type = $request->peminjam;
                $code = 200;
                $val = $val + 1;
            }
        }
        if ($request->peminjam == '') {
            $data = BukuModel::where('kode', $request->barcode)->first();
            if ($data) {
                $id = $data->id;
                $class_id = $data->kategori->kode_kategori . '-' . $data->judul;
                $type = 'buku';
                $code = 200;
                $val = $val + 1;
            }
        } elseif ($request->peminjam != '' and $val == 0) {
            $data = BukuModel::where('kode', $request->barcode)->first();
            if ($data) {
                $id = $data->id;
                $class_id = $data->kategori->kode_kategori . '-' . $data->judul;
                $type = 'buku';
                $code = 200;
                $val = $val + 1;
            }
        }
        if ($val == 0) {
            $id = null;
            $class_id = null;
            $type = null;
            $code = 400;
        }
        return response()->json([
            'code' => $code,
            'id' => $id,
            'jenjang' => $class_id,
            'type' => $type,
            'val' => $val,
        ]);
    }

    public function getSiswa()
    {
        $siswa = MemberModel::select('id', 'nis', 'nama')->get(); // Ambil data siswa dari database

        return response()->json([
            'status' => 'success',
            'data' => $siswa
        ]);
    }

    public function getGuru()
    {
        $guru = User::select('id', 'kode', 'nama')
        ->where('roles', 'Guru') // Pastikan nilai 'Guru' sesuai dengan yang ada di database
        ->get();

        return response()->json([
        'status' => 'success',
        'data' => $guru
        ]);
    }
    
    public function checkBarcode($barcode)
    {
        // Cek apakah buku dengan barcode tertentu ada di database
        $book = BukuModel::where('kode', $barcode)->first();

        if ($book) {
            return response()->json([
                'success' => true,
                'book' => [
                    'id' => $book->id,
                    'kode' => $book->kode,
                    'kategori' => $book->kategori,
                    'jumlah' => $book->jumlah,
                    'harga' => $book->harga,
                    'judul' => $book->nama_buku,
                ]
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Tidak ada buku dengan barcode tersebut.'
            ]);
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        DB::beginTransaction();
        try {
            // Generate kode pinjam unik
            $kodePinjam = 'P' . now()->format('YmdHis') . Str::random(5);
            
            // Simpan data peminjaman
            $peminjaman = PeminjamanModel::create([
                'kode_pinjam' => $kodePinjam,
                'id_siswa' => $request->siswa,
                'id_guru' => $request->guru,
                'tanggal_pinjam' => Carbon::now(),
                'jumlah_hari' => 7, // Default 7 hari
                'jumlah_buku' => count($request->data_peminjaman),
                'status' => 'dipinjam'
            ]);
            
            // Simpan detail peminjaman
            foreach ($request->data_peminjaman as $item) {
                DetilPinjamModel::create([
                    'id_pinjam' => $peminjaman->id,
                    'id_buku' => $item['buku_id'],
                    'jumlah' => $item['jumlah']
                ]);
            }
            
            DB::commit();
            return response()->json(['message' => 'Peminjaman berhasil disimpan', 'kode_pinjam' => $kodePinjam], 201);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => 'Gagal menyimpan peminjaman', 'message' => $e->getMessage()], 500);
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

    public function buku_ambil(Request $request)
    {
        $buku = DB::table('data_buku')
        ->select('id', 'kode', 'nama_buku', 'kategori', 'harga', 'tahun')
        ->whereNull('deleted_at')
        ->where('jumlah', '>', 0);

        if ($request->has('id')) {
            $buku->where('id', $request->id); // Filter berdasarkan ID jika diberikan
        }

        $buku = $buku->orderBy('id', 'ASC')->get();

        return response()->json([
            'status' => 'success',
            'data' => $buku
        ]);
    }
}
