<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Request $request, Post $post)
    {
        // x relaciones en laravel - no necesito especificar el post_id xq parto de esa instancia
        $post->likes()->create([
            'user_id' => $request->user()->id,  // auth() user de la request
        ]);

        return back();  // solo es like, retorna de nuevo a la misma url
    }
}
