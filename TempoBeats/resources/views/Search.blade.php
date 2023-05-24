@extends('layouts.app')

@section('title', 'TempoBeats - Search')
@section('search')
<div class="search">
<i class="fas fa-search"></i>
<form method="get" action="{{Route('searchSong')}}">
  @csrf
<input type="search" name="search" placeholder="Search for a song" class="searcher"></input>
</form>
</div>

@endsection
@section('content')
<div class="Genre">
<p>Search</p>
<div class="allcat">
      <div class="cat" style=" background-color: rgba(255,219,88)">
        <h1>Arab</h1>
        <img src="{{ asset('images/ar.png') }}" />
      </div>    
      <div class="cat" style="background-color: #673b90">
        <h1>Hip Hop</h1>
        <img id="hp"src="{{ asset('images/st.png') }}" width="25px"/>
      </div>  
      <div  class="cat" style="background-color: #66d3fa">
        <h1>Jazz</h1>
        <img id="j" src="{{ asset('images/sx.png') }}" />
      </div>  
      <div  class="cat" style="background-color: #69101b">
        <h1>Rock</h1>
        <img  id="R" src="{{ asset('images/gr.png') }}" width="25px"/>
      </div>  
      <div  class="cat" style="background-color: #ff3179">
        <h1>Pop</h1>
        <img id="P" src="{{ asset('images/sm.png') }}" />
      </div>  
      <div  class="cat" style="background-color: #f4df87">
        <h1>Classical</h1>
        <img id="Cl" src="{{ asset('images/tc.png') }}" />
      </div>  
      <div class="cat" style="background-color: #006674">
        <h1>70s</h1>
        <img id="S70" src="{{ asset('images/7s.png') }}" />
      </div>  
      <div  class="cat" style="background-color: #a134be">
        <h1>R&B</h1>
        <img id="Rb" src="{{ asset('images/d.png') }}" />
      </div>      
      <div class="cat" style="background-color: #c1e0f7">
        <h1>Disney</h1>
        <img  id="D" src="{{ asset('images/ani.png') }}" />
      </div>      
      <div id="m" class="cat"style="background-color: #333e30">
        <h1>Heavy Metal</h1>
        <img  id="HM" src="{{ asset('images/a.png') }}" />
      </div>      
      <div  class="cat" style="background-color: #330099">
        <h1>Techno</h1>
        <img  id="T" src="{{ asset('images/dj.png') }}" />
      </div>      
      <div  class="cat" style="background-color: #77c19a">
        <h1>K-pop</h1>
        <img id="Kp" src="{{ asset('images/kp.png') }}" />
      </div>      
      <div  class="cat" style="background-color: #D92121">
        <h1>Electro</h1>
        <img id="El" src="{{ asset('images/hs.png') }}" />
      </div>      
      <div id="ara"class="cat" style="background-color: #c8782f">
        <h1>Retro</h1>
        <img src="{{ asset('images/sx.png') }}" />
      </div>      
      <div id="ara2"class="cat" style="background-color: #00a86b">
        
        <h1>Hits</h1>
        <img src="{{ asset('images/sx.png') }}" />  
    </div>      
      </div>
      <div class="breakline">
                        <hr>
                    </div>
              </div>
</div>
        
   
@endsection
