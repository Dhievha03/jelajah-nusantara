<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        //
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
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $imagePath = null;
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $imageName = Str::random(16) . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('public/provinsi', $imageName);
        }

        if ($imagePath) {
            Provinsi::create([
                'nama' => $request->nama,
                'foto' => $imageName,
            ]);
        
            return redirect()->route('admin.provinsi.index')->with('success', 'Data berhasil disimpan.');
        }else{
            return back()->with('error', 'Ups sepertinya ada yang salah');
        }
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
    public function edit($id)
    {
        $provinsi = Provinsi::find($id);
        return view('admin.provinsi.index', [
            'provinsi' => $provinsi
        ]);
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
            'foto' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $provinsi = Provinsi::find($id);

        $imagePath = null;
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $imageName = Str::random(16) . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('public/provinsi', $imageName);

            if ($imagePath) {
                $provinsi->update([
                    'nama' => $request->nama,
                    'foto' => $imageName,
                ]);
            
                return redirect()->route('admin.provinsi.index')->with('success', 'Data berhasil diubah.');
            }else{
                return back()->with('error', 'Ups sepertinya ada yang salah');
            }
        }

        $provinsi->update([
            'nama' => $request->nama,
        ]);
    
        return redirect()->route('admin.provinsi.index')->with('success', 'Data berhasil diubah.');
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
        return redirect()->route('admin.provinsi.index')->with('success', 'Data berhasil dihapus');
    }

    public function getProvinsis(Request $request)
    {
        if ($request->ajax()) {
            $data = Provinsi::get();
            return datatables()->of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $id = $row->id;
                    $edit = route('admin.provinsi.edit', $id);
                    $delete = route('admin.provinsi.delete', $id);
        
                    $actionBtn = '
                    <div class="d-flex gap-1">

                    <a href="' . $edit . '" class="btn btn-sm btn-icon btn-warning m-1"><i class="far fa-edit"></i></a>
        
                    <form method="POST" action="' . $delete . '">
                    ' . method_field('DELETE') . '
                    ' . csrf_field() . '
                    <button type="submit" class="btn btn-sm btn-icon btn-danger m-1" onclick="return confirm(\'Anda yakin?\')"><i class="fas fa-trash-alt"></i></button>
                    </form>
                    </div>
                    ';
        
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
