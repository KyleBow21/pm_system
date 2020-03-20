@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Projects</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in and this is projects page!

                    <!-- We will display information about projects here -->
                    <div></div>

                    <ul>
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection