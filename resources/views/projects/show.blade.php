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
                            <!-- Capacity will be calculated by counting the number of users for each project and compared against its rated capacity. -->
                            <h5>Current Capacity: 0 / {{ $project->capacity }}</h5>
                        </div>
                    </div>

                    <!-- Where the project description is shown. When file uploads are working, maybe switch this to a PDF viewer? -->
                    <div class="row text-justify mt-5">
                        <div class="col-md-12">
                            <h3>Project Description</h3>
                            <hr>
                            <!-- <div class="scrollable h-100" id="editor"></div> -->
{{--                            <p>{{ $project->project_description }}</p>--}}
                            <embed class="embed-responsive w-100 h-100" src="{{ asset('storage/test.pdf') }}" alt="pdf" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
