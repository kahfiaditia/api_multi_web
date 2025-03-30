<?php

namespace App\Http\Controllers;

use App\Models\BukuModel;
use App\Models\MemberModel;
use App\Models\User;
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
        $data = [
            'menu' => $this->menu,
            'submenu' => $this->submenu,
            // 'penyimpanan' => PenyimpananModel::whereNull('deleted_at')->get(),
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
        dd(request()->all());
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
