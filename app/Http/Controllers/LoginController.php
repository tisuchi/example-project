<?php

namespace App\Http\Controllers;

use App\Http\Repositories\LoginRepository;
use App\Http\Requests\LoginPost;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Show login page.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        return view('auth.login');
    }

    /**
     * Proceed login based on user's data
     *
     * @param LoginPost $request
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * Do logout
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy()
    {
        // Update first_time_login column
        (new LoginRepository())->updateFirstTimeLogin();

        Auth::logout();

        return redirect()
            ->route('login')
            ->with('success', 'You have successfully logged out.');
    }
}
