<?php

namespace App\Http\Controllers;

use App\Helper\AlertHelper;
use App\Models\SosialModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SosialController extends Controller
{
    protected $title = 'Sosial Media Web';
    protected $menu = 'Web Content';
    protected $submenu = 'Sosial Media Web';

    public function index()
    {
        $data = [
            'title' => $this->title,
            'menu' => $this->menu,
            'submenu' => $this->submenu,
            'list' => 'Data Sosial Media',
            'cms_sosial' => SosialModel::whereNull('deleted_at')->get(),
        ];
        return view('cms.media_sosial.index')->with($data);
    }

    public function create()
    {
        return view('cms.media_sosial.tambah')->with([
            'title' => $this->title,
            'menu' => $this->menu,
            'submenu' => $this->submenu,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_media'  => 'required|string|max:60',
            'link'        => 'required|string',
            'keterangan'  => 'nullable|string|max:80',
            'path_logo'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status1'      => 'required',
        ]);

        DB::beginTransaction();
        try {
            $data = [
                'nama_media' => $request->nama_media,
                'link'       => $request->link,
                'keterangan' => $request->keterangan,
                'status'     => $request->status1,
                'dibuat_oleh'=> Auth::id(),
            ];

            if ($request->hasFile('path_logo')) {
                $file     = $request->file('path_logo');
                $filename = 'sosial_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('assets/images/media'), $filename);
                $data['path_logo'] = 'assets/images/media/' . $filename;
            }

            SosialModel::create($data);

            DB::commit();
            AlertHelper::addAlert(true);
            return redirect()->route('sosial_web.index');
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('Store Sosial Error: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Gagal menyimpan data sosial.'])->withInput();
        }
    }

    public function show(string $id)
    {
        $id_decrypt = Crypt::decryptString($id);
        $sosial = SosialModel::findOrFail($id_decrypt);

        return view('cms.media_sosial.show', compact('sosial'))
            ->with([
                'title' => $this->title,
                'menu' => $this->menu,
                'submenu' => $this->submenu,
            ]);
    }

    public function edit(string $id)
    {
        $id_decrypt = Crypt::decryptString($id);
        $sosial = SosialModel::findOrFail($id_decrypt);

        return view('cms.media_sosial.edit', compact('sosial'))
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
            'nama_media'  => 'required|string|max:60',
            'link'        => 'required|string',
            'keterangan'  => 'nullable|string|max:80',
            'path_logo'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status1'      => 'required',
        ]);

        DB::beginTransaction();
        try {
            $sosial = SosialModel::findOrFail($id_decrypt);

            $data = [
                'nama_media' => $request->nama_media,
                'link'       => $request->link,
                'keterangan' => $request->keterangan,
                'status'     => $request->status1,
            ];

            if ($request->hasFile('path_logo')) {
                if ($sosial->path_logo && file_exists(public_path($sosial->path_logo))) {
                    @unlink(public_path($sosial->path_logo));
                }
                $file     = $request->file('path_logo');
                $filename = 'sosial_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('assets/images/media'), $filename);
                $data['path_logo'] = 'assets/images/media/' . $filename;
            }

            $sosial->update($data);

            DB::commit();
            AlertHelper::addAlert(true);
            return redirect()->route('sosial_web.index');
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('Update Sosial Error: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Gagal mengupdate data sosial.'])->withInput();
        }
    }

    public function destroy(string $id)
    {
        $id_decrypt = Crypt::decryptString($id);

        DB::beginTransaction();
        try {
            $sosial = SosialModel::findOrFail($id_decrypt);

            if ($sosial->path_logo && file_exists(public_path($sosial->path_logo))) {
                @unlink(public_path($sosial->path_logo));
            }

            $sosial->delete();

            DB::commit();
            AlertHelper::addAlert(true);
            return redirect()->route('sosial_web.index');
        } catch (\Throwable $err) {
            DB::rollback();
            AlertHelper::addAlert(false);
            return back()->withErrors(['error' => $err->getMessage()]);
        }
    }
}
