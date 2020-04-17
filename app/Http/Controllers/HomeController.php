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
        // Good way you can check if someone is authenticated.
        if(Auth::check()) {
            // Get the user as a collection
            $user = Auth::user();
            // We can get everything from the above, including ID
            $id = $user->id;
            // Use DD to dump everything associated with a variable
            // dd($id);
            $usermodule = DB::table('Users')->where('id','=', $id)->get('module_id')->first();
            $projects = DB::table('projects')->where('user_id', '=', $id)->get();
            $modules = DB::table('modules')->where('id', '=', $usermodule->module_id)->get();
            $assignments = DB::table('assignments')->where('id', '=', $modules->first()->assignment_id)->get();
            $marks = Marks::all();
            $data = [
                'modules'  => $modules,
                'assignments'   => $assignments,
                'projects' => $projects,
                'marks' => $marks
            ];
            return view('home')->with($data);
        }
        else {
            // Will always return the user to the login page if they are not logged in (only applicable to the home page here!)
            return view('login');
        }

    }
}
