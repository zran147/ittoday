<?php

namespace App\Http\Controllers;

use App\Models\TimCompetition;
use App\Http\Requests\StoreTimCompetitionRequest;
use App\Http\Requests\UpdateTimCompetitionRequest;

class TimCompetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexdetailtimcompetitionbyslugdashboard($slug)
    {
        $name_competition = str_replace("-", " ", $slug);
        return view('dashboard.detailcompetition.detailcompetition', [
            'name_competition' => $name_competition
        ]);
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
     * @param  \App\Http\Requests\StoreTimCompetitionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTimCompetitionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TimCompetition  $timCompetition
     * @return \Illuminate\Http\Response
     */
    public function show(TimCompetition $timCompetition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TimCompetition  $timCompetition
     * @return \Illuminate\Http\Response
     */
    public function edit(TimCompetition $timCompetition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTimCompetitionRequest  $request
     * @param  \App\Models\TimCompetition  $timCompetition
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTimCompetitionRequest $request, TimCompetition $timCompetition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TimCompetition  $timCompetition
     * @return \Illuminate\Http\Response
     */
    public function destroy(TimCompetition $timCompetition)
    {
        //
    }
}
