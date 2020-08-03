<?php


namespace App\Http\Repositories;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginRepository
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            if (empty(Auth::user()->email_verified_at)){
                Auth::logout();

                return false;
            }

            // Authentication passed...
            return true;
        }

        return false;
    }
}
