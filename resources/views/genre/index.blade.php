@extends('layouts/navbar')
@section('content')

    <h1>Dit is een totaaloverzicht van alle Genres</h1>
    <form action="{{ route('genre.create') }}">
        <input type="submit" value="Create new genre" />
    </form>
    <ul>
    @foreach($genres as $genre)
        <li>{{$genre->name}} <a href="{{route('genre.destroy', ['genre'=> $genre->id])}}">X</a></li>
        <ul>
            @foreach($genre->songs as $song)
                <li>{{$song->name}}</li>
            @endforeach
        </ul>
    @endforeach
    </ul>
@endsection