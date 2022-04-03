<?php

namespace App\Http\Livewire\competition;

use Livewire\Component;
use App\Models\RegistrantCompetition;
use Illuminate\Support\Facades\Crypt;

class MemberTimCompetition extends Component
{
    public $member, $messageformember, $message = "off";
    protected $listeners = [
        'check' => '$refresh'
    ];
    public function render()
    {
        return view('dashboard.registrantcompetition.member-tim-competition');
    }
    public function accmemberrergistrant($idmember)
    {
        $idmember = Crypt::decrypt($idmember);
        $accmember = RegistrantCompetition::findorfail($idmember)->update([
            'verivication_registrant_competitions' => 'acc',
            'message_registrant_competitions' => NULL,
        ]);
        $this->emitSelf('check');
        if ($accmember) {
            session()->flash('success', 'member successfully acc verification.');
        } else {
            session()->flash('error', 'member failed acc verification. contact kestary member');
        }
        $this->cancelrefuse();
        $this->emitUp('refreshpage');
    }
    public function refusememberregistrant()
    {
        $this->message = 'on';
    }
    public function messagememberregistrant($idmember)
    {
        $idmember = Crypt::decrypt($idmember);
        $this->validate([
            'messageformember' => 'required|string|max:255'
        ]);
        $accmember = RegistrantCompetition::findorfail($idmember)->update([
            'verivication_registrant_competitions' => 'improve',
            'message_registrant_competitions' => $this->messageformember
        ]);
        $this->emitSelf('check');
        if ($accmember) {
            session()->flash('success', 'member successfully refuse verification.');
        } else {
            session()->flash('error', 'member failed refuse verification. contact kestary member');
        }
        $this->cancelrefuse();
        $this->emitUp('refreshpage');
    }
    public function cancelrefuse()
    {
        $this->message = 'off';
        $this->messageformember = NULL;
    }
}
