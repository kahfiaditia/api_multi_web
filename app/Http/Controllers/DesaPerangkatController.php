<?php

namespace App\Http\Controllers;

use App\Models\DesaPerangkat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DesaPerangkatController extends Controller
{
    protected $title = 'Perangkat Desa';
    protected $menu = 'Manajemen Web';
    protected $submenu = 'Perangkat Desa';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => $this->title,
            'menu' => $this->menu,
            'submenu' => $this->submenu,
            'label' => 'Profil',
            'perangkat_desa' => DesaPerangkat::orderBy('id', 'desc')->get(),

        ];
        return view('desa.perangkat.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => $this->title,
            'menu' => $this->menu,
            'submenu' => $this->submenu,
            'label' => 'Perangkat Desa',
            'level' => 'Create',
        ];
        return view('desa.perangkat.tambah')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nip' => 'nullable|string|max:50',
            'jabatan' => 'required|string|max:100',
            'area' => 'required|string',
            'foto_perangkat' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
    
        DB::beginTransaction();
        try {
            // Simpan data awal
            $perangkat = new DesaPerangkat();
            $perangkat->nama_lengkap = $request->nama_lengkap;
            $perangkat->nip = $request->nip;
            $perangkat->jabatan = $request->jabatan;
            $perangkat->telepon = $request->telepon;
            $perangkat->email = $request->email;
            $perangkat->keterangan = $request->keterangan;
            $perangkat->status = $request->status1;
            $perangkat->area = $request->area;
    
            // Simpan sementara untuk dapatkan ID (jika perlu ID sebagai nama file)
            $perangkat->save();
    
            // Upload dan simpan nama foto jika ada
            if ($request->hasFile('foto_perangkat')) {
                $file = $request->file('foto_perangkat');
                $extension = $file->getClientOriginalExtension();
                $filename = 'perangkat_' . $perangkat->id . '.' . $extension;
    
                $destinationPath = public_path('assets/images/perangkat_desa');
                $file->move($destinationPath, $filename);
    
                // Simpan nama file ke database
                $perangkat->foto_perangkat = $filename;
                $perangkat->save();
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
