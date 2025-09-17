<?php

namespace App\Http\Controllers;

use App\Helper\AlertHelper;
use App\Models\DesaPengaduanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DesaPengaduan extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
     public function pengaduan(Request $request)
    {
            //
            return view('pengaduan.pengaduan');
        }
    public function index()
    {
        //
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
        // dd($request->all());
        $request->validate([
                'nama' => 'required|string|max:255',
                'telepon' => 'required|string|max:20',
                'isi' => 'required|string',
        ]);

        DB::beginTransaction();
        try {
            $pengaduan = new DesaPengaduanModel();
            $pengaduan->nama = $request->nama;
            $pengaduan->telepon = $request->telepon;
            $pengaduan->isi = $request->isi;
            $pengaduan->save();
           

           DB::commit();
            AlertHelper::addAlert(true);
            return redirect('/');
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
