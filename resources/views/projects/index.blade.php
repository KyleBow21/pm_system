@extends('layouts.app')

@section('content')
<div class="container-fluid h-100" id="dashboard">
    <div class="row justify-content-center h-100">
        <div class="col-md-12 px-5">
            <h3 class="page-header">Projects</h3>
            <div class="card" id="project-table">
                <div class="card-header">Overview</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Show if the user has no logged in -->
                    @guest
                        <h4>You must log-in to use this service!</h4>
                    @endguest

                    <!-- Show if the user has logged in -->
                    @auth
                    <form action="">
                        <div class="form-row">
                            <div class="form-group col">
                                <!-- TODO: Make the search controls work -->
                                <label for="projectFilterName">Search</label>
                                <input class="form-control" type="text" id="searchTable" placeholder="Search...">
                            </div>

                            <!-- "if" directive can be used to display content per user, good for authorisation -->
                            @if(Auth::user()->role == "admin")
                            <div class="col-2">
                                <!-- Used to just pad the controls down to the same level as the others -->
                                <label for="">&nbsp;</label>
                                <a href="{{ route('projects.create') }}" type="button" class="form-control btn btn-primary" id="buttonCreateProject" onkeyup="searchTable()">Create Project</a>
                            </div>
                            @elseif (Auth::user()->role == "student")
                            <div class="col-2">
                                <!-- Used to just pad the controls down to the same level as the others -->
                                <label for="">&nbsp;</label>
                                <button {!! $canSelectProjects ? "" : "disabled" !!} type="button" class="form-control btn btn-primary" id="buttonCreateProject" onclick="submitSelectedProjects()">Select Projects</button>
                            </div>
                            @endif
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-hover border" id="projectsTable">
                            <thead>
                                <tr>
                                    <th scope="col" class="col-1 w-25">&nbsp;</th>
                                    <th scope="col" class="col-1 w-25">Project Name</th>
                                    <th scope="col" class="col-9">Project Description</th>
                                    <th scope="col" class="col-1 w-25">Project Type</th>
                                </tr>
                            </thead>
                                <tbody id="tbody">
                                    @foreach ($projects as $project)
                                        <tr id="{{$project->id}}" style="cursor:hand">
                                            <!-- This mess of "onclick" is the only way I can think of re-directing at the moment -->
                                            <th scope="col" class="col-1 w-25"><input type="checkbox" name="{{$project->id}}" onchange="projectChecked(this.name)"></td>
                                            <td scope="col" class="col-1 w-25" onclick="document.location='/projects/{{$project->id}}'">{{$project->project_name}}</td>
                                            <td scope="col" class="col-9 text-truncate" onclick="document.location='/projects/{{$project->id}}'">{{$project->project_description}}</td>
                                            <td scope="col" class="col-1 w-25" onclick="document.location='/projects/{{$project->id}}'">{{$project->project_type}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                        </table>
                    </div>
                    @if(Auth::user()->role === "student")
                    <div class="row">
                        <div class="col">
                            <small>Please select 5 projects then click submit</small>
                        </div>
                    </div>
                    @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
