@extends('layouts/navbar')
@section('content')
<h1>Playlists van {{Auth::user()->name}}</h1>
<ul>
        @foreach($playlists->where('user_id', '=', Auth::user()->id) as $playlist)
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