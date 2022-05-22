<?php

namespace App\Http\Livewire\competition;

use Livewire\Component;
use App\Models\Competition;
use App\Models\TimCompetition;
use Illuminate\Support\Facades\Crypt;

class DetailTimCompetitionLivewire extends Component
{
    public $name_competition, $timcompetition;
    public function mount()
    {
        $this->timcompetition = Competition::where('name_competition', $this->name_competition)->with('timcompetition')->first();
    }
    public function render()
    {
        return view('dashboard.detailcompetition.detail-tim-competition-livewire');
    }
    public function deletetim($idcompetition)
    {
        $idcompetition = Crypt::decrypt($idcompetition);
        $timcompetition = TimCompetition::findorfail($idcompetition)->delete();
        if ($timcompetition) {
            return redirect(request()->header('Referer'))->with('success', 'Tim Competition deleted.');
        } else {
            return redirect(request()->header('Referer'))->with('error', 'Tim Competition Failed delete.');
        }
    }
}
