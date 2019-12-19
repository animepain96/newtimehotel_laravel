<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Customer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::guard('khachhang')->check()){
            return $next($request);
        }
        return redirect('/login')->with('message', array('status' => 'danger', 'content' => 'Vui lòng đăng nhập.'));
    }
}
