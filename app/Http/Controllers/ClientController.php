<?php

namespace App\Http\Controllers;

use App\Helper\AlertHelper;
use App\Models\ClientModel;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    protected $title = 'Client Web';
    protected $menu = 'Web Content';
    protected $submenu = 'Client Web';

    public function index()
    {
        $cms_client = ClientModel::whereNull('deleted_at')->latest()->get();

        return view('cms.client.index', [
            'title'      => $this->title,
            'menu'       => $this->menu,
            'submenu'    => $this->submenu,
            'list'       => 'Data Client',
            'cms_client' => $cms_client,
        ]);
    }

    public function create()
    {
        return view('cms.client.create', [
            'title'   => $this->title,
            'menu'    => $this->menu,
            'submenu' => $this->submenu,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_name' => 'required|string|max:25',
            'deskripsi'   => 'nullable|string|max:50',
            'status1'      => 'required|string|max:15',
            'path_gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        DB::beginTransaction();
        try {
            $pathGambar = null;
            if ($request->hasFile('path_gambar')) {
                $file     = $request->file('path_gambar');
                $filename = 'client_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('assets/images/client'), $filename);
                $pathGambar = 'assets/images/client/' . $filename;
            }

            ClientModel::create([
                'client_name' => $request->client_name,
                'deskripsi'   => $request->deskripsi,
                'status'      => $request->status1,
                'dibuat_oleh' => Auth::user()->id,
                'path_gambar' => $pathGambar,
            ]);

            DB::commit();
            AlertHelper::addAlert(true);
            return redirect()->route('client_web.index');
        } catch (\Throwable $err) {
            DB::rollBack();
            Log::error('Update FAQ Error: ' . $err->getMessage());
            AlertHelper::addAlert(false);
            return back()->withErrors(['error' => $err->getMessage()]);
        }
    }

    public function show(string $id)
    {
        $id_decrypt = Crypt::decryptString($id);
        $client = ClientModel::findOrFail($id_decrypt);

        return view('cms.client.show', compact('client'))->with([
            'title'   => $this->title,
            'menu'    => $this->menu,
            'submenu' => $this->submenu,
        ]);
    }

    public function edit(string $id)
    {
        $id_decrypt = Crypt::decryptString($id);
        $client = ClientModel::findOrFail($id_decrypt);

        return view('cms.client.edit', compact('client'))->with([
            'title'   => $this->title,
            'menu'    => $this->menu,
            'submenu' => $this->submenu,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'client_name' => 'required|string|max:25',
            'deskripsi'   => 'nullable|string|max:50',
            'status1'      => 'required|string|max:15',
            'path_gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        DB::beginTransaction();
        try {
            $id_decrypt = Crypt::decryptString($id);
            $client = ClientModel::findOrFail($id_decrypt);

            $dataUpdate = [
                'client_name' => $request->client_name,
                'deskripsi'   => $request->deskripsi,
                'status'      => $request->status1,
            ];

            if ($request->hasFile('path_gambar')) {
                if (!empty($client->path_gambar) && file_exists(public_path($client->path_gambar))) {
                    @unlink(public_path($client->path_gambar));
                }

                $file     = $request->file('path_gambar');
                $filename = 'client_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('assets/images/client'), $filename);
                $dataUpdate['path_gambar'] = 'assets/images/client/' . $filename;
            }

            $client->update($dataUpdate);

            DB::commit();
            AlertHelper::addAlert(true);
            return redirect()->route('client_web.index');
        } catch (\Throwable $err) {
            DB::rollBack();
            Log::error('Update Client Error: ' . $err->getMessage());
            AlertHelper::addAlert(false);
            return back()->withErrors(['error' => $err->getMessage()]);
        }
    }

    public function destroy(string $id)
    {
        $id_decrypt = Crypt::decryptString($id);

        DB::beginTransaction();
        try {
            $client = ClientModel::findOrFail($id_decrypt);

            if ($client->path_gambar && file_exists(public_path($client->path_gambar))) {
                @unlink(public_path($client->path_gambar));
            }

            $client->delete();

            DB::commit();
            AlertHelper::addAlert(true);
            return redirect()->route('client_web.index');
        } catch (\Throwable $err) {
            DB::rollBack();
            Log::error('Update Client Error: ' . $err->getMessage());
            AlertHelper::addAlert(false);
            return back()->withErrors(['error' => $err->getMessage()]);
        }
    }
}
