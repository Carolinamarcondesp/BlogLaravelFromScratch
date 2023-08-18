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

Route::get('/', [\App\Http\Controllers\PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [\App\Http\Controllers\PostController::class, 'show']);



/*Route::get('categories/{category:slug}', function (\App\Models\Category $category) {

     *****   DEPRECATED POST CONTROLLER IS NOW HANDLING *****

    return view('posts', [
        'posts' => $category->posts,
        'currentCategory' => $category,
        'categories' => \App\Models\Category::all()

    ]);
})->name('category');*/

Route::get('authors/{author:username}', function (\App\Models\User $author) {

    return view('posts', [
        'posts' => $author->posts,
        'categories' => \App\Models\Category::all()
    ]);
});


