<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class likedPlaylist extends Model
{
    use HasFactory;
    public function LPlaylistUser()
    {
        return $this->belongsTo(User::class);
    }

    public function songs()
    {
        return $this->belongsToMany(Song::class,'likedplaylis_songs','likedplaylist_id','song_id')->withPivot('created_at');
    }
}
