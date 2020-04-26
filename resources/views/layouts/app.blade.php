<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Dynamic form builder jQuery -->
    <script src="https://formbuilder.online/assets/js/form-builder.min.js" defer></script>

    <!-- Feather icons -->
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

    <!-- Progress bar plugin -->
    <script src="https://unpkg.com/nprogress@0.2.0/nprogress.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/nprogress@0.2.0/nprogress.css">
</head>
<body>
    <div id="app" class="wrapper">

        <!-- Sidebar -->
        <!-- TODO: Restyle the sidebar smaller and with icons -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Swansea University<br>PMS</h3>
            </div>
            <ul class="list-unstyled components pt-0">                
                <li>
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li>
                    <a href="{{ route('projects.index') }}">All Projects</a>
                </li>
                <!-- Don't like how verbose this is, refine! -->
                @if(Auth::user()->role === "staff" || Auth::user()->role === "admin")
                <li>
                    <a href="#markingFormsSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Marking Forms</a>
                    <ul class="collapse list-unstyled" id="markingFormsSubmenu">
                        <a href="{{ route('marks.index') }}">View All Forms</a>
                        <a href="{{ route('marks.create') }}">Create New Form</a>
                    </ul>
                </li>
                @endif
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

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <script>
        // All of this JS should probably go in its own file but this is fine for now
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

        // This is very short jQuery for document.ready
        $(() => {
            // init sidebar
            $('#sidebarCollapse').on('click', () => {
                $('#sidebar').toggleClass('active');
            });

            // init form builder
            $('#formBuilder').formBuilder();
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

        $("#searchTable").keyup(function() {
            //split the current value of searchInput
            var data = this.value.toUpperCase().split(" ");
            //create a jquery object of the rows
            var jo = $("#tbody").find("tr");
            if (this.value == "") {
                jo.show();
                return;
            }
            //hide all the rows
            jo.hide();

            //Recusively filter the jquery object to get results.
            jo.filter(function(i, v) {
                var $t = $(this);
                for (var d = 0; d < data.length; ++d) {
                    if ($t.text().toUpperCase().indexOf(data[d]) > -1) {
                        return true;
                    }
            }
            return false;
            })
            //show the rows that match.
            .show();
        }).focus(function() {
            this.value = "";
        $(this).css({
            "color": "black"
        });
        $(this).unbind('focus');
        }).css({
            "color": "#C0C0C0"
        });

        
    </script>
    
</body>
</html>
