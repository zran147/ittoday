<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\VerificationCompetition;
use Illuminate\Support\Facades\Mail;

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
}
