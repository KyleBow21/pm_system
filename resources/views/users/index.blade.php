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
                <div class="card-header">Information</div>
                <div class="card-body">
                    <form class="mt-3">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="">Name</label>
                                <input class="form-control" type="text" disabled value="{{ $user->name }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Email</label>
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
                        <div class="form-row mt-3">
                            <div class="form-group col-md-12">
                                <label for="">Selected Project</label>
                                <li class="project-list">{{ $user->selected_project }} <i data-feather="chevron-right"></i></li>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
