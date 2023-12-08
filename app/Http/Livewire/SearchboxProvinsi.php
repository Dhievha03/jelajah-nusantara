<?php

namespace App\Http\Livewire;

use App\Models\Provinsi;
use Livewire\Component;

class SearchboxProvinsi extends Component
{
    public $search = "";
    public $result;
    public $show = false;

    public function searchResult()
    {
        if (!empty($this->search)) {
            $search_val = $this->search;
            $this->result = Provinsi::select('id', 'nama')->where('nama', 'like', '%' . $this->search . '%')->get()
                ->map(function ($row) use ($search_val) {
                    $row->search_nama = preg_replace('/(' . $search_val . ')/i', "<b>$1</b>", $row->nama);
                    return $row;
                });

            $this->show = true;
        } else {
            $this->show = false;
        }
    }
    
    public function render()
    {
        return view('livewire.searchbox-provinsi');
    }
}
