<?php

namespace App\Http\Controllers;


use App\Http\Repositories\JoinRepository;
use App\Http\Requests\JoinPost;

class JoinController extends Controller
{
    public function show()
    {
        return view('auth.join');
    }

    public function store(JoinPost $request)
    {
        $user = (new JoinRepository())->join($request);

        if (! $user){
            return redirect()->back()->with('danger', 'Opps! Something went wrong. Try again later.');
        }

        return redirect()->back()->with('success', 'You have successfully join. Plz verify your email.');
    }
}
