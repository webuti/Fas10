<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class BidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Bids/Index', [
            'data' => Bid::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Bids/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $input = $request->all();

        if (Bid::create([
            'title' => $input['title'],
            'description' => $input['description'],
            'sector_id' => $input['sector_id'],
            'user_id' => Auth::user()->id,
            'team_id' => Auth::user()->current_team_id,

        ])) {
            $request->session()->flash('status', 'İlan başarılı olarak eklendi');
            return Redirect::route('bids.index');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Bid $bid
     * @return \Illuminate\Http\Response
     */
    public function show(Bid $bid)
    {

        return Inertia::render('Bids/Show', [
            'bid' => $bid
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Bid $bid
     * @return \Illuminate\Http\Response
     */
    public function edit(Bid $bid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Bid $bid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bid $bid)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Bid $bid
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bid $bid)
    {
        //
    }
}
