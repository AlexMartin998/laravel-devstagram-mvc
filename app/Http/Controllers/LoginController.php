<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function init()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (!auth()->attempt($request->only('email', 'password'))) {
            // whith coloca el message en la SESSION y lo podemos recuperar en la view
            return back()->with('message', 'Incorrect Credentials'); // back a la prev page
        }

        return redirect()->route('posts.index');
    }
}
