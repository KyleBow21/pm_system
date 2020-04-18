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

    <!-- Feather icons (will be compiled with scss, this is just for testing!) -->
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

    <script src="https://cdn.ckeditor.com/ckeditor5/18.0.0/classic/ckeditor.js"></script>
</head>
<body>
    <div id="app" class="wrapper">

        <!-- Sidebar -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Swansea University<br>PMS</h3>
            </div>

            <ul class="list-unstyled components pt-0">                
                <li class="active">
                    <a href="{{ route('home') }}">Home</a>
                </li>
                
                <li>
                    <a href="#moduleSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Modules</a>
                    <!-- Implement a for loop to populate with modules a user is subbed to -->
                    <ul class="collapse list-unstyled" id="moduleSubmenu">
                    </ul>
                </li>
                <li>
                    <a href="#">Assignments</a>
                </li>
                <li>
                    <a href="{{ route('projects.index') }}">Projects</a>
                </li>
                <li>
                    <a href="#">Marks</a>
                </li>
            </ul>
        </nav>
        
        <main class="" id="content">
            @include('inc.navbar')
            <div class="py-4"></div>
            @yield('content')
        </main>
    </div>

    <script>
        feather.replace();
    </script>

    <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });

            ClassicEditor
                .create( document.querySelector( '#editor' ) )
                .catch( error => {
                    console.error( error );
                });
        });
    </script>
</body>
</html>
