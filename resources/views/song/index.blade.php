@push('style')
@endpush
@extends('layouts/navbar')
@section('content')
        @if ($request->query('filter') != null)
        <?php $songs = $songs->where('genre_id', '=', $request->query('filter'))?>
        <h1>Songs with the {{head(head($songs))->genre->name}} genre</h1>
        <select name="genre" id='selector'>
                <option>all</option>
                @foreach($genres as $genre)
                <option @if($request->query('filter') == $genre->id) selected @endif value='{{$genre->id}}'>{{$genre->name}}</option>
                @endforeach
            </select>
            <button type="submit" id="filterButton">filter</button>
            <ul>
                @foreach($songs as $song)
                <li>{{$song->name}} - {{$song->author}} | Released in {{$song->releasedate}} | Genre is {{$song->genre?->name}} |is found in playlist: @foreach($song->playlists as $playlist) {{$playlist->name}}; @endforeach <a href="{{route('song.destroy', ['song' => $song->id])}}">X</a></li>
                @endforeach
        @else
        <h1>Dit is een totaaloverzicht van alle songs</h1>
        <select name="genre" id='selector'>
            <option>all</option>
            @foreach($genres as $genre)
            <option @if(old('genre') == $genre->id) selected @endif value='{{$genre->id}}'>{{$genre->name}}</option>
            @endforeach
        </select>
        <button type="submit" id="filterButton">filter</button>
        <ul>    
                @foreach($songs as $song)
                    <li>{{$song->name}} - {{$song->author}} | Released in {{$song->releasedate}} | Genre is {{$song->genre?->name}} |is found in playlist: @foreach($song->playlists as $playlist) {{$playlist->name}}, @endforeach <a href="{{route('song.destroy', ['song' => $song->id])}}">X</a></li>
                @endforeach
        @endif
    </ul>
    <a href="{{route('song.create')}}">create new</a>
    <script>
        var x = document.getElementById("filterButton")
        var y = document.getElementById("selector")
        x.addEventListener("click", someFunction)
        function someFunction() {
            y = y.options[ y.selectedIndex ].value
            if (y == ""){
                window.location = "overview";
            }else{
                window.location = "?filter="+y;
            }
        }
    </script>
@endsection