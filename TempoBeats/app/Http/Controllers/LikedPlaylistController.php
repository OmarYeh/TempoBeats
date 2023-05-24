<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\likedPlaylist;
use App\Models\song;
use App\Models\likedplaylis_songs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use DateTime;
use DateTimeZone;
class LikedPlaylistController extends Controller
{
    //
    public function index($id){
        $likedP = likedPlaylist::where('user_id',$id)->first();
         return view('LikedPlaylist')->with(["likedSongs"=>$likedP]);
    }

    public function create(Request $request){
        if($request->user_id == 0){

            $song = song::where('Name',$request->songTitle)->first();
            $Lpl = likedPlaylist::where('user_id',Auth::id())->first();
            $data = new likedplaylis_songs();
            $data->song_id =$song->id;
            $data->likedplaylist_id =$Lpl->id;
            
            $cd = new DateTime('now', new DateTimeZone('Europe/Paris'));
            $data->DateAdded =$cd->format('Y-m-d H:i:s');
            
            $data->save();
            $ply = likedPlaylist::where('user_id', Auth::id())->first();
            $Nsongs = $ply->songs;
            $songnames = $Nsongs->pluck('Name')->toArray();
            $likedSongsString = implode(',', $songnames);
            if ($likedSongsString) {
                Cookie::queue('liked_songs', $likedSongsString, 60*24*7, null, null, false, false);
            }
        }
        else{
        $song = song::where('Name',$request->songTitle)->first();
        $Lpl = likedPlaylist::where('user_id',$request->user_id)->first();
        $data = new likedplaylis_songs();
        $data->song_id =$song->id;
        $data->likedplaylist_id =$Lpl->id;
        
        $cd = new DateTime('now', new DateTimeZone('Europe/Paris'));
        $data->DateAdded =$cd->format('Y-m-d H:i:s');
        
        $data->save();
        $ply = likedPlaylist::where('user_id', $request->user_id)->first();
        $Nsongs = $ply->songs;
        $songnames = $Nsongs->pluck('Name')->toArray();
        $likedSongsString = implode(',', $songnames);
        if ($likedSongsString) {
            Cookie::queue('liked_songs', $likedSongsString, 60*24*7, null, null, false, false);
        }
    }
        return  "The song has been added";
    }

    public function delete(Request $request){
        if($request->user_id == 0){
            $song = song::where('Name',$request->songTitle)->first();
            $likedP = likedPlaylist::where('user_id',Auth::id())->first();
            $likedsong = likedplaylis_songs::where(['likedplaylist_id' => $likedP->id, 'song_id' => $song->id])->first();
            $likedsong->delete();
            $ply = likedPlaylist::where('user_id',Auth::id())->first();
            $Nsongs = $ply->songs;
            $songnames = $Nsongs->pluck('Name')->toArray();
            $likedSongsString = implode(',', $songnames);
            if ($likedSongsString) {
                Cookie::queue('liked_songs', $likedSongsString, 60*24*7, null, null, false, false);
            }
        }
        else{
        $song = song::where('Name',$request->songTitle)->first();
        $likedP = likedPlaylist::where('user_id',$request->user_id)->first();
        $likedsong = likedplaylis_songs::where(['likedplaylist_id' => $likedP->id, 'song_id' => $song->id])->first();
        $likedsong->delete();
        $ply = likedPlaylist::where('user_id', $request->user_id)->first();
        $Nsongs = $ply->songs;
        $songnames = $Nsongs->pluck('Name')->toArray();
        $likedSongsString = implode(',', $songnames);
        if ($likedSongsString) {
            Cookie::queue('liked_songs', $likedSongsString, 60*24*7, null, null, false, false);
        }
    }
        return "song deleted from playlist";
    }
}
