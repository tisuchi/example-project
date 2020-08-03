<?php

namespace App\Http\Controllers;

use Socialite;
use Illuminate\Http\Request;

class LoginProviderController extends Controller
{
    public function show($driver)
    {
        return Socialite::driver($driver)->redirect();
    }
}
