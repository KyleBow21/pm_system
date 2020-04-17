@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12 px-5">
            <div class="card">
            <div class="card-header">Projects - {{$project->project_name}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul>
                        <li>{{ $project->project_name }}</li>
                        <li>{{ $project->project_year }}</li>
                        <li>{{ $project->project_type }}</li>
                        <li>{{ $project->project_description }}</li>
                        <li>{{ $project->user_id }}</li>
                        <li>{{ $project->module_id }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
