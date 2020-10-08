<?php

namespace App\Http\Middleware;

use Closure;
use http\Message;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;

class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$userType)
    {


        if(auth::check()) {

//            if (auth::user()['approved_at'] === Null) {
//                return redirect()->route('login');;
//        }
//            else{
                if (auth::user()['type'] === $userType) {
                    return $next($request);
                }
                else{
                    return redirect()->route('denied');
                }
            }
//    }
        else{
            return redirect()->route('login');
        }





        }




}
