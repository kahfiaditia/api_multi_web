<?php

namespace App\Http\Controllers;

use App\Helper\AlertHelper;
use App\Models\DesaProfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class DesaProfilController extends Controller
{
    protected $title = 'Profil Desa';
    protected $menu = 'Manajamen Web';
    protected $submenu = 'Profil Desa';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => $this->title,
            'menu' => $this->menu,
            'submenu' => $this->submenu,
            'label' => 'Profil',
            'data_desa' => DesaProfil::first(),
        ];
        return view('desa.profil_desa.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => $this->title,
            'menu' => $this->menu,
            'submenu' => $this->submenu,
            'label' => 'Profil',
            'level' => 'Profil',
        ];
        return view('desa.profil_desa.tambah')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'kode_pos'   => 'nullable|string|max:10',
            'nama_desa'  => 'required|string|max:45',
            'provinsi'   => 'required|string|max:45',
            'kabupaten'  => 'required|string|max:45',
            'kecamatan'  => 'required|string|max:45',
            'jumlah_rt'  => 'nullable|integer',
            'jumlah_rw'  => 'nullable|integer',
            'telepon'    => 'nullable|string|max:20',
            'email'      => 'nullable|email|max:100',
            'deskripsi'  => 'nullable|string',
        ]);
        
        DB::beginTransaction();
        try {
                DesaProfil::create([
                    'kode_pos'   => $request->kode_pos,
                    'nama_desa'  => $request->nama_desa,
                    'provinsi'   => $request->provinsi,
                    'kabupaten'  => $request->kabupaten,
                    'kecamatan'  => $request->kecamatan,
                    'jumlah_rt'  => $request->jumlah_rt,
                    'jumlah_rw'  => $request->jumlah_rw,
                    'telepon'    => $request->telepon,
                    'email'      => $request->email,
                    'deskripsi'  => $request->deskripsi,
                ]);

            DB::commit();
            AlertHelper::addAlert(true);
            return redirect('/profil_desa');
        } catch (\Throwable $err) {
            DB::rollback();
            throw $err;
            AlertHelper::addAlert(false);
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $id_decrypt = Crypt::decryptString($id);
        // dd($id_decrypt);

        $data = [
            'title' => $this->title,
            'menu' => $this->menu,
            'submenu' => $this->submenu,
            'label' => 'Profil',
            'level' => 'Profil',
            'desa' => DesaProfil::find($id_decrypt),
        ];
        return view('desa.profil_desa.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_pos'   => 'nullable|string|max:10',
            'nama_desa'  => 'required|string|max:45',
            'provinsi'   => 'required|string|max:45',
            'kabupaten'  => 'required|string|max:45',
            'kecamatan'  => 'required|string|max:45',
            'jumlah_rt'  => 'nullable|integer',
            'jumlah_rw'  => 'nullable|integer',
            'telepon'    => 'nullable|string|max:20',
            'email'      => 'nullable|email|max:100',
            'deskripsi'  => 'nullable|string',
        ]);

        DB::beginTransaction();
        try {

            $desa = DesaProfil::findOrFail(Crypt::decryptString($id));

            $desa->kode_pos   = $request->kode_pos;
            $desa->nama_desa  = $request->nama_desa;
            $desa->provinsi   = $request->provinsi;
            $desa->kabupaten  = $request->kabupaten;
            $desa->kecamatan  = $request->kecamatan;
            $desa->jumlah_rt  = $request->jumlah_rt;
            $desa->jumlah_rw  = $request->jumlah_rw;
            $desa->telepon    = $request->telepon;
            $desa->email      = $request->email;
            $desa->deskripsi  = $request->deskripsi;
            $desa->save();

            DB::commit();
            AlertHelper::addAlert(true);
            return redirect('/profil_desa');
        } catch (\Throwable $err) {
            DB::rollback();
            throw $err;
            AlertHelper::addAlert(false);
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
