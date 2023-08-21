<?php

namespace App\Http\Controllers;



class SessionsController extends Controller
{
    public function destroy()
    {
        auth()->logout();

        redirect('/')->with('success', 'Goodbye!');
    }
}
