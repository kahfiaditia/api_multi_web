<?php

namespace App\Http\Controllers;

use App\Models\DesaBannerModel;
use App\Models\DesaBlogModel;
use App\Models\DesaGaleryModel;
use App\Models\DesaPerangkat;
use App\Models\DesaProfil;
use App\Models\DesaSamModel;
use App\Models\DesaVMModel;
use Illuminate\Http\Request;

class DesaUtamaController extends Controller
{
    public function utama()
    {
        $galeri = DesaGaleryModel::where('status', 1)->get()->map(function ($item) {
            // Ambil foto pertama yang tersedia dari foto_1 sampai foto_6
            $foto = $item->foto_1 ?? $item->foto_2 ?? $item->foto_3 ?? $item->foto_4 ?? $item->foto_5 ?? $item->foto_6;
    
            return [
                'id' => $item->id,
                'judul_galery' => $item->judul_galery,
                'keterangan' => $item->keterangan,
                'foto' => $foto,
            ];
        });
    
        $data = [
            'profils' => DesaProfil::first(),
            'banner' => DesaBannerModel::where('status', '1')->orderBy('id', 'asc')->get(),
            'sambutan' => DesaSamModel::first(),
            'galeri' => $galeri,
            'blog' => DesaBlogModel::where('kategori','!=', 'potensi')->orderBy('id', 'desc')->take(3)->get(),
            'potensi' => DesaBlogModel::where('kategori', 'potensi')->orderBy('id', 'desc')->take(3)->get(),
            'perangkats' => DesaPerangkat::orderBy('id', 'desc')->get(),
            'banner' => DesaBannerModel::where('status', 1)->orderBy('id', 'asc')->get(),
        ];
    
        return view('depan.depan')->with($data);
    }

    public function tentang()
    {
        $data = [
            'visi' => DesaVMModel::first(),
            'profils' => DesaProfil::first(),
            'sambutan' => DesaSamModel::first(),
            'perangkats' => DesaPerangkat::orderBy('id', 'desc')->get(),
        ];

        return view('depan.tentang')->with($data);
    }

   
    
    public function kegiatan()
    {
        $data = [
            'profils' => DesaProfil::first(),
            'sambutan' => DesaSamModel::first(),
            'perangkats' => DesaPerangkat::orderBy('id', 'desc')->get(),
            'kegiatan' => DesaBlogModel::where('kategori', 'kegiatan')->orderBy('id', 'desc')->get(),
        ];

        return view('depan.kegiatan')->with($data);
    }

    public function artikel()
    {
        $data = [
            'profils' => DesaProfil::first(),
            'sambutan' => DesaSamModel::first(),
            'perangkats' => DesaPerangkat::orderBy('id', 'desc')->get(),
            'artikel' => DesaBlogModel::where('kategori', 'Blog')->orderBy('id', 'desc')->get(),
        ];

        return view('depan.artikel')->with($data);
    }

    public function show($id)
    {
        // dd($id);

        $data = [
            'isi' => DesaBlogModel::find($id),
            'profils' => DesaProfil::first(),
            'sambutan' => DesaSamModel::first(),
            'perangkats' => DesaPerangkat::orderBy('id', 'desc')->get(),
           
        ];

        return view('isi.lihat_kegiatan')->with($data);
    }

    public function jadwal()
    {
        // dd($id);

        $data = [ 
            'profils' => DesaProfil::first(),
            'sambutan' => DesaSamModel::first(),
            'perangkats' => DesaPerangkat::orderBy('id', 'desc')->get(),
           
        ];

        return view('depan.jadwal')->with($data);
    }

     public function kontak()
    {
        $data = [
            'profils' => DesaProfil::first(),
            'sambutan' => DesaSamModel::first(),
            'perangkats' => DesaPerangkat::orderBy('id', 'desc')->get(),
            'artikel' => DesaBlogModel::where('kategori', 'Blog')->orderBy('id', 'desc')->get(),
        ];

        return view('depan.kontak')->with($data);
    }
}
