<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Provinsi;
use App\Models\Wisata;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    public function index()
    {
        $wisata = Wisata::where('status', 1)->with('provinsi')->get();
        return view('page.provinsi.index', [
            'wisata' => $wisata
        ]);
    }

    public function detail($id)
    {
        $provinsi = Provinsi::where('id', $id)->first();
        $wisata = Wisata::where('prov_id', $id)->where('status', '1')->with('provinsi')->get();
        return view('page.provinsi.detail', [
            'wisata' => $wisata,
            'provinsi' => $provinsi
        ]);
    }
}
