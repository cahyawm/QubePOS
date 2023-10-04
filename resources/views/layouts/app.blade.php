<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>QubePOS | {{$head_title}}</title> --}}
    <title>QubePOS</title>
    <link rel="icon" href="{{ asset('assets/img/icon.svg') }}">

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    
    <!-- Page Specific JS -->
    <script src="{{ asset('assets/admin-style/js/app.js')}}" defer></script>

    {{-- sweet alert --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('style.css') }}" rel="stylesheet">

    <!-- admin style -->
    <link href="{{ asset('assets/admin-style/css/portal.css') }}" rel="stylesheet">

    <!-- FontAwesome JS-->
    <script src="{{ asset('assets/admin-style/plugins/fontawesome/js/all.min.js') }}" defer></script>


    @livewireStyles
</head>
<body class="app">
    <div id="app">
        {{-- @include('partials.sidebar') --}}
        <main class="py-4">
            @yield('content')
            
            {{-- {{isset($slot) ? $slot : null}} --}}

        </main>

        @livewireScripts

        <!-- Javascript -->          
        <script src="{{asset('assets/admin-style/plugins/popper.min.js')}}"></script>
        <script src="{{ asset('assets/admin-style/plugins/bootstrap/js/bootstrap.min.js')}}"></script>  

        <!-- Charts JS -->
        <script src="{{ asset('assets/admin-style/plugins/chart.js/chart.min.js')}}"></script> 
        <script src="{{ asset('assets/admin-style/js/index-charts.js')}}"></script> 
        
        

        {{-- jquery --}}
        <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
       


        {{-- livewire --}}
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <script src="{{ asset('js/viewdetail.js')}}" defer></script>
    </div>
</body>
</html>
