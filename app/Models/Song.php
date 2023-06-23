<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $fillable = [
        'name',
        'author',
        'genre_id',
        'releasedate',
        'duration'
    ];    
    use HasFactory;

    public function playlists(){
        return $this->belongsToMany(Playlist::class);
    }
    
    public function genre(){
        return $this->belongsTo(Genre::class);   
    }

}
