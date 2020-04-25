@extends('layouts.app')

@section('content')
<div class="container-fluid h-100">
    <div class="row justify-content-center h-100">
        <div class="col-md-12 px-5">
            <h3 class="page-header">{{ $user->name }}'s Profile</h3>
            <div class="card mt-3">
                <div class="card-header">Photo</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-2">
                            <img class="img-fluid" id="profilePicture" src="https://i.pravatar.cc/200" alt="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card my-3">
                <div class="card-header">Personal Information</div>
                <div class="card-body">
                    <form class="mt-3">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="">Name</label>
                                <input class="form-control" type="text" disabled value="{{ $user->name }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Email</label>
                                <input class="form-control" type="text" disabled value="{{ $user->email }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Role</label>
                                <input class="form-control" type="text" disabled value="{{ $user->role }}">
                            </div>
                        </div>
                        <div class="form-row mt-3">
                            <div class="form-group col-md-12">
                                <label>Projects</label>
                                @if(isset($projects))
                                    @foreach ($projects as $project)
                                        <li onclick="document.location='projects/{{$project->id}}'" class="project-list my-1">{{ $project->project_name }}<i data-feather="chevron-right"></i></li>
                                    @endforeach
                                @else
                                    <li onclick="document.location='projects/'" class="project-list">No Projects!<i data-feather="chevron-right"></i></li>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
