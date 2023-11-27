<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WisataApprovalController extends Controller
{
    public function index()
    {
        return view('admin.wisata-approval.index');
    }

    public function getWisataApproval(Request $request)
    {
        if ($request->ajax()) {
            $data = Wisata::where('status', '3')->with(['provinsi', 'user'])->get();
            return datatables()->of($data)
                ->addIndexColumn()
                ->addColumn('pengirim', function($row){
                    return $row->user->name ?? 'n/a';
                })
                ->addColumn('provinsi', function($row){
                    return $row->provinsi->nama ?? 'n/a';
                })
                ->addColumn('action', function ($row) {
                    $id = $row->id;
                    $show = route('admin.wisata-approval.show', [$id, Str::slug($row->nama_wisata)]);
        
                    $actionBtn = '
                    <div class="d-flex gap-1">
                    <a href="' . $show . '" class="btn btn-sm btn-icon btn-primary m-1"><i class="far fa-eye"></i></a>

                    </form>
                    </div>
                    ';
        
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function show(Wisata $wisata)
    {
        return view('admin.wisata-approval.show', [
            'wisata' => $wisata
        ]);
    }


    public function approveWisata(Wisata $wisata)
    {
        $wisata->update([
            'status' => 1
        ]);

        return redirect()->route('admin.wisata-approval.index')->with('success', 'Postingan berhasil diterima.');
    }

    public function rejectWisata(Wisata $wisata)
    {
        $wisata->update([
            'status' => 2
        ]);

        return redirect()->route('admin.wisata-approval.index')->with('success', 'Postingan berhasil ditolak.');
    }
}
