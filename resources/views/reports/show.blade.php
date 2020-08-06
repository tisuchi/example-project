@extends('templates.master')

@section('main-content')
    <h4 class="text-muted text-uppercase border-bottom">Reports</h4>

    @if($report)
        <table class="table table-hover my-5">
            <thead class="thead-light bg-secondary text-white">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Transaction Type</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($report->transactions as $transaction)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $transaction->transactionType->title }}</td>
                        <td class="{{ $transaction->transaction_type_id == 1? 'text-success' : 'text-danger' }}">{{ number_format($transaction->amount, 2) }}</td>
                        <td>{{ $transaction->created_at->format('d F, Y h:i:s') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        No report found!
    @endif
@stop
