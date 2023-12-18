<?php

namespace App\Http\Livewire;

use App\Models\Wisata;
use Livewire\Component;

class SearchboxWisata extends Component
{
    public $keyword = "";
    public $result;
    public $show = false;

    public function searchResult()
    {
        if (!empty($this->keyword)) {
            $search_val = $this->keyword;
            $this->result = Wisata::select('id', 'nama_wisata')->where('nama_wisata', 'like', '%' . $this->keyword . '%')->get()
                ->map(function ($row) use ($search_val) {
                    $row->search_nama = preg_replace('/(' . $search_val . ')/i', "<b>$1</b>", $row->nama_wisata);
                    return $row;
                });

            $this->show = true;
        } else {
            $this->show = false;
        }
    }

    public function render()
    {
        return view('livewire.searchbox-wisata');
    }
}
