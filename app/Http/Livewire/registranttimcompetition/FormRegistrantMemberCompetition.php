<?php

namespace App\Http\Livewire\registranttimcompetition;

use Livewire\Component;

class FormRegistrantMemberCompetition extends Component
{
    public $index, $name_member, $provinsi_member, $timmember;
    public function mount()
    {

    }
    public function render()
    {
        return view('livewire.form-registrant-member-competition');
    }
}
