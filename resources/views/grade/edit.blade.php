@extends('master')



@section('content')
<?php 
use Illuminate\Support\Facades\Auth;
use App\Lecture;
use App\Grade;
use App\User;
$lectures = Lecture::all();
$users = User::all();

 ?>
<div class="row">
 <div class="col-md-12">
  <br />
  <h3>Edit Record</h3>
  <br />
  @if(count($errors) > 0)

  <div class="alert alert-danger">
         <ul>
         @foreach($errors->all() as $error)
          <li>{{$error}}</li>
         @endforeach
         </ul>
  @endif
 
  <form method="post" action="{{action('GradeController@update', $id)}}">
   {{csrf_field()}}
   <input type="hidden" name="_method" value="PATCH" />
   <div class="form-group">
    <input type="number" name="grade" min="2" max="5" class="form-control" value="{{$grade->grade}}" placeholder="Enter Grade" />
   </div>
   <input type="submit" class="btn btn-primary" value="Edit" />
  </form>

 
@endsection
