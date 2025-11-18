<?php

namespace App\Http\Controllers;

use App\Helper\AlertHelper;
use App\Models\SyaratModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SyaratController extends Controller
{
    protected $title   = 'Syarat Web';
    protected $menu    = 'Web Content';
    protected $submenu = 'Syarat Web';

    public function index()
    {
        $cms_syarat = SyaratModel::whereNull('deleted_at')
                        ->where('keterangan', 'Syarat')
                        ->latest()
                        ->get();

        return view('cms.syarat.index', [
            'title'     => $this->title,
            'menu'      => $this->menu,
            'submenu'   => $this->submenu,
            'list'      => 'Data Syarat',
            'cms_syarat'=> $cms_syarat,
        ]);
    }

    public function create()
    {
        return view('cms.syarat.create', [
            'title'   => $this->title,
            'menu'    => $this->menu,
            'submenu' => $this->submenu,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_syarat' => 'required|string|max:25',
            'deskripsi'   => 'nullable|string|max:150',
            'syarat'      => 'nullable|string',
            'status1'     => 'required|string|max:15',
            'keterangan'  => 'nullable|string|max:15',
            'path_gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        DB::beginTransaction();
        try {
            $path_gambar = null;
            if ($request->hasFile('path_gambar')) {
                $file = $request->file('path_gambar');
                $filename = 'syarat_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('assets/images/syarat'), $filename);
                $path_gambar = 'assets/images/syarat/' . $filename;
            }

            SyaratModel::create([
                'nama_syarat' => $request->nama_syarat,
                'deskripsi'   => $request->deskripsi,
                'syarat'      => $request->syarat,
                'keterangan'  => $request->keterangan,
                'status'      => $request->status1,
                'path_gambar' => $path_gambar,
                'dibuat_oleh' => Auth::id(),
            ]);

            DB::commit();
            AlertHelper::addAlert(true);
            return redirect()->route('syarat_web.index');
        } catch (\Throwable $err) {
            DB::rollBack();
            AlertHelper::addAlert(false);
            return back()->withErrors(['error' => $err->getMessage()]);
        }
    }

    public function show(string $id)
    {
        $id_decrypt = Crypt::decryptString($id);
        $syarat = SyaratModel::findOrFail($id_decrypt);

        return view('cms.syarat.show', compact('syarat'))->with([
            'title'   => $this->title,
            'menu'    => $this->menu,
            'submenu' => $this->submenu,
        ]);
    }

    public function edit(string $id)
    {
        $id_decrypt = Crypt::decryptString($id);
        $syarat = SyaratModel::findOrFail($id_decrypt);

        return view('cms.syarat.edit', compact('syarat'))->with([
            'title'   => $this->title,
            'menu'    => $this->menu,
            'submenu' => $this->submenu,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_syarat' => 'required|string|max:25',
            'deskripsi'   => 'nullable|string|max:150',
            'syarat'      => 'nullable|string',
            'keterangan'  => 'nullable|string|max:15',
            'status1'     => 'required|string|max:15',
            'path_gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        DB::beginTransaction();
        try {
            $id_decrypt = Crypt::decryptString($id);
            $syarat = SyaratModel::findOrFail($id_decrypt);

            $dataUpdate = [
                'nama_syarat' => $request->nama_syarat,
                'deskripsi'   => $request->deskripsi,
                'syarat'      => $request->syarat,
                'status'      => $request->status1,
                'keterangan'  => $request->keterangan,
            ];

            if ($request->hasFile('path_gambar')) {
                if ($syarat->path_gambar && file_exists(public_path($syarat->path_gambar))) {
                    @unlink(public_path($syarat->path_gambar));
                }

                $file = $request->file('path_gambar');
                $filename = 'syarat_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('assets/images/syarat'), $filename);
                $dataUpdate['path_gambar'] = 'assets/images/syarat/' . $filename;
            }

            $syarat->update($dataUpdate);

            DB::commit();
            AlertHelper::addAlert(true);
            return redirect()->route('syarat_web.index');
        } catch (\Throwable $err) {
            DB::rollBack();
            AlertHelper::addAlert(false);
            return back()->withErrors(['error' => $err->getMessage()]);
        }
    }

    public function destroy(string $id)
    {
        $id_decrypt = Crypt::decryptString($id);

        DB::beginTransaction();
        try {
            $syarat = SyaratModel::findOrFail($id_decrypt);

            if ($syarat->path_gambar && file_exists(public_path($syarat->path_gambar))) {
                @unlink(public_path($syarat->path_gambar));
            }

            $syarat->delete();

            DB::commit();
            AlertHelper::addAlert(true);
            return redirect()->route('syarat_web.index');
        } catch (\Throwable $err) {
            DB::rollBack();
            AlertHelper::addAlert(false);
            return back()->withErrors(['error' => $err->getMessage()]);
        }
    }
}
