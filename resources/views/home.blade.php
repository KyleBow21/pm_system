@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10" id="dashboard">
            <div class="card">
                <div class="card-header">Dashboard</div>
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
                    <h5>Modules</h5><hr>

                    @foreach ($modules as $module)
                        <li>{{ $module->module_name }} <i data-feather="chevron-right"></i></li>
                    @endforeach
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
