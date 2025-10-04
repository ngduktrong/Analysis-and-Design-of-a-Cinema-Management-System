<?php

namespace App\Http\Controllers;

use App\Models\NguoiDung;
use App\Models\TaiKhoan;
use App\Models\KhachHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'HoTen' => 'required|string|max:100',
            'SoDienThoai' => 'required|string|max:15|unique:NguoiDung,SoDienThoai',
            'Email' => 'required|email|unique:NguoiDung,Email',
            'TenDangNhap' => 'required|string|max:50|unique:TaiKhoan,TenDangNhap',
            'MatKhau' => 'required|string|min:6|confirmed',
        ]);

        try {
            DB::transaction(function () use ($request) {
                // Tạo mã người dùng
                $maNguoiDung = $this->generateMaNguoiDung();

                // Tạo người dùng
                $nguoiDung = NguoiDung::create([
                    'MaNguoiDung' => $maNguoiDung,
                    'HoTen' => $request->HoTen,
                    'SoDienThoai' => $request->SoDienThoai,
                    'Email' => $request->Email,
                    'LoaiNguoiDung' => 'KhachHang',
                ]);

                // Tạo khách hàng
                KhachHang::create([
                    'MaNguoiDung' => $maNguoiDung,
                    'DiemTichLuy' => 0,
                ]);

                // Tạo tài khoản - sử dụng mutator để hash mật khẩu
                TaiKhoan::create([
                    'TenDangNhap' => $request->TenDangNhap,
                    'MatKhau' => $request->MatKhau, // Mutator sẽ tự động hash
                    'LoaiTaiKhoan' => 'user',
                    'MaNguoiDung' => $maNguoiDung,
                ]);
            });

            return redirect()->route('login')->with('success', 'Đăng ký thành công! Vui lòng đăng nhập.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Đăng ký thất bại. Vui lòng thử lại.')->withInput();
        }
    }

    private function generateMaNguoiDung(): string
    {
        $prefix = 'ND' . date('Ymd');
        $last = NguoiDung::where('MaNguoiDung', 'like', $prefix . '%')
            ->orderBy('MaNguoiDung', 'desc')
            ->value('MaNguoiDung');

        if (!$last) {
            $sequence = 1;
        } else {
            $num = (int) substr($last, strlen($prefix));
            $sequence = $num + 1;
        }

        return $prefix . str_pad($sequence, 3, '0', STR_PAD_LEFT);
    }
}