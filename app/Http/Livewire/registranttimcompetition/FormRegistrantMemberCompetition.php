<?php

namespace App\Http\Livewire\registranttimcompetition;

use App\Models\RegistrantCompetition;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormRegistrantMemberCompetition extends Component
{
    use WithFileUploads;
    protected $listeners = ['refreshcompe' => 'mount'];
    public $index, $action, $name_member, $provinsi_member,$id_card_member,$member_tim_certificate, $membertim, $tim_id;
    public $verifmember, $messageformember, $leadertimember,$status,$level_tim, $id_card_member2,$member_tim_certificate2;
    public function mount()
    {
        if (!is_null($this->membertim)) {
            $this->name_member = $this->membertim->name_registrant_competitions;
            $this->provinsi_member = $this->membertim->provinsi_registrant_competitions;
            $this->id_card_member2 = $this->membertim->member_card_registrant_competitions;
            $this->member_tim_certificate2 = $this->membertim->letter_active_member_card_registrant_competitions;
            $this->status = $this->membertim->verivication_registrant_competitions;
            $this->message = $this->membertim->	message_registrant_competitions;
        }
    }
    public function render()
    {
        return view('competition.regis.form-registrant-member-competition');
    }
    public function createmembertim()
    {
        $this->validate([
            'name_member' => 'required|max:100',
            'provinsi_member' => 'required|max:100',
            'id_card_member' => 'image|mimes:jpeg,png,jpg|max:2048|nullable',
            'member_tim_certificate' => 'image|mimes:jpeg,png,jpg|max:2048|nullable',
        ]);

        if($this->id_card_member){
            $id_card = $this->id_card_member->store('id_card');
        }else{
            $id_card = null;
        }
        if ($this->member_tim_certificate) {
            $member_tim_certificate = $this->member_tim_certificate->store('sk_member');
        }else{
            $member_tim_certificate = null;
        }
        if($this->index == 0){
            $index = '1';
        }else{
            $index = '0';
        }

        $registrant = RegistrantCompetition::create([
            'name_registrant_competitions' => $this->name_member,
            'provinsi_registrant_competitions' => $this->provinsi_member,
            'member_card_registrant_competitions' => $id_card,
            'letter_active_member_card_registrant_competitions' => $member_tim_certificate,
            'verivication_registrant_competitions' => 'wait',
            'team_leader_registrant_competitions' => $index,
            'tim_id'=>$this->tim_id
        ]);

        if($registrant){
            session()->flash('success','Member Succes Regis In Tim');
            return redirect(request()->header('Referer'));
        }else{
            session()->flash('error','Member Unsucces Regis In Tim');
        }
    }
    public function updatemembertim()
    {
        $this->validate([
            'name_member' => 'required|max:100',
            'provinsi_member' => 'required|max:100',
            'id_card_member' => 'image|mimes:jpeg,png,jpg|max:2048|nullable',
            'member_tim_certificate' => 'image|mimes:jpeg,png,jpg|max:2048|nullable',
        ]);
        if($this->id_card_member){
            $id_card = $this->id_card_member->store('id_card');
        }else{
            $id_card = $this->id_card_member2;
        }
        if ($this->member_tim_certificate) {
            $member_tim_certificate = $this->member_tim_certificate->store('sk_member');
        }else{
            $member_tim_certificate = $this->member_tim_certificate2;
        }

        $registrant = $this->membertim->update([
            'name_registrant_competitions' => $this->name_member,
            'provinsi_registrant_competitions' => $this->provinsi_member,
            'member_card_registrant_competitions' => $id_card,
            'letter_active_member_card_registrant_competitions' => $member_tim_certificate,
            'verivication_registrant_competitions' => 'wait',
        ]);
        if(!is_null($registrant)){
            $this->emitUp('refresh');
            session()->flash('success','Success Update Data Tim');
            return redirect(request()->header('Referer'));
        }else{
            session()->flash('error','Failed Update Data Tim');
            return redirect(request()->header('Referer'));
        }
    }
}
