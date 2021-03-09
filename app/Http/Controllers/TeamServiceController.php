<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\TeamService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TeamServiceController extends Controller
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

    /**
     * Display the specified resource.
     *
     * @param \App\Models\TeamService $teamService
     * @return \Illuminate\Http\Response
     */
    public function show(TeamService $teamService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\TeamService $teamService
     * @return \Illuminate\Http\Response
     */
    public function edit(TeamService $teamService)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TeamService $teamService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TeamService $teamService, Team $team)
    {

        DB::beginTransaction();
        if (Auth::user()->current_team_id === $team->id) {
            try {
                $teamService->where('team_id', $team->id)->delete();
                foreach ($request->input('services') as $serviceId) {
                    if (isset($serviceId)) {
                        $teamService::create([
                            'team_id' => $team->id,
                            'service_id' => $serviceId,
                            'sector_id' => $team::currentTeamSectorId(),
                        ]);
                    }
                }
                DB::commit();

                return redirect()->back();
            } catch (\Exception $e) {
                DB::rollBack();
            }
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\TeamService $teamService
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeamService $teamService)
    {
        //
    }
}
