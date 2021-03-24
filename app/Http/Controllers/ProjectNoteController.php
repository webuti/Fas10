<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\Project;
use App\Models\ProjectNote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProjectNoteController extends Controller
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
        $request->validate(['team_id' => 'required']);

        if (Project::where('user_id', Auth::user()->id)->where('id', $request->input('project_id'))->firstOrFail()) {


            ProjectNote::create(['project_id' => $request->input('project_id'), 'body' => $request->input('body'), 'team_id' => Auth::user()->current_team_id, 'user_id' => Auth::user()->id]);

            return Redirect::route('partners.projectDetail', [
                'teamId' => $request->input('team_id'),
                'projectId' => $request->input('project_id'),
            ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\ProjectNote $projectNote
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectNote $projectNote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\ProjectNote $projectNote
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectNote $projectNote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ProjectNote $projectNote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectNote $projectNote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\ProjectNote $projectNote
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectNote $projectNote)
    {
        //
    }
}
