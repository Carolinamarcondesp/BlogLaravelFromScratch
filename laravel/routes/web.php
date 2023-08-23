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

Route::post('newsletter/', function () {
    request()->validate(['email' => 'required|email']);
    $mailchimp = new \MailchimpMarketing\ApiClient();

    $mailchimp->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => 'us12'
    ]);


    try{
        $response = $mailchimp->lists->addListMember('c11111821f',
            [
                'email_address' => request('email'),
                'status' => 'subscribed'
            ]
        );
    }catch(\Exception $e){
        throw \Illuminate\Validation\ValidationException::withMessages([
            'email' => 'This email could not be added to our newsletter list.'
        ]);
    }

    return redirect('/')->with('success', 'You are now signed up for our newsletter!');
});

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


