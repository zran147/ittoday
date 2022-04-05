<?php

namespace App\Http\Livewire\registranttimcompetition;

use App\Models\TimCompetition;
use Livewire\Component;

class FormRegistrantCompetition extends Component
{
    public $name_tim, $email_tim, $level_tim, $username_telegram_tim,
        $name_institusi_tim, $no_handphone_tim;
    public $participants;
    public $participantslist = [];
    public $action, $codeuniqteam;

    public function mount()
    {
        if(!is_null($this->codeuniqteam)){
            $tim  = TimCompetition::where('code_uniq_tim',$this->codeuniqteam)->first();
            $this->name_tim = $tim->name_tim;
            $this->email_tim = $tim->email_tim;
            $this->level_tim = $tim->level_tim;
            $this->username_telegram_tim = $tim->username_telegram_tim;
            $this->name_institusi_tim = $tim->institusi_name_tim;
            $this->no_handphone_tim = $tim->no_hp_tim;
            $this->participantslist = $tim->membertimcompetition;
        }
    }

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
        for ($i=0; $i < $this->participants; $i++) {
            array_push($this->participantslist,$i);
        }

    }
}
