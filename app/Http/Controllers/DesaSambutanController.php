<?php

namespace App\Http\Controllers;

use App\Models\DesaSamModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class DesaSambutanController extends Controller
{
    protected $title = 'Sambutan Kepala Desa';
    protected $menu = 'Manajamen Web';
    protected $submenu = 'Sambutan';

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
            'sambutan' => DesaSamModel::orderBy('id', 'desc')->get(),

        ];
        return view('desa.sambutan.index')->with($data);
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
            'label' => 'Sambutan',
            'level' => 'Create',
        ];
        return view('desa.sambutan.tambah')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'keterangan' => 'required|string',
            'area' => 'required|string',
            'status1' => 'required|boolean',
            'gambar_sambutan' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
        ]);
    
        DB::beginTransaction();
        try {
            // Simpan data awal
            $sambutan = new DesaSamModel();
            $sambutan->keterangan = $request->keterangan;
            $sambutan->area = $request->area;
            $sambutan->status1 = $request->status1;
            $sambutan->dibuat_oleh = Auth::user()->id;
            $sambutan->save();
    
            // Upload dan simpan nama foto jika ada
            if ($request->hasFile('gambar_sambutan')) {
                $file = $request->file('gambar_sambutan');
                $extension = $file->getClientOriginalExtension();
                $filename = 'sambutan_' . $sambutan->id . '.' . $extension;
    
                $destinationPath = public_path('assets/images/sambutan');
                $file->move($destinationPath, $filename);
    
                // Simpan nama file ke database
                $sambutan->gambar_sambutan = $filename;
                $sambutan->save();
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

        $data = [
            'title' => $this->title,
            'menu' => $this->menu,
            'submenu' => $this->submenu,
            'label' => 'Sambutan',
            'level' => 'Edit',
            'edit' => DesaSamModel::find($id_decrypt),
        ];
        return view('desa.sambutan.edit')->with($data);
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
