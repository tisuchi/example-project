<?php

namespace App\Http\Controllers;

use App\Http\Repositories\WalletRepository;
use App\Http\Requests\WalletPost;
use App\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    public function index()
    {
        $wallets = Wallet::where('user_id', Auth::user()->id)
            ->latest()
            ->paginate(10);

        return view('wallets.index')
            ->with('wallets', $wallets);
    }

    public function create()
    {
        return view('wallets.create');
    }

    public function store(WalletPost $request)
    {
        $wallet = (new WalletRepository())->store($request);

        if (! $wallet){
            return redirect()->back()->with('danger', 'Something went wrong. Try again later');
        }

        return redirect()->route('wallets.index')->with('success', 'You have successfully created the wallet.');
    }
}
