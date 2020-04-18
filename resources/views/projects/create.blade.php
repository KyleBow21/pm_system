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
                            <form action="">
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label for="projectFilterName">Project Name</label>
                                        <input class="form-control" type="text" id="projectName" placeholder="Implement algorithms in C++...">
                                    </div>
                                    <div class="form-group col-2">
                                        <label for="projectType">Project Type</label>
                                        <select class="form-control" name="" id="projectType">
                                            <option selected>N/A</option>
                                            <option>Technical</option>
                                            <option>Research</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-2">
                                        <label for="projectYear">Project Year</label>
                                        <input class="form-control" type="text" id="projectYear" placeholder="2021...">
                                    </div>

                                    <div class="form-group col-1">
                                        <label for="projectCapacity">Project Capacity</label>
                                        <input class="form-control" type="text" id="projectCapacity" placeholder="15...">
                                    </div>
        
                                    <!-- "if" directive can be used to display content per user, good for authorisation -->
                                    @if(Auth::user()->role == "admin")
                                    <div class="col-2">
                                        <label for="">Admin Controls</label>
                                        <a href="{{ route('projects.create') }}" type="button" class="form-control btn btn-primary" id="buttonCreateProject"> Create Project</a>
                                    </div>
                                    @endif
                                </div>
                                <div class="form-row">
                                    <div class="form-group col">
                                        <textarea class="form-control" name="projectDescription" id="projectDescription" cols="30" rows="10" placeholder="A short description of you project. This will be displayed in the description section of the table..."></textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <h5>Preview</h5>
                            <hr>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
