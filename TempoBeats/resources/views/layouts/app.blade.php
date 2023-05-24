<html>
    <head>
    <title> @yield('title', 'Default Title')</title>
    <style>
      *{
    margin: 0;
    padding: 0;
 }
 body{
    padding: 0;
    margin: 0;
 }
      </style>
    <link href="{{ asset('css/styleHome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/SearchS.css') }}" rel="stylesheet">
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


        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>

        <div>
        <div class="main">
        <div class="leftBar">
            <img class="logo" src="{{ asset('images/temp.png') }}" />
            <ul class="navigation">
            <li class="link"><i class="material-icons hm" >home</i> Home</li>
            <li class="link"><i class="fas fa-search"></i>  Search</li>
            <li class="link"><i class="glyphicon glyphicon-cd"></i> Your Library</li>
           </ul>
           <ul class="nav2">
            <li class="link2"><i class="fas fa-plus plusDiv" id="plussign"></i>Create Playlist</li>
            <li class="link2"><i class="fas fa-heart HDiv" id="Hsign"></i>Liked Songs</li>
           </ul>
           
        
        </div>
        <div class="right">
            <div class="topbar">
                <div class="switcher">
                 <div onclick="goBack()" class="backword"> <span  class="material-icons">navigate_before</span> </div>
                 <div onclick="goForward()" class="forward"> <span  class="material-icons">navigate_next</span> </div>
                </div>
                <div id="search-section">
                @yield('search')
                </div>
                @if (Route::has('login'))
                @auth
                <div class="ac">
                @if (empty(Auth::user()->Subscription))
                <div id="ua" style="color:white;">Upgrade</div>
                  @else
                  
                @endif
                <div class="Account">
                  <div class="accbtn" onclick="toggleDropdown()">
                    <i class="material-icons">account_circle</i>
                    <p class="username">{{ Auth::user()->name }}</p>
                  </div>
                  <div class="dropdown-content" id="dropdown" style="display: none">
                    <div class="dpc">
                      <a href="{{route('profile.edit')}}">{{ __('Profile') }}</a>
                    </div>
                    <hr>
                      <div class="dpc">
                      <a id="logt" href="{{ route('logout') }}">
    <button type="submit">{{ __('Log Out') }}</button>
</a>
                        </div>
                      </div>
                        </div>
 
                        </div>

                @else
                    <div class="credentials">
            <p class="SU sb">Sign Up</p>
            <p class="LI">Log In</p>
        </div>
        @endauth
      @endif
            </div>
                
             
  
             
            <main>
                @yield('content')
                
            </main>
    
           
            </div>
            
           
        <script>
        //  var baseUrl = "{{ asset('') }}";
        const menubtns = document.querySelectorAll(".link");

menubtns.forEach((menubtn, index) => {
  menubtn.addEventListener('click', () => {
    if (index === 0) {
    /*  $(document).ready($(function () {
      var url = '/';
    $.ajax({
        url: '/',
        type: 'GET',
        success: function (result) {
          var Wlm = $(result).find('.musicmenu');
           $('#ContentSection').html(Wlm);
           history.pushState(null, null, url);
        }
    });
}));*/
var url = 'http://127.0.0.1:8000/'
      window.location.href = "/home";
      window.parent.history.pushState(null, null, url);
    } else if (index === 1) {
      console.log("search clicked")
    
  /*  $(function () {
      var url = window.location.href +'search';
    $.ajax({
        url: '/search',
        type: 'GET',
        success: function (result) {
          var SearchC = $(result).find('.search');
          var Genre = $(result).find('.Genre');
          $('#search-section').html(SearchC);
           $('#ContentSection').html(Genre);
           history.pushState(null, null, url);
        }
    });
});
*/    var url = 'http://127.0.0.1:8000/'+'search';
      window.location.href = "/search";
      window.parent.history.pushState(null, null, url);
    } else if(index === 2){
      var url = 'http://127.0.0.1:8000/'+'library';
      window.location.href = "{{ route('library')}}";
      window.parent.history.pushState(null, null, url);
    }
  })
})
const bottomMenu = document.querySelectorAll(".link2");
console.log(menubtns);
bottomMenu.forEach((menu , index)=>{
  menu.addEventListener('click',()=>{
    if(index === 0){
      console.log('create playlist');
    }
    else if(index === 1){
      var url = 'http://127.0.0.1:8000/'+'LikedSongs';
      window.location.href="{{ route('likedplaylist',['id'=>auth()->check() ? auth()->user()->id : 0])}}";
      window.parent.history.pushState(null, null, url);
    }
  })
})
const logbtn = document.querySelector(".LI");
if(logbtn){
        logbtn.addEventListener("click", ()=>{
          
            top.window.location.href = "{{ route('login') }}";
        });
      }
   
        const subtns = document.querySelectorAll(".sb");
        if(subtns){
        subtns.forEach((subtn , index)=>{
            subtn.addEventListener('click',()=>{
               
                top.window.location.href= "{{ route('register')}}";
            });
        });
      }
 
        function toggleDropdown() {
    var dropdown = document.getElementById("dropdown");
    if (dropdown.style.display === "none") {
      dropdown.style.display = "block";
    } else {
      dropdown.style.display = "none";
    }
  }
  function goBack() {
			window.history.back();
		}

		function goForward() {
			window.history.forward();
		}
    const ua = document.querySelector('#ua');
    console.log(ua);
    ua.addEventListener('click',()=>{
      top.window.location.href = "{{ Route('Upgrade') }}";
    })
    </script>

   
    <script type="module" src="{{ asset('js/Home.js') }}" async></script>
    </body>
</html>
