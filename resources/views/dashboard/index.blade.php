@extends('templates.master')

@section('main-content')
    <div class="py-5 my-5 text-center">
        <h1 class="h2 my-5 py-5 text-muted">
            Welcome to Dashboard
            <br>

            @if(Auth::user()->first_time_loging == 0)
                Hey, you have to fill up the wallet.
            @endif
        </h1>
    </div>
@stop
