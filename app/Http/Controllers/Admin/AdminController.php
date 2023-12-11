<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->input('q');
        $admins = Admin::where('name', 'LIKE', '%' . $q . '%')->paginate(5);
        return view('admin.admin.index', compact('admins'));
    }
}
