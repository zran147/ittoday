<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\VerificationCompetition;
use Illuminate\Support\Facades\Mail;
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
}
