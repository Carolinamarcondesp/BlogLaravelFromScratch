<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MustBeAdministrator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //validation admin

        /* if(auth()->guest()){
             //abort(403);
             abort(Response::HTTP_FORBIDDEN);
         }*/
        //refactor to bellow simply adding the "?" optional operator

        if(auth()->user()?->username != 'CarolMarc'){

            abort(Response::HTTP_FORBIDDEN);
        }

        //in case of having a few more admin you could have an array with admins usernames to check or update the user table add admin column
        return $next($request);
    }
}
