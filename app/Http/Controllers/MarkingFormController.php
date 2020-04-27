<?php

namespace App\Http\Controllers;

use App\MarkingForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

use PDF;

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
        if(Gate::allows('view-marking-forms')) {
            $markingForms = MarkingForm::orderBy('id', 'asc')->get();
            return view('marking-forms.index')->with('markingForms', $markingForms);
        } else {
            return redirect('/')->with('error', 'Unauthorized');
        }
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
        // Validate the form
        $this->validate($request, [
            'student_name' => 'required',
            'project_id' => 'required|integer',
            'markers_email' => 'required',
            'markers_type' => 'required',
            'module_code' => 'required',
            'final_product_grade' => 'required',
            'work_completed_grade' => 'required',
            'comp_with_tech_grade' => 'required',
            'proj_definition_grade' => 'required',
            'problem_solution_grade' => 'required',
            'final_testing_grade' => 'required',
            'eval_work_grade' => 'required',
            'critical_analysis_grade' => 'required',
            'org_diss_grade' => 'required',
            'lang_grade' => 'required',
            'figures_ref_grade' => 'required',
            'ind_work_grade' => 'required',
            'attendance_grade' => 'required',
            'comments' => 'string',
            'final_mark' => 'required|integer'
        ]);

        // Create a new Marking Form instance and save to DB
        $form = new MarkingForm();

        // Project Information
        $form->project_id = $request->input('project_id');
        $form->student_name = $request->input('student_name');
        $form->markers_email = $request->input('markers_email');
        $form->markers_type = $request->input('markers_type');
        $form->module_code = $request->input('module_code');

        // Quality of Product
        $form->final_product_grade = $request->input('final_product_grade');
        $form->work_completed_grade = $request->input('work_completed_grade');
        $form->comp_with_tech_grade = $request->input('comp_with_tech_grade');

        // Quality of Processes
        $form->proj_definition_grade = $request->input('proj_definition_grade');
        $form->problem_solution_grade = $request->input('problem_solution_grade');
        $form->final_testing_grade = $request->input('final_testing_grade');

        // Quality of Evaluation
        $form->eval_work_grade = $request->input('eval_work_grade');
        $form->critical_analysis_grade = $request->input('critical_analysis_grade');

        // Quality of Presentation
        $form->org_diss_grade = $request->input('org_diss_grade');
        $form->lang_grade = $request->input('lang_grade');
        $form->figures_ref_grade = $request->input('figures_ref_grade');

        // Supervisor only
        $form->ind_work_grade = $request->input('ind_work_grade');
        $form->attendance_grade = $request->input('attendance_grade');

        // Overall comments & final mark
        $form->comments = $request->input('comments');
        $form->final_mark = $request->input('final_mark');
        
        // Misc
        $form->is_technical = $request->input('is_technical');

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
    public function show($id)
    {
        // Show a marking form for a certain project
        $markingForm = MarkingForm::find($id);
        if(Gate::allows('view-marking-forms')) {
            return view('marking-forms.show')->with('markingForm', $markingForm);
        } else {
            return redirect('/')->with('error', 'Unauthorized!');
        }
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

    public function printToPdf($id) 
    {
        $data = MarkingForm::find($id)->toArray();
        // Make a gate here

        $pdf = PDF::loadView('marking-forms.pdf', $data);
        return $pdf->download('marking-form.pdf');
    }
}
