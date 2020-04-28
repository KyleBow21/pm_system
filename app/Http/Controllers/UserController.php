<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\User;
use App\Project;

class UserController extends Controller
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
        $user = Auth::user();

        // Get the users owned projects (supervisor only)
        try {
            $ownedProjects = DB::table('projects')->where('user_id', $user->id)->get();
        } catch (Exception $e) {
            dump($e);
            $ownedProjects = null;
        }

        // Get the users preferred projects
        try {
            $preferredProjectIds = DB::table('project_user')
                ->where('user_id', $user->id)
                ->get();
            $preferredProjects = collect();
            foreach ($preferredProjectIds as $id) {
                $preferredProjects->push(Project::find($id->project_id));
            }
        } catch (Exception $e) {
            dump($e);
            $preferredProjects = null;
        }

        // Get the users selected project
        try {
            $selectedProject = Project::find($user->selected_project);
        } catch (Exception $e) {
            dump($e);
            $selectedProject = null;
        }

        // Get the users marked project form
        try {
            $marks = DB::table('marking_forms')->where('project_id', $user->selected_project)->first();
        } catch (Exception $e) {
            dump($e);
            $marks = null;
        }

        return view('users.index')
            ->with('user', $user)
            ->with('selectedProject', $selectedProject)
            ->with('preferredProjects', $preferredProjects)
            ->with('ownedProjects', $ownedProjects)
            ->with('marks', $marks);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Show another users profile.
        $user = User::findOrFail($id);
        $projects = Project::where('user_id', $user->id)->get();
        return view('users.show')
            ->with('user', $user)
            ->with('projects', $projects);
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
