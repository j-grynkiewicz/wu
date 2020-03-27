@extends('master')


@section('content')

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
    <input type="number" name="group_id" class="form-control" value="{{$user->group_id}}" placeholder="Enter Group Number" />
   </div>
   <div class="form-group">
    <input type="submit" class="btn btn-primary" value="Edit" />
   </div>
  </form>
 </div>
</div>

@endsection
