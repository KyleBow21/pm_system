<?php

namespace App\Http\Controllers;

use App\Assignment;
use App\Marks;
use App\Project;
use Illuminate\Http\Request;
use App\Module;

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
        $modules = Module::all();
        $assignments = Assignment::all();
        $projects = Project::all();
        $marks = Marks::all();
        $data = [
            'modules'  => $modules,
            'assignments'   => $assignments,
            'projects' => $projects,
            'marks' => $marks
        ];
        return view('home')->with($data);
    }
}
