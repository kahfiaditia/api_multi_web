<?php

namespace App\Http\Controllers;

use App\Helper\AlertHelper;
use App\Models\TeamModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TeamController extends Controller
{
    protected $title = 'Team Web';
    protected $menu = 'Web Content';
    protected $submenu = 'Team Web';

    public function index()
    {
        $data = [
            'title' => $this->title,
            'menu' => $this->menu,
            'submenu' => $this->submenu,
            'label' => 'Team Web',
            'list' => 'Data Team',
            'cms_teams' => TeamModel::whereNull('deleted_at')->get(), // ambil semua data
        ];
        return view('cms.team.index')->with($data);
    }

    public function create()
    {
        return view('cms.team.create')->with([
            'title' => $this->title,
            'menu' => $this->menu,
            'submenu' => $this->submenu,
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'nama_lengkap' => 'required|string|max:60',
            'nip'          => 'nullable|string|max:50',
            'jabatan'      => 'nullable|string|max:80',
            'email'        => 'nullable|email|max:50',
            'telepon'      => 'nullable|string|max:20',
            'keterangan'   => 'nullable|string|max:30',
            'area'         => 'nullable|string',
            'path_foto'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status1'      => 'required',   // ← perbaikan
        ]);

        DB::beginTransaction();
        try {
            $data = [
                'nama_lengkap' => $request->nama_lengkap,
                'nip'          => $request->nip,
                'jabatan'      => $request->jabatan,
                'email'        => $request->email,
                'telepon'      => $request->telepon,
                'keterangan'   => $request->keterangan,
                'area'         => $request->area,
                'status'       => $request->status1,
            ];

            // Upload foto jika ada
            if ($request->hasFile('path_foto')) {
                $file     = $request->file('path_foto');
                $filename = 'team_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('assets/images/team'), $filename);

                $data['path_foto'] = 'assets/images/team/' . $filename;
            }

            TeamModel::create($data);

            DB::commit();
            AlertHelper::addAlert(true);
            return redirect()->route('team_web.index');
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('Store Team Error: ' . $e->getMessage());

            // AlertHelper::addAlert(false);
            return back()->withErrors(['error' => 'Gagal menyimpan data team.'])->withInput();
        }
    }

    public function show(string $id)
    {
        $id_decrypt = Crypt::decryptString($id);
        $team = TeamModel::findOrFail($id_decrypt);

        return view('cms.team.show', compact('team'))
            ->with([
                'title' => $this->title,
                'menu' => $this->menu,
                'submenu' => $this->submenu,
            ]);
    }

    public function edit(string $id)
    {

        $id_decrypt = Crypt::decryptString($id);

        $team = TeamModel::findOrFail($id_decrypt);

        return view('cms.team.edit', compact('team'))
            ->with([
                'title' => $this->title,
                'menu' => $this->menu,
                'submenu' => $this->submenu,
                'team' => $team,
            ]);
    }

    public function update(Request $request, string $id)
    {
        $id_decrypt = Crypt::decryptString($id);

        $request->validate([
            'nama_lengkap' => 'required|string|max:60',
            'nip'          => 'nullable|string|max:50',
            'jabatan'      => 'nullable|string|max:80',
            'email'        => 'nullable|email|max:50',
            'telepon'      => 'nullable|string|max:20',
            'keterangan'   => 'nullable|string|max:30',
            'area'         => 'nullable|string',
            'path_foto'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status1'      => 'required',
        ]);

        DB::beginTransaction();
        try {
            $team = TeamModel::findOrFail($id_decrypt);

            $data = [
                'nama_lengkap' => $request->nama_lengkap,
                'nip'          => $request->nip,
                'jabatan'      => $request->jabatan,
                'email'        => $request->email,
                'telepon'      => $request->telepon,
                'keterangan'   => $request->keterangan,
                'area'         => $request->area,
                'status'       => $request->status1,
            ];

            // Jika ada foto baru, hapus lama & upload baru
            if ($request->hasFile('path_foto')) {
                // Hapus foto lama jika ada
                if ($team->path_foto && file_exists(public_path($team->path_foto))) {
                    unlink(public_path($team->path_foto));
                }

                $file     = $request->file('path_foto');
                $filename = 'team_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('assets/images/team'), $filename);

                $data['path_foto'] = 'assets/images/team/' . $filename;
            }

            $team->update($data);

            DB::commit();
            AlertHelper::addAlert(true);
            return redirect()->route('team_web.index');
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('Update Team Error: ' . $e->getMessage());

            return back()->withErrors(['error' => 'Gagal mengupdate data team.'])->withInput();
        }
    }


    public function destroy(string $id)
    {
        $id_decrypt = Crypt::decryptString($id);

        DB::beginTransaction();
        try {
            $profil = TeamModel::findOrFail($id_decrypt);

            // Hapus file gambar kalau ada
            if ($profil->path_logo && file_exists(public_path($profil->path_logo))) {
                @unlink(public_path($profil->path_logo));
            }

            // Hapus data di database
            $profil->delete();

            DB::commit();
            AlertHelper::addAlert(true);
            return redirect()->route('team.index');
        } catch (\Throwable $err) {
            DB::rollback();
            AlertHelper::addAlert(false);
            return back()->withErrors(['error' => $err->getMessage()]);
        }
    }
}
