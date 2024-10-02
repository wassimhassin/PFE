<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <header>
        <nav class="navbar">
            <div class="logo" >
                <img src="https://themewagon.github.io/trator/images/logo.png" alt="Logo" > 
            </div>
            <ul class="nav-links">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/') }}">About</a></li>
                <li><a href="{{ url('/') }}">Services</a></li>
                <li><a href="{{ route('voiture.index') }}">Vehicles</a></li>
                <li><a href="{{ url('/') }}">Contact</a></li>
            </ul>
        </nav>
    </header>

    <!-- Content -->
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
