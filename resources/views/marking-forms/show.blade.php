@extends('layouts.app')

@section('content')
<div class="container-fluid h-100">
    <div class="row justify-content-center h-100">
        <div class="col-md-12 px-5">
            <h3 class="page-header">Marking Form</h3>

            <!-- Split up different sections of information into their own cards for a more uniform look -->
            <div class="card h-100">            
            <div class="card-header">Details</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Display for staff & admin only -->
                    @auth
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="section-header">Project Information</h4>
                            <div class="form-row my-4">
                                <div class="form-group col">
                                    <label>Student Name</label>
                                    <input type="text" value="{{$markingForm->student_name}}" class="form-control" disabled>
                                </div>
                                <div class="form-group col">
                                    <label>Project ID</label>
                                    <input type="text" value="{{$markingForm->project_id}}" class="form-control" disabled>
                                </div>
                                <div class="form-group col">
                                    <label>Marker's Email</label>
                                    <input type="text" value="{{$markingForm->markers_email}}" class="form-control" disabled>
                                </div>
                                <div class="form-group col">
                                    <label>Marker's Type</label>
                                    <input type="text" value="{{$markingForm->markers_type}}" class="form-control" disabled>
                                </div>
                                <div class="form-group col">
                                    <label>Module Code</label>
                                    <input type="text" value="{{$markingForm->module_code}}" class="form-control" disabled>
                                </div>
                            </div>

                            <!-- Quality of Product -->
                            <h4 class="section-header">Quality of Product (25%)</h4>
                            <div class="form-row my-5">
                                <div class="form-group col-4">
                                    <label>Final Product Delivered</label>
                                    <input type="text" value="{{$markingForm->final_product_grade}}" class="form-control" disabled>
                                </div>
                                <div class="form-group col-4">
                                    <label>Amount of Work Completed</label>
                                    <input type="text" value="{{$markingForm->work_completed_grade}}" class="form-control" disabled>
                                </div>
                                <div class="form-group col-4">
                                    <label>Qualitative Comparison with Current Tech</label>
                                    <input type="text" value="{{$markingForm->comp_with_tech_grade}}" class="form-control" disabled>                                    
                                </div>
                            </div>

                            <!-- Quality of Processes -->
                            <h4 class="section-header">Quality of Processes (25%)</h4>
                            <div class="form-row my-5">
                                <div class="form-group col-4">
                                    <label>Project Definition</label>
                                    <input type="text" value="{{$markingForm->proj_definition_grade}}" class="form-control" disabled>  
                                </div>
                                <div class="form-group col-4">
                                    <label>Analysis of Problem and Design of Solution</label>
                                    <input type="text" value="{{$markingForm->problem_solution_grade}}" class="form-control" disabled>  
                                </div>
                                <div class="form-group col-4">
                                    <label>Testing of Final Product</label>
                                    <input type="text" value="{{$markingForm->final_testing_grade}}" class="form-control" disabled>  
                                </div>
                            </div>

                            <!-- Quality of Evaluation -->
                            <h4 class="section-header">Quality of Evaluation (25%)</h4>
                            <div class="form-row my-5">
                                <div class="form-group col-6">
                                    <label>Evaluation and testing of the work produced</label>
                                    <input type="text" value="{{$markingForm->eval_work_grade}}" class="form-control" disabled>  
                                </div>
                                <div class="form-group col-6">
                                    <label>Critical analysis of the project and potential improvements</label>
                                    <input type="text" value="{{$markingForm->critical_analysis_grade}}" class="form-control" disabled>  
                                </div>
                            </div>

                            <!-- Quality of Presentation -->
                            <h4 class="section-header">Quality of Presentation (25%)</h4>
                            <div class="form-row my-5">
                                <div class="form-group col-4">
                                    <label>Organisation of the dissertation</label>
                                    <input type="text" value="{{$markingForm->org_diss_grade}}" class="form-control" disabled>  
                                </div>
                                <div class="form-group col-4">
                                    <label>English, grammar and punctuation</label>
                                    <input type="text" value="{{$markingForm->lang_grade}}" class="form-control" disabled>  
                                </div>
                                <div class="form-group col-4">
                                    <label>Use of tables, figures and references</label>
                                    <input type="text" value="{{$markingForm->figures_ref_grade}}" class="form-control" disabled>  
                                </div>
                            </div>

                            <!-- Supervisor Only -->
                            <h4 class="section-header">Supervisor Only</h4>
                            <div class="form-row my-5">
                                <div class="form-group col-6">
                                    <label>Independance of the work carried out</label>
                                    <input type="text" value="{{$markingForm->ind_work_grade}}" class="form-control" disabled>  
                                </div>
                                <div class="form-group col-6">
                                    <label>Attendance of supervised meetings</label>
                                    <input type="text" value="{{$markingForm->attendance_grade}}" class="form-control" disabled>  
                                </div>
                            </div>

                            <!-- Comments and Final Mark -->
                            <h4 class="section-header">Comments & Final Mark</h4>
                            <div class="form-row">
                                <div class="form-group col">
                                    <textarea class="form-control" disabled>
                                        {{$markingForm->comments}}
                                    </textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-8">
                                    <input type="text" value="{{$markingForm->final_mark}}" class="form-control" disabled>
                                </div>
                                <!-- Convert page to PDF -->
                                <div class="form-group col-4">
                                    <a class="btn btn-info form-control" href="javascript:window.print()" id="print">Print to PDF</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endauth
                    <!-- End staff only -->

                    <!-- Display for students only -->
                    @auth()

                    @endauth
                    <!-- End students only -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
