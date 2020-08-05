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
                        <th scope="row">
                            {{ $loop->iteration }}
                        </th>
                        <td>{{ $wallet->title }}</td>
                        <td>{{ $wallet->walletType->title }}</td>
                        <td width="20%">
                            <div class="badge bg-light text-success py-2 px-3">
                                <strong>
                                    {{ number_format($wallet->total, 2) }}
                                </strong>
                            </div>
                            <a href="{{ route('topup.create', $wallet->id) }}">Top Up</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $wallets->links() }}
    @else
        <div class="card py-5 my-5">
            <div class="card-body">
                <div class="text-center">
                    <h3 class="text-muted">
                        No wallet yet.
                    </h3>

                    <a class="btn btn-primary my-4" href="{{ route('wallets.create') }}">Add New</a>
                </div>
            </div>
        </div>
    @endif
@stop
