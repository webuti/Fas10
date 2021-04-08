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

        return Inertia::render('Partners/ApproveList',
            [
                'sent' => Partner::where('sender_team_id', Auth::user()->current_team_id)->where('status', 1)->with(['team'])->paginate(),
                'received' => Partner::where('receiver_team_id', Auth::user()->current_team_id)->where('status', 1)->with(['team'])->paginate(),
                'approved' => Partner::where('receiver_team_id', Auth::user()->current_team_id)->where('status', 2)->with(['team'])->paginate(),
            ]);
    }

    public function approve(Request $request)
    {


        $updateStatus = Partner::whereIn('status', [1, 2])->where('id', $request->input('id'))->where('receiver_team_id', Auth::user()->current_team_id);
        if ($updateStatus) {


            $updateStatusId = $updateStatus->first();
            if ($updateStatus->update(['status' => $request->input('status')])) {

                Partner::create(['sender_team_id' => Auth::user()->current_team_id, 'status' => 2, 'receiver_team_id' => $updateStatusId->sender_team_id]);

                return Redirect::route('partners.approve');


            }
        }


    }

    public function tasks()
    {

        return Inertia::render('Partners/Projects',
            ['teams' => Partner::teamlist()->paginate(),
                'projects' => Project::with(['team'])->owned()->paginate()]);


    }


    public function projects($teamId)
    {
        return Inertia::render('Partners/Projects',
            ['teams' => Partner::teamlist()->paginate(),
                'teamId' => $teamId,
                'projects' => Project::with(['team'])->owned()->where('team_id', $teamId)->paginate()]);
    }

    public function projectDetail($teamId, $projectId)
    {
        return Inertia::render('Partners/Projects',
            ['teams' => Partner::teamlist()->paginate(),
                'teamId' => $teamId,
                'projectId' => $projectId,
                'projects' => Project::with(['team'])->owned()->where('team_id', $teamId)->paginate(),
                'projectDetail' => Project::where('id', $projectId)->with('notes.user')->owned()->first(),
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

        if (Auth::check()) {
            Partner::create(['status' => 1, 'sender_team_id' => Auth::user()->current_team_id, 'receiver_team_id' => $request->input('team_id')]);

        }
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
