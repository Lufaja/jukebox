<?php

namespace Database\Seeders;

use App\Models\Playlist;
use App\Models\Song;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            GenreSeeder::class,
            PlaylistSeeder::class,
            SongSeeder::class
        ]);
        
        Playlist::all()->each(function($playlist){
            $songs = Song::inRandomOrder()->limit(20)->get();
            $playlist->songs()->attach($songs->pluck('id'));
        });
        
    }
}
