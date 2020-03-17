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
                <h3>Swansea University</h3>
            </div>

            <ul class="list-unstyled components">
                <p>User information goes here</p>
                <li class="active">
                    <a href="#">Home</a>
                </li>
                <li>
                    <a href="#">Projects</a>
                </li>
                <li>
                    <a href="#moduleSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Modules</a>
                    <ul class="collapse list-unstyled" id="moduleSubmenu">
                        <li>
                            <a href="#">Module 1</a>
                        </li>
                        <li>
                            <a href="#">Module 2</a>
                        </li>
                        <li>
                            <a href="#">Module 3</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">Assignments</a>
                </li>
                <li>
                    <a href="#">Contacts</a>
                </li>
                <li>
                    <a href="#">Settings</a>
                </li>
            </ul>
        </nav>

        <main id="content" class="container pt-5">

            <!--<nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
        
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Toggle Sidebar</span>
                    </button>
        
                </div>
            </nav>-->

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
