<?php

namespace App\Http\Controllers;

use App\Helper\AlertHelper;
use App\Models\SambutanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SambutanController extends Controller
{
    protected $title = 'Sambutan Web';
    protected $menu = 'Web Content';
    protected $submenu = 'Sambutan Web';

    public function index()
    {
        $data = [
            'title' => $this->title,
            'menu' => $this->menu,
            'submenu' => $this->submenu,
            'list' => 'Data Sambutan',
            'cms_sambutans' => SambutanModel::whereNull('deleted_at')->get(),
        ];
        return view('cms.sambutan.index')->with($data);
    }

    public function create()
    {
        return view('cms.sambutan.tambah')->with([
            'title' => $this->title,
            'menu' => $this->menu,
            'submenu' => $this->submenu,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'         => 'required|string|max:255',
            'area'         => 'nullable|string',
            'status1'      => 'required|boolean',
            'path_sambutan'=> 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        DB::beginTransaction();
        try {
            $data = [
                'nama'       => $request->nama,
                'area'       => $request->area,
                'status1'    => $request->status1,
                'dibuat_oleh'=> Auth::id(),
            ];

            if ($request->hasFile('path_sambutan')) {
                $file     = $request->file('path_sambutan');
                $filename = 'sambutan_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('assets/images/sambutan'), $filename);

                $data['path_sambutan'] = 'assets/images/sambutan/' . $filename;
            }

            SambutanModel::create($data);

            DB::commit();
            AlertHelper::addAlert(true);
            return redirect()->route('sambutan_web.index');
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('Store Sambutan Error: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Gagal menyimpan data sambutan.'])->withInput();
        }
    }

    public function show(string $id)
    {
        $id_decrypt = Crypt::decryptString($id);
        $sambutan = SambutanModel::findOrFail($id_decrypt);

        return view('cms.sambutan.show', compact('sambutan'))
            ->with([
                'title' => $this->title,
                'menu' => $this->menu,
                'submenu' => $this->submenu,
            ]);
    }

    public function edit(string $id)
    {
        $id_decrypt = Crypt::decryptString($id);
        $sambutan = SambutanModel::findOrFail($id_decrypt);

        return view('cms.sambutan.edit', compact('sambutan'))
            ->with([
                'title' => $this->title,
                'menu' => $this->menu,
                'submenu' => $this->submenu,
            ]);
    }

    public function update(Request $request, string $id)
    {
        $id_decrypt = Crypt::decryptString($id);

        $request->validate([
            'nama'         => 'required|string|max:255',
            'area'         => 'nullable|string',
            'status1'      => 'required|boolean',
            'path_sambutan'=> 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        DB::beginTransaction();
        try {
            $sambutan = SambutanModel::findOrFail($id_decrypt);

            $data = [
                'nama'       => $request->nama,
                'area'       => $request->area,
                'status1'    => $request->status1,
            ];

            // jika upload baru → hapus lama
            if ($request->hasFile('path_sambutan')) {
                if ($sambutan->path_sambutan && file_exists(public_path($sambutan->path_sambutan))) {
                    @unlink(public_path($sambutan->path_sambutan));
                }

                $file     = $request->file('path_sambutan');
                $filename = 'sambutan_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('assets/images/sambutan'), $filename);

                $data['path_sambutan'] = 'assets/images/sambutan/' . $filename;
            }

            $sambutan->update($data);

            DB::commit();
            AlertHelper::addAlert(true);
            return redirect()->route('sambutan_web.index');
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('Update Sambutan Error: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Gagal mengupdate data sambutan.'])->withInput();
        }
    }

    public function destroy(string $id)
    {
        $id_decrypt = Crypt::decryptString($id);

        DB::beginTransaction();
        try {
            $sambutan = SambutanModel::findOrFail($id_decrypt);

            if ($sambutan->path_sambutan && file_exists(public_path($sambutan->path_sambutan))) {
                @unlink(public_path($sambutan->path_sambutan));
            }

            $sambutan->delete();

            DB::commit();
            AlertHelper::addAlert(true);
            return redirect()->route('sambutan_web.index');
        } catch (\Throwable $err) {
            DB::rollBack();
            AlertHelper::addAlert(false);
            return back()->withErrors(['error' => $err->getMessage()]);
        }
    }
}
