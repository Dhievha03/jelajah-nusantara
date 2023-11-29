<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Provinsi;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class WisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.wisata.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinsi = Provinsi::get();
        return view('user.wisata.create', [
            'provinsi' => $provinsi
        ]);
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
            'nama_wisata' => 'required',
            'url_maps' => 'required',
            'alamat' => 'required',
            'iframe' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'required',
            'provinsi' => 'required',
        ]);
    
       
        $imagePath = null;
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $imageName = Str::random(16) . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('public/wisata', $imageName);
        }
        
        if ($imagePath) {
            Wisata::create([
                'user_id' => Auth::user()->id,
                'prov_id' => $request->input('provinsi'),
                'nama_wisata' => $request->input('nama_wisata'),
                'url_maps' => $request->input('url_maps'),
                'alamat' => $request->input('alamat'),
                'iframe' => $request->input('iframe'),
                'deskripsi' => $request->input('deskripsi'),
                'foto' => $imageName,
            ]);
        
            return redirect()->route('user.wisata.index')->with('success', 'Data berhasil disimpan.');
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
    public function show(Wisata $wisata)
    {
        return view('user.wisata.show', [
            'wisata' => $wisata
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Wisata $wisata)
    {
        $provinsi = Provinsi::get();
        return view('user.wisata.edit', [
            'wisata' => $wisata,
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
    public function update(Request $request, Wisata $wisata)
    {
        $request->validate([
            'nama_wisata' => 'required',
            'url_maps' => 'required',
            'alamat' => 'required',
            'iframe' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'required',
            'provinsi' => 'required',
        ]);
    
       
        $imagePath = null;
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $imageName = Str::random(16) . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('public/wisata', $imageName);

            if ($imagePath) {
                $wisata->update([
                    'prov_id' => $request->input('provinsi'),
                    'nama_wisata' => $request->input('nama_wisata'),
                    'url_maps' => $request->input('url_maps'),
                    'alamat' => $request->input('alamat'),
                    'iframe' => $request->input('iframe'),
                    'deskripsi' => $request->input('deskripsi'),
                    'foto' => $imageName,
                ]);
            
                return redirect()->route('user.wisata.index')->with('success', 'Data berhasil diubah.');
            }else{
                return back()->with('error', 'Ups sepertinya ada yang salah');
            }
        }
        
        $wisata->update([
            'prov_id' => $request->input('provinsi'),
            'nama_wisata' => $request->input('nama_wisata'),
            'url_maps' => $request->input('url_maps'),
            'alamat' => $request->input('alamat'),
            'iframe' => $request->input('iframe'),
            'deskripsi' => $request->input('deskripsi')
        ]);
    
        return redirect()->route('user.wisata.index')->with('success', 'Data berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wisata $wisata)
    {
        $wisata->delete();
        return back()->with('success', 'Data berhasil dihapus');
    }

    public function getWisatas(Request $request)
    {
        if ($request->ajax()) {
            $data = Wisata::where('user_id', Auth::user()->id)->get();
            return datatables()->of($data)
                ->addIndexColumn()
                ->addColumn('status', function($row){
                    if($row->status == 1){
                        $statusBadge = '
                            <div class="btn btn-sm btn-success">Diterima</div>
                        ';
                    }elseif($row->status == 2){
                        $statusBadge = '
                            <div class="btn btn-sm btn-danger">Ditolak</div>
                        ';
                    }else{
                        $statusBadge = '
                            <div class="btn btn-sm btn-warning">Menunggu</div>
                        ';
                    }
                    return $statusBadge;
                })
                ->addColumn('action', function ($row) {
                    $id = $row->id;
                    $show = route('user.wisata.show', [$id, Str::slug($row->nama_wisata)]);
                    $edit = route('user.wisata.edit', $id);
                    $delete = route('user.wisata.delete', $id);
        
                    $actionBtn = '
                    <div class="d-flex gap-1">
                    <a href="' . $show . '" class="btn btn-sm btn-icon btn-primary m-1"><i class="far fa-eye"></i></a>

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
                ->rawColumns(['status', 'action'])
                ->make(true);
        }
    }
}
