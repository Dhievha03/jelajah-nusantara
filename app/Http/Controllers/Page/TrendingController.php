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
        $cards = Wisata::select('id', 'nama_wisata', 'deskripsi', 'foto')->where('status', '=', '1')->get();
        $select = Provinsi::get();
        return view('page.trending', compact('cards', 'select'));
    }
}
