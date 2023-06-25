<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // espera el User x el route model binding
    public function init(User $user)
    {
        return view('dashboard', [
            'user' => $user,
        ]);
    }

    // create para forms de creacion - GET
    public function create()
    {
        return view('posts.create');
    }

    // atiende a POST y store in DB
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'required'
        ]);
    }
}
