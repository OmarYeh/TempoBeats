<!Doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="{{asset('assets/js/color-modes.js')}}"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.111.3">
    <title>Dashboard</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">

    

    

<link href="{{asset('assets/dist/css/bootstrap.min.css')}}" rel="stylesheet">

    <style>
      body{
        font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif ;
      }
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }
      .bd-mode-toggle {
        z-index: 1500;
      }

      .searchContent{
    font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif ;
    background-color: #1d1b1b;
    min-height:92.1vh;
     max-height: 92.1vh;
  }

img{
  width:75px;
  height:65px
}
td {
  text-align: left;
  padding: 8px;
  color:white;
  padding:17px;
  width:15px;
}
tr:nth-child(even) {
  background-color: rgba(0,0,0,0.5);
}
.plyt{
  color:white;
}
button{
  background:none;
  outline:none;
  border:none;
}
.songs,.allplaylist,.users{
 margin-top:25px;

}
.songs,.users,.allplaylist,.AddSong,.AddPlaylist{
  display:none;
}
.AddSong form,.AddPlaylist form{
  width:75%;
  display:flex;
  flex-direction:column;
  justify-content:center;
 
}
.songin,.playin{
  margin-top:11%;
  margin-left:10%;
}
.AddSong input,.AddPlaylist input{
  margin:12px 0;
  background:none;
  outline:none;
  border:none;
}
.AddSong input[type="text"],.AddPlaylist input[type="text"]{
  height:20px;
  color:white;
  padding:15px;
  box-shadow:-2px 5px 7px #131313;
  border-radius:7px;
}
.AddSong textarea{
  margin:12px 0;
  background:none;
  outline:none;
  border:none;
  color:white;
  box-shadow:-2px 5px 7px #131313;
  border-radius:7px;
  padding:15px;
}
.form-control:focus{
  background:none;
  border-color:none;
  box-shadow:none;
}
form button{
  color:white;
  width:150px;
  height: 35px;
  margin-top:10px;
  margin-left:40%;
  border-radius:11px;
  background:rgb(214, 175, 44);
}
.tid{
  width:0px;
}
table{
  width:104%;
  margin-left:-25px;
  border-collapse: collapse;
  margin-top:35px;
}
.nav-item{
  padding:15px;
}


@keyframes fadeIn {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}

    </style>

    
    <!-- Custom styles for this template -->
    <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">
  </head>
  <body>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
      <symbol id="check2" viewBox="0 0 16 16">
        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
      </symbol>
      <symbol id="circle-half" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
      </symbol>
      <symbol id="moon-stars-fill" viewBox="0 0 16 16">
        <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
        <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
      </symbol>
      <symbol id="sun-fill" viewBox="0 0 16 16">
        <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
      </symbol>
    </svg>

    

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-lg-2  sidebar ">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <button class="nav-link active" aria-current="page" >
              <span data-feather="home" class="align-text-bottom"></span>
              Dashboard
            </button>
          </li>
          <li class="nav-item">
            <button class="nav-link" >
              <span data-feather="music" class="align-text-bottom"></span>
              Songs
            </abutton>
          </li>
          <li class="nav-item">
            <button class="nav-link">
              <span data-feather="list" class="align-text-bottom"></span>
              Playlist
            </button>
          </li>
          <li class="nav-item">
            <button class="nav-link">
              <span data-feather="users" class="align-text-bottom"></span>
              Users
            </button>
          </li>
          <li class="nav-item">
            <button class="nav-link" >
              <span data-feather="plus" class="align-text-bottom"></span>
              Add Song
            </button>
          </li>
          <li class="nav-item">
            <button class="nav-link" >
              <span data-feather="plus" class="align-text-bottom"></span>
              Add Playlist
            </button>
          </li>
        </ul>

      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="dashboard">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button id="export-button" type="button" class="btn btn-sm btn-outline-secondary" onclick="exportToExcel()">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar" class="align-text-bottom"></span>
            This week
          </button>
        </div>
      </div>


      <div id="sp">
      <div ><h1>Songs Played:</h1></div>
      <canvas id="plays-chart" width="400" height="200"></canvas>
    </div>
      <div id="pc"style="width:500px">
      <div ><h1>Website Traffic Sources:</h1></div><canvas id="website-traffic-chart" ></canvas></div>
    </div>

    <div class="songs">
      <h2>All Songs:</h2>
    <table>
    <thead>
      <tr>
           <td class="tid">Id</td>    
            <td>image src</td>
            <td>Name</td>
            <td>Artist</td>
            <td>Duration</td>
            <td></td>
           
      </tr>
    </thead>
        <tbody>
        @foreach($Allsongs as $obj)
          <tr>
          <td class="tid">{{$obj->id}}</td>
            <td><img src="{{asset($obj->imgsrc)}}" /></td>    
            <td>{{$obj->Name}}</td>
            <td>
            @foreach($obj->artist as $artist)
            {{$artist->name}}
            @if(!$loop->last)
          , 
        @endif
                @endforeach
                </td>
            <td>{{ gmdate("i:s", $obj->Duration) }}</td>
            <td class="t"><a href="{{Route('deletesong',['id'=>$obj->id])}}"> <span data-feather="trash" class="align-text-bottom" style="color:red;"></span></a></td>
          </tr>
 @endforeach
    </tbody>
</table>
</div>
<div class="allplaylist">
<h2>TempoBeat's playlists:</h2>
  <table>
  <thead>
      <tr>
           <td class="tid">Id</td>    
            <td>image src</td>
            <td>Name</td>
            <td>Songs</td>
           
      </tr>
    </thead>
    <tbody>
@foreach($allpl as $obj)
          <tr>
          <td class="tid">{{$obj->id}}</td>
            <td><img src="{{asset($obj->imgsrc)}}" /></td>    
            <td>{{$obj->Name}}</td>
            <td>{{$obj->songs->count()}}</td>
            <td class="t"><a href="{{Route('deleteplaylist',['id'=>$obj->id])}}"> <span data-feather="trash" class="align-text-bottom" style="color:red;"></span></a></td>
          </tr>
 @endforeach
</tbody>
</table>
</div>
<div class="users">
<h2>All Users:</h2>
  <table>
    <thead>
      <tr>
           <td class="tid">Id</td>    
            <td>Name</td>
            <td>Email</td>
            <td>Age</td>
            <td>Gender</td>
            <td>Role</td>
      </tr>
    </thead>
    <tbody>
@foreach($users as $obj)
          <tr>
          <td class="tid">{{$obj->id}}</td>    
            <td>{{$obj->name}}</td>
            <td>{{$obj->email}}</td>
            <td>{{$obj->Age}}</td>
            <td>{{$obj->Gender}}</td>
            <td>@foreach($obj->getRole as $role)
              {{$role->name}}  
            @endforeach
            </td>
          </tr>
 @endforeach
</tbody>
</table>
</div>
<div class="AddSong">
<div class="songin">
<form method="post" action="{{Route('addSong')}}" enctype="multipart/form-data">

    @csrf
        <label for="name">Song Name</label>
        <input type="text" name="name" placeholder="Song Name.."/>
        <label for="name">Lyrics</label>
        <textarea name="lyrics"></textarea>
        <label for="name">Duration</label>
        <input type="text" name="Duration" placeholder="Duration"/>  
        <label for="Artist">Artist Name</label>
        <input type="text" name="Artist" placeholder="Artist"/>
        <label for="Artist">Background Color</label>
        <input type="text" name="bgc" placeholder="Bgc: #fff"/> 
        <label>Image</label>
        <div class="input-group">
  <input type="file" class="form-control" name="imgsrc" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04"style="color:white;box-shadow:-2px 5px 7px #131313;"/>
</div>
<label>Song File</label>
        <div class="input-group">
  <input type="file" class="form-control" name="mp4file" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04"style="color:white;box-shadow:-2px 5px 7px #131313;"/>
</div>
        <button type="submit">Add Song</button>
    </form>
  </div>
</div>

<div class="AddPlaylist">
  <div class="playin">
    <form id="playlist-form" method="post" action="{{Route('addplaylist')}}" enctype="multipart/form-data">
    @csrf
        <label for="name">Playlist Name</label>
        <input type="text" name="Name" placeholder="Playlist Name.."/>
        <label for="name">BackGround Color</label>
        <input type="text" name="bgc" placeholder="backgorund color"/>  
        <label for="name">Description</label>
        <input type="text" name="des" placeholder="Description"/> 
        <label>Image</label>
        <div class="input-group">
  <input type="file" class="form-control" name="imgsrc" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04"style="color:white;box-shadow:-2px 5px 7px #131313;"/>
</div>
        <button type="submit">Add Playlist</button>
    </form>
  </div>
</div>
    </main>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/xlsx@0.16.9/dist/xlsx.full.min.js"></script>

<script>
  var data = [150, 200, 300, 250, 350, 400, 348];
var maxData = Math.max(...data); // find the maximum value in the data array
console.log(maxData);

var ctx = document.getElementById('plays-chart').getContext('2d');
var chart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
    datasets: [{
      label: 'Plays',
      data: data,
      backgroundColor: 'rgb(214, 175, 44)',
      borderColor: 'rgb(214, 175, 44)',
      borderWidth: 1
    }]
  },
  options: {
    scales: {
      y: {
        ticks: {
          min: 100,
          max: maxData,
        
        },
        grid: {
          color: 'rgba(255, 255, 255, 0.7)'
        }
      },
      x: {
        grid: {
          color: 'rgba(255, 255, 255, 0.7)'
        }
      }
    },
    
      legend: {
        labels: {
          color: 'rgba(255, 255, 255, 0.7)'
        }
      }
    
  }
});
var ctxp = document.getElementById('website-traffic-chart').getContext('2d');
  var chart = new Chart(ctxp, {
    type: 'pie',
    data: {
      labels: ['Organic Search', 'Direct', 'Referral', 'Social Media'],
      datasets: [{
        data: [55, 20, 15, 10],
        backgroundColor: ['#4CAF50', '#2196F3', '#FF9800', '#9C27B0']
      }]
    },
    options: {
      
      legend: {
        position: 'bottom',
        labels: {
          fontColor: 'rgba(255, 255, 255, 0.7)'
        }
      },
      title: {
        display: true,
        text: 'Website Traffic Sources',
        fontColor: 'white'
      }
    }
  });
  Chart.defaults.color = '#fff';
  const allbtns = document.querySelectorAll('.nav-link');
  const s = document.querySelector('.songs');
  const dh = document.querySelector('.dashboard');
  const al = document.querySelector(".allplaylist");
  const u = document.querySelector(".users");
  const as = document.querySelector(".AddSong");
  const PL = document.querySelector(".AddPlaylist");
  const il = localStorage.getItem('i');
  const i = JSON.parse(il);
  allbtns.forEach((ele,index)=>{
      ele.classList.remove("active")
      if(index== i){
        ele.classList.add("active")
      }
    })
  if(i == 0){
          
          dh.style.display = "block";
          s.style.display = "none";
          al.style.display = "none";
          u.style.display = "none";
          as.style.display = "none";
          PL.style.display = "none";
         
      } else if(i == 1){
       
        dh.style.display = "none";
        s.style.display = "block";
        al.style.display = "none";
        u.style.display = "none";
        as.style.display = "none";
        PL.style.display = "none";
      }else if(i == 2){
       
        dh.style.display = "none";
        s.style.display = "none";
        al.style.display = "block";
        u.style.display = "none";
        as.style.display = "none";
        PL.style.display = "none";
      }
      else if(i == 3){
       
        dh.style.display = "none";
        s.style.display = "none";
        al.style.display = "none";
        u.style.display = "block";
        as.style.display = "none";
        PL.style.display = "none";
      }
      else if(i == 4){
       
        dh.style.display = "none";
        s.style.display = "none";
        al.style.display = "none";
        u.style.display = "none";
        as.style.display = "block";
        PL.style.display = "none";
      }
      else if(i == 5){
        dh.style.display = "none";
        s.style.display = "none";
        al.style.display = "none";
        u.style.display = "none";
        as.style.display = "none";
        PL.style.display = "block";
      }

  allbtns.forEach((btn,index)=>{
   btn.addEventListener('click',()=>{
    allbtns.forEach(ele=>{
      ele.classList.remove("active")
    })
      btn.classList.add("active");
      if(index == 0){
        localStorage.setItem('i', index);
          dh.style.display = "block";
          s.style.display = "none";
          al.style.display = "none";
          u.style.display = "none";
          as.style.display = "none";
          PL.style.display = "none";
         
      } else if(index == 1){
        localStorage.setItem('i', index);
        dh.style.display = "none";
        s.style.display = "block";
        al.style.display = "none";
        u.style.display = "none";
        as.style.display = "none";
        PL.style.display = "none";
      }else if(index == 2){
        localStorage.setItem('i', index);
        dh.style.display = "none";
        s.style.display = "none";
        al.style.display = "block";
        u.style.display = "none";
        as.style.display = "none";
        PL.style.display = "none";
      }
      else if(index == 3){
        localStorage.setItem('i', index);
        dh.style.display = "none";
        s.style.display = "none";
        al.style.display = "none";
        u.style.display = "block";
        as.style.display = "none";
        PL.style.display = "none";
      }
      else if(index == 4){
        localStorage.setItem('i', index);
        dh.style.display = "none";
        s.style.display = "none";
        al.style.display = "none";
        u.style.display = "none";
        as.style.display = "block";
        PL.style.display = "none";
      }
      else if(index == 5){
        localStorage.setItem('i', index);
        dh.style.display = "none";
        s.style.display = "none";
        al.style.display = "none";
        u.style.display = "none";
        as.style.display = "none";
        PL.style.display = "block";
      }
   })
  })

  function exportToExcel() {
  // Get the chart object
  var chart = Chart.instances[0];

  // Get the chart data
  var chartData = chart.data.datasets[0].data;
  var chartLabels = chart.data.labels;

  // Create an array of rows for the Excel worksheet
  var rows = [];

  // Add the data rows to the rows array
  chartData.forEach(function(data, i) {
    var row = [chartLabels[i], data];
    rows.push(row);
  });

  // Swap the first and last rows to match the desired format
  var temp = rows[0];
  rows[0] = rows[6];
  rows[6] = temp;

  // Add the column headers to the rows array
  rows.unshift(["Label", "Data"]);

  // Convert the rows array to an Excel worksheet
  var worksheet = XLSX.utils.aoa_to_sheet(rows);

  // Create a new Excel workbook
  var workbook = XLSX.utils.book_new();

  // Add the worksheet to the workbook
  XLSX.utils.book_append_sheet(workbook, worksheet, "Chart Data");

  // Save the workbook as an Excel file
  XLSX.writeFile(workbook, "chart-data.xlsx");
}




</script>



    <script src="{{asset('assets/dist/js/bootstrap.bundle.min.js')}}"></script>
      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js" integrity="sha384-gdQErvCNWvHQZj6XZM0dNsAoY4v+j5P1XDpNkcM3HJG1Yx04ecqIHk7+4VBOCHOG" crossorigin="anonymous"></script><script src="{{asset('js/dashboard.js')}}"></script>
  </body>
</html>
