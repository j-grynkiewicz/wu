
@extends('master')


@section('content')
<?php 
use App\Department;
use App\Group;
$deps = Department::all();


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
  @if(auth()->user()->type == 1)
  <form method="post" action="{{url('group')}}">
   {{csrf_field()}}
   <div class="form-group">
    <input type="text" name="name" class="form-control" placeholder="Enter Name" />
   </div>
   Wydział:
   <select name="dep_id">
    @foreach($deps as $dep)
        <option value="{{ $dep->id }}">{{ $dep->name}}</option>
    @endforeach 
</select>
   <div class="form-group">
    <input type="submit" class="btn btn-primary" />
   </div>
  </form>
 </div>
</div>
@endif
@if(auth()->user()->type == 2)
<form method="post" action="{{url('group')}}">
   {{csrf_field()}}
   <div class="form-group">
    <input type="text" name="name" class="form-control" placeholder="Enter Name" />
   </div>
   Wydział:
   <select name="dep_id">
    @foreach($deps as $dep)
    @if(auth()->user()->dep_id == $dep['id'])
        <option value="{{ $dep->id }}">{{ $dep->name}}</option>
        @endif
    @endforeach 
</select>
   <div class="form-group">
    <input type="submit" class="btn btn-primary" />
   </div>
  </form>
 </div>
</div>
@endif
@endsection
