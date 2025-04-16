<?php

namespace App\Http\Controllers;

use App\Models\DesaSosialModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DesaSosialController extends Controller
{
    protected $title = 'Media Sosial';
    protected $menu = 'Manajamen Web';
    protected $submenu = 'Media Sosial';

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
            // 'perangkat_desa' => DesaPerangkat::orderBy('id', 'desc')->get(),

        ];
        return view('desa.media_sosial.index')->with($data);
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
            'label' => 'Media Sosial',
            'level' => 'Create',
        ];

        return view('desa.media_sosial.tambah')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama_media' => 'required|string|max:100',
            'link' => 'nullable|url',
            'keterangan' => 'nullable|string',
            'logo_media' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        DB::beginTransaction();
        try {
            // Simpan data awal
            $media = new DesaSosialModel();
            $media->nama_media = $request->nama_media;
            $media->link = $request->link;
            $media->keterangan = $request->keterangan;
            $media->status = 1;
            $media->dibuat_oleh = Auth::user()->id;
            $media->save();
    
            // Upload dan simpan nama foto jika ada
            if ($request->hasFile('logo_media')) {
                $file = $request->file('logo_media');
                $extension = $file->getClientOriginalExtension();
                $filename = 'sosial_' . $media->id . '.' . $extension;
    
                $destinationPath = public_path('assets/images/media_sosial');
                $file->move($destinationPath, $filename);
    
                // Simpan nama file ke database
                $media->logo_media = $filename;
                $media->save();
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
