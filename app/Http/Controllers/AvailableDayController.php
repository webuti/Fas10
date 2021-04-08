<?php

namespace App\Http\Controllers;

use App\Models\AvailableDay;
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
        return Inertia::render('AvailableDays/Index', [
            'teamId' => Auth::user()->current_team_id,
            'dates' => AvailableDay::where('team_id', Auth::user()->current_team_id)->paginate()
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
            return Redirect::route('availableday.index');
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
    public function show(AvailableDay $availableDay)
    {
        //
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
        return Redirect::route('availableday.index');

    }
}
