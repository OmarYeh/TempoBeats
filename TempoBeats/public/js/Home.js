const likedSongsCookie = decodeURIComponent(document.cookie)
  .split('; ')
  .find(cookie => cookie.startsWith('liked_songs='))
  ?.split('=')[1];




        const albums = document.querySelectorAll(".album");
        

        albums.forEach(ele => {
            const playBtnDiv = ele.querySelector('.playbtn');
            ele.addEventListener("mouseover",()=>{
                ele.style.backgroundColor="rgba(255,255,255,0.1)";
                playBtnDiv.style.opacity="1";
                
            })
            ele.addEventListener("mouseout",()=>{
                ele.style.backgroundColor="";
                playBtnDiv.style.opacity="0";
            })

            ele.addEventListener("click",()=>{
                window.location.href = "/track/" + ele.querySelector('.musictitle').textContent;
            })
        });


        const plylt = document.querySelectorAll(".playlist");

        plylt.forEach(ele => {
            const text = ele.querySelector('.text');
            let PlTitle;
            ele.addEventListener("mouseover",()=>{
                text.style.display="flex";
                text.style.opacity="1";
                 PlTitle = ele.querySelector('.plyt').textContent;
               
            })
            ele.addEventListener("mouseout",()=>{
                ele.style.opacity="1";
               text.style.display="none";
            })

            ele.addEventListener("click",()=>{
                window.location.href = "/playlist/" + PlTitle;
            })
        });
/*
        const plybtns = document.querySelectorAll(".playbtn");
        console.log(plybtns);
        const songTb = window.parent.document.querySelector("#sT");
        const songAb = window.parent.document.querySelector(".artist");
        const Cred = window.parent.document.querySelector(".picA");
        let song ;
console.log(songAb);
 let audio = new Audio();

        const hicon = window.parent.document.querySelector('#Heart');
        plybtns.forEach(ele=>{
            ele.addEventListener("click",async ()=>{
                const pele = ele.parentElement;
                console.log(pele);
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
                console.log(songTb.textContent)
                if (likedSongsCookie.includes(songTb.textContent)) {
                     HeartMode = true;
                     console.log(HeartMode);
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
                    

                   console.log(data.mp3);
                   updatePlayBar();
                 } catch(error) {
                   console.log(error);
                 }
               
                })
                
        });
        const time = window.parent.document.querySelector(".final");
        console.log(time);
        const updatePlayBar =  ()=>{
            const totalMinutes = Math.floor(song['Duration'] / 60) + ":" + (song['Duration'] % 60).toString().padStart(2, "0");
            time.textContent = totalMinutes;
        }*/
        
     


       /* audio.addEventListener('ended', function() {
          isPaused = true;
          playPauseButton.classList.remove('fa-pause');
          playPauseButton.classList.add('fa-play');
          pausePosition = 0;
        });
        
        
        const playPauseButton = window.parent.document.getElementById('play-pause');
        playPauseButton.addEventListener('click', async function() {
          
            if (!audio.paused) {
              console.log(audio);
              this.classList.remove('fa-pause');
              this.classList.add('fa-play');
              audio.pause();
            }else {
           
            this.classList.remove('fa-play');
              this.classList.add('fa-pause');
              audio.play();
              progressLoop();
              updateTimeElapsed(); 
              const bartitle = window.parent.document.querySelector('.title') 
              const url = '/SaveToHistory/'+ bartitle.textContent.toString().toLocaleLowerCase();
                    
              try
              { 
                const response = await fetch(url, {
                    method: "get",
                  
                    });
              const data = await response.json();
              console.log(data);
              
              
              } catch(error){
                console.log(error);
              }
          }
        });
        
        
        const progressBar = window.parent.document.getElementById('progress-bar');
        progressBar.value = 0; // set initial value to 0
        
        
        const timeD = window.parent.document.getElementsByClassName('initial')[0];
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
        
        
        const shuffleButton = window.parent.document.getElementById('shuffle');
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
        
        
        
        
        
        
        const slider = window.parent.document.getElementById('sound-slider');
        slider.addEventListener('input', (e) => {
          const volume = parseFloat(e.target.value / 100);
          audio.volume = volume;
          volumeIcon();
        });
        
        
        const repeatButton = window.parent.document.getElementById('repeat');
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
        
        
        const volumespeak = window.parent.document.getElementById('speaker');
        
        
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
            console.log("in the else if of down sound");
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
        
        
          const Slider1 = window.parent.document.querySelector('.range1');
               
        
        
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
                });*/
        