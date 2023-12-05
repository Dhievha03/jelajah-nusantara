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
        $cards = Wisata::select('id', 'nama_wisata', 'deskripsi', 'foto')->where('status', '=', '1')->get();
        return view('page.home', compact('cards'));
    }

    public function show(Trending $cards, $id)
    {
        $cards = Wisata::findOrFail($id);

        return view('page.detail', compact('cards'));
    }
}
