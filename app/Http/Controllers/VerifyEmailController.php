<?php

namespace App\Http\Controllers;

use App\Http\Repositories\JoinRepository;
use Illuminate\Http\Request;

class VerifyEmailController extends Controller
{
    public function show($token)
    {
        $isVerified = (new JoinRepository())->verifyEmail($token);

        if (! $isVerified){
            return redirect()->back()->with('danger', 'Token mismatched.');
        }

        return redirect()->route('login.show')->with('success', 'You have successfully verified your email.');
    }
}
