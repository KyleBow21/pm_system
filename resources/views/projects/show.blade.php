@extends('layouts.app')

@section('content')
<div class="container-fluid h-100">
    <div class="row justify-content-center h-100">
        <div class="col-md-12 px-5">
            <div class="card h-100">
            <div class="card-header">Projects - {{$project->project_name}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <h3>Project Details</h3>
                        </div>
                    </div>
                    <hr>
                    <div class="row mt-5">
                        <div class="col-md-3">
                            <h5>Project Name: <span>{{ $project->project_name }}</span></h5>
                        </div>
                        <div class="col-md-3">
                            <h5>Project Type: {{  $project->project_type  }}</h5>
                        </div>
                        <div class="col-md-3">
                            <h5>Project Year: {{  $project->project_year  }}</h5>
                        </div>
                        <div class="col-md-3">
                            <h5>Current Capacity: 0 / {{$project->capacity}}</h5>
                        </div>
                    </div>

                    <!-- Where the project description is shown, maybe we could have a PDF viewer here too for lecturers that already have a document for their project? -->
                    <div class="row text-justify mt-5">
                        <div class="col-md-12">
                            <h3>Project Description</h3>
                            <hr>
                            <div class="scrollable">
                                <p>{{$project->project_description}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
