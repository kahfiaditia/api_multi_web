<?php

namespace App\Http\Controllers;

use App\Helper\AlertHelper;
use App\Models\ProdukModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProdukController extends Controller
{
    protected $title = 'Produk Web';
    protected $menu = 'Web Content';
    protected $submenu = 'Produk Web';

    public function index()
    {
        $cms_produks = ProdukModel::whereNull('deleted_at')->latest()->get();

        return view('cms.produk.index', [
            'title'       => $this->title,
            'menu'        => $this->menu,
            'submenu'     => $this->submenu,
            'list'        => 'Data Produk',
            'cms_produks' => $cms_produks,
        ]);
    }

    public function create()
    {
         $result = DB::table('cms_profils')
                    ->whereNull('deleted_at')
                    ->select('id','sub_web', 'nama_web')
                    ->get();

        return view('cms.produk.create', [
            'title'   => $this->title,
            'website'   => $result,
            'menu'    => $this->menu,
            'submenu' => $this->submenu,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_web'      => 'required',
            'nama_produk'  => 'required|string|max:20',
            'deskripsi'    => 'nullable|string|max:20',
            'harga_normal' => 'required|numeric',
            'harga_diskon' => 'nullable|numeric',
            'keterangan'   => 'nullable|string',
            'status1'       => 'required|string|max:15',
            'path_gambar'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        DB::beginTransaction();
        try {
            $path = null;

            if ($request->hasFile('path_gambar')) {
                $file     = $request->file('path_gambar');
                $filename = 'produk_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('assets/images/product'), $filename);
                $path = 'assets/images/product/' . $filename;
            }

            ProdukModel::create([
                'id_web'        => $request->nama_web,
                'nama_produk'  => $request->nama_produk,
                'deskripsi'    => $request->deskripsi,
                'harga_normal' => $request->harga_normal,
                'harga_diskon' => $request->harga_diskon,
                'keterangan'   => $request->keterangan,
                'status'       => $request->status1,
                'path_gambar'  => $path,
                'dibuat_oleh'  => Auth::user()->id ?? null,
            ]);

            DB::commit();
            AlertHelper::addAlert(true);
            return redirect()->route('produk_web.index');
        } catch (\Throwable $err) {
            DB::rollBack();
            AlertHelper::addAlert(false);
            return back()->withErrors(['error' => $err->getMessage()]);
        }
    }

    public function show(string $id)
    {
        $id_decrypt = Crypt::decryptString($id);
        $produk = ProdukModel::findOrFail($id_decrypt);

        return view('cms.produk.show', compact('produk'))->with([
            'title'   => $this->title,
            'menu'    => $this->menu,
            'submenu' => $this->submenu,
        ]);
    }

    public function edit(string $id)
    {
        $id_decrypt = Crypt::decryptString($id);
        $produk = ProdukModel::findOrFail($id_decrypt);
        $result = DB::table('cms_profils')
                    ->whereNull('deleted_at')
                    ->select('id','sub_web', 'nama_web')
                    ->get();

        return view('cms.produk.edit', compact('produk'))->with([
            'title'   => $this->title,
            'website'   => $result,
            'menu'    => $this->menu,
            'submenu' => $this->submenu,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_web'      => 'required',
            'nama_produk'  => 'required|string|max:20',
            'deskripsi'    => 'nullable|string|max:20',
            'harga_normal' => 'required|numeric',
            'harga_diskon' => 'nullable|numeric',
            'keterangan'   => 'nullable|string',
            'status1'       => 'required|string|max:15',
            'path_gambar'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        DB::beginTransaction();
        try {
            $id_decrypt = Crypt::decryptString($id);
            $produk = ProdukModel::findOrFail($id_decrypt);

            $dataUpdate = [
                'id_web'        => $request->nama_web,
                'nama_produk'  => $request->nama_produk,
                'deskripsi'    => $request->deskripsi,
                'harga_normal' => $request->harga_normal,
                'harga_diskon' => $request->harga_diskon,
                'keterangan'   => $request->keterangan,
                'status'       => $request->status1,
            ];

            if ($request->hasFile('path_gambar')) {
                if (!empty($produk->path_gambar) && file_exists(public_path($produk->path_gambar))) {
                    @unlink(public_path($produk->path_gambar));
                }

                $file     = $request->file('path_gambar');
                $filename = 'produk_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('assets/images/product'), $filename);
                $dataUpdate['path_gambar'] = 'assets/images/product/' . $filename;
            }

            $produk->update($dataUpdate);

            DB::commit();
            AlertHelper::addAlert(true);
            return redirect()->route('produk_web.index');
        } catch (\Throwable $err) {
            DB::rollBack();
            Log::error('Update Produk Error: ' . $err->getMessage());
            AlertHelper::addAlert(false);
            return back()->withErrors(['error' => $err->getMessage()]);
        }
    }

    public function destroy(string $id)
    {
        $id_decrypt = Crypt::decryptString($id);

        DB::beginTransaction();
        try {
            $produk = ProdukModel::findOrFail($id_decrypt);

            if ($produk->path_gambar && file_exists(public_path($produk->path_gambar))) {
                @unlink(public_path($produk->path_gambar));
            }

            $produk->delete();

            DB::commit();
            AlertHelper::addAlert(true);
            return redirect()->route('produk_web.index');
        } catch (\Throwable $err) {
            DB::rollBack();
            AlertHelper::addAlert(false);
            return back()->withErrors(['error' => $err->getMessage()]);
        }
    }
}
