<?php

namespace App\Http\Livewire\competition;

use App\Models\Competition;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Crypt;

class IndexCompetitionLivewire extends Component
{
    public function render()
    {
        return view('dashboard.competition.index-competition-livewire',[
            'allcompetition' => Competition::all()
        ]);
    }
    public function activecompetition($idcompetition, $active)
    {
        $idcompetition = Crypt::decrypt($idcompetition);
        if ($active == 'draft') {
            $active = 'published';
        } else {
            $active = 'draft';
        }
        $competition = Competition::findorfail($idcompetition);
        $update = $competition->update([
            'active' => $active
        ]);
        if ($update) {
            to_route('indexdashboardcompetitioncontroller');
        }
    }
    public function deletecompetition($idcompetition)
    {
        $idcompetition = Crypt::decrypt($idcompetition);
        $delete = Competition::findorfail($idcompetition)->delete();
        if ($delete) {
            to_route('indexdashboardcompetitioncontroller');
        }
    }
}
