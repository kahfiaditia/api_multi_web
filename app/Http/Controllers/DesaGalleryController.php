<?php

namespace App\Http\Controllers;

use App\Models\DesaGaleryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DesaGalleryController extends Controller
{
    protected $title = 'Gallery';
    protected $menu = 'Manajamen Web';
    protected $submenu = 'Gallery';
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
        return view('desa.galerry.index')->with($data);
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

        return view('desa.galerry.tambah')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul_galery' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'foto_1' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto_2' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto_3' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto_4' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto_5' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto_6' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        DB::beginTransaction();
        try {
            $media = new DesaGaleryModel();
            $media->judul_galery = $request->judul_galery; // perbaikan disini, sebelumnya salah ambil key
            $media->keterangan = $request->keterangan;
            $media->status = 1;
            $media->dibuat_oleh = Auth::user()->id;
            $media->save();
    
            // Folder penyimpanan
            $destinationPath = public_path('assets/images/galery');
    
            // Upload foto-foto
            for ($i = 1; $i <= 6; $i++) {
                $fotoKey = "foto_$i";
                if ($request->hasFile($fotoKey)) {
                    $file = $request->file($fotoKey);
                    $extension = $file->getClientOriginalExtension();
                    $filename = "galery_{$media->id}_{$i}." . $extension;
    
                    $file->move($destinationPath, $filename);
    
                    // Simpan nama file ke kolom yang sesuai di database
                    $media->{$fotoKey} = $filename;
                }
            }
    
            $media->save();
    
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
