<?php

namespace App\Http\Controllers;

use App\Models\DesaBannerModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DesaBannerController extends Controller
{
    protected $title = 'Banner';
    protected $menu = 'Manajamen Web';
    protected $submenu = 'Banner';

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
        return view('desa.banner.index')->with($data);
    
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
            'label' => 'Banner',
            'level' => 'Create',
        ];

        return view('desa.banner.tambah')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul_banner' => 'required|string|max:255',
            'link' => 'nullable|url',
            'keterangan' => 'required|string',
            'gambar_banner' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        DB::beginTransaction();
        try {
            $banner = new DesaBannerModel();
            $banner->judul_banner = $request->judul_banner;
            $banner->link = $request->link;
            $banner->keterangan = $request->keterangan;
            $banner->status = 1;
            $banner->dibuat_oleh = Auth::user()->id;
    
            // Simpan dulu biar dapat ID
            $banner->save();
    
            // Cek dan simpan gambar jika ada
            if ($request->hasFile('gambar_banner')) {
                $file = $request->file('gambar_banner');
                $extension = $file->getClientOriginalExtension();
                $filename = 'banner_' . $banner->id . '.' . $extension;
    
                $destinationPath = public_path('assets/images/banner');
                $file->move($destinationPath, $filename);
    
                // Update nama file ke database
                $banner->gambar_banner = $filename;
                $banner->save();
            }
    
            DB::commit();
            return response()->json([
                'code' => 200,
                'message' => 'Banner berhasil disimpan',
            ]);
        } catch (\Throwable $e) {
            DB::rollBack();
            return response()->json([
                'code' => 400,
                'message' => 'Gagal menyimpan banner: ' . $e->getMessage(),
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
