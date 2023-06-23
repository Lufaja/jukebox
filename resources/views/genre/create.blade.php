<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="{{route('genre.store')}}">
        @csrf
        <label>Vul een naam voor het genre in</label>
        <input name="genreName" type="text">
        <input type="submit" value="send me">
    </form>
</body>
</html>