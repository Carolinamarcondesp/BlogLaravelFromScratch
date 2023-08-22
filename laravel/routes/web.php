<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\PostCommentsController;
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
Route::post('posts/{post:slug}/comments', [\App\Http\Controllers\PostCommentsController::class, 'store']);

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');




/*         ******************** DEPRECATED POST CONTROLLER IS NOW HANDLING *************************

Route::get('categories/{category:slug}', function (\App\Models\Category $category) {


    return view('posts', [
        'posts' => $category->posts,
        'currentCategory' => $category,
        'categories' => \App\Models\Category::all()

    ]);
})->name('category');

Route::get('authors/{author:username}', function (\App\Models\User $author) {
    return view('posts.index', [
        'posts' => $author->posts
    ]);
});


*/


