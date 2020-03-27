@extends('master')


@section('content')

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
   <a href="{{route('group.create')}}" class="btn btn-primary">Add</a>
   <br />
   <br />
  </div>
  <table class="table table-bordered table-striped">
   <tr>
    <th> Name</th>
    <th> Members</th>
    <th>Edit</th>
    <th>Delete</th>
   </tr>
   @foreach($groups as $row)
   <tr>
    <td>{{$row['name']}}</td>
    <td><a href="{{action('GroupController@members', $row['id'])}}" class="btn btn-warning">Members</a></td>
    <td><a href="{{action('GroupController@edit', $row['id'])}}" class="btn btn-warning">Edit</a></td>
    <td>
     <form method="post" class="delete_form" action="{{action('GroupController@destroy', $row['id'])}}">
      {{csrf_field()}}
      <input type="hidden" name="_method" value="DELETE" />
      <button type="submit" class="btn btn-danger">Delete</button>
     </form>
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
