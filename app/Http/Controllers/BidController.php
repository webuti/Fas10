<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\City;
use App\Models\Country;
use App\Models\Image;
use App\Models\Sector;
use App\Models\Service;
use App\Models\Team;
use App\Models\User;
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
            'data' => Bid::owned()->get()
        ]);
    }


    public function catalog($type)
    {
        if ($sector = \App\Models\Sector::where('seo_url', $type)->first()) {
            $bids = \App\Models\Bid::sector($sector->id)->get();
            return Inertia::render('Catalog/Bid', [
                'bids' => $bids,
                'cities' => City::all(),
                'countries' => Country::all(),
                'services' => Service::all(),
            ]);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Bids/Create',
            ['sectors' => Sector::get(),
                'companySector' => Team::currentTeamSectorId()]);
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

            // Image::create([''])
            return Redirect::route('bids.index');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Bid $bid
     * @return \Illuminate\Http\Response
     */
    public function show(Bid $bid, User $user)
    {

        if (Auth::user()->id !== $bid->user_id) {

            session()->flash('status', 'Bu ilanı düzenleme yetkiniz yok');
            return Redirect::route('bids.index');

        }


        return Inertia::render('Bids/Show', [
            'bid' => $bid,
            'sectors' => Sector::get(),
            'companySector' => Team::currentTeamSectorId()
        ]);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Bid $bid
     * @return \Illuminate\Http\Response
     */
    public function edit(Bid $bid, User $user)
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
    public function update(Bid $bid, Request $request)
    {
        $input = $request->all();


        if (Auth::user()->id !== $bid->user_id) {

            session()->flash('status', 'Bu ilanı düzenleme yetkiniz yok');
            return Redirect::route('bids.index');

        }


        if ($bid->update([
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
