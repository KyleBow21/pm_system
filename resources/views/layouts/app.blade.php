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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" class="wrapper">

        <!-- Sidebar -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Swansea University<br>PMS</h3>
            </div>

            <button type="button" id="sidebarCollapse" class="btn btn-info">
                <i class="fas fa-align-left"></i>
                <span>Toggle Sidebar</span>
            </button>

            <ul class="list-unstyled components">
                <!-- User information can go here -->
                <p>John Doe</p>
                
                <li class="active">
                    <a href="{{ route('home') }}">Home</a>
                </li>
                
                <li>
                    <a href="#moduleSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Modules</a>
                    <!-- Implement a for loop to populate with modules a user is subbed to -->
                    <ul class="collapse list-unstyled" id="moduleSubmenu">
                        <li>
                            <a href="#">CSM01</a>
                        </li>
                        <li>
                            <a href="#">CSM02</a>
                        </li>
                        <li>
                            <a href="#">CSM03</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">Assignments</a>
                </li>
                <li>
                    <a href="#">Marks</a>
                </li>
            </ul>
        </nav>
        
        <main class="py-4" id="content">
            @yield('content')
        </main>
    </div>

    <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>
</html>
