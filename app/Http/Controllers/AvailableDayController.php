<?php

namespace App\Http\Controllers;

use App\Models\AvailableDay;
use Illuminate\Http\Request;
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
        //
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
    public function destroy(AvailableDay $availableDay)
    {
        //
    }
}
