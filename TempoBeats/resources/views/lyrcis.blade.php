@extends('layouts.app')
<style>

    .lyrics-page{
        width:100%;
        max-height:89.2vh;
        display:flex;
        justify-content:center;
        
        overflow-y:scroll;

    }
    #lyrics{
        font-size:30px;
        font-weight:600;
        width:40%;
        color:#edeaea;
        min-height:80%;
        margin-top:30px;
        letter-spacing:2px;
        word-spacing:pre-line;
        font-family:sans-serif;
        line-height:42px;
    }
</style>
@section('content')
<div class="lyrics-page" style="background-color:{!!$song->bgc!!}">
 
<p id="lyrics" style="white-space:pre-line;">
{{$song->lyrics}} </p>
</div>

<script>

  const textContainer2 = document.getElementById("lyrics");
  const words = textContainer2.textContent.split(/\s+/); // Split text into array of words
  textContainer2.innerHTML = words.map((word, index) => {
    return `<span id="word-${index}">${word}</span>`; // Wrap each word in a span with a unique ID
  }).join(" ");

  textContainer2.addEventListener("mouseover", (event) => {
    const target = event.target;
    if (target.matches("span")) {
      target.style.color = "white";
      target.style.cursor = "pointer";
    }
  });

  textContainer2.addEventListener("mouseout", (event) => {
    const target = event.target;
    if (target.matches("span")) {
      target.style.color = "";
    }
  });
</script>
@endsection