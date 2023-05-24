<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\song;
use App\Models\artist;
use Illuminate\Support\Facades\Cookie;
use App\Models\likedPlaylist;
use App\Models\playlist;

class HomePageController extends Controller
{
    //
  /*  public function DataForSongs(){
        $dataS=song::all();
        $dataA=artist::all();

    } */
    public function create()
    {
        $songs = DB::table('songs')
            ->leftJoin('song_artists', 'songs.id', '=', 'song_artists.song_id')
            ->leftJoin('artists', 'song_artists.artist_id', '=', 'artists.id')
            ->select(DB::raw('songs.Name as song_name'), DB::raw('GROUP_CONCAT(artists.name SEPARATOR " & ") as artist_name'),DB::raw('songs.imgsrc as Isrc'))
            ->groupBy('songs.id', 'songs.Name','songs.imgsrc')
            ->get();
    
        $userId = auth()->check() ? auth()->id() : null;
        $likedSongsString = null;
        if ($userId) {
            
            $ply = likedPlaylist::where('user_id', $userId)->first();
             $Nsongs = $ply->songs;
                $songnames = $Nsongs->pluck('Name')->toArray();
             $likedSongsString = implode(',', $songnames);
          
        }
        $allply = playlist::all();
        
        $response = view('welcome', ['songs'=>$songs,'playlists'=>$allply]);
        if ($likedSongsString) {
            Cookie::queue('liked_songs', $likedSongsString, 60*24*7, null, null, false, false);
        }else{
            Cookie::queue('liked_songs', null, 60*24*7, null, null, false, false);
        }
        return $response;
    }
    

    public function getsongDetail($name){
        $song = song::where('Name', $name)->first();
        return view('song')->with('song',$song);
    }
    
    public function getPrivacy(){

        $file_path = public_path('download/TempoBeatsPrivacyPolicy.pdf'); 
        return response()->download($file_path);
    }

    public function getTermsOfService(){

        $file_path = public_path('download/TempoBeatsTermsOfService.pdf'); 
        return response()->download($file_path);
    }
    
}
