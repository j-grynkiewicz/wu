@extends('master')

@section('content')
<?php 
use App\User;
use App\Group;
$groups = Group::all();?>
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
  <form method="post" action="{{action('StudentController@update', $id)}}">
   {{csrf_field()}}
   <input type="hidden" name="_method" value="PATCH" />
   <div class="form-group">
    <input type="text" name="first_name" class="form-control" value="{{$user->first_name}}" placeholder="Enter First Name" />
   </div>
   <div class="form-group">
    <input type="text" name="last_name" class="form-control" value="{{$user->last_name}}" placeholder="Enter Last Name" />
   </div>
   <div class="form-group">
    <input type="email" name="email" class="form-control" value="{{$user->email}}" placeholder="Enter Email Address"  />
   </div>
   <div class="form-group">
   Grupa Studencka:
   <select name="group_id">
  
    @foreach($groups as $group)
    @if($user['group_id']==$group['id'])
    <option value="" disabled selected hidden>{{$group->name}}</option>
    @endif
        <option value="{{ $group->id }}">{{ $group->name}}</option>
    @endforeach 
    
</select>

</div>

   
   <div class="form-group">
    <input type="submit" class="btn btn-primary" value="Edit" />
   </div>

  </form>
  @endif
  @if(auth()->user()->type == 2)
  <form method="post" action="{{action('StudentController@update', $id)}}">
   {{csrf_field()}}
   <input type="hidden" name="_method" value="PATCH" />
   <div class="form-group">
    <input type="text" name="first_name" class="form-control" value="{{$user->first_name}}" placeholder="Enter First Name" />
   </div>
   <div class="form-group">
    <input type="text" name="last_name" class="form-control" value="{{$user->last_name}}" placeholder="Enter Last Name" />
   </div>
   <div class="form-group">
    <input type="email" name="email" class="form-control" value="{{$user->email}}" placeholder="Enter Email Address"  />
   </div>
   <div class="form-group">
   Grupa Studencka:
   <select name="group_id">
  
    @foreach($groups as $group)
    @if($user['group_id']==$group['id'])
    <option value="" disabled selected hidden>{{$group->name}}</option>
    @endif
    @if(auth()->user()->dep_id == $group['dep_id'])
        <option value="{{ $group->id }}">{{ $group->name}}</option>
        @endif
    @endforeach 
    
</select>

</div>

   
   <div class="form-group">
    <input type="submit" class="btn btn-primary" value="Edit" />
   </div>

  </form>
  @endif
 </div>
</div>

@endsection


