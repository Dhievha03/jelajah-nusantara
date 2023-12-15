<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Wisata;
use App\Models\Trending;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $wisata = Wisata::select('id', 'prov_id', 'user_id', 'nama_wisata', 'deskripsi', 'foto', 'created_at')->with('provinsi')->where('status', '=', '1')->limit(4)->get();
        return view('page.home', compact('wisata'));
    }

    public function about()
    {
        return view('page.about');
    }
}
