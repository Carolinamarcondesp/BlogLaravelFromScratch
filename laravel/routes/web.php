<?php

use App\Models\Post;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
   /* \Illuminate\Support\Facades\DB::listen(function ($query){
        \Illuminate\Support\Facades\Log::info($query->sql, $query->bindings);
    });*/

    $posts = Post::latest();

    if (request('search')){
        $posts->where('title', 'like', '%' . request('search') . '%')
           ->orWhere('body', 'like', '%' . request('search') . '%');
    }

    return view('posts', [
        'posts' => $posts->get(),
        'categories' => \App\Models\Category::all()
    ]);
})->name('home');

Route::get('posts/{post:slug}', function (Post $post){
    return view('post', [
        'post' => $post

    ]);
});

Route::get('categories/{category:slug}', function (\App\Models\Category $category) {

    return view('posts', [
        'posts' => $category->posts,
        'currentCategory' => $category,
        'categories' => \App\Models\Category::all()

    ]);
})->name('category');

Route::get('authors/{author:username}', function (\App\Models\User $author) {

    return view('posts', [
        'posts' => $author->posts,
        'categories' => \App\Models\Category::all()
    ]);
});


