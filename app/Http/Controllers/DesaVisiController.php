<?php

namespace App\Http\Controllers;

use App\Models\DesaVMModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class DesaVisiController extends Controller
{
    protected $title = 'Visi dan Misi';
    protected $menu = 'Visi dan Misi';
    protected $submenu = 'Visi dan Misi';
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
            'data' => DesaVMModel::first(),

        ];
        return view('desa.visi_misi.index')->with($data);
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
            'label' => 'Visi dan Misi',
            'level' => 'Create',
        ];
        return view('desa.visi_misi.tambah')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'keterangan' => 'required|string',
            'visi' => 'required|string',
            'misi' => 'required|string',
            'status1' => 'required|boolean',
            'gambar_sambutan' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
        ]);
    
        DB::beginTransaction();
        try {
            // Simpan data awal
            $visi_misi = new DesaVMModel();
            $visi_misi->keterangan = $request->keterangan;
            $visi_misi->visi = $request->visi;
            $visi_misi->misi = $request->misi;
            $visi_misi->status1 = $request->status1;
            $visi_misi->dibuat_oleh = Auth::user()->id;
            $visi_misi->save();
    
            // Upload dan simpan nama foto jika ada
            if ($request->hasFile('gambar_visi')) {
                $file = $request->file('gambar_visi');
                $extension = $file->getClientOriginalExtension();
                $filename = 'visi_' . $visi_misi->id . '.' . $extension;
    
                $destinationPath = public_path('assets/images/visi_misi');
                $file->move($destinationPath, $filename);
    
                // Simpan nama file ke database
                $visi_misi->gambar_visi = $filename;
                $visi_misi->save();
            }

            if ($request->hasFile('gambar_misi')) {
                $file = $request->file('gambar_misi');
                $extension = $file->getClientOriginalExtension();
                $filename = 'misi_' . $visi_misi->id . '.' . $extension;
    
                $destinationPath = public_path('assets/images/visi_misi');
                $file->move($destinationPath, $filename);
    
                // Simpan nama file ke database
                $visi_misi->gambar_misi = $filename;
                $visi_misi->save();
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
        $id_decrypt = Crypt::decryptString($id);
        // dd($id_decrypt);
        $data = [
            'title' => $this->title,
            'menu' => $this->menu,
            'submenu' => $this->submenu,
            'label' => 'Visi dan Misi',
            'level' => 'Create',
            'visi_misi' => DesaVMModel::findOrfail($id_decrypt),
        ];
        return view('desa.visi_misi.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'keterangan' => 'required|string',
            'visi' => 'required|string',
            'misi' => 'required|string',
            'status1' => 'required|boolean',
            'gambar_visi' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            'gambar_misi' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
        ]);
    
        DB::beginTransaction();
        try {
            $visi_misi = DesaVMModel::findOrFail($id);
            $visi_misi->keterangan = $request->keterangan;
            $visi_misi->visi = $request->visi;
            $visi_misi->misi = $request->misi;
            $visi_misi->status1 = $request->status1;
            $visi_misi->dibuat_oleh = Auth::user()->id;
            $visi_misi->save();
    
            // Jika gambar_visi di-upload, baru update
            if ($request->hasFile('gambar_visi')) {
                $file = $request->file('gambar_visi');
                $extension = $file->getClientOriginalExtension();
                $filename = 'visi_' . $visi_misi->id . '.' . $extension;
    
                $destinationPath = public_path('assets/images/visi_misi');
                $file->move($destinationPath, $filename);
    
                $visi_misi->gambar_visi = $filename;
                $visi_misi->save();
            }
    
            // Jika gambar_misi di-upload, baru update
            if ($request->hasFile('gambar_misi')) {
                $file = $request->file('gambar_misi');
                $extension = $file->getClientOriginalExtension();
                $filename = 'misi_' . $visi_misi->id . '.' . $extension;
    
                $destinationPath = public_path('assets/images/visi_misi');
                $file->move($destinationPath, $filename);
    
                $visi_misi->gambar_misi = $filename;
                $visi_misi->save();
            }
    
            DB::commit();
            return response()->json([
                'code' => 200,
                'message' => 'Berhasil Update Data',
            ]);
        } catch (\Throwable $err) {
            DB::rollBack();
            return response()->json([
                'code' => 400,
                'message' => 'Gagal Update Data: ' . $err->getMessage(),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
