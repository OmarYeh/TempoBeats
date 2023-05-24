@extends('layouts.app')


@section('content')
    <div class="playlistcontent" style="max-height: 89.5vh; min-height: 89.5vh">
        <div class="topContent" style="  background: {{$song->bgc}};  height: 40%">
            <div class="tcleft" style="padding: 0px;height: 180px;width: 180px;border-radius: 15px;"><img class="simg" src="{{ asset($song->imgsrc) }}" style="height: 100%;width: 100%;box-shadow: 0px 0px 7px black; border-radius: 15px;"/></div>
            <div class="tcright">
                <p class="one">Song</p>
                <p class="two" style="font-weight: 600;font-size: 65px;">{{$song->Name}}</p>
                <div style="display:flex;">
                    <p class="three" style="font-weight: 700;">{{ $song->artist->implode('name', ' & ') }}</p>
                    <p style="color: white;margin: 0;padding: 0;font-family: sans-serif; margin-left:10px;">~</p>
                    <p style="color: white;margin: 0;padding: 0;font-family: sans-serif; margin-left:10px;"> {{ gmdate("i:s", $song->Duration) }} </p>
                </div>
            </div>
        </div>
        <div class="bottomhalf" style="height: 59%;">
            <div class="playlike" style="padding-top: 25px;padding-left: 40px;display: flex;align-items: center;">
            
            <div class="playbtn"style=" width:50px;height:50px;background-color: rgb(214, 175, 44);border-radius:50%; margin-right:25px;" ><i class="fas fa-play plybtn" style="font-size:27px"></i></div>
            <div><i class="fas fa-heart hpl" style="font-size:35px"></i></div>
            </div>
            <div class="lyricssection">
                <p style="color: white;margin: 0;padding: 0; font-weight: 700;font-size: 40px;font-family: sans-serif;margin-left: 50px;margin-top: 13px;">Lyrics</p>
                <p style="color: lightgray;margin: 0;padding: 0;font-size: 20px;font-family: sans-serif;width: 450px;margin-left: 50px;margin-top: 13px;word-spacing: 5px;line-height: 30px;">
                   {{$song->lyrics}}</p>
            </div>
        </div>


    </div>

@endsection