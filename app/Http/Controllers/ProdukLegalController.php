<?php

namespace App\Http\Controllers;

use App\Helper\AlertHelper;
use App\Models\ProdukLegalModel;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class ProdukLegalController extends Controller
{
    protected $title = 'Corporate Legal Advice';
    protected $menu = 'Web Content';
    protected $submenu = 'Produk Legal';

    public function index()
    {
        $produk_legal = ProdukLegalModel::whereNull('deleted_at')->latest()->get();

        return view('cms.produk_legal.index', [
            'title'        => $this->title,
            'menu'         => $this->menu,
            'submenu'      => $this->submenu,
            'list'         => 'Data Produk Legal',
            'produk_legal' => $produk_legal,
        ]);
    }

    public function create()
    {
        return view('cms.produk_legal.create', [
            'title'   => $this->title,
            'menu'    => $this->menu,
            'submenu' => $this->submenu,
        ]);
    }

    public function store(Request $request)
    {

        // dd($request->all());
        $request->validate([
            'judul_bagian'    => 'required|string|max:150',
            'deskripsi'       => 'nullable|string',
            'keterangan'      => 'nullable|string',
            'judul_poin1'     => 'nullable|string|max:100',
            'deskripsi_poin1' => 'nullable|string',
            'judul_poin2'     => 'nullable|string|max:100',
            'deskripsi_poin2' => 'nullable|string',
            'judul_poin3'     => 'nullable|string|max:100',
            'deskripsi_poin3' => 'nullable|string',
            'icon1'           => 'nullable|string|max:100',
            'icon2'           => 'nullable|string|max:100',
            'icon3'           => 'nullable|string|max:100',
            'urutan'          => 'nullable|integer',
            'status_produk'   => 'required|string|max:20',
            'path_gambar'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        DB::beginTransaction();
        try {
            $pathGambar = null;
            if ($request->hasFile('path_gambar')) {
                $file     = $request->file('path_gambar');
                $filename = 'produk_legal_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('assets/images/produk_legal'), $filename);
                $pathGambar = 'assets/images/produk_legal/' . $filename;
            }

            ProdukLegalModel::create([
                'judul_bagian'    => $request->judul_bagian,
                'deskripsi'       => $request->deskripsi,
                'keterangan'      => $request->keterangan,
                'judul_poin1'     => $request->judul_poin1,
                'deskripsi_poin1' => $request->deskripsi_poin1,
                'judul_poin2'     => $request->judul_poin2,
                'deskripsi_poin2' => $request->deskripsi_poin2,
                'judul_poin3'     => $request->judul_poin3,
                'deskripsi_poin3' => $request->deskripsi_poin3,
                'icon1'           => $request->icon1,
                'icon2'           => $request->icon2,
                'icon3'           => $request->icon3,
                'urutan'          => $request->urutan ?? 0,
                'status_produk'   => $request->status_produk,
                'path_gambar'     => $pathGambar,
            ]);

            DB::commit();
            AlertHelper::addAlert(true);
            return redirect()->route('produk_legal.index');
        } catch (\Throwable $err) {
            DB::rollBack();
            Log::error('Store Produk Legal Error: ' . $err->getMessage());
            AlertHelper::addAlert(false);
            return back()->withErrors(['error' => $err->getMessage()]);
        }
    }

    public function show(string $id)
    {
        $id_decrypt = Crypt::decryptString($id);
        $produk_legal = ProdukLegalModel::findOrFail($id_decrypt);

        return view('cms.produk_legal.show', compact('produk_legal'))->with([
            'title'   => $this->title,
            'menu'    => $this->menu,
            'submenu' => $this->submenu,
        ]);
    }

    public function edit(string $id)
    {
        $id_decrypt = Crypt::decryptString($id);
        $produk_legal = ProdukLegalModel::findOrFail($id_decrypt);

        return view('cms.produk_legal.edit', compact('produk_legal'))->with([
            'title'   => $this->title,
            'menu'    => $this->menu,
            'submenu' => $this->submenu,
        ]);
    }

    public function update(Request $request, $id)
   {
        $request->validate([
            'judul_bagian'    => 'required|string|max:150',
            'deskripsi'       => 'nullable|string',
            'keterangan'      => 'nullable|string',
            'judul_poin1'     => 'nullable|string|max:100',
            'deskripsi_poin1' => 'nullable|string',
            'judul_poin2'     => 'nullable|string|max:100',
            'deskripsi_poin2' => 'nullable|string',
            'judul_poin3'     => 'nullable|string|max:100',
            'deskripsi_poin3' => 'nullable|string',
            'icon1'           => 'nullable|string|max:100',
            'icon2'           => 'nullable|string|max:100',
            'icon3'           => 'nullable|string|max:100',
            'urutan'          => 'nullable|integer',
            'status_produk'   => 'required|string|max:20',
            'path_gambar'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        DB::beginTransaction();
        try {
            $data = ProdukLegalModel::findOrFail($id);
            $pathGambar = $data->path_gambar;

            // Jika upload gambar baru, hapus yang lama
            if ($request->hasFile('path_gambar')) {
                if ($pathGambar && file_exists(public_path($pathGambar))) {
                    unlink(public_path($pathGambar));
                }

                $file     = $request->file('path_gambar');
                $filename = 'produk_legal_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('assets/images/produk_legal'), $filename);
                $pathGambar = 'assets/images/produk_legal/' . $filename;
            }

            $data->update([
                'judul_bagian'    => $request->judul_bagian,
                'deskripsi'       => $request->deskripsi,
                'keterangan'      => $request->keterangan,
                'judul_poin1'     => $request->judul_poin1,
                'deskripsi_poin1' => $request->deskripsi_poin1,
                'judul_poin2'     => $request->judul_poin2,
                'deskripsi_poin2' => $request->deskripsi_poin2,
                'judul_poin3'     => $request->judul_poin3,
                'deskripsi_poin3' => $request->deskripsi_poin3,
                'icon1'           => $request->icon1,
                'icon2'           => $request->icon2,
                'icon3'           => $request->icon3,
                'urutan'          => $request->urutan ?? 0,
                'status_produk'   => $request->status_produk,
                'path_gambar'     => $pathGambar,
            ]);

            DB::commit();
            AlertHelper::updateAlert(true);
            return redirect()->route('produk_legal.index');
        } catch (\Throwable $err) {
            DB::rollBack();
            Log::error('Update Produk Legal Error: ' . $err->getMessage());
            AlertHelper::updateAlert(false);
            return back()->withErrors(['error' => $err->getMessage()]);
        }
   }

    public function destroy(string $id)
    {
        $id_decrypt = Crypt::decryptString($id);

        DB::beginTransaction();
        try {
            $produk_legal = ProdukLegalModel::findOrFail($id_decrypt);

            if ($produk_legal->path_gambar && file_exists(public_path($produk_legal->path_gambar))) {
                @unlink(public_path($produk_legal->path_gambar));
            }

            $produk_legal->delete();

            DB::commit();
            AlertHelper::addAlert(true);
            return redirect()->route('produk_legal.index');
        } catch (\Throwable $err) {
            DB::rollBack();
            Log::error('Delete Produk Legal Error: ' . $err->getMessage());
            AlertHelper::addAlert(false);
            return back()->withErrors(['error' => $err->getMessage()]);
        }
    }
}
