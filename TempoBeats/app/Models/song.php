<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class song extends Model
{
    use HasFactory;
    public function playlists()
    {
        return $this->belongsToMany(Playlist::class,'playlistsongs','song_id','playlist_id');
    }

    public function Likedplaylists()
    {
        return $this->belongsToMany(Likedplaylist::class,'likedplaylis_songs','song_id','likedplaylist_id');
    }


    public function album()
    {
        return $this->belongsTo(Album::class);
    }

    public function artist()
    {
        return $this->belongsToMany(Artist::class,'song_artists','song_id','artist_id');
        
    }

    public function getHistoryUser(){
        return $this->hasMany(history::class);
    }
}
