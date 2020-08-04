@extends('templates.master')

@section('main-content')
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            @include('wallets.partials.add-form')
        </div>
        <div class="col-sm-3"></div>
    </div>
@stop
