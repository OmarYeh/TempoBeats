@extends('layouts.app')

@section('title', 'TempoBeat - Music for Every Moment!')

@section('content')

<div class="playlistcontent">
<div class="topContent">
        <div class="tcleft"><span class="fas fa-heart" style="font-size:50px;color:white"></span></div>
        <div class="tcright">
            <p class="one">Playlist</p>
            <p class="two">Liked Songs</p>
            <p class="three">{{auth()->user()->name}} songs</p>
        </div>
    </div>
    <div class="down">   
    <table id="customers">
        <thead>
        <th>#</th>
    <th class="titleT">Title</th>
    <th class="AlbumT">Album</th>
    <th class="DateT">Date added</th>
    <th></th>
    <th>Time</th>
  </thead>
    <tbody>
      
      @foreach($likedSongs->songs as $song)
  <tr>
  <td>{{$loop->index+1}}</td>
    <td class="titleT">{{ $song->Name}}</td>
    <td class="AlbumT">{{ $song->album ? $song->album->Name : 'No Album' }}</td>
    
    <td class="DateT">{{ $song->pivot->created_at->diffForHumans() }}</td>
    
    <td><i class="fas fa-heart HbtnLp"></i></td>
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
   const HbtnLps = document.querySelectorAll(".HbtnLp");
HbtnLps.forEach((heartIcon) => {
  heartIcon.addEventListener('click', (event) => {
    event.preventDefault();
    const songTitle = event.target.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.innerText;
    $.ajax({
      url: '/DeleteLikedSong',
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: JSON.stringify({ songTitle: songTitle, user_id:{{auth()->user()->id}} }),
      contentType: 'application/json',
      success: (data) => {
        console.log(data);
        event.target.parentElement.parentElement.parentElement.removeChild(event.target.parentElement.parentElement);
      },
      error: (xhr, status, error) => {
        console.error(error);
      },
    });
  });
});
    </script>
@endsection