<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\Service;
use App\Models\Team;
use Illuminate\Http\Request;
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

    public function catalog($type)
    {
        if ($sector = \App\Models\Sector::where('seo_url', $type)->first()) {
            $companies = \App\Models\Team::with(['services.service', 'city'])->filtered()->sector($sector->id)->get();

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


        return Inertia::render('Catalog/CompanyDetail', [
            'company' => \App\Models\Team::with(['services.service', 'city', 'country'])->where("id", $id)->first(),
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
