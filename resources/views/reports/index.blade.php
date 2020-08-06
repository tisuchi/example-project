@extends('templates.master')

@section('main-content')
    <h4 class="text-muted text-uppercase border-bottom">Reports</h4>

    @if($reports->count() > 0)
        <table class="table table-hover my-5">
            <thead class="thead-light bg-secondary text-white">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Wallet</th>
                    <th scope="col">Wallet Type</th>
                    <th scope="col">Total Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reports as $wallet)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>
                            <a href="{{ route('reports.show', $wallet->id) }}">{{ $wallet->title }}</a>
                        </td>
                        <td>{{ $wallet->walletType->title }}</td>
                        <td>{{ number_format($wallet->total, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot class="bg-light">
                <tr>
                    <td scope="col"></td>
                    <td scope="col"></td>
                    <th scope="col" class="float-right">Total Amount :</th>
                    <th scope="col badge badge-info">{{ number_format(auth()->user()->total(), 2) }}</th>
                </tr>
            </tfoot>
        </table>
    @else
        No wallet yet.
    @endif
@stop
