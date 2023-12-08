<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use App\Models\Provinsi;
use App\Models\Wisata;
use App\Models\Trending;
use Illuminate\Http\Request;

class TrendingController extends Controller
{
    public function index()
    {
        return view('page.trending');
    }

    public function provinsi($id)
    {
        $provinsi = Provinsi::where('id', $id)->first();
        $wisata = Wisata::where('prov_id', $id)->where('status', '1')->with('provinsi')->get();
        return view('page.trending.provinsi', [
            'wisata' => $wisata,
            'provinsi' => $provinsi
        ]);
    }
}
