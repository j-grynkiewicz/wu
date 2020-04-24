
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
  <h3 aling="center">Add Data</h3>
  <br />
  @if(count($errors) > 0)
  <div class="alert alert-danger">
   <ul>
   @foreach($errors->all() as $error)
    <li>{{$error}}</li>
   @endforeach
   </ul>
  </div>
  @endif
  @if(\Session::has('success'))
  <div class="alert alert-success">
   <p>{{ \Session::get('success') }}</p>
  </div>
  @endif
 
  <form method="post" action="{{url('grade')}}">
   {{csrf_field()}}
   <div class="form-group">
    <input type="number" name="grade" class="form-control" min="2" max="5" placeholder="Enter Grade"  />
   </div>
   Student:
   <select name="student_id">
    @foreach($users as $user)
    @if($user->type==4)
    @if($user->group_id==Auth::user()->group_id)
   
        <option value="{{ $user->id }}">{{ $user->first_name }} {{$user->last_name}}</option>
    @endif
    @endif
    @endforeach 
</select>
<br>
   Przedmiot:
   <select name="lecture_id">
    @foreach($lectures as $lecture)
    @if($lecture->teach_id==Auth::user()->id)
        <option value="{{ $lecture->id }}">{{ $lecture->name}}</option>
    @endif
    @endforeach 
</select>

   <div class="form-group">
    <input type="submit" class="btn btn-primary" />
   </div>
  </form>
 </div>
</div>
@endsection
