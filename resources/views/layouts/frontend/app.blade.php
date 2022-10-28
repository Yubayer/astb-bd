<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ASTB-BD</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <script src="https://kit.fontawesome.com/877a9c4177.js" crossorigin="anonymous"></script>
    @stack('css')
</head>
<body>

    <?php  
        $collections = App\Collection::all();
        $settings = App\Setting::first();
    ?>


    <div id="">
    
        <div class="container">
            @include('layouts.frontend.partial.navbar') 
        </div>

        <main class="py-4 container">
            @yield('content')
        </main>

        <div class="container">
        @include('layouts.frontend.partial.footer') 
        </div>
    </div>

    @stack('js')
</body>
</html>
