<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserType
{
    public function handle(Request $request, Closure $next): Response
    {

        if(!Auth::check()){
            if(!$request->is('login') && !$request->is('register')){
                return redirect()->route('login');
            }

        } else {

            $user = Auth::user();

            if ($user->usertypeid == 1) {
                if ($request->is('admin/*')) {
                    return $next($request);
                } else {
                    abort(403);
                }
            }

            if ($user->usertypeid == 2) {
                if ($request->is('customer/*')) {
                    return $next($request);
                } else {
                    abort(403);
                }
            }

        }


        return redirect('/login');
    }
}
