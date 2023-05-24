@extends('layouts.app')

@section('title', 'TempoBeat - Music for Every Moment!')

@section('content')

<div class="musicmenu">
    @auth
<div class="row">
                    <div class="titleR">
                        <h4 class="Title">History</h4>
                        <a href="{{Route('Allsongs')}}"><p class="sh">Show all</p></a>
                    </div>
                        <div id="history-songs-container" class="RowC">   
                                    @foreach(auth()->user()->getHistorySong as $key => $obj)
                        @if($key < 5)
                            <div class="album " :href="route('track',['id',$obj->id])">
                                <img src="{{ asset($obj->getSong->imgsrc) }}" />
                                <p class="musictitle" style="font-size:15px">{{$obj->getSong->Name}}</p>
               
                                <p class="author">{{ $obj->getSong->artist->implode('name', ' & ') }}</p>
               
                                <div class="playbtn"><i class="fas fa-play plybtn"></i></div>
                            </div>
                                                    @else
                            @break
                        @endif
                    @endforeach
                    </div>
</div>
@endif
                <div class="row">
                    <div class="titleR">
                        <h4 class="Title">Today's Top Hit</h4>
                        <a href="{{Route('Allsongs')}}"><p class="sh">Show all</p></a>
                    </div>
               
                <div class="RowC">   
                @foreach($songs as $key => $obj)
    @if($key < 5)
        <div class="album " :href="route('track',['id',$obj->id])">
            <img src="{{ asset($obj->Isrc) }}" />
            <p class="musictitle" style="font-size:15px">{{$obj->song_name}}</p>
            <p class="author">{{$obj->artist_name}}</p>
            <div class="playbtn"><i class="fas fa-play plybtn"></i></div>
        </div>
    @else
        @break
    @endif
@endforeach

              </div>
              </div>
    
              <div class="row">
                    <div class="titleR">
                        <h4 class="Title">Live The Moment</h4>
                        <p class="sh">Show all</p>
                    </div>
               
                <div class="RowC">
                    @foreach($playlists as $key => $obj)
                    @if($key < 5)
                    <div class="playlist" style="background-image:url({{ asset($obj->imgsrc)}} )">
                            <div class="text">
                                <h4 class="plyt">{{$obj->Name}}</h4>
                                <p>{{$obj->des}}</p>
                            </div>
                    </div>
                    @else
        @break
    @endif
@endforeach
                  
                </div>
              </div>
              <div class="row">
                    <div class="breakline">
                        <hr>
                    </div>
              </div>
            </div>

           
@endsection
