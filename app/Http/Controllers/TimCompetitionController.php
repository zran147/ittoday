<?php

namespace App\Http\Controllers;
use App\Models\TimCompetition;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\competition\CheckTimStatus;
use App\Models\Competition;
use App\Mail\VerificationCompetition;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

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
        $com = Competition::where('slug_competition',$slug)->with('timcompetition')->where('active','published')->first();
        if (!is_null($com->timcompetition->where('registrant_id',Auth::user()->id)->first())) {
           $code = TimCompetition::where('competition_id',$com->id)->where('registrant_id',Auth::user()->id)->first();
           return redirect('/competitions/'.$slug.'/regis/'.$code->code_uniq_tim);
        }

        if($com){
            if($com->start_registrasi_competition > Carbon::now()->format('Y-m-d') || $com->finish_registrasi_competition < Carbon::now()->format('Y-m-d')){
                return redirect()->back();
            }
        }else{
            return redirect('competitions');
        }

        return view('competition.regis.formregis',[
            'code' => null,
            'action' => 'create',
            'slug' => $slug
        ]);
    }

    public function createposter($slug)
    {
        $com = Competition::where('slug_competition',$slug)->with('timcompetition')->where('active','published')->first();
        if (!is_null($com->timcompetition->where('registrant_id',Auth::user()->id)->first())) {
           $code = TimCompetition::where('competition_id',$com->id)->where('registrant_id',Auth::user()->id)->first();
           return redirect('/competitions/'.$slug.'/regis/'.$code->code_uniq_tim.'/poster');
        }

        if($com){
            if($com->start_registrasi_competition > Carbon::now()->format('Y-m-d') || $com->finish_registrasi_competition < Carbon::now()->format('Y-m-d')){
                return redirect()->back();
            }
        }else{
            return redirect('competitions');
        }

        return view('competition.regis.formregisposter',[
            'code' => null,
            'action' => 'create',
            'slug' => $slug
        ]);
    }
    public function editposter($slug,$code)
    {
        $tim = TimCompetition::where('code_uniq_tim',$code)->with('membertimcompetition')->first();
        if ($tim->status_verification_tim != 'waiting verification administration') {
            CheckTimStatus::checktimstatus($tim);
        }
        if ($tim->registrant_id != Auth::user()->id) {
            return redirect('/');
        }else{
            return view('competition.regis.formregisposter',[
                'code' => $code,
                'action' => 'update',
                'slug' => null,
            ]);
        }
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
                'slug' => null,
            ]);
        }
    }
    public function verif()
    {
        $message = session()->get('message');
        $email = session()->get('email');
        $send = Mail::to($email)->send(new \App\Mail\VerificationCompetition($message));
        return redirect()->back()->with('success','email berhasil dikirim');
    }
}
