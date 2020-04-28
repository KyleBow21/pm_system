@extends('layouts.app')

@section('content')
<div class="container-fluid h-100">
    <div class="row justify-content-center h-100">
        <div class="col-md-12 px-5">
            <h3 class="page-header">Project - {{$project->project_name}}</h3>

            <!-- Split up different sections of information into their own cards for a more uniform look -->
            <div class="card h-100">            
            <div class="card-header">Details</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="section-header">Project Details</h3>
                        </div>
                    </div>
                    <div class="row mt-5 text-center">
                        <div class="col-md-2">
                            <h5><b>Name:</b> {{ $project->project_name }}</h5>
                        </div>
                        <div class="col-md-2">
                            <h5><b>Type:</b> {{  $project->project_type  }}</h5>
                        </div>
                        <div class="col-md-2">
                            <h5><b>Year:</b> {{  $project->project_year  }}</h5>
                        </div>
                        <div class="col-md-2">
                            @if(Auth::user()->role == "admin")
                                <h5><b> Capacity: </b>0 / {{ $project->project_capacity }}</h5>
                            @elseif($isProjectFull == false)
                                <h5><b> Capacity: </b>Not Full</h5>
                            @else
                                <h5><b> Capacity: </b>Full</h5>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <a href="/users/{{$supervisor->id}}"><h5><b>Supervisor:</b> {{  $supervisor->name }}</h5></a>
                        </div>                        
                    </div>

                    <!-- Where the project description is shown. When file uploads are working, maybe switch this to a PDF viewer? -->
                    <div class="row text-justify mt-5">
                        <div class="col-md-12">
                            <h3 class="section-header mb-4">Project Description</h3>
                                <p>{{ $project->project_description }}</p>
                        </div>
                    </div>
                    <!-- Make this section scrollable if there isn't enough space to display normally -->
                    <div class="row text-justify mt-5">
                        <div class="col-md-12">
                            <h3 class="section-header">Project Attachment</h3>
                            <!-- Need to make this all responsive, kinda broke at the moment but it does display the attachment -->
                            @if(isset($project->project_attachment))
                                <embed class="embed-responsive w-100 h-100" src="/storage/docs/{{$project->project_attachment}}" alt="No Attachment!"/>
                            @else
                                <h5 class="text-center mt-5">Supervisor has not included an attachment!</h5>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
