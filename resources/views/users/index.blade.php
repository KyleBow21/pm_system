@extends('layouts.app')

@section('content')
<div class="container-fluid h-100">
    <div class="row justify-content-center h-100">
        <div class="col-md-12 px-5">
            <h3 class="page-header">Your Profile</h3>
            <div class="card mt-3">
                <div class="card-header">Photo</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-2">
                            <img class="img-fluid" id="profilePicture" src="https://i.pravatar.cc/200" alt="">
                        </div>
                        <div class="col-md-10 d-flex flex-column justify-content-center">
                            <h6 class="font-weight-bolder">Choose a new profile picture!</h6>
                            <button class="btn btn-primary w-25">Upload</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">Personal Information</div>
                <div class="card-body">
                    <form class="mt-3">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="">Name</label>
                                <input class="form-control" type="text" disabled value="{{ $user->name }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for=""><i data-feather="mail"></i> Email</label>
                                <input class="form-control" type="text" disabled value="{{ $user->email }}">
                            </div>
                        </div>
                        <div class="form-row mt-3">
                            <div class="form-group col-md-6">
                                <label for="">Role</label>
                                <input class="form-control" type="text" disabled value="{{ $user->role }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">API Token</label>
                                <input class="form-control" type="text" disabled value="{{ $user->api_token }}">
                            </div>
                        </div>

                        <!-- Projects area, what a mess! -->
                        <!-- Supervisor -->
                        @if(Auth::user()->role === "staff" || Auth::user()->role === "admin")
                        <label>Projects</label>
                            @if(isset($ownedProjects))
                                @foreach($ownedProjects as $ownedProject)
                                    <div class="form-row mb-3">
                                        <div class="form-group col-md-10">
                                            <li onclick="document.location='projects/{{ $ownedProject->id }}'" class="project-list form-control mb-1">{{ $ownedProject->project_name }}<i data-feather="chevron-right"></i></li>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <button id="{{ $ownedProject->id}}" class="btn btn-primary form-control" onclick="markProject(this.id)">Mark Project</button>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        @endif

                        <!-- Student -->
                        @if(Auth::user()->role === "student")
                        <div class="form-row mt-3">
                            <div class="form-group col-md-12">
                                <label>Preferred Projects</label>
                                @if(isset($preferredProjects))
                                    @foreach ($preferredProjects as $preferredProject)
                                        <li onclick="document.location='projects/{{ $preferredProject->id }}'" class="project-list form-control mb-1">{{ $preferredProject->project_name }}<i data-feather="chevron-right"></i></li>
                                    @endforeach
                                @else
                                    <li onclick="document.location='projects/'" class="project-list form-control">No Projects Selected!<i data-feather="chevron-right"></i></li>
                                @endif
                            </div>
                        </div>
                        <div class="form-row mt-3">
                            <div class="form-group col-md-12">
                                <label for="">Selected Project</label>
                                @if(isset($selectedProject))
                                    <li onclick="document.location='projects/{{$selectedProject->id}}'" class="project-list form-control">{{ $selectedProject->project_name }}<i data-feather="chevron-right"></i></li>
                                @else
                                    <li onclick="document.location='projects/'" class="project-list form-control">No Project Selected!<i data-feather="chevron-right"></i></li>
                                @endif
                            </div>
                        </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
