<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function init()
    {
        return view('auth.login');
    }
}
