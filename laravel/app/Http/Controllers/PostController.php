<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    public function index()
    {
        //Laravel TIP: when you return an eloquent collection from a route, laravel converts it into JSON
        //return Post::latest()->filter(request(['search', 'category', 'author']))->paginate();

        return view('posts.index', [
            'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(6)->withQueryString(),
        ]);
    }

    public function show(Post $post)
    {

        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function create()
    {

        return view('posts.create');
    }

    public function store()
    {
        /*$path = request()->file('thumbnail')->store('thumbnails'); */


        $attributes = request()->validate([
            'title' => 'required',
            'thumbnail' => 'required|image',
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);

        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');


        Post::create($attributes);
        //ds($attributes['thumbnail'] = request()->file('thumbnail')->store('public/thumbnails'));
        //auth()->user()->posts()->create($attributes);

        return redirect('/')->with('success', 'Published!');

    }
}
