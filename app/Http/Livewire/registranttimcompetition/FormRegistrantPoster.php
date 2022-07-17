<?php

namespace App\Http\Livewire\registranttimcompetition;

use App\Models\Competition;
use App\Models\TimCompetition;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class FormRegistrantPoster extends Component
{
    use WithFileUploads;
    public $codeuniqteam,$action,$slug;
    //field yang diambil
    public $name,$tingkat_institusi,$status_verification_tim,$email,$username_telegram,$nomor_whatsApp,$submission_poster2;
    public $domisili,$id_regis,$idcard2,$idcard,$nama_institusi,$prof_upload_twibon,$prof_upload_twibon2,$submission_poster;

    public function mount()
    {
        if(!is_null($this->codeuniqteam)){
            $tim  = TimCompetition::where('code_uniq_tim',$this->codeuniqteam)->with('membertimcompetition','competition')->first();
            $this->link_twibbon_competition = $tim->competition->link_twibon_competition;
            $this->id_regis = $tim->id;
            $this->name = $tim->name_tim;
            $this->email = $tim->email_tim;
            $this->tingkat_institusi = $tim->level_tim;
            $this->username_telegram = $tim->username_telegram_tim;
            $this->nama_institusi = $tim->institusi_name_tim;
            $this->nomor_whatsApp = $tim->no_hp_tim;
            $this->status_verification_tim = $tim->status_verification_tim;
            $this->idcard2 = $tim->proof_of_payment_tim;
            $this->domisili = $tim->bank_account_name_payment_tim;
            $this->prof_upload_twibon2 = $tim->payment_fee_payment_tim;
            $this->submission_poster2 = $tim->link_competition_results;
        }
        if ($this->prof_upload_twibon2) {
            $this->prof_upload_twibon = $this->prof_upload_twibon2;
        }
        if ($this->submission_poster2) {
            $this->submission_poster = $this->submission_poster2;
        }
    }

    public function create()
    {
        $this->validate([
            'name' => 'required|regex:/[a-zA-Z0-9\s]+/|max:100|min:5',
            'email' => 'required|email',
            'tingkat_institusi' => 'required|string',
            'username_telegram' => 'required|string|max:100|min:1',
            'nama_institusi' => 'required|string|max:100',
            'nomor_whatsApp' => 'required|numeric',
            'domisili' => 'required|string',
            'idcard' => 'image|mimes:jpeg,png,jpg|max:2048|nullable',
        ]);
        if($this->idcard){
            $idcard = $this->idcard->store('id_card');
        }else{
            $idcard = null;
        }
        $tim = TimCompetition::create([
            'code_uniq_tim' => Str::uuid(),
            'name_tim' => $this->name,
            'email_tim' => $this->email,
            'level_tim' => $this->tingkat_institusi,
            'institusi_name_tim' => $this->nama_institusi,
            'username_telegram_tim' => $this->username_telegram,
            'no_hp_tim' => $this->nomor_whatsApp,
            'registrant_id' => Auth::user()->id,
            'proof_of_payment_tim' => $idcard,
            'bank_account_name_payment_tim' => $this->domisili,
            'competition_id' => Competition::where('slug_competition',$this->slug)->first()->id,
            'participant'=>0,
            'status_verification_tim' => 'waiting verification administration'
        ]);
        return redirect('/competitions/'.$this->slug.'/regis/'.$tim->code_uniq_tim.'/poster');
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|regex:/[a-zA-Z0-9\s]+/|max:100|min:5',
            'email' => 'required|email',
            'tingkat_institusi' => 'required|string',
            'username_telegram' => 'required|string|max:100|min:1',
            'nama_institusi' => 'required|string|max:100',
            'nomor_whatsApp' => 'required|numeric',
            'domisili' => 'required|string',
            'idcard' => 'image|mimes:jpeg,png,jpg|max:2048|nullable',
        ]);
        if($this->idcard){
            $idcard = $this->idcard->store('id_card');
        }else{
            $idcard = $this->idcard2;
        }
        $tim = TimCompetition::findorfail($this->id_regis)->update([
            'name_tim' => $this->name,
            'email_tim' => $this->email,
            'level_tim' => $this->tingkat_institusi,
            'institusi_name_tim' => $this->nama_institusi,
            'username_telegram_tim' => $this->username_telegram,
            'no_hp_tim' => $this->nomor_whatsApp,
            'registrant_id' => Auth::user()->id,
            'bank_account_name_payment_tim' => $this->domisili,
            'proof_of_payment_tim' => $idcard,
        ]);
    }
    public function submittwibbon()
    {
        $this->validate([
            'prof_upload_twibon' => 'required|url|max:100'
        ]);
        $tim = TimCompetition::findorfail($this->id_regis)->update([
            'payment_fee_payment_tim' => $this->prof_upload_twibon
        ]);
        if ($tim) {
            session()->flash('success','Link Berhasil Dikirim');
            return redirect(request()->header('Referer'));
        }
    }

    // public function updatetwibbon()
    // {
    //     $this->validate([
    //         'prof_upload_twibon' => 'required|url|max:100'
    //     ]);

    //     $tim = TimCompetition::findorfail($this->id_regis)->update([
    //         'payment_fee_payment_tim' => $this->prof_upload_twibon
    //     ]);
    //     if ($tim) {
    //         session()->flash('success','Link Berhasil Dikirim');
    //         return redirect(request()->header('Referer'));
    //     }

    // }

    public function uploadposter()
    {
        $this->validate([
            'submission_poster' => 'required|url|max:100'
        ]);
        $tim = TimCompetition::findorfail($this->id_regis)->update([
            'link_competition_results' => $this->submission_poster
        ]);
        if ($tim) {
            session()->flash('success','Link Berhasil Dikirim');
            return redirect(request()->header('Referer'));
        }
    }
    public function render()
    {
        return view('competition.regis.form-registrant-poster');
    }
}
