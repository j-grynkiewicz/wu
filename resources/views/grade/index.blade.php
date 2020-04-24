@extends('master')



@section('content')
<?php
use Illuminate\Support\Facades\Auth;
use App\User;
$users = User::all();
use App\Lecture;
$lectures = Lecture::all();
?>
<div class="row">
 <div class="col-md-12">
  <br />
  <h3 align="center">Group Data</h3>
  <br />
  <a href="/home" class="btn btn-primary">Wróć</a>
  @if($message = Session::get('success'))
  <div class="alert alert-success">
   <p>{{$message}}</p>
  </div>
  @endif
  <div align="right">
  @if(Auth::user()->type==3)
   <a href="{{route('grade.create')}}" class="btn btn-primary">Add</a>
   <br />
   <br />
  </div>
  <table class="table table-bordered table-striped">
   <tr>
   <th> Student</th>
    <th> Grade</th>
    <th> Timestamps</th>
    <th>Edit</th>
    <th>Delete</th>
   </tr>
   @foreach($grades as $row)
   @if(Auth::user()->id==$row['teach_id'])
   <tr>
   @foreach($users as $user)
   @if($row['student_id']==$user->id)
   <td>{{$user['first_name']}} {{$user['last_name']}}</td>
   @endif
   @endforeach
    <td>{{$row['grade']}}</td>
    <td>{{$row['updated_at']}}</td>
        <td><a href="{{action('GradeController@edit', $row['id'])}}" class="btn btn-warning">Edit</a></td>
    <td>
     <form method="post" class="delete_form" action="{{action('GradeController@destroy', $row['id'])}}">
      {{csrf_field()}}
      <input type="hidden" name="_method" value="DELETE" />
      <button type="submit" class="btn btn-danger">Delete</button>
     </form>
    </td>
   </tr>
 

   @endif
   @endforeach
   @elseif(Auth::user()->type==4)
  
  </div>
  <table class="table table-bordered table-striped">
   <tr>
   <th> Lecture</th>
    <th> Grade</th>
    <th> Timestamps</th>
    

   </tr>
<?php $sum=0 ?>
   @foreach($grades as $row)
   @if($row['student_id']==Auth::user()->id)
   <tr>
   @foreach($lectures as $lecture)
   @if($lecture['id']==$row['lecture_id'])
   <td>{{$lecture['name']}}</td>
   @if ($row['grade']>2)
    <?php $sum=$sum+$lecture['ects'] ?>
   @endif
   @endif
 
   @endforeach
    <td>{{$row['grade']}}</td>
    <td>{{$row['updated_at']}}</td>
    </td>
   </tr>
 

   @endif
   @endforeach
   Suma zebranych ETCS: {{$sum}}
   @endif

  </table>
  
 </div>
</div>
<script>
$(document).ready(function(){
 $('.delete_form').on('submit', function(){
  if(confirm("Are you sure you want to delete it?"))
  {
   return true;
  }
  else
  {
   return false;
  }
 });
});
</script>
@endsection
