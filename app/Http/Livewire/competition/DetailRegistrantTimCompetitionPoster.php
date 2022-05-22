<?php

namespace App\Http\Livewire\competition;

use App\Http\Livewire\competition\CheckTimStatus;
use Livewire\Component;
use App\Models\TimCompetition;
use Carbon\Carbon;

class DetailRegistrantTimCompetitionPoster extends Component
{
    public $name_competition, $name_tim, $tim_competition,$message;
    protected $listeners = [
        'refreshpage' => '$refresh'
    ];
    public function mount()
    {
        $this->tim_competition = TimCompetition::where('code_uniq_tim', $this->name_tim)->with('membertimcompetition','adminveriftimcompetition')->first();
        CheckTimStatus::checkadmin($this->tim_competition);
    }
    public function render()
    {
        return view('dashboard.registrantcompetition.detail-registrant-tim-competition-poster');
    }

    public function accregis()
    {
        $this->tim_competition->update([
            'status_verification_tim' => 'tim successful verification'
        ]);
        return redirect(request()->header('Referer'));
    }
    public function refuseregis()
    {
        $this->tim_competition->update([
            'status_verification_tim' => 'rejected verification'
        ]);
        return redirect(request()->header('Referer'));
    }
}
