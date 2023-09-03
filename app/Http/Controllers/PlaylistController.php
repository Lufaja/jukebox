<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use App\Models\Song;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $playlists = Playlist::all();
        $playlists = $playlists->where('user_id', '=', Auth::user()->id);
        $tijden = [];

        foreach($playlists as $playlist){
            $total = 0;
            foreach($playlist->songs as $song) {
                $total += $song->duration;
            }
            $minuten = intdiv($total,60);
            if ($minuten>=60) {
                $x = $minuten%60;
                $uren = ($minuten-$x)/60;
                $tijd = strval($uren) . " uur, " . strval($x) ." min.";
            } else{
                $tijd = $minuten . " min.";
            }
            array_push($tijden, $tijd);
        }
        return view('playlist.index', ['playlists' => $playlists, 'tijden' => $tijden]);
    }    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('playlist.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $message = [
            'required' => 'Je bent :attribute vergeten'
        ];
        $request->validate([
            'playlistName' => 'required'
        ], $message);
        Playlist::create([
            "name"=>$request['playlistName'],
            "user_id"=>Auth::user()->id
        ]);
        return redirect(route('playlist.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Playlist $playlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Playlist $playlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Playlist $playlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Playlist $playlist)
    {
        $playlist->songs()->detach();
        Playlist::destroy($playlist['id']);
        return redirect(route('playlist.index'));
    }

    public function addSong(Playlist $playlist)
    {
        $avoid = $playlist->songs()->pluck('song_id');
        $songs = Song::whereNotIn('id', $avoid)->get();
        return view('playlist.addSong', ["playlist" => $playlist, "songs" => $songs]);
    }

    public function storeSong(Request $request, Playlist $playlist)
    {
        $message = [
            'required' => 'Je bent :attribute vergeten'
        ];
        $request->validate([
            'song_id' => 'required'
        ], $message);
        $playlist->songs()->attach($request['song_id']);
        return redirect(route('playlist.index'));
    }

    public function removeSong(Request $request, Playlist $playlist)
    {
        $playlist->songs()->detach($request['song_id']);
        return redirect(route('playlist.index'));
    }
}