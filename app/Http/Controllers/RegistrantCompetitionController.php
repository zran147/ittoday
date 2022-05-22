<?php

namespace App\Http\Controllers;

use App\Models\RegistrantCompetition;
use App\Http\Requests\StoreRegistrantCompetitionRequest;
use App\Http\Requests\UpdateRegistrantCompetitionRequest;
use \PDF;

class RegistrantCompetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexdetailregistrantcompetitionbycompetitiondashboard($slug, $namereg)
    {
        return view('dashboard.registrantcompetition.detailregistrantcompetition',[
            'name_competition' => $slug,
            'name_tim' => $namereg,
        ]);
    }
    public function indexdetailregistrantcompetitionbycompetitiondashboardposter($slug, $namereg)
    {
        return view('dashboard.registrantcompetition.detailregistrantcompetitionposter',[
            'name_competition' => $slug,
            'name_tim' => $namereg,
        ]);
    }
    public function indexdetailregistrantcompetitionbycompetitiondashboardpdf($slug, $namereg)
    {
        // $pdf = PDF::loadView('dashboard.registrantcompetition.detailregistrantcompetition',[
        //     'name_competition' => $slug,
        //     'name_tim' => $namereg,
        // ])->setOptions(['defaultFont' => 'sans-serif']);

        // return $pdf->download('user.pdf');
        // return view('dashboard.registrantcompetition.detailregistrantcompetition',[
        //     'name_competition' => $slug,
        //     'name_tim' => $namereg,
        // ]);
        return redirect('/');
    }
}
