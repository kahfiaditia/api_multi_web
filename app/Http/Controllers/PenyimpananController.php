<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenyimpananController extends Controller
{
    protected $menu ="Transaksi";
    protected $submenu ="Penyimpanan";

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'menu' => $this->menu,
            'submenu' => $this->submenu,
            // 'data_member' => MemberModel::whereNull('deleted_at')->get(),
        ];
        return view('penyimpanan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
