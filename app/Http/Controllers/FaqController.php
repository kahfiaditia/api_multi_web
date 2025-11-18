<?php

namespace App\Http\Controllers;

use App\Helper\AlertHelper;
use App\Models\FaqModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class FaqController extends Controller
{
    protected $title   = 'FAQ Web';
    protected $menu    = 'Web Content';
    protected $submenu = 'FAQ Web';

    public function index()
    {
        $cms_faq = FaqModel::whereNull('deleted_at')->latest()->get();

        return view('cms.faq.index', [
            'title'   => $this->title,
            'menu'    => $this->menu,
            'submenu' => $this->submenu,
            'list'    => 'Data FAQ',
            'cms_faq' => $cms_faq,
        ]);
    }

    public function create()
    {
        $result = DB::table('cms_profils')
                    ->whereNull('deleted_at')
                    ->select('id','sub_web', 'nama_web')
                    ->get();

        return view('cms.faq.create', [
            'title'   => $this->title,
            'website'   => $result,
            'menu'    => $this->menu,
            'submenu' => $this->submenu,
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama_web' => 'required',
            'pertanyaan' => 'required|string|max:255',
            'jawaban'    => 'required|string',
            'keterangan' => 'nullable|string|max:100',
            'status1' => 'nullable|string',
        ]);

        DB::beginTransaction();
        try {
            FaqModel::create([
                'id_web' => $request->nama_web,
                'pertanyaan' => $request->pertanyaan,
                'jawaban'    => $request->jawaban,
                'keterangan' => $request->keterangan,
                'status'     => $request->status1,
            ]);

            DB::commit();
            AlertHelper::addAlert(true);
            return redirect()->route('faq_web.index');
        } catch (\Throwable $err) {
            DB::rollBack();
            AlertHelper::addAlert(false);
            return back()->withErrors(['error' => $err->getMessage()]);
        }
    }

    public function show(string $id)
    {
        $id_decrypt = Crypt::decryptString($id);
        $faq = FaqModel::findOrFail($id_decrypt);

        return view('cms.faq.show', compact('faq'))->with([
            'title'   => $this->title,
            'menu'    => $this->menu,
            'submenu' => $this->submenu,
        ]);
    }

    public function edit(string $id)
    {
        $id_decrypt = Crypt::decryptString($id);
        $faq = FaqModel::findOrFail($id_decrypt);
        $result = DB::table('cms_profils')
                    ->whereNull('deleted_at')
                    ->select('id','sub_web', 'nama_web')
                    ->get();

        return view('cms.faq.edit', compact('faq'))->with([
            'title'   => $this->title,
            'website'   => $result,
            'menu'    => $this->menu,
            'submenu' => $this->submenu,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_web' => 'required',
            'pertanyaan' => 'required|string|max:255',
            'jawaban'    => 'required|string',
            'keterangan' => 'nullable|string|max:100',
            'status1'     => 'required|string|max:10',
        ]);

        DB::beginTransaction();
        try {
            $id_decrypt = Crypt::decryptString($id);
            $faq = FaqModel::findOrFail($id_decrypt);

            $faq->update([
                'id_web'     => $request->nama_web,
                'pertanyaan' => $request->pertanyaan,
                'jawaban'    => $request->jawaban,
                'keterangan' => $request->keterangan,
                'status'     => $request->status1,
            ]);

            DB::commit();
            AlertHelper::addAlert(true);
            return redirect()->route('faq_web.index');
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
            $faq = FaqModel::findOrFail($id_decrypt);
            $faq->delete();

            DB::commit();
            AlertHelper::addAlert(true);
            return redirect()->route('faq_web.index');
        } catch (\Throwable $err) {
            DB::rollBack();
            Log::error('Update FAQ Error: ' . $err->getMessage());
            AlertHelper::addAlert(false);
            return back()->withErrors(['error' => $err->getMessage()]);
        }
    }
}
