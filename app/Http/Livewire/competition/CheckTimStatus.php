<?php

namespace App\Http\Livewire\competition;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;


class CheckTimStatus extends Component
{
    static function checktimstatus($tim)
    {
        $memberacc = $tim->membertimcompetition->where('verivication_registrant_competitions', 'acc')->count();
        $regismember = $tim->membertimcompetition->count();
        $allmember = $tim->participant;
        if ($allmember > $regismember) {
            $tim->update([
                'status_verification_tim' => 'waiting verification administration'
            ]);
        }elseif ($memberacc == $allmember) {
            $statusacc = array('waiting verification administration','rejected verification administration');
            if(in_array($tim->status_verification_tim,$statusacc)){
                $tim->update([
                    'status_verification_tim' => 'acc verification administration'
                ]);
            }
        } else {
            $tim->update([
                'status_verification_tim' => 'rejected verification administration'
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
