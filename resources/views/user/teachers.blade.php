
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
  <h3 align="center">User Data</h3>
  <br />
  <a href="/user" class="btn btn-primary">Wróć</a>
  @if($message = Session::get('success'))
  <div class="alert alert-success">
   <p>{{$message}}</p>
  </div>
  @endif
  
  <div align="right">
   <a href="{{action('TeacherController@create')}}" class="btn btn-primary">Add</a>
   <br />
   <br />
  </div>
  <table class="table table-bordered table-striped">
   <tr>
    <th>Username</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Edit</th>
    <th>Delete</th>
   </tr>
   @foreach($users as $row)
   @if($row['type']==3)
   @if(auth()->user()->type == 1)
   <tr>
    <td>{{$row['username']}}</td>
    <td>{{$row['first_name']}}</td>
    <td>{{$row['last_name']}}</td>
    <td><a href="{{action('TeacherController@edit', $row['id'])}}" class="btn btn-warning">Edit</a></td>
    <td>
     <form method="post" class="delete_form" action="{{action('UserController@destroy', $row['id'])}}">
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
    <td>{{$row['username']}}</td>
    <td>{{$row['first_name']}}</td>
    <td>{{$row['last_name']}}</td>
    <td><a href="{{action('TeacherController@edit', $row['id'])}}" class="btn btn-warning">Edit</a></td>
    <td>
     <form method="post" class="delete_form" action="{{action('UserController@destroy', $row['id'])}}">
      {{csrf_field()}}
      <input type="hidden" name="_method" value="DELETE" />
      <button type="submit" class="btn btn-danger">Delete</button>
     </form>
    </td>
   </tr>
   @endif
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

