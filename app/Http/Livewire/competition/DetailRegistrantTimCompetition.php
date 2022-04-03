<?php

namespace App\Http\Livewire\competition;

use App\Http\Livewire\competition\CheckTimStatus;
use Livewire\Component;
use App\Models\TimCompetition;

class DetailRegistrantTimCompetition extends Component
{
    public $name_competition, $name_tim, $tim_competition;
    protected $listeners = [
        'refreshpage' => '$refresh'
    ];
    public function mount()
    {
        $this->tim_competition = TimCompetition::where('code_uniq_tim', $this->name_tim)->with('membertimcompetition')->first();
        CheckTimStatus::checktimstatus($this->tim_competition);
    }
    public function render()
    {
        return view('dashboard.registrantcompetition.detail-registrant-tim-competition');
    }
    
}
