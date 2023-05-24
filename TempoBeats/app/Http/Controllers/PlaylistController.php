<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\song;
use App\Models\playlist;
use App\Models\album;
use App\Models\playlistsongs;

class PlaylistController extends Controller
{
    //
    public function index($playlistname){
        $playlist = Playlist::with(['songs.album'])->where('Name', $playlistname)->first();
        return view("playlist")->with('playlist',$playlist);
    }

    public function create(Request $request){
        $song = song::where('Name',$request->songtitle)->first();
        return "ok";
    }

    public function delete(Request $request){
        $song = song::where('Name',$request->songTitle)->first();
        $playlistsongs = playlistsongs::where(['playlist_id' => $request->playlistid, 'song_id' => $song->id])->first();
        $playlistsongs->delete();
        return "song deleted from playlist";
    }

    public function GetPLaySong($id){
        $playlist = Playlist::find($id);
        return $playlist->songs;

    }
}
