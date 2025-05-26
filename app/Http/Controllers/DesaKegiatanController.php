<?php

namespace App\Http\Controllers;

use App\Models\DesaBlogModel;
use Illuminate\Http\Request;

class DesaKegiatanController extends Controller
{
    protected $title = 'Kegiatan';
    protected $menu = 'Manajemen Web';
    protected $submenu = 'Kegiatan';

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
            'kegiatan' => DesaBlogModel::where('kategori', 'kegiatan')->orderBy('id', 'desc')->get(),
        ];
        return view('desa.kegiatan.index')->with($data);
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
            'label' => 'Kegiatan',
            'level' => 'Create',
        ];
        return view('desa.kegiatan.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
