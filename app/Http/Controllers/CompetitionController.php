<?php

namespace App\Http\Controllers;
use App\Models\Competition;
use Illuminate\Support\Facades\Crypt;

class CompetitionController extends Controller
{
    public function indexdashboard()
    {
        return view('dashboard.competition.indexdashboardcontroller');
    }
    public function createdashboard()
    {
        return view('dashboard.competition.createdashboardcontroller',[
            'action' => 'Store',
            'id_competition' => Null,
        ]);
    }
    public function indexdetaildashboard()
    {
        return view('dashboard.detailcompetition.detailcompetition');
    }
    public function editdashboard($idevent)
    {
        $idevent = Crypt::decrypt($idevent);
        return view('dashboard.competition.createdashboardcontroller', [
            'action' => 'Update',
            'id_competition' => $idevent,
        ]);
    }
    public function index()
    {
        return view('competition.indexcontroller',[
            'event' => Competition::where('active','published')->with('timcompetition')->get()
        ]);
    }
    public function show($slug)
    {
        $competition = Competition::where('slug_competition',$slug)->first();
        return view('competition.show.'.$slug,[
            'compe' => $competition
        ]);
    }
}
