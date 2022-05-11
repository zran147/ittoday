<?php

namespace App\Http\Livewire\registranttimcompetition;

use App\Models\RegistrantCompetition;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormRegistrantMemberCompetition extends Component
{
    use WithFileUploads;
    protected $listeners = ['refreshcompe' => 'mount'];
    public $index, $action, $name_member, $provinsi_member,$id_card_member,$sk_member, $membertim, $tim_id;
    public $verifmember, $messageformember, $leadertimember,$status,$level_tim, $id_card_member2,$sk_member2;
    public function mount()
    {
        if (!is_null($this->membertim)) {
            $this->name_member = $this->membertim->name_registrant_competitions;
            $this->provinsi_member = $this->membertim->provinsi_registrant_competitions;
            $this->id_card_member2 = $this->membertim->member_card_registrant_competitions;
            $this->sk_member2 = $this->membertim->letter_active_member_card_registrant_competitions;
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
            'sk_member' => 'image|mimes:jpeg,png,jpg|max:2048|nullable',
        ]);

        if($this->id_card_member){
            $id_card = $this->id_card_member->store('id_card');
        }else{
            $id_card = null;
        }
        if ($this->sk_member) {
            $sk_member = $this->sk_member->store('sk_member');
        }else{
            $sk_member = null;
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
            'letter_active_member_card_registrant_competitions' => $sk_member,
            'verivication_registrant_competitions' => 'wait',
            'team_leader_registrant_competitions' => $index,
            'tim_id'=>$this->tim_id
        ]);

        if($registrant){
            session()->flash('success','member succes regis in tim');
            // $this->emit('refreshcompe');
            return redirect(request()->header('Referer'));
        }else{
            session()->flash('error','member unsucces regis in tim');
            // return redirect(request()->header('Referer'));
        }
    }
    public function updatemembertim()
    {
        $this->validate([
            'name_member' => 'required|max:100',
            'provinsi_member' => 'required|max:100',
            'id_card_member' => 'image|mimes:jpeg,png,jpg|max:2048|nullable',
            'sk_member' => 'image|mimes:jpeg,png,jpg|max:2048|nullable',
        ]);
        if($this->id_card_member){
            $id_card = $this->id_card_member->store('id_card');
        }else{
            $id_card = $this->id_card_member2;
        }
        if ($this->sk_member) {
            $sk_member = $this->sk_member->store('sk_member');
        }else{
            $sk_member = $this->sk_member2;
        }

        $registrant = $this->membertim->update([
            'name_registrant_competitions' => $this->name_member,
            'provinsi_registrant_competitions' => $this->provinsi_member,
            'member_card_registrant_competitions' => $id_card,
            'letter_active_member_card_registrant_competitions' => $sk_member,
        ]);
        if(!is_null($registrant)){
            $this->emitUp('refresh');
            session()->flash('success','berhasil update data tim');
            $this->id_card2 = $this->membertim->member_card_registrant_competitions;
            $this->sk_member2 = $this->membertim->letter_active_member_card_registrant_competitions;
            return redirect(request()->header('Referer'));
        }else{
            session()->flash('error','gagal update data tim');
            return redirect(request()->header('Referer'));
        }
    }
}
