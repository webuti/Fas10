<?php

namespace App\Http\Controllers;

use App\Models\BidOffer;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class BidOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'price' => ['required', 'min:3'],
            'bid_id' => ['required'],
        ]);


        $input = $request->all();
        $input['team_id'] = Auth::user()->current_team_id;
        if (BidOffer::create($input)) {
            return Redirect::route('bidDetail', $request->input('bid_id'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BidOffer  $bidOffer
     * @return \Illuminate\Http\Response
     */
    public function show(BidOffer $bidOffer)
    {



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BidOffer  $bidOffer
     * @return \Illuminate\Http\Response
     */
    public function edit(BidOffer $bidOffer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BidOffer  $bidOffer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BidOffer $bidOffer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BidOffer  $bidOffer
     * @return \Illuminate\Http\Response
     */
    public function destroy(BidOffer $bidOffer)
    {
        //
    }
}
