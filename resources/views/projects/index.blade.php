@extends('layouts.app')

@section('content')
<div class="container-fluid" id="dashboard">
    <div class="row justify-content-center">
        <div class="col-md-12 px-5">
            <div class="card">
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
                    @foreach ($projects as $project)
                        <li>{{ $project->project_name }} <i data-feather="chevron-right"></i></li>
                    @endforeach
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection