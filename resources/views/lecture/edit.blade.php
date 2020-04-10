@extends('master')

@section('content')
<?php 
use App\Group;
use App\Lecture;
$groups = Group::all();


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
  <form method="post" action="{{action('LectureController@update', $id)}}">
   {{csrf_field()}}
   <input type="hidden" name="_method" value="PATCH" />
   <div class="form-group">
    <input type="text" name="name" class="form-control" value="{{$lecture->name}}" placeholder="Enter Name" />
   </div>
   <div class="form-group">
    <input type="number" name="ects" class="form-control" value="$lecture->ects" min="1" max="30"/>
   </div>
   <div class="form-group">
   <select name="type">
 
        <option value="Wykład">Wykład</option>
        <option value="Ćwiczenia">Ćwiczenia</option>
        <option value="Laboratoria">Laboratoria</option>
   
</select> 
</div>
   <div class="form-group">
   Grupa Studencka:
   <select name="group_id">
    @foreach($groups as $group)
        <option value="{{ $group->id }}">{{ $group->name}}</option>
    @endforeach 
</select> 
   </div>
    <input type="submit" class="btn btn-primary" value="Edit" />
   </div>
  </form>
  @endif
  @if(auth()->user()->type == 2)
  <form method="post" action="{{action('LectureController@update', $id)}}">
   {{csrf_field()}}
   <input type="hidden" name="_method" value="PATCH" />
   <div class="form-group">
    <input type="text" name="name" class="form-control" value="{{$lecture->name}}" placeholder="Enter Name" />
   </div>
   <div class="form-group">
    <input type="number" name="ects" class="form-control" value="$lecture->ects" min="1" max="30"/>
   </div>
   <div class="form-group">
   <select name="type">
 
        <option value="Wykład">Wykład</option>
        <option value="Ćwiczenia">Ćwiczenia</option>
        <option value="Laboratoria">Laboratoria</option>
   
</select> 
</div>
   <div class="form-group">
   Grupa Studencka:
   <select name="group_id">
    @foreach($groups as $group)
    @if(auth()->user()->dep_id == $group['dep_id'])
        <option value="{{ $group->id }}">{{ $group->name}}</option>
        @endif
    @endforeach 
</select> 
   </div>
    <input type="submit" class="btn btn-primary" value="Edit" />
   </div>
  </form>
  @endif
 </div>
</div>

@endsection
