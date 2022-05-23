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
    public $name_tim, $email_tim, $tingkat_institusi, $username_telegram_tim,
        $nama_institusi, $nomor_whatsApp, $membertim;
    public $participants,$slug,$status_verification_tim,$link_competition_results,$link_twibbon_competition;
    public $participantslist = [];
    public $action, $codeuniqteam, $proof_of_payment_tim,$proof_of_payment_tim2, $bank_account_name, $payment_fee_payment_tim;
    protected $listeners = ['refreshcompe' => 'render'];

    public function mount()
    {
        if(!is_null($this->codeuniqteam)){
            $tim  = TimCompetition::where('code_uniq_tim',$this->codeuniqteam)->with('membertimcompetition','competition')->first();
            $this->link_twibbon_competition = $tim->competition->link_twibon_competition;
            $this->slug = $tim->competition->slug_competition;
            $this->id_tim = $tim->id;
            $this->name_tim = $tim->name_tim;
            $this->email_tim = $tim->email_tim;
            $this->tingkat_institusi = $tim->level_tim;
            $this->username_telegram_tim = $tim->username_telegram_tim;
            $this->nama_institusi = $tim->institusi_name_tim;
            $this->nomor_whatsApp = $tim->no_hp_tim;
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
            'name_tim' => 'required|regex:/[a-zA-Z0-9\s]+/|max:100|min:5',
            'email_tim' => 'required|email',
            'tingkat_institusi' => 'required|string',
            'username_telegram_tim' => 'required|string|max:100|min:2,unique:tim_competition,username_telegram_tim',
            'nama_institusi' => 'required|string|max:100|min:5',
            'nomor_whatsApp' => 'required|numeric',
            'participants' => 'required',
        ]);
        $tim = TimCompetition::create([
            'code_uniq_tim' => Str::uuid(),
            'name_tim' => $this->name_tim,
            'email_tim' => $this->email_tim,
            'level_tim' => $this->tingkat_institusi,
            'institusi_name_tim' => $this->nama_institusi,
            'username_telegram_tim' => $this->username_telegram_tim,
            'no_hp_tim' => $this->nomor_whatsApp,
            'registrant_id' => Auth::user()->id,
            'competition_id' => Competition::where('slug_competition',$this->slug)->first()->id,
            'participant'=>$this->participants,
            'status_verification_tim' => 'waiting verification administration'
        ]);
        if($tim){
            return redirect('/competitions/'.$this->slug.'/regis/'.$tim->code_uniq_tim);
        }

    }

    public function update()
    {
        $this->validate([
            'name_tim' => 'required|regex:/[a-zA-Z0-9\s]+/|max:100|min:5',
            'email_tim' => 'required|email',
            'tingkat_institusi' => 'required|string',
            'username_telegram_tim' => 'required|string|max:100|min:2|unique:tim_competition,username_telegram_tim,'.$this->id_tim,
            'nama_institusi' => 'required|string|max:100|min:5',
            'nomor_whatsApp' => 'required|numeric',
            'participants' => 'required',
        ]);

        $tim = TimCompetition::findorfail($this->id_tim)->update([
            'name_tim' => $this->name_tim,
            'email_tim' => $this->email_tim,
            'level_tim' => $this->tingkat_institusi,
            'institusi_name_tim' => $this->nama_institusi,
            'username_telegram_tim' => $this->username_telegram_tim,
            'no_hp_tim' => $this->nomor_whatsApp,
            'registrant_id' => Auth::user()->id,
            'competition_id' => Competition::where('slug_competition',$this->slug)->first()->id,
            'participant'=>$this->participants,
        ]);
        if($tim){
            session()->flash('success','Success Update Data Tim');
            return redirect(request()->header('Referer'));
        }
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
            session()->flash('success','Success Upload Payment');
            $this->emitUp('refresh');
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
            session()->flash('success','Success Update Payment');
            $this->proof_of_payment_tim2 = $this->proof_of_payment_tim;
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

        if($tim){
            session()->flash('success','Success Upload Result Your Tim');
            return redirect(request()->header('Referer'));
        }
    }


}
