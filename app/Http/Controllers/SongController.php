<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $songs = Song::all();
        return view('song.index', ['songs' => $songs]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::all();
        return view('song.create', ['genres' => $genres]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $message = [
            'required' => 'Je bent :attribute vergeten',
            'date' => 'Dit moet een datum zijn',
            'integer' => 'dit moet een getal zijn'
        ];
        $request->validate([
            'name' => ['required'],
            'author' => 'required',
            'releasedate' => 'required|date',
            'duration' => 'required|interger',
            'genre_id' => 'required'
        ], $message);

        Song::create([
            "name"=>$request['name'],
            "author"=>$request['author'],
            "genre_id"=>$request['genre'],
            "releasedate"=>$request['releasedate'],
            "duration"=>$request['duration']
        ]);
        return redirect(route('song.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Song $song)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Song $song)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Song $song)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Song $song)
    {
        Song::destroy($song['id']);
        return redirect(route('song.index'));
    }
}
