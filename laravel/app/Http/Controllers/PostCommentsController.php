<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostCommentsController extends Controller
{
    public function store(Post $post)
    {

        //validation
        request()->validate([
            'body' => 'required',
        ]);

        //add a comment to the given post

        $post->comments()->create([
            'user_id' => auth()->id(), //auth()->user()->id or request()->user()->id
            'body' => request('body'),
        ]);

        return back()->with('success', 'Comment added!');
    }
}
