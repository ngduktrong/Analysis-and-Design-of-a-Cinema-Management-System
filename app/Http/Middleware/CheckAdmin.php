<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    /**
     * Xác thực người dùng có quyền admin không.
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        
        if (!$user || $user->VaiTro !== 'admin') {
            return redirect('/home')->with('error', 'Bạn không có quyền truy cập trang quản trị!');
        }

        return $next($request);
    }
}
