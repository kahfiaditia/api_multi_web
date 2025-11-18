<?php

namespace App\Http\Controllers;

use App\Helper\AlertHelper;
use App\Models\LayananLegalModel;
use App\Models\LayananModel;
use App\Models\ProdukLegalModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class LayananController extends Controller
{
    protected $title = 'Corporate Legal Services';
    protected $menu = 'Web Content';
    protected $submenu = 'Layanan Legal';

    public function index()
    {
        $layanan_legal = LayananModel::with('produk')
            ->whereNull('deleted_at')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('cms.layanan.index', [
            'title'         => $this->title,
            'menu'          => $this->menu,
            'submenu'       => $this->submenu,
            'list'          => 'Data Layanan Legal',
            'layanan_legal' => $layanan_legal,
        ]);
    }

    public function create()
    {
         $produk_legal = DB::table('cms_produk_legals')
                ->select('id', 'keterangan')
                ->whereNull('deleted_at')
                ->orderBy('id', 'asc')
                ->get();

        return view('cms.layanan.create', [
            'title'        => $this->title,
            'menu'         => $this->menu,
            'submenu'      => $this->submenu,
            'produk_legal' => $produk_legal,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_bagian'    => 'required|string|max:150',
            'title'           => 'nullable|string|max:100',
            'title_deskripsi' => 'nullable|string|max:200',
            'id_produk_legal' => 'nullable|exists:cms_produk_legals,id',
            'deskripsi'       => 'nullable|string',
            'keterangan'      => 'nullable|string|max:200',
            'icon'            => 'nullable|string|max:100',
            'poin1'           => 'nullable|string|max:150',
            'poin2'           => 'nullable|string|max:150',
            'poin3'           => 'nullable|string|max:150',
            'urutan'          => 'nullable|integer',
            'status_produk'   => 'required|string|max:10',
        ]);

        DB::beginTransaction();
        try {
            LayananModel::create([
                'title'           => $request->title,
                'title_deskripsi' => $request->title_deskripsi,
                'id_produk_legal' => $request->id_produk_legal,
                'keterangan'      => $request->keterangan,
                'icon'            => $request->icon,
                'judul_bagian'    => $request->judul_bagian,
                'deskripsi'       => $request->deskripsi,
                'poin1'           => $request->poin1,
                'poin2'           => $request->poin2,
                'poin3'           => $request->poin3,
                'urutan'          => $request->urutan ?? 0,
                'status_produk'   => $request->status_produk,
            ]);

            DB::commit();
            AlertHelper::addAlert(true);
            return redirect()->route('layanan_legal.index');
        } catch (\Throwable $err) {
            DB::rollBack();
            Log::error('Store Layanan Legal Error: ' . $err->getMessage());
            AlertHelper::addAlert(false);
            return back()->withErrors(['error' => $err->getMessage()]);
        }
    }

    public function show(string $id)
    {
        $id_decrypt = Crypt::decryptString($id);
        $layanan_legal = LayananModel::with('produk')->findOrFail($id_decrypt);

        return view('cms.layanan.show', compact('layanan_legal'))->with([
            'title'   => $this->title,
            'menu'    => $this->menu,
            'submenu' => $this->submenu,
        ]);
    }

    public function edit(string $id)
    {
        $id_decrypt = Crypt::decryptString($id);
        $layanan_legal = LayananModel::findOrFail($id_decrypt);
        $produk_legal  = ProdukLegalModel::whereNull('deleted_at')->orderBy('judul_bagian', 'asc')->get();

        return view('cms.layanan.edit', compact('layanan_legal', 'produk_legal'))->with([
            'title'   => $this->title,
            'menu'    => $this->menu,
            'submenu' => $this->submenu,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul_bagian'    => 'required|string|max:150',
            'title'           => 'nullable|string|max:100',
            'title_deskripsi' => 'nullable|string|max:200',
            'id_produk_legal' => 'nullable|exists:cms_produk_legals,id',
            'deskripsi'       => 'nullable|string',
            'keterangan'      => 'nullable|string|max:200',
            'icon'            => 'nullable|string|max:100',
            'poin1'           => 'nullable|string|max:150',
            'poin2'           => 'nullable|string|max:150',
            'poin3'           => 'nullable|string|max:150',
            'urutan'          => 'nullable|integer',
            'status_produk'   => 'required|string|max:10',
        ]);

        DB::beginTransaction();
        try {
            $data = LayananModel::findOrFail($id);

            $data->update([
                'title'           => $request->title,
                'title_deskripsi' => $request->title_deskripsi,
                'id_produk_legal' => $request->id_produk_legal,
                'keterangan'      => $request->keterangan,
                'icon'            => $request->icon,
                'judul_bagian'    => $request->judul_bagian,
                'deskripsi'       => $request->deskripsi,
                'poin1'           => $request->poin1,
                'poin2'           => $request->poin2,
                'poin3'           => $request->poin3,
                'urutan'          => $request->urutan ?? 0,
                'status_produk'   => $request->status_produk,
            ]);

            DB::commit();
            AlertHelper::updateAlert(true);
            return redirect()->route('layanan_legal.index');
        } catch (\Throwable $err) {
            DB::rollBack();
            Log::error('Update Layanan Legal Error: ' . $err->getMessage());
            AlertHelper::updateAlert(false);
            return back()->withErrors(['error' => $err->getMessage()]);
        }
    }

    public function destroy(string $id)
    {
        $id_decrypt = Crypt::decryptString($id);

        DB::beginTransaction();
        try {
            $layanan_legal = LayananModel::findOrFail($id_decrypt);
            $layanan_legal->deleted_at = Carbon::now();
            $layanan_legal->save();

            DB::commit();
            AlertHelper::addAlert(true);
            return redirect()->route('layanan_legal.index');
        } catch (\Throwable $err) {
            DB::rollBack();
            Log::error('Delete Layanan Legal Error: ' . $err->getMessage());
            AlertHelper::addAlert(false);
            return back()->withErrors(['error' => $err->getMessage()]);
        }
    }
}
