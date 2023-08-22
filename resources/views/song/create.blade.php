<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Add a Song</h1>
    <form method="POST" action="{{route('song.store')}}">
        @csrf
        <label>Vul een naam voor het liedje in</label>
        <input name="name" type="text" value='{{old('name')}}'>
        @error('name')
            <span style='color:red'>{{$message}}</span>
        @enderror
        <br>
        <label>Vul een author voor het liedje in</label>
        <input name="author" type="text">
        @error('author')
            <span style='color:red'>{{$message}}</span>
        @enderror
        <br>
        <label>Vul een genre voor het liedje in</label>
        <select name="genre">
            @foreach($genres as $genre)
            <option @if(old('genre') == $genre->id) selected @endif value='{{$genre->id}}'>{{$genre->name}}</option>
            @endforeach
        </select>
        @error('genre')
            <span style='color:red'>{{$message}}</span>
        @enderror
        <br>
        <label>Vul een releasedate voor het liedje in</label>
        <input name="releasedate" type="date">
        @error('releasedate')
            <span style='color:red'>{{$message}}</span>
        @enderror
        <br>
        <label>Vul een duratie voor het liedje in</label>
        <input name="duration" type="number">
        @error('duration')
            <span style='color:red'>{{$message}}</span>
        @enderror
        <br>

        <input type="submit" value="Send me!">
    </form>
</body>
</html>