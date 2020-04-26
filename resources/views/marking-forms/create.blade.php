@extends('layouts.app')

@section('content')
<div class="container-fluid h-100">

    <div class="row justify-content-center mb-5">
        <div class="col-md-12 px-5">
            <h3 class="page-header">Create Marking Form</h3>
            <div class="card mt-3">
                <div class="card-header">
                    Project Details
                </div>

                <div class="card-body">
                @if(isset($autofill))
                <!-- If autofill contains data, fill the project details with it -->
                @else
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::open(['action' => 'MarkingFormController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                            <div class="form-row">
                                <div class="form-group col">
                                    {{Form::text('studentName', '', ['class' => 'form-control', 'placeholder' => 'Student Name...'])}}
                                </div>
                                <div class="form-group col">
                                    {{Form::text('projectId', '', ['class' => 'form-control', 'placeholder' => 'Project ID...'])}}
                                </div>
                                <div class="form-group col">
                                    {{Form::text('markersEmail', '', ['class' => 'form-control', 'placeholder' => 'Marker\'s Email...'])}}
                                </div>
                                <div class="form-group col">
                                    {{Form::text('markersType', '', ['class' => 'form-control', 'placeholder' => 'Marker\'s Type...'])}}
                                </div>
                                <div class="form-group col">
                                    {{Form::text('moduleCode', '', ['class' => 'form-control', 'placeholder' => 'Module Code...'])}}
                                </div>
                            </div>
                    </div>
                </div>
                @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mb-5">
        <div class="col-md-12 px-5">
            <div class="card">
            <div class="card-header">
                Marking Criteria
            </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- TODO: Could do with some better structure -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Quality of Product -->
                            <h4 class="section-header">Quality of Product (25%)</h4>
                            <div class="form-row my-5">
                                <div class="form-group col-4">
                                    <label>Final Product Delivered</label>
                                    {{Form::select('final_prod_grade', $grades, null, ['class' => 'form-control', 'placeholder' => 'Grade...'])}}
                                </div>
                                <div class="form-group col-4">
                                    <label>Amount of Work Completed</label>
                                    {{Form::select('work_completed_grade', $grades, null, ['class' => 'form-control', 'placeholder' => 'Grade...'])}}
                                </div>
                                <div class="form-group col-4">
                                    <label>Qualitative Comparison with Current Tech</label>
                                    {{Form::select('qual_comp_grade', $grades, null, ['class' => 'form-control', 'placeholder' => 'Grade...'])}}
                                </div>
                            </div>

                            <!-- Quality of Processes -->
                            <h4 class="section-header">Quality of Processes (25%)</h4>
                            <div class="form-row my-5">
                                <div class="form-group col-4">
                                    <label>Project Definition</label>
                                    {{Form::select('final_prod_grade', $grades, null, ['class' => 'form-control', 'placeholder' => 'Grade...'])}}
                                </div>
                                <div class="form-group col-4">
                                    <label>Analysis of Problem and Design of Solution</label>
                                    {{Form::select('work_completed_grade', $grades, null, ['class' => 'form-control', 'placeholder' => 'Grade...'])}}
                                </div>
                                <div class="form-group col-4">
                                    <label>Testing of Final Product</label>
                                    {{Form::select('qual_comp_grade', $grades, null, ['class' => 'form-control', 'placeholder' => 'Grade...'])}}
                                </div>
                            </div>

                            <!-- Quality of Evaluation -->
                            <h4 class="section-header">Quality of Evaluation (25%)</h4>
                            <div class="form-row my-5">
                                <div class="form-group col-6">
                                    <label>Evaluation and testing of the work produced</label>
                                    {{Form::select('final_prod_grade', $grades, null, ['class' => 'form-control', 'placeholder' => 'Grade...'])}}
                                </div>
                                <div class="form-group col-6">
                                    <label>Critical analysis of the project and potential improvements</label>
                                    {{Form::select('work_completed_grade', $grades, null, ['class' => 'form-control', 'placeholder' => 'Grade...'])}}
                                </div>
                            </div>

                            <!-- Quality of Presentation -->
                            <h4 class="section-header">Quality of Presentation (25%)</h4>
                            <div class="form-row my-5">
                                <div class="form-group col-4">
                                    <label>Organisation of the dissertation</label>
                                    {{Form::select('final_prod_grade', $grades, null, ['class' => 'form-control', 'placeholder' => 'Grade...'])}}
                                </div>
                                <div class="form-group col-4">
                                    <label>English, grammar and punctuation</label>
                                    {{Form::select('work_completed_grade', $grades, null, ['class' => 'form-control', 'placeholder' => 'Grade...'])}}
                                </div>
                                <div class="form-group col-4">
                                    <label>Use of tables, figures and references</label>
                                    {{Form::select('qual_comp_grade', $grades, null, ['class' => 'form-control', 'placeholder' => 'Grade...'])}}
                                </div>
                            </div>

                            <!-- Supervisor Only -->
                            <h4 class="section-header">Supervisor Only</h4>
                            <div class="form-row my-5">
                                <div class="form-group col-6">
                                    <label>Independance of the work carried out</label>
                                    {{Form::select('final_prod_grade', $grades, null, ['class' => 'form-control', 'placeholder' => 'Grade...'])}}
                                </div>
                                <div class="form-group col-6">
                                    <label>Attendance of supervised meetings</label>
                                    {{Form::select('work_completed_grade', $grades, null, ['class' => 'form-control', 'placeholder' => 'Grade...'])}}
                                </div>
                            </div>

                            <!-- Comments and Final Mark -->
                            <h4 class="section-header">Comments & Final Mark</h4>
                            <div class="form-row">
                                <div class="form-group col">
                                    {{ Form::textarea('comments', '', ['class' => 'form-control', 'placeholder' => 'Write more detailed comments here...']) }}
                                    <!--<textarea class="form-control" name="projectDescription" id="projectDescription" cols="30" rows="10" placeholder="A short description of you project. This will be displayed in the description section of the projects table..."></textarea>-->
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-10">
                                    {{ Form::text('final_mark', '', ['class' => 'form-control', 'placeholder' => 'Final Mark...']) }}
                                    <!--<textarea class="form-control" name="projectDescription" id="projectDescription" cols="30" rows="10" placeholder="A short description of you project. This will be displayed in the description section of the projects table..."></textarea>-->
                                </div>
                                <div class="form-group col-2">
                                    {{ Form::submit('Submit', ['class' => 'btn btn-success form-control'])}}
                                    <!--<textarea class="form-control" name="projectDescription" id="projectDescription" cols="30" rows="10" placeholder="A short description of you project. This will be displayed in the description section of the projects table..."></textarea>-->
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
