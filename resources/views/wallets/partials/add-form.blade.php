<form method="POST" action="{{ route('wallets.store') }}">
    @csrf

    <div class="card">
        <div class="card-header">
            <h3 class="my-2">Add a new wallet</h3>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Title</label>
                <input type="title" name="title" class="form-control" placeholder="Wallet Title">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Type</label>
                <select name="type_id" class="form-select">
                    @foreach(walletTypes() as $walletType)
                        <option value="{{ $walletType->id }}">{{ $walletType->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Add now</button>
            <a type="submit" class="btn btn-secondary" href="{{ route('wallets.index') }}">Cancel</a>
        </div>
    </div>
</form>
