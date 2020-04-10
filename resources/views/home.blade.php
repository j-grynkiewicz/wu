@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(auth()->user()->type == 1)
                        <div class=”panel-body”>
                            Jesteś Adminem
                            <br>
                            <a href="/user" class="btn btn-primary">Użytkownicy</a>
                            <br>
                            <a href="/group" class="btn btn-primary">Grupy</a>
                            <br>
                            <a href="/department" class="btn btn-primary">Wydziały</a>
                            <br>
                            <a href="/lecture" class="btn btn-primary">Zajęcia</a>
                    @endif
                    @if(auth()->user()->type == 2)
                        <div class=”panel-body”>
                            Jesteś Dziekanem
                            <br>
                            <a href="/user" class="btn btn-primary">Użytkownicy</a>
                            <br>
                            <a href="/group" class="btn btn-primary">Grupy</a>
                            <br>
                            <a href="/department" class="btn btn-primary">Wydziały</a>
                            <br>
                            <a href="/lecture" class="btn btn-primary">Zajęcia</a>
                    @endif
                    @if(auth()->user()->type == 3)
                        <div class=”panel-body”>
                            Jesteś Wykładowcą
                    @endif
                    @if(auth()->user()->type == 4)
                        <div class=”panel-body”>
                            Jesteś Studentem
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
