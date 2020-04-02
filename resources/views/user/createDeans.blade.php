@extends('master')

@section('content')
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

  <form method="post" action="{{url('dean')}}">
   {{csrf_field()}}
   <div class="form-group">
    <input type="text" name="first_name" class="form-control" placeholder="Wprowadź imię" />
   </div>
   <div class="form-group">
    <input type="text" name="last_name" class="form-control" placeholder="Wprowadź nazwisko" />
   </div>
   <div class="form-group">
    <input type="text" name="username" class="form-control" placeholder="Wprowadź nazwę użytkownika" />
   </div>
   <div class="form-group">
    <input type="email" name="email" class="form-control" placeholder="Wprowadź email" />
    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
   </div>   
   <div class="form-group">
    <input type="password" name="password" class="form-control" placeholder="Wprowadź hasło" />
    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
   </div>
   
   <div class="form-group">
    <input type="submit" class="btn btn-primary" />
   </div>
  </form>
 </div>
</div>
@endsection

