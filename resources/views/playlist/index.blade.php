@extends('layouts/navbar')
@section('content')
    <h1>Playlists van {{ Auth::user()->name }}</h1>
    <ul>
        @foreach($playlists as $playlist)
            @php
                $tijd = current($tijden);
                next($tijden);
            @endphp
            <li>{{ $playlist->name }} || {{$tijd}} <a href="{{ route('playlist.destroy', ['playlist' => $playlist->id]) }}">X</a> <a href="{{route('playlist.addSong', ['playlist' => $playlist->id])}}">+</a></li>
            <ul>
                @foreach ($playlist->songs as $song)
                <li>{{ $song->name }} <a style="text-decoration: none" href="{{route('playlist.removeSong', ['playlist' => $playlist, 'song_id' => $song->id])}}">―</a></li>
                @endforeach
            </ul>
        @endforeach
    </ul>
    <a href="{{ route('playlist.create') }}">create new playlist</a>
@endsection
