<?php

namespace App\Http\Controllers;

use App\Helper\AlertHelper;
use App\Models\WebProfilModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class WebProfilController extends Controller
{
    protected $title = 'Profil Web';
    protected $menu = 'Web Content';
    protected $submenu = 'Profil Web';

    public function index()
    {
        $data = [
            'title' => $this->title,
            'menu' => $this->menu,
            'submenu' => $this->submenu,
            'label' => 'Profil',
            'list' => 'Data Profil',
            'cms_profils' => WebProfilModel::whereNull('deleted_at')->get(),
        ];
        return view('cms.profil_web.index')->with($data);
    }

    public function create()
    {
        return view('cms.profil_web.tambah')->with([
            'title' => $this->title,
            'menu' => $this->menu,
            'submenu' => $this->submenu,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pt'        => 'required|string|max:65',
            'nama_web'       => 'required|string|max:45',
            'sub_web'        => 'required|string|max:45',
            'alamat_lengkap' => 'nullable|string|max:255',
            'alamat_cabang'  => 'nullable|string|max:255',
            'alamat_workshop'  => 'nullable|string|max:255',
            'alamat_lain'    => 'nullable|string|max:255',
            'telepon_1'      => 'nullable|string|max:255',
            'telepon_2'      => 'nullable|string|max:255',
            'email_1'        => 'nullable|email|max:255',
            'email_2'        => 'nullable|email|max:255',
            'deskripsi'      => 'nullable|string',
            'status1'        => 'required|string|max:12',
            'gambar'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        DB::beginTransaction();
        try {
            $path_logo = null;

            // cek apakah ada file diupload
            if ($request->hasFile('gambar')) {
                $file     = $request->file('gambar');
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('assets/images/logo'), $filename);

                // simpan hanya nama file atau path relatif
                $path_logo = 'assets/images/logo/' . $filename;
            }

            WebProfilModel::create([
                'nama_pt'        => $request->nama_pt,
                'nama_web'       => $request->nama_web,
                'sub_web'       => $request->sub_web,
                'alamat_lengkap' => $request->alamat_lengkap,
                'alamat2'        => $request->alamat_cabang,
                'alamat3'        => $request->alamat_workshop,
                'alamat4'        => $request->alamat_lain,
                'telepon_1'      => $request->telepon_1,
                'telepon_2'      => $request->telepon_2,
                'email_1'        => $request->email_1,
                'email_2'        => $request->email_2,
                'deskripsi'      => $request->deskripsi,
                'status'         => $request->status1,
                'path_logo'      => $path_logo, // simpan logo
            ]);

            DB::commit();
            AlertHelper::addAlert(true);
            return redirect()->route('profil_web.index');
        } catch (\Throwable $err) {
            DB::rollBack();
            AlertHelper::addAlert(false);
            return back()->withErrors(['error' => $err->getMessage()]);
        }
    }

    public function show(string $id)
    {
        $id_decrypt = Crypt::decryptString($id);
        $profil = WebProfilModel::findOrFail($id_decrypt);

        return view('cms.profil_web.show', compact('profil'))
            ->with([
                'title' => $this->title,
                'menu' => $this->menu,
                'submenu' => $this->submenu,
            ]);
    }

    public function edit(string $id)
    {

        $id_decrypt = Crypt::decryptString($id);

        $profil = WebProfilModel::findOrFail($id_decrypt);

        return view('cms.profil_web.edit', compact('profil'))
            ->with([
                'title' => $this->title,
                'menu' => $this->menu,
                'submenu' => $this->submenu,
                'profil' => $profil,
            ]);
    }

    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $id_decrypt = Crypt::decryptString($id);

        $validated = $request->validate([
            'nama_pt'        => 'required|string|max:65',
            'nama_web'       => 'nullable|string|max:45',
            'sub_web'       => 'nullable|string|max:45',
            'alamat_lengkap' => 'nullable|string|max:255',
            'alamat_cabang'  => 'nullable|string|max:255',  // Ini akan di-map ke alamat2
            'alamat_workshop'  => 'nullable|string|max:255', // Ini akan di-map ke alamat3
            'alamat_lain'  => 'nullable|string|max:255',     // Ini akan di-map ke alamat4
            'email_1'        => 'nullable|email|max:255',
            'email_2'        => 'nullable|email|max:255',
            'telepon_1'      => 'nullable|string|max:255',
            'telepon_2'      => 'nullable|string|max:255',
            'deskripsi'      => 'nullable|string',
            'status1'        => 'required|in:aktif,nonaktif', // Ini akan di-map ke status
            'gambar'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        DB::beginTransaction();
        try {
            $profil = WebProfilModel::findOrFail($id_decrypt);

            $dataUpdate = [
                'nama_pt'        => $validated['nama_pt'],
                'nama_web'       => $validated['nama_web'] ?? null,
                'sub_web'        => $validated['sub_web'] ?? null,
                'alamat_lengkap' => $validated['alamat_lengkap'] ?? null,
                'alamat2'        => $validated['alamat_cabang'] ?? null,    // Map ke alamat2
                'alamat3'        => $validated['alamat_workshop'] ?? null,  // Map ke alamat3
                'alamat4'        => $validated['alamat_lain'] ?? null,      // Map ke alamat4
                'email_1'        => $validated['email_1'] ?? null,
                'email_2'        => $validated['email_2'] ?? null,
                'telepon_1'      => $validated['telepon_1'] ?? null,
                'telepon_2'      => $validated['telepon_2'] ?? null,
                'deskripsi'      => $validated['deskripsi'] ?? null,
                'status'         => $validated['status1'],  // Map ke status
            ];

            // Cek apakah ada gambar baru
            if ($request->hasFile('gambar')) {
                // Hapus gambar lama jika ada
                if ($profil->path_logo && file_exists(public_path($profil->path_logo))) {
                    unlink(public_path($profil->path_logo));
                }

                // Simpan gambar baru
                $file     = $request->file('gambar');
                $filename = 'logo_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('assets/images/logo'), $filename);

                $dataUpdate['path_logo'] = 'assets/images/logo/' . $filename;
            }

            $profil->update($dataUpdate);

            DB::commit();
            AlertHelper::addAlert(true);
            return redirect()->route('profil_web.index');
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
            $profil = WebProfilModel::findOrFail($id_decrypt);

            // Hapus file gambar kalau ada
            if ($profil->path_logo && file_exists(public_path($profil->path_logo))) {
                @unlink(public_path($profil->path_logo));
            }

            // Hapus data di database
            $profil->delete();

            DB::commit();
            AlertHelper::addAlert(true);
            return redirect()->route('profil_web.index');
        } catch (\Throwable $err) {
            DB::rollback();
            AlertHelper::addAlert(false);
            return back()->withErrors(['error' => $err->getMessage()]);
        }
    }
}
