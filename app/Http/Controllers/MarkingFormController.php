<?php

namespace App\Http\Controllers;

use App\MarkingForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class MarkingFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Show all marking forms
        // Probably won't implement this
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grades = [
            '1st*' => '1st*',
            '1st' => '1st',
            '2.1' => '2.1',
            '2.2' => '2.2',
            '3rd' => '3rd',
            'tol_fail' => 'Tolerated Fail',
            'fail' => 'Fail',
            'n/a' => 'N/A'
        ];
        // Create a new marking form
        if(Gate::allows('create-marking-form')) {
            return view('marking-forms.create')->with('grades', $grades);
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
        // Store the new marking form
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MarkingForm  $markingForm
     * @return \Illuminate\Http\Response
     */
    public function show(MarkingForm $markingForm)
    {
        // Show a marking form for a certain project
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MarkingForm  $markingForm
     * @return \Illuminate\Http\Response
     */
    public function edit(MarkingForm $markingForm)
    {
        // Edit the marking form
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MarkingForm  $markingForm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MarkingForm $markingForm)
    {
        // Update the marking form
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MarkingForm  $markingForm
     * @return \Illuminate\Http\Response
     */
    public function destroy(MarkingForm $markingForm)
    {
        // Remove the marking form
    }
}
