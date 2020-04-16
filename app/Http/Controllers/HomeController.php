<?php

namespace App\Http\Controllers;

use App\Assignment;
use App\Marks;
use App\Project;
use Illuminate\Http\Request;
use App\Module;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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
        $user = Auth::user();
        $id = Auth::id();
        $projects = DB::table('projects')->where('user_id', '=', $id)->get();
        $modules = Module::all();
        $assignments = Assignment::all();
        //$projects = Project::all();
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
