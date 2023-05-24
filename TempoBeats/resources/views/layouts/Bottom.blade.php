<!Doctype html>
<html>
<head>
<link href="{{ asset('css/styleHome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/search.css') }}" rel="stylesheet">
    <link href="{{ asset('css/playlist.css') }}" rel="stylesheet">
    <link href="{{ asset('css/liked.css') }}" rel="stylesheet"> 
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{asset('images/TBLogo.png')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>



        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<iframe id="my-iframe" name="myiframe" src="{{Route('Home')}}"></iframe>
@auth 
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
                 <i class="material-icons sp">skip_previous</i>
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
            <i class="material-icons mic">mic</i>
            <i id="speaker" class="fa fa-volume-up"></i>
            
            <input type="range" id="sound-slider" class="range2" min="0" max="100" value="100" step="1">
            
        </div>
    </div>
            @else
            <div id="bottom">
        <div class="bleft">
        <p class="text1">HERE'S A GLIMPSE OF TEMPOBEATS</p>
        <p class="text2">Get unlimited song access with occasional ads, no credit card required, by signing up now.</p>
        </div>
   
         @if (Route::has('register'))
            <div class="BSU sb"><p>Sign Up</p></div>
        @endif

            @endauth

</body>
<script type="module" src="{{ asset('js/Playbtn.js') }}"></script>
    <script type="module" src="{{ asset('js/Home.js') }}" async></script>
<script>
 let audio=new Audio();
       const HeartButton = document.getElementById('Heart');
       const songTb = document.getElementById('sT');
       let HeartMode = false;
HeartButton.addEventListener('click', function() {
  if (!HeartMode && !this.classList.contains('onh')) {
    $.ajax({
      url: '/AddLikedSong',
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: JSON.stringify({ songTitle:  songTb.textContent, user_id: {{ auth()->check() ? auth()->user()->id : 0 }} }),
      contentType: 'application/json',
      success: (data) => {
        console.log(data);
        this.classList.add('onh');
        HeartMode = true;
        console.log(HeartMode);
      },
      error: (xhr, status, error) => {
        console.error(error);
      },
    });
  } else {
    $.ajax({
      url: '/DeleteLikedSong',
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: JSON.stringify({ songTitle:  songTb.textContent, user_id: {{ auth()->check() ? auth()->user()->id : 0 }} }),
      contentType: 'application/json',
      success: (data) => {
        console.log(data);
        this.classList.remove('onh');
        HeartMode = false;
      },
      error: (xhr, status, error) => {
        console.error(error);
      },
    });
  }
});


/*
function saveH(title){
  $.ajax({
        url: '/SaveToHistory',
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: JSON.stringify({ title:  title }),
        contentType: 'application/json',
        success: (data) => {
          console.log(data);
          updateHistorySongs(data)
        },
        error: (xhr, status, error) => {
          console.error(error);
        },
      });
}*/

async function loadplay(plyid) {
  const url = '/PlayListsongs/' + plyid;
  const response = await fetch(url);
  const data = await response.json();
  let index = 0;
  let audio = new Audio();
  audio.controls = true;
  audio.type = 'audio/mpeg';
  audio.preload = 'auto';
  const Slider1 = document.querySelector('.range1');
       
  const timeD = document.getElementsByClassName('initial')[0];
  
  const plypb = document.getElementById('play-pause');
function updateTimeElapsed() {
  const timeElapsed = audio.currentTime;
  const minutes = Math.floor(timeElapsed / 60);
  const seconds = Math.round(timeElapsed % 60);
  const timeElapsedString = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
  timeD.textContent = timeElapsedString;
}

  function updateGradient(rangeValue) {
          const percentage = (rangeValue - Slider1.min) / (Slider1.max - Slider1.min) * 100;
          Slider1.style.backgroundImage = `linear-gradient(90deg, #d6af2c ${percentage}%, transparent ${percentage}%)`;
        }
       
        // Update gradient onload
        updateGradient(Slider1.value);
       
        // Update gradient oninput
        Slider1.addEventListener('input', (e) => {
          updateGradient(e.target.value);
        });

  const time = document.querySelector(".final");
 
 const updatePlayBar =  (Dura)=>{
     const totalMinutes = Math.floor(Dura/ 60) + ":" + (Dura % 60).toString().padStart(2, "0");
     time.textContent = totalMinutes;
 }

 function progressLoop() {
  const intervalId = setInterval(() => {
    const progress = audio.currentTime / audio.duration;
    const progressBar = document.getElementById('progress-bar');
    progressBar.value = progress * 100;
    if (!audio.paused) {
      updateTimeElapsed();
      updateGradient(progressBar.value);
    } else {
      clearInterval(intervalId);
    }
  }, 100);
}
  const songTb1 = document.querySelector("#sT");
  const songAb1 = document.querySelector(".artist");
  const albumArt1 = document.querySelector(".picA");
  const hicon1 = document.querySelector(".heart");
  
  function getCookie(name) {
  const cookieValue = document.cookie.match('(^|;)\\s*' + name + '\\s*=\\s*([^;]+)');
  return cookieValue ? cookieValue.pop() : null;
}
  function displaySongInfo(ele) {
    songTb1.textContent = ele.Name;
    updatePlayBar(ele.Duration);
    let heartMode = false;
    const likedSongsCookie = getCookie('likedSongs');
    if (likedSongsCookie != null) {
      if (likedSongsCookie.includes(ele.title)) {
        heartMode = true;
        hicon1.classList.add('onh');
      } else {
        hicon1.classList.remove('onh');
      }
    }
  }
  
  function playNext() {
    if (index >= data.length) {
      return;
    }
    
    const ele = data[index++];
    const mp4file = ele.mp4file;
    displaySongInfo(ele);
    
    audio.src = mp4file;
    audio.play()
      .then(() => {
        progressLoop();
        plypb.classList.remove('fa-play');
    plypb.classList.add('fa-pause');
      })
      .catch(error => {
        console.error(error);
      });
  }
  
  //audio.addEventListener('ended', playNext);
  //playNext();

  plypb.addEventListener('click', () => {
  if (audio.paused) {
    plypb.classList.remove('fa-play');
    plypb.classList.add('fa-pause');
    audio.play();
    progressLoop();
  } else {
    plypb.classList.remove('fa-pause');
    plypb.classList.add('fa-play');
    audio.pause();
  }
});
const nextBtn = document.getElementById('sk');
const prevBtn = document.getElementById('sp');

nextBtn.addEventListener('click', () => {
  if (index < data.length - 1) {
    index++;
    audio.pause();
    playNext();
  }
});

prevBtn.addEventListener('click', () => {
  if (index > 0) {
    index--;
    audio.pause();
    playNext();
  }
});
audio.addEventListener('seeking', () => {

});
audio.addEventListener('seeked', () => {
  updateTimeElapsed(); 
  });
}

    </script>
                
    </html>
