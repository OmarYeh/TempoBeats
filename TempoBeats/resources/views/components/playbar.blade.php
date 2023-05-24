<!Doctype html>
<html>
    <head>

    <link href="{{ asset('css/playbar.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
    </head>
<body>
<div class="bottombar">
        <div class="left">
                 <i class="material-icons">headset</i>
            <div class="creds">
              <div class="picA"></div>
              <div>
                <p id="sT" class="title"></p>
                <p  class="artist"></p>
</div>
              </div>
            <i id="Heart" class='fas fa-heart'></i>
        </div>
        <div class="middle">
            <div class="buttons">
            
                 <i id="shuffle" class="material-icons">shuffle</i>
                 <i class="material-icons sk">skip_previous</i>
                <i id="play-pause" class="fas fa-play"></i>
                <i  class="material-icons sk">skip_next</i>
                <i id="repeat" class="material-icons">repeat</i>
            </div>
            <div class="musicbar">
                <p class="initial">0:00</p>
                <input type="range" id="progress-bar" class="range1" min="0" max="100" value="0">
                <p class="final">0:00</p>
            </div>
        </div>
        <div class="right">
            <i class="material-icons">menu</i>
            <i id="speaker" class="fa fa-volume-up"></i>
            
            <input type="range" id="sound-slider" class="range2" min="0" max="100" value="100" step="1">
            
        </div>
    </div>
    <script src="{{ asset('js/Playbtn.js') }}"></script>
</body>
</html>