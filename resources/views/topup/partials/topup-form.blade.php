<form method="POST" action="{{ route('topup.store', request()->segment(3)) }}">
    @csrf

    <div class="card">
        <div class="card-header">
            <h3 class="my-2">Top Up Now</h3>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Amount</label>
                <input type="text" name="amount" class="form-control" placeholder="100.00">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Type</label>
                <select name="transaction_type_id" class="form-select">
                    @foreach(transationTypes() as $transactionType)
                        <option value="{{ $transactionType->id }}">{{ $transactionType->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Topup Now</button>
            <a type="submit" class="btn btn-secondary" href="{{ route('wallets.index') }}">Cancel</a>
        </div>
    </div>
</form>
