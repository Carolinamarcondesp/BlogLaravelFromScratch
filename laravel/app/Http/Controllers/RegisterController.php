<?php

namespace App\Http\Controllers;

use App\Models\User;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        //create user
        //'password' => ['required','max:255', 'min:7']
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users,username',
            //or... 'username' => ['required', 'min:3', 'max:255', Rule::unique('users,username')]
            'email' => 'required|email|max:255|unique:users,email',
            'password' => ['required', 'max:255', 'min:7'],
        ]);

        /*$user = User::create($attributes);

        auth()->login($user);*/

        auth()->login(User::create($attributes));

        return redirect('/')->with('success', 'Your account has been created');
    }
}
