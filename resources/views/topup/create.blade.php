@extends('templates.master')

@section('main-content')
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            @include('topup.partials.topup-form')
        </div>
        <div class="col-sm-3"></div>
    </div>
@stop
