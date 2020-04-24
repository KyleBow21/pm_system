<?php

namespace App\Http\Controllers;

use App\Assignment;
use App\Marks;
use App\Project;
use Illuminate\Http\Request;
use App\Module;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Good way you can check if someone is authenticated.
        if(Auth::check()) {
            $uid = Auth::id();

            // Get all projects that the user has selected
            $projectSelections = DB::table('project_user')->where('user_id', $uid)->get();

            // Create a new Laravel collection
            $projects = collect();

            // For each selected project, find and push to collection
            foreach($projectSelections as $project) {
                $projects->push(Project::findOrFail($project->project_id));
            }

            // Put all data in an array and send to view
            $data = [
                'projects' => $projects
            ];

            return view('home')->with($data);
        }
        else {
            // Will always return the user to the login page if they are not logged in (only applicable to the home page here!)
            return view('login');
        }

    }
}
