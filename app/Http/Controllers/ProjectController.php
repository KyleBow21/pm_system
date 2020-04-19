<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Project;
use App\User;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function __construct() {
        // This 
        // $this->middleware('auth', ['except' => ['index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // * Get all projects and redirect to projects.index.php
        // ? Possibly implement the feature to get only projects that apply to the current user?
        $projects = Project::orderBy('project_name', 'asc')->get();
        $user = Auth::user();
        return view('projects.index')->with('projects', $projects)->with('user', $user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request so we know that the user actually wrote something
        // The PDF part will have it's name changed to something that makes more sense
        $this->validate($request, [
            'projectName' => 'required',
            'projectType' => 'required',
            'projectYear' => 'required|integer',
            'projectCapacity' => 'required|integer',
            'pdf' => 'nullable|max:1999'
        ]);

        // Upload the file (probably a much better way to do this, but it works!)
        if($request->hasFile('pdf')) {
            // Here we will generate an appropriate name for the file to be stored with
            // Get file name
            $fileNameWithExt = $request->file('pdf')->getClientOriginalName();

            // Get filename without extension
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            // Get the file extension
            $extension = $request->file('pdf')->getClientOriginalExtension();

            // Create filename that we will store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;

            // Store the file
            $fileNameToStore = str_replace(' ', '', $fileNameToStore);
            $path = $request->file('pdf')->storeAs('public/docs', $fileNameToStore);
        } else {
            // This is from old code, will refine.
            $fileNameToStore = 'nofile.pdf';
        }

        // Okay, time to make the project to store in the database
        $project = new Project;
        $project->project_name = $request->input('projectName');
        $project->project_year = $request->input('projectYear');
        $project->project_type = $request->input('projectType');
        $project->project_description = $request->input('projectDescription');
        $project->project_capacity = $request->input('projectCapacity');
        $project->user_id = Auth::user()->id;
        $project->project_attachment = $fileNameToStore;
        $project->save();
        
        return redirect('/projects/'.$project->id)->with('success', 'Project Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::findOrFail($id);
        return view('projects.show')->with('project', $project);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
