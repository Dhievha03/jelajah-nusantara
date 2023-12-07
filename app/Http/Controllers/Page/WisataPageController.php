<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Provinsi;
use App\Models\Wisata;
use Illuminate\Http\Request;

class WisataPageController extends Controller
{
    public function index()
    {
        $cards = Wisata::select('id', 'nama_wisata', 'deskripsi', 'foto')->where('status', '=', '1')->get();
        $select = Provinsi::get();
        return view('page.wisata.index', compact('cards', 'select'));
    }

    public function show(Wisata $cards, $id)
    {
        $cards = Wisata::findOrFail($id);

        return view('page.wisata.detail', compact('cards'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        if ($keyword) {
            $cards = Wisata::where('nama_wisata', 'LIKE', '%' . $keyword . '%')->get();
        } else {
            $cards = Wisata::all();
        }

        return view('page.wisata.index', compact('keyword', 'cards'));
    }
}
