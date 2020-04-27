@extends('layouts.app')

@section('content')
<div class="container-fluid h-100" id="dashboard">
    <div class="row justify-content-center h-100">
        <div class="col-md-12 px-5">
            <h3 class="page-header">Submitted Marking Forms</h3>
            <div class="card" id="project-table">
                <div class="card-header">Overview</div>
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

                    <!-- Show if the user role is staff -->
                    @auth
                    <form>
                        <div class="form-row">
                            <div class="form-group col">
                                <!-- TODO: Make the search controls work -->
                                <label for="marksFilter">Search</label>
                                <input class="form-control" type="text" id="searchTable" placeholder="Search...">
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-hover" id="scrollableTable">
                            <thead>
                                <tr>
                                    <!-- Overview of all the details of the form? -->
                                </tr>
                            </thead>
                                <tbody id="tbody">
                                    @foreach ($projects as $project)
                                        <tr id="{{$project->id}}" style="cursor:hand">
                                            <!-- This mess of "onclick" is the only way I can think of re-directing at the moment -->
                                            <th scope="col" class="col-1 w-25"><input type="checkbox" name="" onchange="projectChecked(this.name)"></td>
                                            <td scope="col" class="col-1 w-25" onclick="document.location='/projects/'"></td>
                                            <td scope="col" class="col-9 text-truncate" onclick="document.location='/projects/'"></td>
                                            <td scope="col" class="col-1 w-25" onclick="document.location='/projects/'"></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                        </table>
                    </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
