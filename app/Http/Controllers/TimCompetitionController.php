<?php

namespace App\Http\Controllers;

use App\Models\TimCompetition;
use App\Http\Requests\StoreTimCompetitionRequest;
use App\Http\Requests\UpdateTimCompetitionRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\competition\CheckTimStatus;


class TimCompetitionController extends Controller
{
    public function indexdetailtimcompetitionbyslugdashboard($slug)
    {
        $name_competition = str_replace("-", " ", $slug);
        return view('dashboard.detailcompetition.detailcompetition', [
            'name_competition' => $name_competition
        ]);
    }
    public function create($slug)
    {
        return view('competition.regis.formregis',[
            'code' => null,
            'action' => 'create',
            'slug' => $slug
        ]);
    }
    public function edit($slug,$code)
    {
        $tim = TimCompetition::where('code_uniq_tim',$code)->with('membertimcompetition')->first();
        if ($tim->status_verification_tim != 'waiting verification administration') {
            CheckTimStatus::checktimstatus($tim);
        }
        if ($tim->registrant_id != Auth::user()->id) {
            return redirect('/');
        }else{
            return view('competition.regis.formregis',[
                'code' => $code,
                'action' => 'update',
                'slug' => $slug
            ]);
        }
    }
}
