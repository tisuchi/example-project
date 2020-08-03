<?php

namespace App\Http\Repositories;

use App\Notifications\RegularUserJoined;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;

class JoinRepository
{
    public function join(Request $request)
    {
        $user = User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'token' => Str::random(32),
        ]);

        $user->notify(new RegularUserJoined($user));

        return $user;
    }

    public function verifyEmail($token)
    {
        $user = User::where('token', $token)->first();

        if (!$user){
            return false;
        }

        $user->update([
            'email_verified_at' => now()
        ]);

        return true;
    }
}
