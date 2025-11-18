<?php

namespace App\Http\Controllers;

use App\Helper\AlertHelper;
use App\Models\SyaratModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class KebijakanController extends Controller
{
    protected $title   = 'Kebijakan Web';
    protected $menu    = 'Web Content';
    protected $submenu = 'Kebijakan Web';

    public function index()
    {
        $cms_kebijakan = SyaratModel::whereNull('deleted_at')
                        ->where('keterangan', 'Kebijakan')
                        ->latest()
                        ->get();

        return view('cms.kebijakan.index', [
            'title'     => $this->title,
            'menu'      => $this->menu,
            'submenu'   => $this->submenu,
            'list'      => 'Data Kebijakan',
            'cms_kebijakan'=> $cms_kebijakan,
        ]);
    }

    public function create()
    {
        return view('cms.kebijakan.create', [
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
                $filename = 'kebijakan_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('assets/images/kebijakan'), $filename);
                $path_gambar = 'assets/images/kebijakan/' . $filename;
            }

            SyaratModel::create([
                'nama_syarat' => $request->nama_syarat,
                'deskripsi'   => $request->deskripsi,
                'syarat'      => $request->syarat,
                'status'      => $request->status1,
                'keterangan'  => $request->keterangan,
                'path_gambar' => $path_gambar,
                'dibuat_oleh' => Auth::id(),
            ]);

            DB::commit();
            AlertHelper::addAlert(true);
            return redirect()->route('kebijakan_web.index');
        } catch (\Throwable $err) {
            DB::rollBack();
            AlertHelper::addAlert(false);
            return back()->withErrors(['error' => $err->getMessage()]);
        }
    }

    public function show(string $id)
    {
        $id_decrypt = Crypt::decryptString($id);
        $kebijakan = SyaratModel::findOrFail($id_decrypt);

        return view('cms.kebijakan.show', compact('kebijakan'))->with([
            'title'   => $this->title,
            'menu'    => $this->menu,
            'submenu' => $this->submenu,
        ]);
    }

    public function edit(string $id)
    {
        $id_decrypt = Crypt::decryptString($id);
        $kebijakan = SyaratModel::findOrFail($id_decrypt);

        return view('cms.kebijakan.edit', compact('kebijakan'))->with([
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
            'status1'     => 'required|string|max:15',
            'keterangan'  => 'nullable|string|max:15',
            'path_gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        DB::beginTransaction();
        try {
            $id_decrypt = Crypt::decryptString($id);
            $kebijakan = SyaratModel::findOrFail($id_decrypt);

            $dataUpdate = [
                'nama_syarat' => $request->nama_syarat,
                'deskripsi'   => $request->deskripsi,
                'syarat'      => $request->syarat,
                'keterangan'  => $request->keterangan,
                'status'      => $request->status1,
            ];

            if ($request->hasFile('path_gambar')) {
                if ($kebijakan->path_gambar && file_exists(public_path($kebijakan->path_gambar))) {
                    @unlink(public_path($kebijakan->path_gambar));
                }

                $file = $request->file('path_gambar');
                $filename = 'kebijakan_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('assets/images/kebijakan'), $filename);
                $dataUpdate['path_gambar'] = 'assets/images/kebijakan/' . $filename;
            }

            $kebijakan->update($dataUpdate);

            DB::commit();
            AlertHelper::addAlert(true);
            return redirect()->route('kebijakan_web.index');
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
            $kebijakan = SyaratModel::findOrFail($id_decrypt);

            if ($kebijakan->path_gambar && file_exists(public_path($kebijakan->path_gambar))) {
                @unlink(public_path($kebijakan->path_gambar));
            }

            $kebijakan->delete();

            DB::commit();
            AlertHelper::addAlert(true);
            return redirect()->route('kebijakan_web.index');
        } catch (\Throwable $err) {
            DB::rollBack();
            AlertHelper::addAlert(false);
            return back()->withErrors(['error' => $err->getMessage()]);
        }
    }
}
