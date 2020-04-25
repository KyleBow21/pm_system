<?php

namespace App\Http\Controllers;

use App\Marks;
use Illuminate\Http\Request;

class MarksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // If allowed, redirect to create marking form page
        if (Gate::allows('create-marking-form')) {
            return view('marks.create');
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
        // Store Marking Form to DB
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Marks  $marks
     * @return \Illuminate\Http\Response
     */
    public function show(Marks $marks)
    {
        // Show Marking Form for Project
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Marks  $marks
     * @return \Illuminate\Http\Response
     */
    public function edit(Marks $marks)
    {
        // Edit Marking Form for Project
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Marks  $marks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Marks $marks)
    {
        // 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Marks  $marks
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marks $marks)
    {
        //
    }
}
