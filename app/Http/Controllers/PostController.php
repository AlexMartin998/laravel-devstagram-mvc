<?php

namespace App\Http\Controllers;

use App\Models\Post;
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

        // // insert record in db
        // 1) Normal way
        // Post::create([
        //     'title' => $request->title,
        //     'description' => $request->description,
        //     'image' => $request->image,
        //     'user_id' => auth()->user()->id,
        // ]);

        // 2) long way
        // $post = new Post();
        // $post->title = $request->title;
        // $post->description = $request->description;
        // $post->image = $request->image;
        // $post->user_id = auth()->user()->id;
        // $post->save();

        // 3) Laravel way <- relations between tables | with it we don't need where sql statements in sql queries
        $request->user()->posts()->create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->image,
            'user_id' => auth()->user()->id,
        ]);


        return redirect()->route('posts.index', auth()->user()->username);
    }
}
