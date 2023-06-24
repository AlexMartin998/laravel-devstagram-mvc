<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // dd($request->get('username')); // dumb_die <- imprime y mata/detiene la ejecucion

        // // Form Validations
        $this->validate($request, [
            'name' => 'required|min:1|max:33',
            'username' => 'required|unique:users|min:3|max:21',
            'email' => 'required|unique:users|max:60|email',
            'password' => 'required|confirmed|min:6',
        ]);

        dd('creating user');
    }
}
