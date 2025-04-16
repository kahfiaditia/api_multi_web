<?php

namespace App\Http\Controllers;

use App\Models\DesaBannerModel;
use App\Models\DesaSamModel;
use Illuminate\Http\Request;

class DesaUtamaController extends Controller
{
    public function utama()
    {
        $data = [
            'banner' => DesaBannerModel::where('status', '1')->orderBy('id', 'asc')->get(),
            'sambutan' => DesaSamModel::first(),
        ];

        return view('depan.utama')->with($data);
    }
}
