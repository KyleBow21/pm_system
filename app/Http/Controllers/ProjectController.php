<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Project;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class ProjectController extends Controller
{
    public function __construct() 
    {
        // Apply auth requirement    
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // * Get all projects and redirect to projects.index.php
        $projects = Project::orderBy('project_name', 'asc')->get();
        $user = Auth::user();
        if(Auth::check()) {
            $token = $user->api_token;
        } else {
            return view('login');
        }

        // We will check if the user has already selected their projects
        // Very janky way of doing it, but it works and we got no time!
        try {
            if(DB::table('project_user')->where('user_id', $user->id)->count() == 5) {
                $canSelectProjects = false;
            } else {
                $canSelectProjects = true;
            }                
        } catch (Exception $e) {
            dd($e);
        }
        
        // Pretty sure there's a more concise way to pass muliple variables but OH WELL
        return view('projects.index')->with('projects', $projects)->with('user', $user)->with('token', $token)->with('canSelectProjects', $canSelectProjects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::allows('create-project')) {
            return view('projects.create');
        } else {
            return redirect('/')->with('error', 'Unauthorized');
        }
        
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

        // Okay, time to make the project instance to store in the database
        $project = new Project;
        $project->project_name = $request->input('projectName');
        $project->project_year = $request->input('projectYear');
        $project->project_type = $request->input('projectType');
        $project->project_description = $request->input('projectDescription');
        $project->project_capacity = $request->input('projectCapacity');
        // Get the current user ID, user must be logged in for this to work!
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
        if(DB::table('project_user')->where('project_id', $project->id)->count() == $project->project_capacity) {
            $isProjectFull = true;
        }
        else {
            $isProjectFull = false;
        }

        $supervisor = User::findOrFail($project->user_id);
        return view('projects.show')->with('project', $project)->with('supervisor', $supervisor)->with('isProjectFull', $isProjectFull);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Redirect the user to the project creation page, but with fields already filled in.
        $project = Project::findOrFail($id);

        // Check if the user is allowed to edit projects
        if(Gate::allows('edit-project')) {
            if(Auth::user()->id !== $project->user_id) {
                // Send 'em back to where they belong!
                return redirect('/projects')->with('error', 'Unauthorized!');
            } else {
                // Go to the project edit view with the project data.
                return view('projects.edit')->with('project', $project);
            }    
        } else {
            return redirect('/projects')->with('error', 'Unauthorized!');
        }
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
        // TODO: Add the auth gate for this!
        // Save the edits that have been made to the project

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

        // Okay, time to make the project instance to store in the database
        $project = Project::find($id);
        $project->project_name = $request->input('projectName');
        $project->project_year = $request->input('projectYear');
        $project->project_type = $request->input('projectType');
        $project->project_description = $request->input('projectDescription');
        $project->project_capacity = $request->input('projectCapacity');
        $project->project_attachment = $fileNameToStore;
        $project->update();
        
        return redirect('/projects/'.$id)->with('success', 'Project Updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the project that was selected for deletion
        $project = Project::findOrFail($id);

        // Check if user is allowed to delete projects
        if(Gate::allows('delete-project')) {
            // Check if a user is logged in and owns the project
            if(Auth::user()->id !== $project->user_id) {
                return redirect('/projects')->with('error', 'Unauthorized');
            } else {
                // Delete the project and redirect back to the projects index page.
                $project->delete();
                return redirect('/projects')->with('success', 'Project '.$project->project_name.' deleted');
            }
        } else {
            return redirect('/projects')->with('error', 'Unauthorized');
        }        
    }

    public function submitChoices(Request $request) 
    {
        // Decode the JSON array to something PHP understands
        $selectedProjects = json_decode($request->selected_projects);
        $user_id = Auth::user()->id;

        // For each entry in the array, insert a new record into the "project_user" table
        foreach($selectedProjects as $project_id) {
            DB::table('project_user')->insertOrIgnore([
                ['project_id' => $project_id, 'user_id' => $user_id]
            ]);
        }

        return redirect('/')->with('success', 'Selected Projects Submitted!');
    }
}
