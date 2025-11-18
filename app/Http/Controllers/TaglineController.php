<?php

namespace App\Http\Controllers;

use App\Helper\AlertHelper;
use App\Models\TaglineModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TaglineController extends Controller
{
    protected $title   = 'Tagline Web';
    protected $menu    = 'Web Content';
    protected $submenu = 'Tagline Web';

    public function index()
    {
        $cms_tagline = TaglineModel::whereNull('deleted_at')->latest()->get();

        return view('cms.tagline.index', [
            'title'      => $this->title,
            'menu'       => $this->menu,
            'submenu'    => $this->submenu,
            'list'       => 'Data Tagline',
            'cms_tagline'=> $cms_tagline,
        ]);
    }

    public function create()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $result = DB::table('cms_profils')
                    ->whereNull('deleted_at')
                    ->select('id','sub_web', 'nama_web')
                    ->get();

        return view('cms.tagline.create', [
            'title'   => $this->title,
            'website' => $result,
            'menu'    => $this->menu,
            'submenu' => $this->submenu,
        ]);
    }

    public function store(Request $request)
    {
            // UNCOMMENT LINE INI - UNTUK MELIHAT DATA YANG DIKIRIM
            // dd($request->all());

            $request->validate([
                'nama_web'    => 'required',
                'judul'       => 'required|string|max:25',
                'deskripsi'   => 'nullable|string|max:50',
                'isi'         => 'nullable|string',
                'status1'     => 'required|string|max:15',
                'icon'        => 'nullable|string|max:20',
                'path_gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
            ]);

            DB::beginTransaction();
            try {
                $path = null;
                if ($request->hasFile('path_gambar')) {
                    $file     = $request->file('path_gambar');
                    $filename = 'tagline_' . time() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('assets/images/tagline'), $filename);
                    $path = 'assets/images/tagline/' . $filename;
                }

                TaglineModel::create([
                    'id_web'       => $request->nama_web,
                    'judul'       => $request->judul,
                    'deskripsi'   => $request->deskripsi,
                    'isi'         => $request->isi,
                    'icon'        => $request->icon,
                    'status'      => $request->status1,
                    'dibuat_oleh' => Auth::user()->id,
                    'path_gambar' => $path,
                ]);

                DB::commit();
                AlertHelper::addAlert(true);
                return redirect()->route('tagline_web.index');
            } catch (\Throwable $err) {
                DB::rollBack();
                AlertHelper::addAlert(false);
                return back()->withErrors(['error' => $err->getMessage()]);
            }
    }

    public function show(string $id)
    {
        $id_decrypt = Crypt::decryptString($id);
        $tagline = TaglineModel::findOrFail($id_decrypt);

        return view('cms.tagline.show', compact('tagline'))->with([
            'title'   => $this->title,
            'menu'    => $this->menu,
            'submenu' => $this->submenu,
        ]);
    }

    public function edit(string $id)
    {
        $id_decrypt = Crypt::decryptString($id);
        $tagline = TaglineModel::findOrFail($id_decrypt);
        $result = DB::table('cms_profils')
                    ->whereNull('deleted_at')
                    ->select('id','sub_web', 'nama_web')
                    ->get();

        return view('cms.tagline.edit', compact('tagline'))->with([
            'title'   => $this->title,
            'website' => $result,
            'menu'    => $this->menu,
            'submenu' => $this->submenu,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name_web'    => 'required',
            'judul'       => 'required|string|max:25',
            'deskripsi'   => 'nullable|string|max:50',
            'isi'         => 'nullable|string',
            'status1'     => 'required|string|max:15',
            'icon'        => 'nullable|string|max:20',
            'path_gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        DB::beginTransaction();
        try {
            $id_decrypt = Crypt::decryptString($id);
            $tagline = TaglineModel::findOrFail($id_decrypt);

            $dataUpdate = [
                'id_web'     => $request->nama_web,
                'judul'     => $request->judul,
                'deskripsi' => $request->deskripsi,
                'isi'       => $request->isi,
                'icon'      => $request->icon,
                'status'    => $request->status1,
            ];

            if ($request->hasFile('path_gambar')) {
                if (!empty($tagline->path_gambar) && file_exists(public_path($tagline->path_gambar))) {
                    @unlink(public_path($tagline->path_gambar));
                }
                $file     = $request->file('path_gambar');
                $filename = 'tagline_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('assets/images/tagline'), $filename);
                $dataUpdate['path_gambar'] = 'assets/images/tagline/' . $filename;
            }

            $tagline->update($dataUpdate);

            DB::commit();
            AlertHelper::addAlert(true);
            return redirect()->route('tagline_web.index');
        } catch (\Throwable $err) {
            DB::rollBack();
            Log::error('Update Tagline Error: ' . $err->getMessage());
            AlertHelper::addAlert(false);
            return back()->withErrors(['error' => $err->getMessage()]);
        }
    }

    public function destroy(string $id)
    {
        $id_decrypt = Crypt::decryptString($id);

        DB::beginTransaction();
        try {
            $tagline = TaglineModel::findOrFail($id_decrypt);

            if ($tagline->path_gambar && file_exists(public_path($tagline->path_gambar))) {
                @unlink(public_path($tagline->path_gambar));
            }

            $tagline->delete();

            DB::commit();
            AlertHelper::addAlert(true);
            return redirect()->route('tagline_web.index');
        } catch (\Throwable $err) {
            DB::rollBack();
            AlertHelper::addAlert(false);
            return back()->withErrors(['error' => $err->getMessage()]);
        }
    }
}
