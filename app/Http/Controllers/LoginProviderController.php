<?php

namespace App\Http\Controllers;

use App\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;

class LoginProviderController extends Controller
{
    public function show($driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    public function handleProviderCallback($driver)
    {
        try {
            $user = Socialite::driver($driver)->user();
        } catch (\Exception $e) {
            return redirect()->route('login');
        }

        $existingUser = User::where('email', $user->getEmail())->first();

        if ($existingUser) {
            auth()->login($existingUser, true);
        } else {
            $newUser = User::create([
                'provider_name' => $driver,
                'provider_id' => $user->getId(),
                'email' => $user->getEmail(),
                'email_verified_at' => now(),
            ]);

            auth()->login($newUser, true);
        }

        return redirect()
            ->route('dashboard.index')
            ->with('success', 'You have successfully logged in.');
    }
}
