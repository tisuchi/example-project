<?php


namespace App\Http\Repositories;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginRepository
{
    /**
     * Do login
     *
     * @param Request $request
     * @return bool
     */
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

    /**
     * Update the `first_time_loging` column value if the
     * user is login in the system first time only.
     */
    public function updateFirstTimeLogin(){
        if(Auth::user()->first_time_loging == 0){
            Auth::user()->update([
                'first_time_loging' => 1
            ]);
        }
    }
}
