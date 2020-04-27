@extends('layouts.app')

@section('content')
<div class="container-fluid h-100">
    <div class="row justify-content-center h-100">
        <div class="col-md-12 px-5">
            <h3 class="page-header">Marking Form</h3>

            <!-- Split up different sections of information into their own cards for a more uniform look -->
            <div class="card h-100">            
            <div class="card-header">Details</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Display for staff only -->
                    @auth('staff' || 'admin')
                        
                    @endauth
                    <!-- End staff only -->

                    <!-- Display for students only -->
                    @auth('student')

                    @endauth
                    <!-- End students only -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
