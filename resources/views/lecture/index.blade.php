@extends('master')


@section('content')
<?php 
use App\User;

use App\Group;
$users = User::all()->toArray();

$groups = Group::all();
 ?>

<div class="row">
 <div class="col-md-12">
  <br />
  <h3 align="center">Lecture Data</h3>
  <br />
  <a href="/home" class="btn btn-primary">Wróć</a>
  @if($message = Session::get('success'))
  <div class="alert alert-success">
   <p>{{$message}}</p>
  </div>
  @endif
  <div align="right">
   <a href="{{route('lecture.create')}}" class="btn btn-primary">Add</a>
   <br />
   <br />
  </div>
  <table class="table table-bordered table-striped">
   <tr>
    <th> Name</th>
   
    <th>Edit</th>
    <th>Delete</th>
   </tr>
   @foreach($lectures as $row)
   @if(auth()->user()->type == 1)
   <tr>
    <td>{{$row['name']}}</td>

    <td><a href="{{action('LectureController@edit', $row['id'])}}" class="btn btn-warning">Edit</a></td>
    <td>
     <form method="post" class="delete_form" action="{{action('LectureController@destroy', $row['id'])}}">
      {{csrf_field()}}
      <input type="hidden" name="_method" value="DELETE" />
      <button type="submit" class="btn btn-danger">Delete</button>
     </form>
    </td>
   </tr>
   @elseif(auth()->user()->type == 2)
   <?php 
   $id = $row['group_id'];
    $group = Group::find($id);
    ?>
   @if(auth()->user()->dep_id == $group['dep_id'])
   <tr>
    <td>{{$row['name']}}</td>
    <td><a href="{{action('LectureController@edit', $row['id'])}}" class="btn btn-warning">Edit</a></td>
    <td>
     <form method="post" class="delete_form" action="{{action('LectureController@destroy', $row['id'])}}">
      {{csrf_field()}}
      <input type="hidden" name="_method" value="DELETE" />
      <button type="submit" class="btn btn-danger">Delete</button>
     </form>
    </td>
   </tr>
   @endif
   @endif
   @endforeach
  </table>
 </div>
</div>
<script>
$(document).ready(function(){
 $('.delete_form').on('submit', function(){
  if(confirm("Are you sure you want to delete it?"))
  {
   return true;
  }
  else
  {
   return false;
  }
 });
});
</script>
@endsection
