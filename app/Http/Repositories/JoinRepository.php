<?php

namespace App\Http\Repositories;

use App\Notifications\RegularUserJoined;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class JoinRepository
{
    public function join(Request $request)
    {
        $user = User::create($request->all());

        $user->notify(new RegularUserJoined());

        return $user;
    }

    public function verifyEmail($token)
    {
        if (! $token || $token == ''){
            return false;
        }

        User::where([
            'remember_token' => $token,
        ]);
    }
}
