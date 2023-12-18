<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

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

        $url = route('page.wisata.detail', [$wisata->id, Str::lower(Str::slug($wisata->nama_wisata))]);
        $dates = $wisata->updated_at;

        Mail::send('email.wisata-approve-email', ['wisata' => $wisata, 'url' => $url, 'dates' => $dates], function($message) use($wisata){
            $message->to($wisata->user->email);
            $message->subject('Jelajah Nusantara : Postingan Anda Telah di Setujui');
        });

        return redirect()->route('admin.wisata-approval.index')->with('success', 'Postingan berhasil diterima.');
    }

    public function rejectWisata(Wisata $wisata)
    {
        $wisata->update([
            'status' => 2
        ]);

        $url = route('page.wisata.detail', [$wisata->id, Str::lower(Str::slug($wisata->nama_wisata))]);
        $dates = $wisata->updated_at;

        Mail::send('email.wisata-reject-email', ['wisata' => $wisata, 'url' => $url, 'dates' => $dates], function($message) use($wisata){
            $message->to($wisata->user->email);
            $message->subject('Jelajah Nusantara : Postingan Anda Telah di Tolak');
        });

        return redirect()->route('admin.wisata-approval.index')->with('success', 'Postingan berhasil ditolak.');
    }
}
