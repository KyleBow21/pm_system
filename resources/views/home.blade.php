@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>This is the home page!</p>
                    <br>
                    @guest
                        <p>You are not logged in!</p>
                    @endguest
                    @auth
                    <p>You are logged in! Hello, <b>{{ Auth::user()->name }}</b></p>

                    @foreach ($modules as $module)
                        <li>{{ $module->module_name }}</li>
                    @endforeach
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
