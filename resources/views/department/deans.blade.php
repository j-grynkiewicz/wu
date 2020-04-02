
@extends('master')


@section('content')
<?php 
use App\Department;
use App\User;
$users = User::all()->toArray();
$department = Department::find($id);
 ?>
<div class="row">
 <div class="col-md-12">
  <br />
  <h3 align="center">User Data</h3>
  <br />
  <a href="/department" class="btn btn-primary">Wróć</a>
  @if($message = Session::get('success'))
  <div class="alert alert-success">
   <p>{{$message}}</p>
  </div>
  @endif

  <div align="right">
   
   <br />
   <br />
  </div>
  <table class="table table-bordered table-striped">
   <tr>
   <th>Username</th>
    <th>First Name</th>
    <th>Last Name</th>
 

   </tr>
 <?php


 ?>
   @foreach($users as $row)
   @if($row['dep_id']==$id)
   @if($row['type']==2)
  
   <tr>
   <td>{{$row['username']}}</td>
    <td>{{$row['first_name']}}</td>
    <td>{{$row['last_name']}}</td>
 
    
    </td>
   </tr>
   @endif
   @endif
   @endforeach
 
  </table>
 </div>
</div>

@endsection