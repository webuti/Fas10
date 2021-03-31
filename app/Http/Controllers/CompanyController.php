<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\Partner;
use App\Models\Service;
use App\Models\Sector;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class CompanyController extends Controller
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function catalog($type = false)
    {
        if (!$type) {
            $companies = \App\Models\Team::with(['services.service', 'city'])->filtered()->paginate();


            return Inertia::render('Catalog/Company', [
                'companies' => $companies,
                'cities' => City::all(),
                'countries' => Country::all(),
                'services' => Service::all(),
                'sectors' => Sector::all(),
                'sector' => false,
                'formData' => [
                    'city_id' => request()->input('city_id'),
                    'country_id' => request()->input('country_id', 1),
                    'services' => request()->input('services'),
                ],
            ]);
        }
        if ($sector = Sector::where('seo_url', $type)->first()) {
            $companies = \App\Models\Team::with(['services.service', 'city'])->filtered()->sector($sector->id)->paginate();


            return Inertia::render('Catalog/Company', [
                'companies' => $companies,
                'cities' => City::all(),
                'countries' => Country::all(),
                'services' => Service::all(),
                'sector' => $sector->seo_url,
                'formData' => [
                    'city_id' => request()->input('city_id'),
                    'country_id' => request()->input('country_id', 1),
                    'services' => request()->input('services'),
                ],
            ]);
        }


    }

    public function show($id)
    {


        if (Auth::check()) {
            $partnerStatus = Partner::select('status')->where('receiver_team_id', $id)->where('sender_team_id', Auth::user()->current_team_id)->firstOr(function () {
                return ['status' => 0];

            });
        } else {
            $partnerStatus = ['status' => 0];
        }
        return Inertia::render('Catalog/CompanyDetail', [
            'partnerStatus' => $partnerStatus,
            'company' => \App\Models\Team::with(array('comments.user' => function ($query) {
                $query->select('id', 'name');
            }, 'services.service', 'city', 'country'))->where("id", $id)->firstOrFail(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Team $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Team $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Team $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        //
    }
}
