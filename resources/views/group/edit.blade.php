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
  @if(auth()->user()->type == 1)
  <form method="post" action="{{action('GroupController@update', $id)}}">
   {{csrf_field()}}
   <input type="hidden" name="_method" value="PATCH" />
   <div class="form-group">
    <input type="text" name="name" class="form-control" value="{{$group->name}}" placeholder="Enter Name" />
   </div>
   Wydział:
   <select name="dep_id">
    @foreach($deps as $dep)
        <option value="{{ $dep->id }}">{{ $dep->name}}</option>
    @endforeach 
</select>
    <input type="submit" class="btn btn-primary" value="Edit" />
   </div>
  </form>
  @endif
  @if(auth()->user()->type == 2)
  <form method="post" action="{{action('GroupController@update', $id)}}">
   {{csrf_field()}}
   <input type="hidden" name="_method" value="PATCH" />
   <div class="form-group">
    <input type="text" name="name" class="form-control" value="{{$group->name}}" placeholder="Enter Name" />
   </div>
   Wydział:
   <select name="dep_id">
    @foreach($deps as $dep)
    @if(auth()->user()->dep_id == $dep['id'])
        <option value="{{ $dep->id }}">{{ $dep->name}}</option>
    @endif
    @endforeach 
</select>
    <input type="submit" class="btn btn-primary" value="Edit" />
   </div>
  </form>
  @endif
 </div>
</div>

@endsection
