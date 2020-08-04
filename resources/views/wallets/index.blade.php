@extends('templates.master')

@section('main-content')
    <div class="row">
        <div class="col-sm-10">
            <h1 class="text-muted border-bottom">
                List of Wallets
            </h1>
        </div>
        <div class="col-sm-2">
            <a href="{{ route('wallets.create') }}" class="float-right btn btn-primary">
                Add new
            </a>
        </div>
    </div>

    @if($wallets->total() > 0)
        <table class="table table-striped my-5">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Wallet Type</th>
                    <th scope="col">Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach($wallets as $wallet)
                    <tr>
                        <th scope="row">1</th>
                        <td>{{ $wallet->title }}</td>
                        <td>{{ $wallet->walletType->title }}</td>
                        <td>{{ $wallet->amount }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="card py-5 my-5">
            <div class="card-body">
                <div class="text-center">
                    <h3 class="text-muted">
                        No wallet yet.
                    </h3>

                    <a class="btn btn-primary my-4" href="">Add New</a>
                </div>
            </div>
        </div>
    @endif
@stop
