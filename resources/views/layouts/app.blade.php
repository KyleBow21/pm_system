<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- All very messy at the moment! This is purely for development and testing and will be optimised for production! -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <!-- Progress Bar Script -->
    <script src="https://unpkg.com/nprogress@0.2.0/nprogress.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/nprogress@0.2.0/nprogress.css">

    <!-- No point in making an external CSS file as we aren't using much at the moment -->
    <style>
        body {
            background-color: #fff;
        }

        .navbar {
            font-weight: 400;
        }

        h1, h2, h3, h4, h5 {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            font-weight: 500;
            text-rendering: geometricPrecision;
            -webkit-font-smoothing: antialiased;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            font-weight: 400;
            color: rgba(0,0,0,0.90);
        }

        a, a:hover {
            text-decoration: none;
            color: black;
        }

        .card {
            border-radius: 2px;
        }

        .card-dark, .card-dark:hover {
            text-decoration: none;
            background-color: #263238;
            color: #f5f5f5;
        }

        .btn {
            border-radius: 2px;
            box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
        }

        .btn-sm {
            padding: 0;
        }
    </style>
</head>
<body>
    <div>
        <main>
            <!-- Content yielding uses the format of <folder>.<filename> | etc: inc.navbar -->
            <!-- Not sure if we will be using a classic navbar; placeholder -->
            <!-- Displays the navigation bar -->
            

            <!-- Gives way to error messages that we can show to the user -->
            

            <!-- Final yield which displays our content for each page -->
            <div class="container mt-5 p-0" id="app">
                @yield('content')
            </div>
        </main>
    </div>
    @routes
    <script src="{{ asset('js/app.js') }}"></script>    
</body>
</html>