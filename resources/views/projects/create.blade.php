@extends('layouts.app')

@section('content')
<div class="container-fluid h-100">
    <div class="row justify-content-center h-100">
        <div class="col-md-12 px-5">
            <div class="card">
            <div class="card-header">
                Create Project - {{Auth::user()->name}}
            </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <form>
                            {!! Form::open(['action' => 'ProjectController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label for="projectFilterName">Project Name</label>
                                        {{Form::text('projectName', '', ['class' => 'form-control', 'placeholder' => 'Implementing algorithms in C...'])}}
                                    </div>
                                    <div class="form-group col-2">
                                        <label for="projectType">Project Type</label>
                                        {{Form::select('projectType', ['technical' => 'Technical', 'research' => 'Research'], 'technical', ['class' => 'form-control'])}}
                                    </div>

                                    <div class="form-group col-2">
                                        <label for="projectYear">Project Year</label>
                                        {{Form::text('projectYear', '', ['class' => 'form-control', 'placeholder' => '2021...'])}}
                                    </div>

                                    <div class="form-group col-1">
                                        <label for="projectCapacity">Capacity</label>
                                        {{Form::text('projectCapacity', '', ['class' => 'form-control', 'placeholder' => '15...'])}}
                                    </div>

                                    <div class="form-group col-2">
                                        <label for="projectCapacity">Files</label>
                                        <!-- Currently visually bugged, will fix later. -->
                                        {{ Form::file('pdf', ['class' => 'form-control btn btn-primary'])}}
                                    </div>
        
                                    <!-- "if" directive can be used to display content per user, good for authorisation -->
                                    @if(Auth::user()->role == "admin")
                                    <div class="form-group col-1">
                                        <label for="buttonCreateProject">Submit</label>
                                        {{ Form::submit('Submit', ['class' => 'btn btn-success'])}}                              
                                    </div>
                                    @endif
                                </div>
                                <div class="form-row">
                                    <div class="form-group col">
                                        {{ Form::textarea('projectDescription', '', ['class' => 'form-control', 'placeholder' => 'Write a short description of the project here...']) }}
                                        <!--<textarea class="form-control" name="projectDescription" id="projectDescription" cols="30" rows="10" placeholder="A short description of you project. This will be displayed in the description section of the projects table..."></textarea>-->
                                    </div>
                                </div>
                            {!! Form::close() !!}
                            </form>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <h5>Preview</h5>
                            <hr>
                            <p>Maybe we could put some sort of preview here?</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
