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
                    @if(auth()->user()->isAdmin == 1)
                        <div class=”panel-body”>
                            Jesteś Adminem
                    @endif
                    @if(auth()->user()->isStudent == 1)
                        <div class=”panel-body”>
                            Jesteś Studentem
                    @endif
                    @if(auth()->user()->isTeacher == 1)
                        <div class=”panel-body”>
                            Jesteś Wykładowcą
                    @endif
                    @if(auth()->user()->isDean == 1)
                        <div class=”panel-body”>
                            Jesteś Dziekanem
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
