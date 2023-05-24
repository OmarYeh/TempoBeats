@extends('layouts.app')

@section('title', 'Library')

@section('content')
<div class="library">
    <div class="t">
    <h3 class="titlep">PlayLists</h3>
    </div>
    <div class="allpl">
        <div class="pl">
        <div class="liked">
        <p class="textL">
            <b>The Weeknd</b>
             Starboy
 . <b>Lil Nas X</b> INDUSTRY BABY (feat.Jack Harlow)
</p>
<h2>liked Songs</h2>
<h5> 3 liked songs</h5>
 </div>
 <div class="playlists">
    <div class="logocontainer">     
        <span id="logoP" class="glyphicon glyphicon-music"></span>
    </div>
    <h4 class="text7">My Playlist</h4>
    <p class="user">Omar</p>
</div>

  </div>
        </div>
        @if (empty(Auth::user()->Subscription))
                
                  @else
                  <div class="t">
    <h3 class="titlep">Downloads</h3>
    </div>
    <div class="row3">
    <div class="album ">
                        <img src="{{ asset('images/lev.jfif') }}" />
                        <p class="musictitle" style="font-size:15px">Levitating</p>
                        <p class="author">dup lipa</p>
                        
                    </div>
</div>
                @endif
  
  </div>

  <script>
    const Al = document.getElementsByClassName('allpl')[0];
    Al.addEventListener('click',()=>{
        var url = 'http://127.0.0.1:8000/'+'LikedSongs';
      window.location.href="{{ route('likedplaylist',['id'=>auth()->check() ? auth()->user()->id : 0])}}";
      window.parent.history.pushState(null, null, url);
    })
    </script>
    
@endsection