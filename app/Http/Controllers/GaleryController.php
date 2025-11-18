<?php

namespace App\Http\Controllers;

use App\Helper\AlertHelper;
use App\Models\GaleryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GaleryController extends Controller
{
    protected $title = 'Galery Web';
    protected $menu = 'Web Content';
    protected $submenu = 'Galery Web';

    public function index()
    {
        $cms_galery = GaleryModel::whereNull('deleted_at')->latest()->get();

        return view('cms.galery.index', [
            'title'       => $this->title,
            'menu'        => $this->menu,
            'submenu'     => $this->submenu,
            'list'        => 'Data Galery',
            'cms_galery'  => $cms_galery,
        ]);
    }

    public function create()
    {
        return view('cms.galery.tambah', [
            'title'   => $this->title,
            'menu'    => $this->menu,
            'submenu' => $this->submenu,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_galery' => 'required|string|max:80',
            'keterangan'   => 'nullable|string',
            'status1'       => 'required|string|max:1',
            'path_foto_1'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'path_foto_2'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'path_foto_3'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'path_foto_4'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'path_foto_5'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'path_foto_6'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        DB::beginTransaction();
        try {
            $paths = [];

            foreach (['path_foto_1','path_foto_2','path_foto_3','path_foto_4','path_foto_5','path_foto_6'] as $field) {
                if ($request->hasFile($field)) {
                    $file     = $request->file($field);
                    $filename = $field . '_' . time() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('assets/images/galery'), $filename);
                    $paths[$field] = 'assets/images/galery/' . $filename;
                }
            }

            GaleryModel::create([
                'judul_galery' => $request->judul_galery,
                'keterangan'   => $request->keterangan,
                'status'       => $request->status1,
                'dibuat_oleh'  => Auth::user()->id,
                'path_foto_1'  => $paths['path_foto_1'] ?? null,
                'path_foto_2'  => $paths['path_foto_2'] ?? null,
                'path_foto_3'  => $paths['path_foto_3'] ?? null,
                'path_foto_4'  => $paths['path_foto_4'] ?? null,
                'path_foto_5'  => $paths['path_foto_5'] ?? null,
                'path_foto_6'  => $paths['path_foto_6'] ?? null,
            ]);

            DB::commit();
            AlertHelper::addAlert(true);
            return redirect()->route('galery_web.index');
        } catch (\Throwable $err) {
            DB::rollBack();
            Log::error('Update Blog Error: ' . $err->getMessage());
            AlertHelper::addAlert(false);
            return back()->withErrors(['error' => $err->getMessage()]);
        }
    }

    public function show(string $id)
    {
        $id_decrypt = Crypt::decryptString($id);
        $galery = GaleryModel::findOrFail($id_decrypt);

        return view('cms.galery.show', compact('galery'))->with([
            'title'   => $this->title,
            'menu'    => $this->menu,
            'submenu' => $this->submenu,
        ]);
    }

    public function edit(string $id)
    {
        $id_decrypt = Crypt::decryptString($id);
        $galery = GaleryModel::findOrFail($id_decrypt);

        return view('cms.galery.edit', compact('galery'))->with([
            'title'   => $this->title,
            'menu'    => $this->menu,
            'submenu' => $this->submenu,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul_galery' => 'required|string|max:80',
            'keterangan'   => 'nullable|string',
            'status1'       => 'required|string|max:1',
            'path_foto_1'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'path_foto_2'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'path_foto_3'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'path_foto_4'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'path_foto_5'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'path_foto_6'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        DB::beginTransaction();
        try {
            $id_decrypt = Crypt::decryptString($id);
            $galery = GaleryModel::findOrFail($id_decrypt);

            $dataUpdate = [
                'judul_galery' => $request->judul_galery,
                'keterangan'   => $request->keterangan,
                'status'       => $request->status1,
            ];

            foreach (['path_foto_1','path_foto_2','path_foto_3','path_foto_4','path_foto_5','path_foto_6'] as $field) {
                if ($request->hasFile($field)) {
                    if (!empty($galery->$field) && file_exists(public_path($galery->$field))) {
                        @unlink(public_path($galery->$field));
                    }

                    $file     = $request->file($field);
                    $filename = $field . '_' . time() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('assets/images/galery'), $filename);
                    $dataUpdate[$field] = 'assets/images/galery/' . $filename;
                }
            }

            $galery->update($dataUpdate);

            DB::commit();
            AlertHelper::addAlert(true);
            return redirect()->route('galery_web.index');
        } catch (\Throwable $err) {
            DB::rollBack();
            Log::error('Update Galery Error: ' . $err->getMessage());
            AlertHelper::addAlert(false);
            return back()->withErrors(['error' => $err->getMessage()]);
        }
    }

    public function destroy(string $id)
    {
        $id_decrypt = Crypt::decryptString($id);

        DB::beginTransaction();
        try {
            $galery = GaleryModel::findOrFail($id_decrypt);

            foreach (['path_foto_1','path_foto_2','path_foto_3','path_foto_4','path_foto_5','path_foto_6'] as $field) {
                if ($galery->$field && file_exists(public_path($galery->$field))) {
                    @unlink(public_path($galery->$field));
                }
            }

            $galery->delete();

            DB::commit();
            AlertHelper::addAlert(true);
            return redirect()->route('galery_web.index');
         } catch (\Throwable $err) {
            DB::rollBack();
            Log::error('Update Galery Error: ' . $err->getMessage());
            AlertHelper::addAlert(false);
            return back()->withErrors(['error' => $err->getMessage()]);
        }
    }
}
