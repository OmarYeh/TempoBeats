let likedSongsCookie ;
setInterval(() => {
  likedSongsCookie= decodeURIComponent(document.cookie)
  .split('; ')
  .find(cookie => cookie.startsWith('liked_songs='))
  ?.split('=')[1];
}, 2000);

var iframe = document.getElementById('my-iframe');
let plybtns;
const songTb = document.querySelector("#sT");
const songAb = document.querySelector(".artist");
const Cred = document.querySelector(".picA");
let song ;
const hicon = document.querySelector('#Heart');
//let audio = new Audio();
audio.controls = true;
audio.type = 'audio/mpeg';
audio.preload = 'auto';
iframe.addEventListener('load', function() {
  var iframeDocument = iframe.contentWindow.document;
  plybtns = iframeDocument.querySelectorAll(".playbtn");
  plybtns.forEach(ele=>{
      ele.addEventListener("click",async ()=>{
          const pele = ele.parentElement;
       
          event.stopPropagation();
          songAb.textContent = pele.querySelector(".author").textContent;
          songTb.textContent = pele.querySelector(".musictitle").textContent;
          const newImage = document.createElement('img');
          newImage.src = pele.querySelector('img').getAttribute('src');
          newImage.style.width = '50px';
          newImage.style.height ='55px';
         if(  Cred.querySelector('img')){
          Cred.removeChild(Cred.querySelector('img')); 
          Cred.appendChild(newImage);
         }else{
         Cred.appendChild(newImage);
         } 
         let HeartMode;
        if(likedSongsCookie !=null){
         
          if (likedSongsCookie.includes(songTb.textContent)) {
               HeartMode = true;
              
               hicon.classList.add('onh');
          }else {
              HeartMode = false;
              hicon.classList.remove('onh');
          }
      }
         const url = '/SongDetails/'+ pele.querySelector(".musictitle").textContent.toString().toLocaleLowerCase();
       
  
         
           try {
             const response = await fetch(url, {
               method: "get",
               headers: {
                 "Content-Type": "application/json",
               },
             });
             const data = await response.json();
              song = data;
              audio.src = data.mp3;
              
  
          progressLoop();
             updatePlayBar();
           } catch(error) {
             console.log(error);
           }
         
          })
          
  });
  const time = window.parent.document.querySelector(".final");
 
  const updatePlayBar =  ()=>{
      const totalMinutes = Math.floor(song['Duration'] / 60) + ":" + (song['Duration'] % 60).toString().padStart(2, "0");
      time.textContent = totalMinutes;
  }

 
  const albtn = iframeDocument.querySelectorAll(".plybtt");

  if(albtn){
  albtn.forEach(ele=>{
    ele.addEventListener("click",async ()=>{
        const pele = ele.parentElement.parentElement;
       
        event.stopPropagation();
        songAb.textContent = pele.querySelector(".art").textContent;
        songTb.textContent = await pele.querySelector(".musict").textContent;
        const newImage = document.createElement('img');
        newImage.src = await pele.querySelector('img').getAttribute('src');
        newImage.style.width = '50px';
        newImage.style.height ='55px';
       if(  Cred.querySelector('img')){
        Cred.removeChild(Cred.querySelector('img')); 
        Cred.appendChild(newImage);
       }else{
       Cred.appendChild(newImage);
       } 
       let HeartMode;
      if(likedSongsCookie !=null){
       
        if (likedSongsCookie.includes(songTb.textContent)) {
             HeartMode = true;
            
             hicon.classList.add('onh');
        }else {
            HeartMode = false;
            hicon.classList.remove('onh');
        }
    }
       const url = '/SongDetails/'+ pele.querySelector(".musict").textContent.toString().toLocaleLowerCase();
     

       
         try {
           const response = await fetch(url, {
             method: "get",
             headers: {
               "Content-Type": "application/json",
             },
           });
           const data = await response.json();
            song = data;
            audio.src = data.mp3;
            

          
           updatePlayBar();
         } catch(error) {
          
         }
       
        })
        
});
  }
  const alht = iframeDocument.querySelectorAll('.hal');
 

  if(alht){  
    alht.forEach(ele => {
      if(likedSongsCookie !=null){
        if (likedSongsCookie.includes(ele.parentElement.parentElement.querySelector(".musict").textContent)) {
      
             ele.classList.add('onh');
        }else {
          ele.classList.remove('onh');
        }
    }
          ele.addEventListener('click', function() {
           
            if (!this.classList.contains('onh')) {
              $.ajax({
                url: '/AddLikedSong',
                method: 'POST',
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: JSON.stringify({ songTitle:  ele.parentElement.parentElement.querySelector(".musict").textContent , user_id: 0  }),
                contentType: 'application/json',
                success: (data) => {
                
                  this.classList.add('onh');
                  HeartMode = true;
                
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
                data: JSON.stringify({ songTitle:  ele.parentElement.parentElement.querySelector(".musict").textContent, user_id: 0 }),
                contentType: 'application/json',
                success: (data) => {
                 
                  this.classList.remove('onh');
                  HeartMode = false;
                },
                error: (xhr, status, error) => {
                  console.error(error);
                },
              });
            }
        });
  });
}


const sbtns = iframeDocument.querySelector('.playbtn');
if(sbtns){
sbtns.addEventListener('click',async ()=>{
  songAb.textContent = iframeDocument.querySelector(".three").textContent;
  songTb.textContent = await iframeDocument.querySelector(".two").textContent;
        const newImage = document.createElement('img');
        newImage.src = await iframeDocument.querySelector('.simg').getAttribute('src');
        newImage.style.width = '50px';
        newImage.style.height ='55px';
       if(  Cred.querySelector('img')){
        Cred.removeChild(Cred.querySelector('img')); 
        Cred.appendChild(newImage);
       }else{
       Cred.appendChild(newImage);
       } 
       let HeartMode;
      if(likedSongsCookie !=null){
       
        if (likedSongsCookie.includes(songTb.textContent)) {
             HeartMode = true;
             
             hicon.classList.add('onh');
        }else {
            HeartMode = false;
            hicon.classList.remove('onh');
        }
    }
       const url = '/SongDetails/'+ iframeDocument.querySelector(".two").textContent.toString().toLocaleLowerCase();
     

       
         try {
           const response = await fetch(url, {
             method: "get",
             headers: {
               "Content-Type": "application/json",
             },
           });
           const data = await response.json();
            song = data;
            audio.src = data.mp3;
            

          
           updatePlayBar();
         } catch(error) {
           console.log(error);
         }
})
}
const hpss = iframeDocument.querySelector('.hpl');
console.log(hpss);
if(hpss){
  console.log('in if',iframeDocument.querySelector(".two").textContent.toString().toLocaleLowerCase())
  if(likedSongsCookie !=null){
    console.log('check liked')
    if (likedSongsCookie.includes(iframeDocument.querySelector(".two").textContent.toString().toLocaleLowerCase())) {
        console.log('adding onh')
         hpss.classList.add('onh');
    }else {
      hpss.classList.remove('onh');
    }
}
hpss.addEventListener('click',()=>{
  if (!this.classList.contains('onh')) {
    $.ajax({
      url: '/AddLikedSong',
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: JSON.stringify({ songTitle:  iframeDocument.querySelector(".two").textContent.toString().toLocaleLowerCase() , user_id: 0  }),
      contentType: 'application/json',
      success: (data) => {
       
        this.classList.add('onh');
        HeartMode = true;
       
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
      data: JSON.stringify({ songTitle:  iframeDocument.querySelector(".two").textContent.toString().toLocaleLowerCase() , user_id: 0 }),
      contentType: 'application/json',
      success: (data) => {
       
        this.classList.remove('onh');
        HeartMode = false;
      },
      error: (xhr, status, error) => {
        console.error(error);
      },
    });
  }
})
}

const plylistplybtn =  iframeDocument.querySelectorAll('.lisplybtn');
plylistplybtn.forEach(ele=>{
ele.addEventListener('click',async ()=>{
  const pele = ele.parentElement.parentElement;
        songAb.textContent = pele.querySelector(".AlbumT").textContent;
        songTb.textContent = await pele.querySelector(".musict").textContent;
        const newImage = document.createElement('img');
        newImage.src = await pele.querySelector('.simg').getAttribute('src');
        newImage.style.width = '50px';
        newImage.style.height ='55px';
       if(  Cred.querySelector('img')){
        Cred.removeChild(Cred.querySelector('img')); 
        Cred.appendChild(newImage);
       }else{
       Cred.appendChild(newImage);
       } 
       let HeartMode;
      if(likedSongsCookie !=null){
       
        if (likedSongsCookie.includes(songTb.textContent)) {
             HeartMode = true;
             
             hicon.classList.add('onh');
        }else {
            HeartMode = false;
            hicon.classList.remove('onh');
        }
    }
       const url = '/SongDetails/'+ pele.querySelector(".musict").textContent.toString().toLocaleLowerCase();
     

       
         try {
           const response = await fetch(url, {
             method: "get",
             headers: {
               "Content-Type": "application/json",
             },
           });
           const data = await response.json();
            song = data;
            audio.src = data.mp3;
            

          
           updatePlayBar();
         } catch(error) {
           console.log(error);
         }
})
})

const songA = iframeDocument.querySelectorAll('.songs');
console.log(songA);
songA.forEach(ele=>{
 ele.addEventListener("click",()=>{
   iframe.src = "/track/" + ele.querySelector('.musict').textContent;

})
})
});
const micbtn = document.querySelector('.mic');
micbtn.addEventListener('click',()=>{
 const mt = document.querySelector('.title');
 iframe.src = '/lyrcis/'+mt.textContent;
});

audio.addEventListener('seeking', () => {

});
audio.addEventListener('seeked', () => {
  updateTimeElapsed(); 
  });
  const playPauseButton = document.getElementById('play-pause');

audio.addEventListener('ended', function() {
  console.log('the songs has ended');
  playPauseButton.classList.remove('fa-pause');
  playPauseButton.classList.add('fa-play');
});





playPauseButton.addEventListener('click', async function() {
    if (!audio.paused) {
      this.classList.remove('fa-pause');
      this.classList.add('fa-play');
      audio.pause();
    }else {
   
    this.classList.remove('fa-play');
      this.classList.add('fa-pause');
      audio.play();
      progressLoop();
      updateTimeElapsed(); 
      const bartitle = document.querySelector('.title') 
      const url2 = 'SaveToHistory/'+ bartitle.textContent.toString().toLocaleLowerCase();
      //saveH(bartitle.textContent);
      $.ajax({
        url: '/SaveToHistory',
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: JSON.stringify({ title:  bartitle.textContent }),
        contentType: 'application/json',
        success: (data) => {

        //  updateHistorySongs()
        },
        error: (xhr, status, error) => {
          console.error(error);
        },
      });
  
  }
});



const progressBar = document.getElementById('progress-bar');
progressBar.value = 0; // set initial value to 0

progressBar.addEventListener("input",()=>{
  audio.pause();

  audio.currentTime =  audio.duration * (progressBar.value / 100);
  updateTimeElapsed(); 
  audio.play();

})




const timeD = document.getElementsByClassName('initial')[0];
function updateTimeElapsed() {
  const timeElapsed = audio.currentTime;
  const minutes = Math.floor(timeElapsed / 60);
  const seconds = Math.round(timeElapsed % 60);
  const timeElapsedString = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
  timeD.textContent = timeElapsedString;
}
function progressLoop() {
  const intervalId = setInterval(() => {
    const progress = audio.currentTime / audio.duration;
    progressBar.value = progress * 100;
    if (!audio.paused) {
      updateTimeElapsed();
      updateGradient(progressBar.value);
    } else {
      clearInterval(intervalId);
    }
  }, 100);
}




const shuffleButton = document.getElementById('shuffle');
let shuffleMode = 'off';
shuffleButton.addEventListener('click', function() {
  if (shuffleMode === 'off') {
    this.classList.add('on');
    shuffleMode = 'on';
  } else {
    this.classList.remove('on');
    shuffleMode = 'off';
  }
});






const slider = document.getElementById('sound-slider');
slider.addEventListener('input', (e) => {
  const volume = parseFloat(e.target.value / 100);
  audio.volume = volume;
  volumeIcon();
});


const repeatButton = document.getElementById('repeat');
let repeatMode = 'off';
repeatButton.addEventListener('click', function() {
  if (repeatMode === 'off') {
    this.classList.add('on');
    repeatMode = 'on';
    audio.loop = true;
  } else {
    this.classList.remove('on');
    repeatMode = 'off';
    audio.loop = false;
  }
});


const volumespeak = document.getElementById('speaker');


function volumeIcon() {
  const SoundVolume = audio.volume;
  if (SoundVolume > 0 && volumespeak.classList.contains("fa-volume-mute")) {
    volumespeak.classList.remove("fa-volume-mute");
  }


  if (SoundVolume == 1 || SoundVolume >= 0.5) {
    volumespeak.classList.toggle("fa-volume-up", true);
    volumespeak.classList.toggle("fa-volume-down", false);
  } else if (SoundVolume < 0.5 && SoundVolume != 0) {
    volumespeak.classList.toggle("fa-volume-down", true);
    volumespeak.classList.toggle("fa-volume-up", false);

  } else if (SoundVolume == 0) {
      volumespeak.classList.toggle("fa-volume-mute", true);
      volumespeak.classList.toggle("fa-volume-up", false);
      volumespeak.classList.toggle("fa-volume-down", false);
    }
  }




let previousVolume = audio.volume;
  volumespeak.addEventListener("click", () => {
    if (volumespeak.classList.contains("fa-volume-mute")) {
      volumespeak.classList.remove("fa-volume-mute");
      audio.volume= previousVolume;
      slider.value = previousVolume * 100;
      updateGradient2( slider.value);
      volumeIcon();
    } else {
      if(volumespeak.classList.contains("fa-volume-up")){
        volumespeak.classList.remove("fa-volume-up");
      }else if(volumespeak.classList.contains("fa-volume-down")){
        volumespeak.classList.remove("fa-volume-down");
      }
      volumespeak.classList.add("fa-volume-mute");
      previousVolume = audio.volume;
      audio.volume=0;
      slider.value = 0;
      updateGradient2( slider.value);
    }
  });


  const Slider1 = document.querySelector('.range1');
       


        function updateGradient2(rangeValue) {
          const percentage = (rangeValue - slider.min) / (slider.max - slider.min) * 100;
          slider.style.backgroundImage = `linear-gradient(90deg, #d6af2c ${percentage}%, transparent ${percentage}%)`;
        }
       
        // Update gradient onload
        updateGradient2(slider.value);
       
        // Update gradient oninput
        slider.addEventListener('input', (e) => {
            updateGradient2(e.target.value);
        });


     


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

   
       