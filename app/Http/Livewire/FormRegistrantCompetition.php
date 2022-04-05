<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FormRegistrantCompetition extends Component
{
    public $name_tim, $email_tim, $level_tim, $username_telegram_tim,
        $name_institusi_tim, $no_handphone_tim;
    public $participants;
    public $participantslist = [];

    public function render()
    {
        return view('livewire.form-registrant-competition');
    }
    public function storetim()
    {
        $this->validate([
            'name_tim' => 'required|unique:tim_competitions,name_tim|alpha|max:100|min:5',
            'email_tim' => 'required|unique:tim_competitions,email_tim|email',
            'level_tim' => 'required|string',
            'username_telegram_tim' => 'required|string|max:100|min:2',
            'name_institusi_tim' => 'required|string|max:100|min:5',
            'no_handphone_tim' => 'required|numeric',
            'participants' => 'required',
        ]);
    }
}
