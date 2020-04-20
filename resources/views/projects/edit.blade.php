@extends('layouts.app')

@section('content')
<div class="container-fluid h-100">
    <div class="row justify-content-center h-100">
        <div class="col-md-12 px-5">
            <div class="card">
            <div class="card-header">
                Edit Project - {{$project->project_name}}
            </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            {!! Form::open(['action' => ['ProjectController@update', $project->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label for="projectName">Name</label>
                                        {{ Form::text('projectName', $project->project_name, ['class' => 'form-control', 'placeholder' => 'Project Title...']) }}
                                    </div>
                                    <div class="form-group col-2">
                                        <label for="projectType">Type</label>
                                        {{ Form::select('projectType', ['Technical' => 'Technical', 'Research' => 'Research'], $project->project_type, ['class' => 'form-control', 'placeholder' => 'Project Type...']) }}
                                    </div>

                                    <div class="form-group col-2">
                                        <!-- Probably should use a date picker instead? -->
                                        <label for="projectName">Year</label>
                                        {{ Form::text('projectYear', $project->project_year, ['class' => 'form-control', 'placeholder' => 'Project Year...', 'maxlength' => '4']) }}
                                    </div>

                                    <div class="form-group col-1">
                                        <!-- Max length limited to double digits -->
                                        <label for="projectCapacity">Capacity</label>
                                        {{ Form::text('projectCapacity', $project->project_capacity, ['class' => 'form-control', 'placeholder' => 'Capacity...', 'maxlength' => '2']) }}
                                    </div>
        
                                    <!-- "if" directive can be used to display content per user, good for authorisation -->
                                    @if(Auth::user()->role == "admin")
                                    <div class="form-group col-1">
                                        {{ Form::hidden('_method', 'PUT') }}
                                        <label for="submit">Submit</label>
                                        {{ Form::submit('Submit', ['class' => 'btn btn-success form-control']) }}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-row">
                                    <div class="form-group col">
                                        {{ Form::textarea('projectDescription', $project->project_description, ['class' => 'form-control', 'placeholder' => 'Write a short description of the project here...']) }}
                                        <!--<textarea class="form-control" name="projectDescription" id="projectDescription" cols="30" rows="10" placeholder="A short description of you project. This will be displayed in the description section of the projects table..."></textarea>-->
                                    </div>
                                </div>

                                <!-- Styling for this upload button is a bit off, will fix later -->
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label for="pdf">Upload an attachment - Max 2Mb</label>
                                        {{ Form::file('pdf', ['class' => 'form-control'])}}
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <h4>Preview</h4>
                            <hr>
                            <p>Maybe we could put some sort of preview here for the PDF?</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
