@extends('layouts.app')

@section('content')
<div class="container-fluid h-100">
    <div class="row justify-content-center h-100">
        <div class="col-md-12 px-5">
            <div class="card h-100">
            <div class="card-header">My Profile </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Welcome to your Profile: {{ Auth::user()->name }} </h3>
                        </div>
                      </div>
                      <hr>
                      <div class="row text-justify mt-5">
                          <div class="col-md-12">
                              <h5><b>E-mail Address: {{ Auth::user()->email }}</b></h5>
                            </div>
                          </div>
                          <hr>
                          <div class="row text-justify mt-5">
                              <div class="col-md-12">
                                  <h5><b>Role: {{ Auth::user()->role }}</b></h5>
                                </div>
                              </div>
                              <hr>
                              <div class="row text-justify mt-5">
                                  <div class="col-md-12">
                                      <h5><b>Password: {{ Auth::user()->password }}</b></h5>
                                    </div>
                                  </div>
                                  <hr>

@endsection
