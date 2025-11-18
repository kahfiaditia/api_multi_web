<?php

namespace App\Http\Controllers;

use App\Helper\AlertHelper;
use App\Models\VisiMisiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class VisiController extends Controller
{
    protected $title = 'Visi Misi Web';
    protected $menu = 'Web Content';
    protected $submenu = 'Visi Misi Web';

    public function index()
    {
        $data = [
            'title' => $this->title,
            'menu' => $this->menu,
            'submenu' => $this->submenu,
            'list' => 'Data Visi Misi',
            'cms_visi_misi' => VisiMisiModel::whereNull('deleted_at')->get(),
        ];
        return view('cms.visi_misi.index')->with($data);
    }

    public function create()
    {
        $result = DB::table('cms_profils')
                    ->whereNull('deleted_at')
                    ->select('id','sub_web', 'nama_web')
                    ->get();

        return view('cms.visi_misi.tambah')->with([
            'title' => $this->title,
            'website' => $result,
            'menu' => $this->menu,
            'submenu' => $this->submenu,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_web'         => 'required',
            'keterangan'       => 'nullable|string',
            'visi'             => 'nullable|string',
            'misi'             => 'nullable|string',
            'status1'          => 'required|boolean',
            'path_gambar_visi' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'path_gambar_misi' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        DB::beginTransaction();
        try {
            $data = [
                'id_web'     => $request->nama_web,
                'keterangan' => $request->keterangan,
                'visi'       => $request->visi,
                'misi'       => $request->misi,
                'status1'    => $request->status1,
                'dibuat_oleh'=> Auth::id(),
            ];

            if ($request->hasFile('path_gambar_visi')) {
                $file     = $request->file('path_gambar_visi');
                $filename = 'visimisi_visi_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('assets/images/visimisi'), $filename);
                $data['path_gambar_visi'] = 'assets/images/visimisi/' . $filename;
            }

            if ($request->hasFile('path_gambar_misi')) {
                $file     = $request->file('path_gambar_misi');
                $filename = 'visimisi_misi_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('assets/images/visimisi'), $filename);
                $data['path_gambar_misi'] = 'assets/images/visimisi/' . $filename;
            }

            VisiMisiModel::create($data);

            DB::commit();
            AlertHelper::addAlert(true);
            return redirect()->route('visi_misi_web.index');
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('Store Visi Misi Error: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Gagal menyimpan data visi misi.'])->withInput();
        }
    }

    public function show(string $id)
    {
        $id_decrypt = Crypt::decryptString($id);
        $visimisi = VisiMisiModel::findOrFail($id_decrypt);

        return view('cms.visi_misi.show', compact('visimisi'))
            ->with([
                'title' => $this->title,
                'menu' => $this->menu,
                'submenu' => $this->submenu,
            ]);
    }

    public function edit(string $id)
    {
        $id_decrypt = Crypt::decryptString($id);
        $visimisi = VisiMisiModel::findOrFail($id_decrypt);
        $result = DB::table('cms_profils')
                    ->whereNull('deleted_at')
                    ->select('id','sub_web', 'nama_web')
                    ->get();

        return view('cms.visi_misi.edit', compact('visimisi'))
            ->with([
                'title' => $this->title,
                'website' => $result,
                'menu' => $this->menu,
                'submenu' => $this->submenu,
            ]);
    }

    public function update(Request $request, string $id)
    {
        $id_decrypt = Crypt::decryptString($id);

        $request->validate([
            'nama_web'         => 'required',
            'keterangan'       => 'nullable|string',
            'visi'             => 'nullable|string',
            'misi'             => 'nullable|string',
            'status1'          => 'required|boolean',
            'path_gambar_visi' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'path_gambar_misi' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        DB::beginTransaction();
        try {
            $visimisi = VisiMisiModel::findOrFail($id_decrypt);

            $data = [
                'id_web'     => $request->nama_web,
                'keterangan' => $request->keterangan,
                'visi'       => $request->visi,
                'misi'       => $request->misi,
                'status1'    => $request->status1,
            ];

            // gambar visi
            if ($request->hasFile('path_gambar_visi')) {
                if ($visimisi->path_gambar_visi && file_exists(public_path($visimisi->path_gambar_visi))) {
                    @unlink(public_path($visimisi->path_gambar_visi));
                }
                $file     = $request->file('path_gambar_visi');
                $filename = 'visimisi_visi_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('assets/images/visimisi'), $filename);
                $data['path_gambar_visi'] = 'assets/images/visimisi/' . $filename;
            }

            // gambar misi
            if ($request->hasFile('path_gambar_misi')) {
                if ($visimisi->path_gambar_misi && file_exists(public_path($visimisi->path_gambar_misi))) {
                    @unlink(public_path($visimisi->path_gambar_misi));
                }
                $file     = $request->file('path_gambar_misi');
                $filename = 'visimisi_misi_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('assets/images/visimisi'), $filename);
                $data['path_gambar_misi'] = 'assets/images/visimisi/' . $filename;
            }

            $visimisi->update($data);

            DB::commit();
            AlertHelper::addAlert(true);
            return redirect()->route('visi_misi_web.index');
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('Update Visi Misi Error: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Gagal mengupdate data visi misi.'])->withInput();
        }
    }

    public function destroy(string $id)
    {
        $id_decrypt = Crypt::decryptString($id);

        DB::beginTransaction();
        try {
            $visimisi = VisiMisiModel::findOrFail($id_decrypt);

            if ($visimisi->path_gambar_visi && file_exists(public_path($visimisi->path_gambar_visi))) {
                @unlink(public_path($visimisi->path_gambar_visi));
            }
            if ($visimisi->path_gambar_misi && file_exists(public_path($visimisi->path_gambar_misi))) {
                @unlink(public_path($visimisi->path_gambar_misi));
            }

            $visimisi->delete();

            DB::commit();
            AlertHelper::addAlert(true);
            return redirect()->route('visi_misi_web.index');
        } catch (\Throwable $err) {
            DB::rollBack();
            AlertHelper::addAlert(false);
            return back()->withErrors(['error' => $err->getMessage()]);
        }
    }
}
