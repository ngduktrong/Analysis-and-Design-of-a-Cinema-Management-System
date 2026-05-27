<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\TaiKhoan;
use Illuminate\Foundation\Auth\User as Authenticatable;

class LoginController extends Authenticatable
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'TenDangNhap' => 'required',
            'MatKhau' => 'required',
           
        ]);

        
        $taiKhoan = TaiKhoan::where('TenDangNhap', $request->TenDangNhap)->first();

        // Kiểm tra tài khoản tồn tại và mật khẩu đúng
        if ($taiKhoan && Hash::check($request->MatKhau, $taiKhoan->MatKhau)) {
            Auth::login($taiKhoan);
            
           
            if ($taiKhoan->LoaiTaiKhoan === 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('home');
            }
        }

        return back()->withErrors([
            'TenDangNhap' => 'Tên đăng nhập hoặc mật khẩu không chính xác.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}