<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('public/css/main.css') }}">

        
    </head>
    <body>
        <header id="header" id="home">
            <div class="container">
                <div class="row align-items-center justify-content-between d-flex">
                    <a href="{{ route('contact-view') }}">Contact Us</a>

                    <div class="topnav" id="myTopnav">
                        <a class="navlink" href="{{ route('login') }}">Login</a>
                        <a class="navlink" href="{{ route('register') }}">Register</a>
                    </div>
                </div>
            </div>
        </header>
        @yield('content')
    </body>

    <!-- Scripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</html>
