<?php

namespace App\Http\Controllers;

use App\Services\SessionsService;
use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function __construct(private readonly SessionsService $service)
    {
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function login(Request $request)
    {

        return $this->service->login($request->email, $request->password, $request->header('user-agent'), $request->wantsJson());

    }

    public function myAccount(Request $request)
    {
        return $this->service->myAccount();
    }

    public function destroy()
    {
        auth()->logout();

        return back()->with('success', 'Goodbye!');
        //redirect('/')->with('success', 'Goodbye!');
    }
}
