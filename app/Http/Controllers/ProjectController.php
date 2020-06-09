<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Project;
use App\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{

    /** Validate projects input
     * 
     * @return \Illuminate\Support\Facades\Validator
     * 
     */
    public function validateRequest(Request $request)
    {
        return Validator::make($request->all(), [ 
            'name' => 'required',
            'description' => 'required',
            'deadline' => 'required'
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::where('user_id',Auth::id())->get();
        return response()->json($projects);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validateRequest($request);
        
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], Controller::$HTTP_BAD_REQUEST);            
        }

        $project = new Project();
        $project->name = $request->input('name');
        $project->description = $request->input('description');
        $project->deadline = $request->input('deadline');
        $project->user_id = Auth::id();
        $project->save();
        return response()->json($project);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);
        if ($project){
            $tasks = Task::where('project_id',$project->id)->get();
            $project->tasks = $tasks; 
            return response()->json($project);
        }
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = $this->validateRequest($request);
        
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], Controller::$HTTP_BAD_REQUEST);            
        }
        $project = Project::find($id);
        $project->name = $request->input('name');
        $project->description = $request->input('description');
        $project->deadline = $request->input('deadline');
        $project->save();
        return response()->json($project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        if($project){
            $project->delete();
            return response()->json('Projeto deletado');
        }
        abort(404);
    }
}
