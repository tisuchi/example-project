<?php

namespace App\Http\Controllers;

use App\Http\Repositories\LoginRepository;
use App\Http\Requests\LoginPost;

class LoginController extends Controller
{
    public function show()
    {
        return view('auth.login');
    }

    public function store(LoginPost $request)
    {
        $user = (new LoginRepository())->login($request);

        if (! $user){
            return redirect()->back()->with('danger', 'Wrong email or password');
        }

        return redirect()
            ->route('dashboard.index')
            ->with('success', 'You have successfully logged in.');
    }
}
