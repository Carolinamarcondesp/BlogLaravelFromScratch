<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function index()
    {

        //ds(Gate::allows('admin')); //returns bool
        //ds(request()->user()->can('admin')); // //returns bool
        //$this->authorize('admin');

        //Laravel TIP: when you return an eloquent collection from a route, laravel converts it into JSON
        //return Post::latest()->filter(request(['search', 'category', 'author']))->paginate();

        return view('posts.index', [
            'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(6)->withQueryString(),
        ]);
    }

    public function show(Post $post)
    {

        return view('posts.show', [
            'post' => $post,
        ]);
    }
}
