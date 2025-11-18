<?php

namespace App\Http\Controllers;

use App\Helper\AlertHelper;
use App\Models\BannerModel;
use App\Models\WebProfilModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class BannerController extends Controller
{
    protected $title = 'Banner Web';
    protected $menu = 'Web Content';
    protected $submenu = 'Banner Web';

    public function index()
    {
        $cms_banners = BannerModel::whereNull('deleted_at')->get();
        return view('cms.banner.index', [
            'title'       => $this->title,
            'menu'        => $this->menu,
            'submenu'     => $this->submenu,
            'list'        => 'Data Banner',
            'cms_banners' => $cms_banners,
        ]);
    }

    public function create()
    {
        $result = DB::table('cms_profils')
                    ->whereNull('deleted_at')
                    ->select('id','sub_web', 'nama_web')
                    ->get();

        return view('cms.banner.tambah', [
            'title'   => $this->title,
            'website' => $result,
            'menu'    => $this->menu,
            'submenu' => $this->submenu,
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama_web'     => 'required',
            'judul_banner' => 'required|string|max:80',
            'link'         => 'nullable|string',
            'keterangan'   => 'nullable|string',
            'status1'       => 'nullable|string',
            'gambar'       => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        DB::beginTransaction();
        try {
            $path_gambar = null;
            if ($request->hasFile('gambar')) {
                $file     = $request->file('gambar');
                $filename = 'banner_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('assets/images/banner'), $filename);
                $path_gambar = 'assets/images/banner/' . $filename;
            }

            BannerModel::create([
                'id_web'       => $request->nama_web,
                'judul_banner' => $request->judul_banner,
                'link'         => $request->link,
                'keterangan'   => $request->keterangan,
                'status'       => $request->status1,
                'path_gambar'  => $path_gambar,
                'dibuat_oleh'  => Auth::user()->id,
            ]);

            DB::commit();
            AlertHelper::addAlert(true);
            return redirect()->route('banner_web.index');
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
        $banner = BannerModel::findOrFail($id_decrypt);

        return view('cms.banner.show', compact('banner'))->with([
            'title'   => $this->title,
            'menu'    => $this->menu,
            'submenu' => $this->submenu,
        ]);
    }

    public function edit(string $id)
    {
        $id_decrypt = Crypt::decryptString($id);
        $banner = BannerModel::findOrFail($id_decrypt);
        $result = DB::table('cms_profils')
                    ->whereNull('deleted_at')
                    ->select('id','sub_web', 'nama_web')
                    ->get();

        return view('cms.banner.edit', compact('banner'))->with([
            'title'   => $this->title,
            'menu'    => $this->menu,
            'submenu' => $this->submenu,
            'website' => $result,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $id_decrypt = Crypt::decryptString($id);

        $request->validate([
            'nama_web'      => 'required',
            'judul_banner' => 'required|string|max:80',
            'link'         => 'nullable|string',
            'keterangan'   => 'nullable|string',
            'status1'       => 'nullable|in:Aktif,Nonaktif',
            'gambar'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        DB::beginTransaction();
        try {
            $banner = BannerModel::findOrFail($id_decrypt);

            $dataUpdate = [
                'id_web'      => $request->nama_web,
                'judul_banner' => $request->judul_banner,
                'link'         => $request->link,
                'keterangan'   => $request->keterangan,
                'status'       => $request->status1,
            ];

            if ($request->hasFile('gambar')) {
                if ($banner->path_gambar && file_exists(public_path($banner->path_gambar))) {
                    @unlink(public_path($banner->path_gambar));
                }

                $file     = $request->file('gambar');
                $filename = 'banner_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('assets/images/banner'), $filename);
                $dataUpdate['path_gambar'] = 'assets/images/banner/' . $filename;
            }

            $banner->update($dataUpdate);

            DB::commit();
            AlertHelper::addAlert(true);
            return redirect()->route('banner_web.index');
        } catch (\Throwable $err) {
             DB::rollBack();
            Log::error('Update FAQ Error: ' . $err->getMessage());
            AlertHelper::addAlert(false);
            return back()->withErrors(['error' => $err->getMessage()]);
        }
    }

    public function destroy(string $id)
    {
        $id_decrypt = Crypt::decryptString($id);

        DB::beginTransaction();
        try {
            $banner = BannerModel::findOrFail($id_decrypt);

            if ($banner->path_gambar && file_exists(public_path($banner->path_gambar))) {
                @unlink(public_path($banner->path_gambar));
            }

            $banner->delete();

            DB::commit();
            AlertHelper::addAlert(true);
            return redirect()->route('banner_web.index');
        } catch (\Throwable $err) {
            DB::rollBack();
            Log::error('Update FAQ Error: ' . $err->getMessage());
            AlertHelper::addAlert(false);
            return back()->withErrors(['error' => $err->getMessage()]);
        }
    }

    public function api_ku(Request $request)
    {
       $banners = BannerModel::whereNull('deleted_at')
              ->where('status', 'Aktif')
              ->get();

        return response()->json([
            'success' => true,
            'data' => $banners,
            'message' => 'Success'
        ]);
    }
}

