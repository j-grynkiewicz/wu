
@extends('master')


@section('content')
<?php 
use App\Department;
use App\Group;
$groups = Group::all()->toArray();
$department = Group::find($id);
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
    <th>Name</th>
 

   </tr>
 <?php


 ?>
   @foreach($groups as $row)
   @if($row['dep_id']==$id)
  
   <tr>
    <td>{{$row['name']}}</td>
 
    
    </td>
   </tr>
   @endif
   @endforeach
 
  </table>
 </div>
</div>

@endsection