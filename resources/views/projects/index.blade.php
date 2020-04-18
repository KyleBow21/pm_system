@extends('layouts.app')

@section('content')
<div class="container-fluid h-100" id="dashboard">
    <div class="row justify-content-center h-100">
        <div class="col-md-12 px-5">
            <div class="card" id="project-table">
                <div class="card-header">Projects Overview</div>
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
                                <label for="projectFilterName">Search</label>
                                <input class="form-control" type="text" id="projectFilterName" placeholder="Search...">
                            </div>
                            <div class="form-group col">
                                <label for="projectFilterType">Project Type</label>
                                <select class="form-control" name="" id="projectFilterType">
                                    <option selected>All</option>
                                    <option>Technical</option>
                                    <option>Research</option>
                                </select>
                            </div>

                            <!-- "if" directive can be used to display content per user, good for authorisation -->
                            @if(Auth::user()->role == "admin")
                            <div class="col-2">
                                <label for="">Admin Controls</label>
                                <a href="{{ route('projects.create') }}" type="button" class="form-control btn btn-primary" id="buttonCreateProject"> Create Project</a>
                            </div>
                            @endif
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-hover table-fixed">
                            <thead>
                                <tr>
                                    <th scope="col" class="col-1">Project Year</th>
                                    <th scope="col" class="col-2">Project Name</th>
                                    <th scope="col" class="col-6">Project Description</th>
                                    <th scope="col" class="col-3">Project Type</th>
                                </tr>
                            </thead>
                                <tbody>
                                    @foreach ($projects as $project)
                                        <tr onclick="document.location='projects/{{$project->id}}'" style="cursor:hand">
                                            <th scope="row" class="col-1" >{{$project->project_year}}</td>
                                            <td class="col-2" >{{$project->project_name}}</td>
                                            <td class="col-6 text-truncate">{{$project->project_description}}</td>
                                            <td class="col-3">{{$project->project_type}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                        </table>
                    </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
