<?php

namespace App\Http\Livewire\competition;

use App\Models\Competition;
use Livewire\Component;

class CreateCompetitionDashboardLivewire extends Component
{
    public $action, $id_competition, $slug_competition, $name_competition, $finish_registrasi_competition, $link_rule_book_competition, $status;
   
    public function render()
    {
        return view('dashboard.competition.create-competition-dashboard-livewire');
    }
    public function Store()
    {
        $this->validate([
            'name_competition' => 'required|unique:competitions,name_competition|max:255|string',
            'finish_registrasi_competition' => 'required|date',
            'link_rule_book_competition' => 'required|url',
        ]);
        $name_competition = ucwords($this->name_competition);
        Competition::create([
            'name_competition' => $name_competition,
            'slug_competition' => str($this->name_competition)->slug('-'),
            'finish_registrasi_competition' => $this->finish_registrasi_competition,
            'rule_book_competition' => $this->link_rule_book_competition,
        ]);
        to_route('indexdashboardcompetitioncontroller');
    }
}
