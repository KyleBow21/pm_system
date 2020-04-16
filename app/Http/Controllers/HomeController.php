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
//        $user = Auth::user();
//        $id = Auth::id();
//        $usermodule = DB::table('Users')->where('id','=', $id)->get('module_id')->first();
//        $projects = DB::table('projects')->where('user_id', '=', $id)->get();
//        $modules = DB::table('modules')->where('id', '=', $usermodule->module_id)->get();
//
//        $assignments = DB::table('assignments')->where('id', '=', $modules->first()->assignment_id)->get();
//        //$projects = Project::all();
        //Temp fix till I get food.
        $marks = Marks::all();
        $modules = Module::all();
        $assignments = Assignment::all();
        $projects = Project::all();
        $data = [
            'modules'  => $modules,
            'assignments'   => $assignments,
            'projects' => $projects,
            'marks' => $marks
        ];
        return view('home')->with($data);
    }
}
