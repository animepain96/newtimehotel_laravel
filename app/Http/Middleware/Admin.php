<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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
        if(Auth::guard('nhanvien')->check() && Auth::guard('nhanvien')->user()->isAdmin == 1){
            return $next($request);
        }
        return redirect('admin')->with('message', array('status' => 'danger', 'content' => 'Bạn không đủ quyền truy cập chức năng này.'));
    }
}
