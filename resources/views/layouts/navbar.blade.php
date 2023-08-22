<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
    <section class="navbar">
        <div>
            <a id="logo">Jukebox</a>
        </div>

        <div>
            <a href="{{route('genre.index')}}">genres</a>
        </div>
        <div>
            <a href="{{route('song.index')}}">songs</a>
        </div>
        <div>
            <a href="{{route('playlist.index')}}">playlist</a>
        </div>
        <div style="position: absolute;right: 20px;">
            @if(Auth::user() != null)
                <a href="{{route('dashboard')}}">{{Auth::user()->name}}</a>
            @else
                <a href="{{route('login') }}">Log in</a>
                <a href="{{route('register') }}">Register</a>
            @endif


        </div>
    </section>
    <main>
        @yield('content')
    </main>
    <footer>
        &copy; Lukas van Hulst - Laravel 10
    </footer>
</body>