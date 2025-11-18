<?php

namespace App\Http\Controllers;

use App\Helper\AlertHelper;
use App\Models\PromoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PromoController extends Controller
{
    protected $title   = 'Promo Web';
    protected $menu    = 'Web Content';
    protected $submenu = 'Promo Web';

    public function index()
    {
        $cms_promo = PromoModel::whereNull('deleted_at')->latest()->get();

        return view('cms.promo.index', [
            'title'      => $this->title,
            'menu'       => $this->menu,
            'submenu'    => $this->submenu,
            'list'       => 'Data Promo',
            'cms_promo'  => $cms_promo,
        ]);
    }

    public function create()
    {
        return view('cms.promo.create', [
            'title'   => $this->title,
            'menu'    => $this->menu,
            'submenu' => $this->submenu,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_promo'  => 'required|string|max:20',
            'order'       => 'required|string|max:3',
            'deskripsi'   => 'nullable|string',
            'status1'      => 'required|string|max:15',
            'link'        => 'nullable|string|max:15',
            'icon'        => 'nullable|string',
            'path_gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        DB::beginTransaction();
        try {
            $path_gambar = null;
            if ($request->hasFile('path_gambar')) {
                $file     = $request->file('path_gambar');
                $filename = 'promo_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('assets/images/promo'), $filename);
                $path_gambar = 'assets/images/promo/' . $filename;
            }

            PromoModel::create([
                'nama_promo'  => $request->nama_promo,
                'order'       => $request->order,
                'deskripsi'   => $request->deskripsi,
                'status'      => $request->status1,
                'link'        => $request->link,
                'icon'        => $request->icon,
                'path_gambar' => $path_gambar,
                'dibuat_oleh' => Auth::id(),
            ]);

            DB::commit();
            AlertHelper::addAlert(true);
            return redirect()->route('promo_web.index');
        } catch (\Throwable $err) {
            DB::rollBack();
            AlertHelper::addAlert(false);
            return back()->withErrors(['error' => $err->getMessage()]);
        }
    }

    public function show(string $id)
    {
        $id_decrypt = Crypt::decryptString($id);
        $promo = PromoModel::findOrFail($id_decrypt);

        return view('cms.promo.show', compact('promo'))->with([
            'title'   => $this->title,
            'menu'    => $this->menu,
            'submenu' => $this->submenu,
        ]);
    }

    public function edit(string $id)
    {
        $id_decrypt = Crypt::decryptString($id);
        $promo = PromoModel::findOrFail($id_decrypt);

        return view('cms.promo.edit', compact('promo'))->with([
            'title'   => $this->title,
            'menu'    => $this->menu,
            'submenu' => $this->submenu,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_promo'  => 'required|string|max:20',
            'order'       => 'required|string|max:3',
            'deskripsi'   => 'nullable|string',
            'status1'     => 'required|string|max:15',
            'link'        => 'nullable|string|max:15',
            'icon'        => 'nullable|string',
            'path_gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        DB::beginTransaction();
        try {
            $id_decrypt = Crypt::decryptString($id);
            $promo = PromoModel::findOrFail($id_decrypt);

            $dataUpdate = [
                'nama_promo' => $request->nama_promo,
                'order'      => $request->order,
                'deskripsi'  => $request->deskripsi,
                'status'     => $request->status1,
                'link'       => $request->link,
                'icon'       => $request->icon,
            ];

            // Cek jika ada gambar baru
            if ($request->hasFile('path_gambar')) {
                // Hapus gambar lama jika ada
                if ($promo->path_gambar && file_exists(public_path($promo->path_gambar))) {
                    @unlink(public_path($promo->path_gambar));
                }

                $file     = $request->file('path_gambar');
                $filename = 'promo_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('assets/images/promo'), $filename);
                $dataUpdate['path_gambar'] = 'assets/images/promo/' . $filename;
            }

            $promo->update($dataUpdate);

            DB::commit();
            AlertHelper::addAlert(true);
            return redirect()->route('promo_web.index');
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
            $promo = PromoModel::findOrFail($id_decrypt);

            // Hapus gambar jika ada
            if ($promo->path_gambar && file_exists(public_path($promo->path_gambar))) {
                @unlink(public_path($promo->path_gambar));
            }

            // Hapus record
            $promo->delete();

              DB::commit();
            AlertHelper::addAlert(true);
            return redirect()->route('promo_web.index');
        } catch (\Throwable $err) {
            DB::rollBack();
            AlertHelper::addAlert(false);
            return back()->withErrors(['error' => $err->getMessage()]);
        }
    }
}
