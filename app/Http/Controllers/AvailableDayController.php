<?php

namespace App\Http\Controllers;

use App\Models\AvailableDay;
use App\Models\Team;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class AvailableDayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('AvailableDays/Create', [
            'teamId' => Auth::user()->current_team_id,
            'dates' => AvailableDay::where('team_id', Auth::user()->current_team_id)->paginate()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $period = CarbonPeriod::create($request->input('startDate'), $request->input('endDate'));
        if ($period) {
            foreach ($period as $date) {

                AvailableDay::firstOrCreate([
                    'team_id' => Auth::user()->current_team_id,
                    'date' => $date->format('Y-m-d'),
                ]);

            }
            return Redirect::route('availableday.create');
        }

        /*
         *
        */
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\AvailableDay $availableDay
     * @return \Illuminate\Http\Response
     */
    public function show($teamId, AvailableDay $availableDay)
    {

        return Inertia::render('AvailableDays/Show', [
            'team' => Team::where('id', $teamId)->first(),
            'dates' => AvailableDay::where('team_id', $teamId)->paginate()
        ]);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\AvailableDay $availableDay
     * @return \Illuminate\Http\Response
     */
    public function edit(AvailableDay $availableDay)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\AvailableDay $availableDay
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AvailableDay $availableDay)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\AvailableDay $availableDay
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, AvailableDay $availableDay)
    {


        AvailableDay::where('team_id', Auth::user()->current_team_id)->where('id', $request->input('id'))->delete();
        return Redirect::route('availableday.create');

    }
}
