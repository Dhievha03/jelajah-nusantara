<?php

namespace App\Http\Livewire;

use App\Models\Saved;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SavedButton extends Component
{
    public $isSaved = false;
    public $wisataId;

    public function mount($wisataId)
    {
        $this->wisataId = $wisataId;

        $user = Auth::user();
        if ($user) {
            $savedRecord = Saved::where('user_id', $user->id)
                               ->where('wisata_id', $this->wisataId)
                               ->first();

            if ($savedRecord) {
                $this->isSaved = true;
            }
        }
    }

    public function saveItem()
    {
        if(!Auth::check()){
            return redirect()->route('user.login');
        }

        $savedRecord = Saved::where('user_id', Auth::id())
                           ->where('wisata_id', $this->wisataId)
                           ->first();

        if ($savedRecord) {
            $savedRecord->delete();
        } else {
            Saved::create([
                'user_id' => Auth::id(),
                'wisata_id' => $this->wisataId,
            ]);
        }

        $this->isSaved = !$this->isSaved;
    }

    public function render()
    {
        return view('livewire.saved-button');
    }
}
