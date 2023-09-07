<?php

namespace App\Services;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class SessionsService
{

    public function login(string $email, string $password, string $tokenName, bool $wantsRequest)
    {
        $user = User::where('email', $email )->first();

        if ($user && Hash::check($password, $user->password)) {

            Auth::login($user);
            $token = auth()->user()->createToken($tokenName, ['checklist']);

            $user->token = $token->plainTextToken;

            // Check if the request prefers JSON response
            if ($wantsRequest) {
                return UserResource::make($user);
            } else {
                // For web clients, redirect to a specific page after successful login.
                return redirect('/'); // Replace '/dashboard' with your desired redirection path.
            }




        }


        return response()->json(['error' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);

    }

    public function myAccount(): UserResource
    {
        return UserResource::make(auth()->user());
    }
}
