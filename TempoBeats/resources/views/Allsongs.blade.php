@extends('layouts.app')
@section('content')
<style>
  .allsongs{
    font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif ;
    background-color: #1d1b1b;
    min-height:92.1vh;
     max-height: 92.1vh;
     overflow-y:scroll;
  }
table {
  margin-top:15px;
  border-collapse: collapse;
  width: 100%;
  margin:auto;

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
  width:250px;
}
tr:nth-child(even) {
  background-color: rgba(0,0,0,0.5);
}
.plyt{
  color:white;
}
</style>
<div class="allsongs">
<table>
  <tbody>
<tr><td><h3>Songs:</h3></td>
  </tr>

 @foreach($Allsongs as $obj)

 <tr class="songs">
 
    <td ><img  src="{{asset($obj->imgsrc)}}" /></td>    
    <td class="musict">{{$obj->Name}}</td>
    <td class="art">{{ $obj->artist->implode('name', ' & ')  }}</td>
    <td>{{ gmdate("i:s", $obj->Duration) }}</td>
    <td><i class="fas fa-heart hal"></i></i></td>
    <td><i class="fas fa-play plybtt"></i></td>

  </tr>

  @endforeach
</tbody>
  </table>
</div>
<script>


</script>

@endsection