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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRegistrantCompetitionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRegistrantCompetitionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RegistrantCompetition  $registrantCompetition
     * @return \Illuminate\Http\Response
     */
    public function show(RegistrantCompetition $registrantCompetition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RegistrantCompetition  $registrantCompetition
     * @return \Illuminate\Http\Response
     */
    public function edit(RegistrantCompetition $registrantCompetition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRegistrantCompetitionRequest  $request
     * @param  \App\Models\RegistrantCompetition  $registrantCompetition
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRegistrantCompetitionRequest $request, RegistrantCompetition $registrantCompetition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RegistrantCompetition  $registrantCompetition
     * @return \Illuminate\Http\Response
     */
    public function destroy(RegistrantCompetition $registrantCompetition)
    {
        //
    }
}
