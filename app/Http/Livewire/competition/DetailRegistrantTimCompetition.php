<?php

namespace App\Http\Livewire\competition;

use App\Http\Livewire\competition\CheckTimStatus;
use Livewire\Component;
use App\Models\TimCompetition;
use Carbon\Carbon;

class DetailRegistrantTimCompetition extends Component
{
    public $name_competition, $name_tim, $tim_competition,$message;
    protected $listeners = [
        'refreshpage' => '$refresh'
    ];
    public function mount()
    {
        $this->tim_competition = TimCompetition::where('code_uniq_tim', $this->name_tim)->with('membertimcompetition','adminveriftimcompetition')->first();
        if (in_array($this->tim_competition->status_verification_tim ,array('waiting verification administration','rejected verification administration'))) {
            CheckTimStatus::checktimstatus($this->tim_competition);
            CheckTimStatus::checkadmin($this->tim_competition);
        }

    }
    public function render()
    {
        return view('dashboard.registrantcompetition.detail-registrant-tim-competition');
    }
    public function accpayment()
    {
        $this->tim_competition->update([
            'status_verification_tim' => 'acc verification payment'
        ]);
        session()->flash('success','Payment Success');
    }
    public function refusepayment()
    {
        $this->tim_competition->update([
            'status_verification_tim' => 'rejected verification payment'
        ]);
        session()->flash('success','Payment Refuse');
    }
    public function timsuccess()
    {
        $this->tim_competition->update([
            'status_verification_tim' => 'tim successful verification'
        ]);
        return redirect(request()->header('Referer'));
    }
    public function sendmessage()
    {
       if (!is_null($this->message)) {
           $this->tim_competition->update([
            'email_verification_tim' => Carbon::now()
           ]);
           return redirect('/sendmessage/')->with(['message' => $this->message, 'email'=>$this->tim_competition->email_tim]);
       }
    }

}
