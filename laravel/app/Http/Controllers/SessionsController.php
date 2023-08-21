<?php

namespace App\Http\Controllers;



use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        //validate the request

        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        //attempt to authenticate and login the user based on the provided credentials
        if(auth()->attempt($attributes)){
            session()->regenerate(); //to avoid session fixation attacks
            return redirect('/')->with('success', 'Welcome Back!');
        }

        //auth failed
        throw ValidationException::withMessages([
            'email' => 'Your provided credentials could not be verified.'
        ]);
        /*return  back()
            ->withInput()
            ->withErrors(['email' => 'Your provided credentials could not be verified.']);*/

    }
    public function destroy()
    {
        auth()->logout();

        redirect('/')->with('success', 'Goodbye!');
    }
}
