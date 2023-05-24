@extends('layouts.app')

@section('title', $playlist->Name)

@section('content')

<div class="playlistcontent">
<div class="topContent" style="background: {{$playlist->bgc}}">
        <div class="tcleft"><img src="{{ asset($playlist->imgsrc) }}" /></div>
        <div class="tcright">
            <p class="one">Playlist</p>
            <p class="two">{{$playlist->Name}}</p>
            <p class="three">Tempobeats - songs</p>
        </div>
    </div>
    <div class="down">   
      <div><button onclick="callParentFunction({{$playlist->id}})" style="outline:none;  background-color: rgb(214, 175, 44);border-radius:50%;border:none; width:50px;height:50px;padding:5px 20px;margin-top:15px;margin-left:15px;"><i id="pllp" class="fas fa-play"></i></button></div>
    <table id="customers">
        <thead>
        <th>#</th>
        <th></th>
    <th class="titleT">Title</th>
    <th class="AlbumT">Album</th>
    <th class="DateT">Date added</th>
    <th></th>
    <th>Time</th>
  </thead>
    <tbody>
@foreach($playlist->songs as $song)
  <tr class="songs">
    <td>{{$loop->index+1}}</td>
    <td><img class="simg" src="{{asset($song->imgsrc)}}"  width="50px" height="50px"/></td>
    <td class="titleT musict">{{ $song->Name}}</td>
    <td class="AlbumT">{{ $song->album ? $song->album->Name : 'No Album' }}</td>
    <td class="DateT">{{ $song->created_at->diffForHumans() }}</td>
    <td ><i class="fas fa-heart hal"></i> </td>
    <td><i class="fas fa-play lisplybtn"></i></td>
    <td>{{ gmdate("i:s", $song->Duration) }}</td>
  </tr>
@endforeach

  
</tbody>
</table>
    </div>
    <div class="row">
                    <div class="breakline">
                        <hr>
                    </div>
              </div>
</div>
    <script>

        

  function callParentFunction(plyid) {
   
    window.parent.loadplay(plyid);
    
  }


      
    </script>
@endsection