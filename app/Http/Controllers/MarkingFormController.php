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
        dd($request);
        // Validate the form
        $this->validate($request, [
            'studentName' => 'required',
            'project_id' => 'required|integer',
            'markers_email' => 'required',
            'markers_type' => 'required',
            'module_code' => 'required',
            'final_prod_grade' => 'required',
            'work_completed_grade' => 'required',
            'comp_with_tech_grade' => 'required',
            'proj_def_grade' => 'required',
            'prob_sol_grade' => 'required',
            'final_testing_grade' => 'required',
            'eval_work_grade' => 'required',
            'crit_analysis_grade' => 'required',
            'org_diss_grade' => 'required',
            'lang_grade' => 'required',
            'figures_ref_grade' => 'required',
            'ind_work_grade' => 'required',
            'attendance_grade' => 'required',
            'comments' => 'string',
            'final_mark' => 'required|integer'
        ]);
        dd("Past Validation");

        // Create a new Marking Form instance and save to DB
        $form = new MarkingForm();

        // Project Information
        $form->student_name = $request->input('project_id');
        $form->student_name = $request->input('student_name');
        $form->student_name = $request->input('markers_email');
        $form->student_name = $request->input('markers_type');
        $form->student_name = $request->input('module_code');

        // Quality of Product
        $form->student_name = $request->input('final_product_grade');
        $form->student_name = $request->input('work_completed_grade');
        $form->student_name = $request->input('comp_with_tech_grade');

        // Quality of Processes
        $form->student_name = $request->input('proj_definition_grade');
        $form->student_name = $request->input('problem_solution_grade');
        $form->student_name = $request->input('final_testing_grade');

        // Quality of Evaluation
        $form->student_name = $request->input('eval_work_grade');
        $form->student_name = $request->input('critical_analysis_grade');

        // Quality of Presentation
        $form->student_name = $request->input('org_diss_grade');
        $form->student_name = $request->input('lang_grade');
        $form->student_name = $request->input('figures_ref_grade');

        // Supervisor only
        $form->student_name = $request->input('ind_work_grade');
        $form->student_name = $request->input('attendance_grade');

        // Overall comments & final mark
        $form->student_name = $request->input('comments');
        $form->student_name = $request->input('final_mark');
        
        // Misc
        $form->student_name = $request->input('is_technical');

        // Commit the instance to the DB
        $form->save();

        return redirect('/')->with('success', 'Marked Successfully!');
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
