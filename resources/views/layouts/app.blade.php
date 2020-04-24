<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Feather icons -->
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

    <!-- Progress bar plugin -->
    <script src="https://unpkg.com/nprogress@0.2.0/nprogress.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/nprogress@0.2.0/nprogress.css">
</head>
<body>
    <div id="app" class="wrapper">

        <!-- Sidebar -->
        <!-- i feel that the sidebar is a bit of bad design considering it has so few links? -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Swansea University<br>PMS</h3>
            </div>
            <ul class="list-unstyled components pt-0">                
                <li class="active">
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li>
                    <a href="{{ route('projects.index') }}">Projects</a>
                </li>
            </ul>
        </nav>
        
        <main class="" id="content">
            @include('inc.navbar')
            <div class="py-4"></div>
            <div class="container">
                <div class="row">
                    <div class="col">
                        @include('inc.messages')
                    </div>                    
                </div>
            </div>
            @yield('content')
        </main>
    </div>

    @routes

    <script>
        feather.replace();

        // Start the progress bar 
        NProgress.start();

        // Increase randomly
        var interval = setInterval(() => { NProgress.inc(); }, 1000);

        // Stop the progress bar once the page has loaded
        $(window).on('load', () => {
            clearInterval(interval);
            NProgress.done();
        });

        // Trigger bar when exiting the page
        $(window).on('beforeunload', () => {
            console.log("Unloading!");
            NProgress.start();
        });

        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });

        var selectedProjects = new Array();

        // Checks if and what project is checked and pushes to an array
        // I'm rubbish at JS so...
        function projectChecked(id) {
            // Get the checkbox that was selected using its name
            // and check if it is checked
            if($("input[name=" + id + "]").is(":checked")) {
                // If checked, add project id to array
                selectedProjects.push(id);
            } else {
                // if unchecked, find in the array and remove.
                var index = selectedProjects.indexOf(id);
                if(index > -1) {
                    selectedProjects.splice(index, 1);
                }
            }
            // Not sure how to connect this with the DB yet
        }

        // Again, really not sure this is the best way to do this...
        function submitSelectedProjects() {
            NProgress.start();

            // Get the users api token and pass to JS variable
            var bearerToken = @json($token ?? '');

            // Crappy validation will do for now, do not use an alert!
            if(selectedProjects.length != 5) {
                console.log("Not enough projects selected!");
                NProgress.done();
            } else {
                // Convert array to JSON
                var selectedProjectsJson = JSON.stringify(selectedProjects);
                axios.post(route('api.projects.submit'), {
                    api_token: bearerToken,
                    selected_projects: selectedProjectsJson
                })
                .then(response => {
                    return response;
                })
                .catch(error => {
                    console.log(error);
                });
                NProgress.done();
            }
        }
    </script>
    
</body>
</html>
