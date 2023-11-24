<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->input('q');
        $provinsis = Provinsi::where('nama', 'LIKE', '%' . $q . '%')->paginate(5);
        return view('admin.provinsi.index', compact('provinsis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinsis = new Provinsi;

        return view('admin.provinsi.index', compact('provinsis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        $provinsis = new Provinsi;
        $provinsis->nama = $request->input('nama');
        $provinsis->save();

        return redirect()->route('provinsi')
            ->with('success', 'Provinsi created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $provinsis = new Provinsi;
        $provinsis->nama = $request->input('nama');
        $provinsis->save();

        return redirect()->route('provinsi')
            ->with('success', 'Provinsi created successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        $provinsis = Provinsi::find($id);
        $provinsis->update($request->all());

        return redirect()->route('provinsi')->with('success', 'Provinsi updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $provinsis = Provinsi::find($id);
        $provinsis->delete();
        return redirect()->route('provinsi')->with('success', 'Provinsi deleted successfully');
    }
}
