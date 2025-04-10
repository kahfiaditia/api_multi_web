<?php

namespace App\Http\Controllers;

use App\Models\DesaBlogModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class DesaBlog extends Controller
{
    protected $title = 'Profil Desa';
    protected $menu = 'Blog';
    protected $submenu = 'Blog';
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
            'blog_desa' => DesaBlogModel::orderBy('id', 'desc')->get(),

        ];
        return view('desa.blog.index')->with($data);
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
            'label' => 'Profil',
            'level' => 'Create',
        ];
        return view('desa.blog.tambah')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

            $request->validate([
                'judul' => 'required|string|max:255',
                'kategori' => 'required|string|max:100',
                'status' => 'required|string|in:publish,draft',
                'area' => 'required|string',
                'gambar1' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'gambar2' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'gambar3' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ]);
        
            DB::beginTransaction();
            try {
                // Simpan data awal (tanpa gambar dulu)
                $blog = DesaBlogModel::create([
                    'judul' => $request->judul,
                    'kategori' => $request->kategori,
                    'status' => $request->status,
                    'isi' => $request->area,
                ]);
        
                // Path penyimpanan gambar
                $destinationPath = public_path('assets/images/blog');
                $gambarNames = [];
        
                foreach ([1, 2, 3] as $i) {
                    $gambarField = 'gambar' . $i;
                    if ($request->hasFile($gambarField)) {
                        $file = $request->file($gambarField);
                        $extension = $file->getClientOriginalExtension();
                        $filename = $blog->id . '_' . $i . '.' . $extension;
                        $file->move($destinationPath, $filename);
                        $gambarNames[$gambarField] = $filename;
                    }
                }
        
                // Update nama gambar di record
                $blog->gambar1 = $gambarNames['gambar1'] ?? null;
                $blog->gambar2 = $gambarNames['gambar2'] ?? null;
                $blog->gambar3 = $gambarNames['gambar3'] ?? null;
                $blog->save();
        
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
