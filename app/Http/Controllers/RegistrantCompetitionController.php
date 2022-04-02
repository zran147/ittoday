<?php

namespace App\Http\Controllers;

use App\Models\RegistrantCompetition;
use App\Http\Requests\StoreRegistrantCompetitionRequest;
use App\Http\Requests\UpdateRegistrantCompetitionRequest;

class RegistrantCompetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexdetailregistrantcompetitionbycompetitiondashboard($slug, $namereg)
    {
        return view('dashboard.registrantcompetition.detailregistrantcompetition');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
