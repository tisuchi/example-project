@extends('templates.master')

@section('main-content')
    <div class="py-5 my-5">
        @if(Auth::user()->first_time_loging == 0)
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    @include('wallets.partials.add-form')
                </div>
                <div class="col-sm-3"></div>
            </div>
        @else
            <h1 class="h2 my-5 py-5 text-muted">
                Welcome to Dashboard
            </h1>
        @endif
    </div>
@stop
