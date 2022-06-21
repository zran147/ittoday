<?php

namespace App\Http\Livewire\competition;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;


class CheckTimStatus extends Component
{
    static function checktimstatus($tim) {
        $partipants = $tim->participant;
        $member = $tim->membertimcompetition->whereIn('verivication_registrant_competitions',['acc','improve','wait']);
        if ($member->where("verivication_registrant_competitions",'=','improve')->count() > 0){
            $tim->update([
                'status_verification_tim' => 'rejected verification administration'
            ]);
        }
        elseif($member->where("verivication_registrant_competitions",'=','acc')->count() == $partipants){
            $tim->update([
                'status_verification_tim' => 'acc verification administration'
            ]);
        }elseif($member->where('verivication_registrant_competitions','=','wait')->count() > 0){
            $tim->update([
                'status_verification_tim' => 'waiting verification administration'
            ]);
        }


    }


    static function checkadmin($tim)
    {
        if(is_null($tim->admin_id)) {
            $tim->update([
                'admin_id' => Auth::user()->id,
            ]);
        }
    }
}
