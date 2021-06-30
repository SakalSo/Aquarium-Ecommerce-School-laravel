<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- CSRF TOKEN --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    {{-- title --}}
    <link rel="shortcut icon" href="{{asset('img/icons/fish.png')}}" />
    <title>
        @section('title')
        {{ config('app.name', 'Laravel') }}
        @show
    </title>

    {{-- font --}}
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans|Roboto&display=swap" rel="stylesheet">

    @section('stylesheet')
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    @show

</head>

<body>
    {{-- header --}}
    <header>
        @section('header')
            @include('partials.navbar')
        @show
    </header>

    {{-- main content --}}
    <main>
        @yield('content')
    </main>

    {{-- footer --}}
    <footer>
        @section('footer')
            @include('partials.footer')
        @show
    </footer>

    <script src="{{asset('js/app.js')}}"></script>
    @yield('script')
</body>

</html>