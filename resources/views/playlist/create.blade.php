<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="{{route('playlist.store')}}">
        @csrf
        <label>Vul een naam voor het playlist in</label>
        <input name="playlistName" type="text" value={{old('playlistName')}}>
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