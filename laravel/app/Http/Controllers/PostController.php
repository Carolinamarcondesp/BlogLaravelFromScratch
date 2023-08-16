<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {



        return view('posts', [
            'posts' => Post::latest()->filter(request(['search']))->get(),
            'categories' => \App\Models\Category::all()
        ]);
    }

    public function show(Post $post)
    {
        return view('post', [
            'post' => $post
        ]);
    }


}
