@extends('layouts/navbar')
@section('content')
    <h1>Dit is een totaaloverzicht van alle playlist</h1>
    <ul>
        @foreach($playlists as $playlist)
            <li>{{$playlist->name}} <a href="{{route('playlist.destroy', ['playlist'=> $playlist->id])}}">X</a></li>
            <ul>
                @foreach($playlist->songs as $song)
                    <li>{{$song->name}}</li>
                @endforeach
            </ul>
        @endforeach
    </ul>
    <a href="{{route('playlist.create')}}">create new</a>

@endsection