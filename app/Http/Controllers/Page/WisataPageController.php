<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Wisata;
use Illuminate\Http\Request;

class WisataPageController extends Controller
{
    public function index()
    {
        $keyword = '';
        $wisata = Wisata::select('id', 'prov_id', 'user_id', 'nama_wisata', 'deskripsi', 'foto', 'created_at')->with('provinsi')->where('status', '=', '1')->paginate(8);
        return view('page.wisata.index', compact('wisata', 'keyword'));
    }

    public function detail($id, $slug)
    {
        $cards = Wisata::findOrFail($id);

        return view('page.wisata.detail', compact('cards'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        if ($keyword) {
            $wisata = Wisata::where('nama_wisata', 'LIKE', '%' . $keyword . '%')->paginate(8)->appends(request()->query());;
        } else {
            $wisata = Wisata::paginate(8)->appends(request()->query());
        }

        return view('page.wisata.index', compact('keyword', 'wisata', 'keyword'));
    }
}
