@push('style')
@endpush

@extends('layouts/navbar')
@section('content')
    <h1>Dit is een totaaloverzicht van alle songs</h1>
    <ul>
        @foreach($songs as $song)
            <li>{{$song->name}} - {{$song->author}} | Released in {{$song->releasedate}} | Genre is {{$song->genre?->name}} |is found in playlist: @foreach($song->playlists as $playlist) {{$playlist->name}}; @endforeach <a href="{{route('song.destroy', ['song' => $song->id])}}">X</a></li>

        @endforeach
    </ul>
    <a href="{{route('song.create')}}">create new</a>

@endsection