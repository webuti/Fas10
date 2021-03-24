<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\Partner;
use App\Models\Project;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Partners/Index',
            ['teams' => Team::paginate(),
                'projects' => Project::paginate()]);
    }

    public function projects($teamId)
    {
        return Inertia::render('Partners/Index',
            ['teams' => Team::paginate(),
                'teamId' => $teamId,
                'projects' => Project::select('title', 'id', 'team_id', 'created_at')->where('team_id', $teamId)->paginate()]);
    }

    public function projectDetail($teamId, $projectId)
    {
        return Inertia::render('Partners/Index',
            ['teams' => Team::paginate(),
                'teamId' => $teamId,
                'projects' => Project::select('title', 'id', 'team_id', 'created_at')->where('team_id', $teamId)->paginate(),
                'projectDetail' => Project::where('id', $projectId)->with('notes.user')->first(),
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

        $request->validate(['team_id' => 'required']);

        Partner::create(['status' => 1, 'sender_team_id' => Auth::user()->current_team_id, 'receiver_team_id' => $request->input('team_id')]);
        return Redirect::route('companyDetail', $request->input('team_id'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Partner $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Partner $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Partner $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partner $partner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Partner $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
        //
    }
}
