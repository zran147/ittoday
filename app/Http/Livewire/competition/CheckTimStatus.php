<?php

namespace App\Http\Livewire\competition;

use Livewire\Component;

class CheckTimStatus extends Component
{
    static function checktimstatus($tim)
    {
        $memberacc = $tim->membertimcompetition->where('verivication_registrant_competitions', 'acc')->count();
        $allmember = $tim->membertimcompetition->count();
        if ($memberacc == $allmember) {
            $tim->update([
                'status_verification_tim' => 'acc verification administration'
            ]);
        } else {
            $tim->update([
                'status_verification_tim' => 'rejected verification administration'
            ]);
        }
    }
}
