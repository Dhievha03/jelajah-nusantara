<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Saved;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SavedWisataController extends Controller
{
    public function index()
    {
        $saved = Saved::where('user_id', Auth::user()->id)->with('wisata.provinsi')->get();
        //dd($saved);
        return view('user.saved-wisata.index', [
            'saved' => $saved
        ]);
    }
}
