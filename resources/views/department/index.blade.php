@extends('master')


@section('content')

<div class="row">
 <div class="col-md-12">
  <br />
  <h3 align="center">Department Data</h3>
  <br />
  <a href="/home" class="btn btn-primary">Wróć</a>
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
    <th> Name</th>
    <th> Groups</th>
    <th> Deans</th>
   
   </tr>
   @foreach($departments as $row)
   <tr>
    <td>{{$row['name']}}</td>
    <td><a href="{{action('DepartmentController@members', $row['id'])}}" class="btn btn-warning">Grupy</a></td>
    <td><a href="{{action('DepartmentController@deans', $row['id'])}}" class="btn btn-warning">Pracownicy Dziekanatu</a></td>
    
    </td>
   </tr>
   @endforeach
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
