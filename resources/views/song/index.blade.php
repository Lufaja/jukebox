@push('style')
@endpush
@extends('layouts/navbar')
@section('content')
        @if ($request->query('filter') != null)
            <script>
                {{$selected = $request->query('filter')}}
                {{$songs = $songs->where('genre_id', '=', $request->query('filter'))}}
            </script>
            <h1>Songs with the {{head(head($songs))->genre->name}} genre</h1>
        @else
            <script>{{$selected = "all"}}</script>
            <h1>Dit is een totaaloverzicht van alle songs</h1>
        @endif
        <form method="post" action="{{route('song.filter')}}">
            @csrf
            <select name="genre" id='selector'>
                <option>all</option>
                @foreach($genres as $genre)
                <option @if($selected == $genre->id) selected @endif value='{{$genre->id}}'>{{$genre->name}}</option>
                @endforeach
            </select>
            <input type="submit" value="filter">
        </form>
            <ul>
                @foreach($songs as $song)
                <li>{{$song->name}} - {{$song->author}} | Released in {{$song->releasedate}} | Genre is {{$song->genre?->name}} |is found in playlist: @foreach($song->playlists as $playlist) {{$playlist->name}}; @endforeach <a href="{{route('song.destroy', ['song' => $song->id])}}">X</a></li>
                @endforeach
            </ul>
@endsection