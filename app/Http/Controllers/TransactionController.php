<?php

namespace App\Http\Controllers;

use App\Http\Repositories\TransactionRepository;
use App\Http\Requests\TransactionPost;
use App\Wallet;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Show the top up form
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $wallet = Wallet::findOrFail(request()->segment(3));

        isWalletOwner($wallet);

        return view('topup.create');
    }

    /**
     * Store transaction data and update total amount.
     *
     * @param TransactionPost $request
     * @param $walletId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TransactionPost $request, $walletId)
    {
        $topUp = (new TransactionRepository())->store($request, $walletId);

        if (! $topUp){
            return redirect()->back()->with('danger', 'Something went wrong. Try again later.');
        }

        if ($topUp == 'insufficient'){
            return redirect()->route('wallets.index')->with('danger', 'Insufficient amount.');
        }

        return redirect()->route('wallets.index')
            ->with('success', 'You have done top up successfully.');
    }
}
