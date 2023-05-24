<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\song;
use App\Models\history;
use Illuminate\Support\Facades\Auth;
class SongsController extends Controller
{
    //
    public function GetSong($title)
    {
        
        $song = Song::where('Name', $title)->first();

        if ($song) {
            return response()->json(["title"=>$song->Name,"Duration"=>$song->Duration,"mp3"=>$song->mp4file]);
        } else {
            return response()->json(["error"=>"Song not found"]);
        }
    }
    public function lyrcis($name){
        $song = song::where('Name',$name)->first();
        return view('lyrcis')->with('song',$song);
    }

    public function Allsongs(){
        $allsongs = song::all();
        return view('Allsongs')->with('Allsongs',$allsongs);
    }

    public function saveSong(Request $request){
        $song = song::where(['Name'=>$request->title])->first();
        if($song == null){
            return "song is null";
        }
        $oldhis = history::where(['user_id'=>Auth::id(),'song_id'=>$song->id])->first();
        if($oldhis){
            $oldhis->delete();
        }
        $history = new history();
        $history->user_id = Auth::id();
        $history->song_id = $song->id;
      
            $history->save();
            $newhis =  history::where('user_id',Auth::id());
            return  "song saved to history";
    
    }

    public function getHistory() {
        $historySongs = history::where('user_id',Auth::id())->get();
        $songs = $historySongs->map(function($history) {
            return [
                'id' => $history->song_id,
                'imgsrc' => $history->getSong->imgsrc,
                'name' => $history->getSong->Name,
                'artists' => $history->getSong->artist->pluck('name')->implode(' & ')
            ];
        });
    
        return response()->json([
            'historySongs' => $songs
        ]);
    }
    
  
}
