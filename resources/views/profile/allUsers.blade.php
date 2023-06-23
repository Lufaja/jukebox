@extends('layouts/navbar')
@section('content')

    <h1>Hier zijn alle users</h1>
    @foreach ($users as $user)
        <p>{{$user['name']}}</p>
    @endforeach

@endsection