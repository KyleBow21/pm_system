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
                                        <label for="projectCapacity">Capacity</label>
                                        <input class="form-control" type="text" id="projectCapacity" placeholder="15...">
                                    </div>

                                    <div class="form-group col-2">
                                        <label for="projectCapacity">Files</label>
                                        <label class="btn btn-primary form-control" for="fileSelector">
                                            <input id="fileSelector" type="file" class="d-none">
                                            Upload File
                                        </label>
                                    </div>
        
                                    <!-- "if" directive can be used to display content per user, good for authorisation -->
                                    @if(Auth::user()->role == "admin")
                                    <div class="form-group col-1">
                                        <label for="buttonCreateProject">Upload</label>
                                        <a href="{{ route('projects.store') }}" type="submit" class="form-control btn btn-success" id="buttonSubmitProject"><i data-feather="check-circle"></i></a>                                   
                                    </div>
                                    @endif
                                </div>
                                <div class="form-row">
                                    <div class="form-group col">
                                        <textarea class="form-control" name="projectDescription" id="projectDescription" cols="30" rows="10" placeholder="A short description of you project. This will be displayed in the description section of the projects table..."></textarea>
                                    </div>
                                </div>
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
