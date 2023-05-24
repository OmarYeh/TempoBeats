<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\song;
use App\Models\artist;
class SearchController extends Controller
{
    public function Index(){
        $view = view('Search');
        $section = array('content','search','title');
        //$view->renderSections($section); // Renders only the 'content' section

    return $view;
    }

    public function Ssongs(Request $request){
        $searchsongs = song::where('Name', 'like', '%' . $request->search . '%')->get();
        $searchArtistSongs = artist::where('name','like', '%' . $request->search . '%')->get();
        return view('SearchS')->with(["searchSongs"=>$searchsongs,"searchArtistSongs"=>$searchArtistSongs]);
        //return $searchsongs;
    }


}
