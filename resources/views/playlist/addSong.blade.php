    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <form method="POST" action="{{route('playlist.storeSong', ['playlist' => $playlist])}}">
            @csrf
            <label>Kies een liedje om toe te voegen aan {{$playlist->name}}</label>
            <br>
            <select name='song_id'>
                @foreach($songs as $song)
                <option value='{{$song->id}}'>{{$song->name}}</option>
                @endforeach
            </select>
            <br>
            <input type="submit" value="send me">
        </form>
    </body>
    <style>
        html, body {
        height: 100%;
    }

    html {
        display: table;
        margin: auto;
    }

    body {
        display: table-cell;
        vertical-align: middle;
    }
    </style>
    </html>