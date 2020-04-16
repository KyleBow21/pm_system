@extends('layouts.app')

@section('content')
<div class="container-fluid" id="dashboard">
    <div class="row justify-content-center">
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
                            <div class="form-group col-md-6">
                                <label for="projectFilterName">Search</label>
                                <input class="form-control" type="text" id="projectFilterName" placeholder="Search...">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="projectFilterType">Project Type</label>
                                <select class="form-control" name="" id="projectFilterType">
                                    <option selected>All</option>
                                    <option>Technical</option>
                                    <option>Research</option>
                                </select>
                            </div>
                        </div>
                    </form>
                    <div class="scrollable">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Project Year</th>
                                    <th scope="col">Project Name</th>
                                    <th scope="col">Project Description</th>
                                    <th scope="col">Project Type</th>
                                </tr>
                            </thead>
                                <tbody>
                                    @foreach ($projects as $project)
                                        <tr>
                                            <td>{{$project->project_year}}</td>
                                            <td>{{$project->project_name}}</td>
                                            <td>{{$project->project_description}}</td>
                                            <td>{{$project->project_type}}</td>
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