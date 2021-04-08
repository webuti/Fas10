<?php

namespace App\Http\Controllers;

use App\Models\ProjectTask;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Redirect; 
use Illuminate\Support\Facades\Auth;

class ProjectTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
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
       
        ProjectTask::firstOrCreate([
            'user_id' => Auth::user()->id,
            'project_id' => $request->input('project_id'),
            'team_id' => $request->input('team_id'),
            'body' => $request->input('body'), 
        ]);

        return Redirect::route('partners.projectDetail', [
            'teamId' => $request->input('team_id'),
            'projectId' => $request->input('project_id'),
        ]); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectTask  $projectTask
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
        return ProjectTask::where('user_id',Auth::user()->id)->where('project_id',$id)->orderBy('id','desc')->paginate();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectTask  $projectTask
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectTask $projectTask)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjectTask  $projectTask
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectTask $projectTask)
    {
      if($request->input('status_id') === 1){
        return  ProjectTask::where('user_id',Auth::user()->id)->where('id',$request->input('id'))->update(['status_id' => null]);
      }
      else{
        return ProjectTask::where('user_id',Auth::user()->id)->where('id',$request->input('id'))->update(['status_id' => 1]);  
      }

      

    

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectTask  $projectTask
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectTask $projectTask)
    {
        //
    }
}
