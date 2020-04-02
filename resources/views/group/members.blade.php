
@extends('master')


@section('content')
<?php 
use App\User;
use App\Group;
$users = User::all()->toArray();
$group = Group::find($id);
 ?>
<div class="row">
 <div class="col-md-12">
  <br />
  <h3 align="center">User Data</h3>
  <br />
  <a href="/group" class="btn btn-primary">Wróć</a>
  @if($message = Session::get('success'))
  <div class="alert alert-success">
   <p>{{$message}}</p>
  </div>
  @endif

  <div align="right">
   
   <br />
   <br />
  </div>

   Wykładowcy
  <table class="table table-bordered table-striped">
   <tr>
    <th>Username</th>
    <th>First Name</th>
    <th>Last Name</th>

   </tr>
 <?php


 ?>
   @foreach($users as $row)
   @if($row['group_id']==$id)
   @if($row['type']==3)
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
  Studenci
  <table class="table table-bordered table-striped">
   <tr>
    <th>Username</th>
    <th>First Name</th>
    <th>Last Name</th>

   </tr>
 <?php


 ?>
   @foreach($users as $row)
   @if($row['group_id']==$id)
   @if($row['type']==4)
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