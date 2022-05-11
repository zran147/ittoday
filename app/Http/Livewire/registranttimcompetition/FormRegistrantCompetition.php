<?php

namespace App\Http\Livewire\registranttimcompetition;

use App\Models\Competition;
use App\Models\TimCompetition;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class FormRegistrantCompetition extends Component
{
    use WithFileUploads;
    public $name_tim, $email_tim, $level_tim, $username_telegram_tim,
        $name_institusi_tim, $no_handphone_tim, $membertim;
    public $participants,$slug,$status_verification_tim,$link_competition_results;
    public $participantslist = [];
    public $action, $codeuniqteam, $proof_of_payment_tim,$proof_of_payment_tim2, $bank_account_name, $payment_fee_payment_tim;
    protected $listeners = ['refreshcompe' => 'render'];

    public function mount()
    {
        if(!is_null($this->codeuniqteam)){
            $tim  = TimCompetition::where('code_uniq_tim',$this->codeuniqteam)->with('membertimcompetition')->first();
            $this->id_tim = $tim->id;
            $this->name_tim = $tim->name_tim;
            $this->email_tim = $tim->email_tim;
            $this->level_tim = $tim->level_tim;
            $this->username_telegram_tim = $tim->username_telegram_tim;
            $this->name_institusi_tim = $tim->institusi_name_tim;
            $this->no_handphone_tim = $tim->no_hp_tim;
            $this->membertim = $tim->membertimcompetition;
            $this->participants = $tim->participant;
            $this->status_verification_tim = $tim->status_verification_tim;
            $this->proof_of_payment_tim2 = $tim->proof_of_payment_tim;
            $this->bank_account_name = $tim->bank_account_name_payment_tim;
            $this->payment_fee_payment_tim = $tim->payment_fee_payment_tim;
            $this->link_competition_results = $tim->link_competition_results;
        }
    }

    public function render()
    {
        return view('competition.regis.form-registrant-competition');
    }
    public function create()
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
        $tim = TimCompetition::create([
            'code_uniq_tim' => Str::uuid(),
            'name_tim' => $this->name_tim,
            'email_tim' => $this->email_tim,
            'level_tim' => $this->level_tim,
            'institusi_name_tim' => $this->name_institusi_tim,
            'username_telegram_tim' => $this->username_telegram_tim,
            'no_hp_tim' => $this->no_handphone_tim,
            'registrant_id' => Auth::user()->id,
            'competition_id' => Competition::where('slug_competition',$this->slug)->first()->id,
            'participant'=>$this->participants,
            'status_verification_tim' => 'waiting verification administration'
        ]);
        return redirect('/competitions/'.$this->slug.'/regis/'.$tim->code_uniq_tim);
    }

    public function update()
    {
        $this->validate([
            'name_tim' => 'required|alpha|max:100|min:5|unique:tim_competitions,name_tim,'.$this->id_tim,
            'email_tim' => 'required|email||unique:tim_competitions,email_tim,'.$this->id_tim,
            'level_tim' => 'required|string',
            'username_telegram_tim' => 'required|string|max:100|min:2',
            'name_institusi_tim' => 'required|string|max:100|min:5',
            'no_handphone_tim' => 'required|numeric',
            'participants' => 'required',
        ]);

        $tim = TimCompetition::findorfail($this->id_tim)->update([
            'name_tim' => $this->name_tim,
            'email_tim' => $this->email_tim,
            'level_tim' => $this->level_tim,
            'institusi_name_tim' => $this->name_institusi_tim,
            'username_telegram_tim' => $this->username_telegram_tim,
            'no_hp_tim' => $this->no_handphone_tim,
            'registrant_id' => Auth::user()->id,
            'competition_id' => Competition::where('slug_competition',$this->slug)->first()->id,
            'participant'=>$this->participants,
        ]);
        if(!is_null($tim)){
            session()->flash('success','berhasil update data tim');
            $this->emitUp('refresh');
        }else{
            session()->flash('error','gagal update data tim');
        }
        // return redirect('/competitions/'.$this->slug.'/regis/'.$this->codeuniqteam);
    }

    public function submit()
    {
        $this->validate([
            'bank_account_name' => 'required|max:100|string',
            'payment_fee_payment_tim' => 'required|integer',
            'proof_of_payment_tim' => 'image|mimes:jpeg,png,jpg|max:2048|nullable',
        ]);

        if($this->proof_of_payment_tim){
            $payment_proof = $this->proof_of_payment_tim->store('payment_proof');
        }else{
            $payment_proof = null;
        }

        $tim = TimCompetition::findorfail($this->id_tim)->update([
            'bank_account_name_payment_tim' => $this->bank_account_name,
            'payment_fee_payment_tim' => $this->payment_fee_payment_tim,
            'proof_of_payment_tim' => $payment_proof
        ]);
        if(!is_null($tim)){
            session()->flash('success','berhasil update data tim');
            $this->emitUp('refresh');
            return redirect(request()->header('Referer'));
        }else{
            session()->flash('error','gagal update data tim');
            return redirect(request()->header('Referer'));
        }

    }
    public function edit()
    {
        $this->validate([
            'bank_account_name' => 'required|max:100|string',
            'payment_fee_payment_tim' => 'required|integer',
            'proof_of_payment_tim' => 'image|mimes:jpeg,png,jpg|max:2048|nullable',
        ]);
        if($this->proof_of_payment_tim){
            $payment_proof = $this->proof_of_payment_tim->store('payment_proof');
        }else{
            $payment_proof = $this->proof_of_payment_tim2;
        }
        $tim = TimCompetition::findorfail($this->id_tim)->update([
            'bank_account_name_payment_tim' => $this->bank_account_name,
            'payment_fee_payment_tim' => $this->payment_fee_payment_tim,
            'proof_of_payment_tim' => $payment_proof
        ]);
        if(!is_null($tim)){
            $this->emit('refresh');
            session()->flash('success','berhasil update data tim');
            $this->proof_of_payment_tim2 = $this->proof_of_payment_tim;
            return redirect(request()->header('Referer'));
        }else{
            session()->flash('error','gagal update data tim');
            return redirect(request()->header('Referer'));
        }
    }
    public function createresult()
    {
        $this->validate([
            'link_competition_results' => 'required|string|active_url|url'
        ]);
        $tim = TimCompetition::findorfail($this->id_tim)->update([
            'link_competition_results' => $this->link_competition_results
        ]);
        if(!is_null($tim)){
            return redirect(request()->header('Referer'));
        }else{
            return redirect(request()->header('Referer'));
        }
    }
}
