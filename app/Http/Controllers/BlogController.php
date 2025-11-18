<?php

namespace App\Http\Controllers;

use App\Helper\AlertHelper;
use App\Models\BlogModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BlogController extends Controller
{
    protected $title = 'Blog Web';
    protected $menu = 'Web Content';
    protected $submenu = 'Blog Web';

    public function index()
    {
        $cms_blogs = BlogModel::whereNull('deleted_at')->latest()->get();

        return view('cms.blog.index', [
            'title'     => $this->title,
            'menu'      => $this->menu,
            'submenu'   => $this->submenu,
            'list'      => 'Data Blog',
            'cms_blogs' => $cms_blogs,
        ]);
    }

    public function create()
    {
         $result = DB::table('cms_profils')
                    ->whereNull('deleted_at')
                    ->select('id','sub_web', 'nama_web')
                    ->get();

        return view('cms.blog.tambah', [
            'title'   => $this->title,
            'website' => $result,
            'menu'    => $this->menu,
            'submenu' => $this->submenu,
        ]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'nama_web'   => 'required',
            'judul'     => 'required|string|max:150',
            'kategori'  => 'required|string|max:50',
            'status1'    => 'required|string|max:50',
            'isi' => 'required|string|min:3',
            'gambar1'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'gambar2'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'gambar3'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        DB::beginTransaction();
        try {
            $paths = [];

            foreach (['gambar1', 'gambar2', 'gambar3'] as $key => $field) {
                if ($request->hasFile($field)) {
                    $file     = $request->file($field);
                    $filename = $field . '_' . time() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('assets/images/blog'), $filename);
                    $paths[$field] = 'assets/images/blog/' . $filename;
                }
            }

            BlogModel::create([
                'id_web'       => $request->nama_web,
                'judul'        => $request->judul,
                'kategori'     => $request->kategori,
                'status'       => $request->status1,
                'isi'          => $request->isi,
                'path_gambar1' => $paths['gambar1'] ?? null,
                'path_gambar2' => $paths['gambar2'] ?? null,
                'path_gambar3' => $paths['gambar3'] ?? null,
            ]);

            DB::commit();
            AlertHelper::addAlert(true);
            return redirect()->route('blog_web.index');
        } catch (\Throwable $err) {
            DB::rollBack();
            Log::error('Update FAQ Error: ' . $err->getMessage());
            AlertHelper::addAlert(false);
            return back()->withErrors(['error' => $err->getMessage()]);
        }
    }

    public function show(string $id)
    {
        $id_decrypt = Crypt::decryptString($id);
        $blog = BlogModel::findOrFail($id_decrypt);

        return view('cms.blog.show', compact('blog'))->with([
            'title'   => $this->title,
            'menu'    => $this->menu,
            'submenu' => $this->submenu,
        ]);
    }

    public function edit(string $id)
    {
        $id_decrypt = Crypt::decryptString($id);
        $blog = BlogModel::findOrFail($id_decrypt);
        $result = DB::table('cms_profils')
                    ->whereNull('deleted_at')
                    ->select('id','sub_web', 'nama_web')
                    ->get();

        return view('cms.blog.edit', compact('blog'))->with([
            'title'   => $this->title,
            'website' => $result,
            'menu'    => $this->menu,
            'submenu' => $this->submenu,
        ]);
    }

    public function update(Request $request, string $id)
    {
        // dd($request->all());

        $request->validate([
            'nama_web'      => 'required',
            'judul'         => 'required|string|max:150',
            'kategori'      => 'required|string|max:50',
            'status1'       => 'required|string|max:50',
            'isi'           => 'required|string',
            'path_gambar1'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'path_gambar2'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'path_gambar3'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        DB::beginTransaction();
        try {
            $id_decrypt = Crypt::decryptString($id);
            $blog = BlogModel::findOrFail($id_decrypt);

            $dataUpdate = [
                'id_web'   => $request->nama_web,
                'judul'    => $request->judul,
                'kategori' => $request->kategori,
                'status'   => $request->status1,
                'isi'      => $request->isi,
            ];

            foreach (['path_gambar1' => 'path_gambar1', 'path_gambar2' => 'path_gambar2', 'path_gambar3' => 'path_gambar3'] as $field => $dbField) {
                if ($request->hasFile($field)) {
                    if (!empty($blog->$dbField) && file_exists(public_path($blog->$dbField))) {
                        @unlink(public_path($blog->$dbField));
                    }

                    $file     = $request->file($field);
                    $filename = $field . '_' . time() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('assets/images/blog'), $filename);
                    $dataUpdate[$dbField] = 'assets/images/blog/' . $filename;
                }
            }

            $blog->update($dataUpdate);

            DB::commit();
            AlertHelper::addAlert(true);
            return redirect()->route('blog_web.index');
        } catch (\Throwable $err) {
            DB::rollBack();
            Log::error('Update FAQ Error: ' . $err->getMessage());
            AlertHelper::addAlert(false);
            return back()->withErrors(['error' => $err->getMessage()]);
        }
    }

    public function destroy(string $id)
    {
        $id_decrypt = Crypt::decryptString($id);

        DB::beginTransaction();
        try {
            $blog = BlogModel::findOrFail($id_decrypt);

            foreach (['path_gambar1', 'path_gambar2', 'path_gambar3'] as $field) {
                if ($blog->$field && file_exists(public_path($blog->$field))) {
                    @unlink(public_path($blog->$field));
                }
            }

            $blog->delete();

            DB::commit();
            AlertHelper::addAlert(true);
            return redirect()->route('blog_web.index');
        } catch (\Throwable $err) {
            DB::rollBack();
            Log::error('Update Blog Error: ' . $err->getMessage());
            AlertHelper::addAlert(false);
            return back()->withErrors(['error' => $err->getMessage()]);
        }
    }
}
