
@extends('master')

@section('content')

<div class="row">
 <div class="col-md-12">
  <br />
  <h3 align="center">User Data</h3>
  <br />
  <a href="/home" class="btn btn-primary">Wróć</a>
  @if($message = Session::get('success'))
  <div class="alert alert-success">
   <p>{{$message}}</p>
  </div>
  @endif
  <div align="center">
   <br />
   <br />
   <a href="/students" class="btn btn-primary">Studenci</a>
   <br />
   <br />
   <a href="/teachers" class="btn btn-primary">Wykładowcy</a>
   <br />
   <br />
   @if(auth()->user()->type == 1)
   <a href="/deans" class="btn btn-primary">Dziekani</a>
   @endif
  </div>
  
@endsection

