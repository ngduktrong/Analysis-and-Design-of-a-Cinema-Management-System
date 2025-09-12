<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\KhachHang;
use App\Models\NguoiDung;
use App\Models\TaiKhoan;
use App\Models\NhanVien;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    //dang nhap
    public function login(Request $request){
        $request->validate([
            'ten_dang_nhap' => 'required|string',
            'mat_khau' => 'required|string'
        ]);
        // tim tai khoan
        $account = TaiKhoan::where('TenDangNhap',$request->ten_dang_nhap)->first();
        if(!$account || !Hash::check($request->mat_khau,$account->MatKhau)){
            return response()->json((['message'=>'Sai tai khoan hoac mat khau !']),401);

        }
        // cung cap token 
        $token = $account->createToken('auth_token')->plainTextToken;
        return response()->json([
            'message'=>'Dang nhap thanh cong',
            'token'=> $token,
            'user'=>$account-> nguoiDung

        ]);
        
    }
    //dang ky
    public function register(Request $request){
        $request->validate([
            'ho_ten'=>['required','string','max:255'],
            'email'=> 'required|string|max:255|unique:NguoiDung,email',
            'mat_khau'=>'required|string|min:6',
            'so_dien_thoai'=>'required|string|max:15|unique:NguoiDung,SoDienThoai',
            'loai'=> 'required|in:KhachHang,NhanVien',
            'ten_dang_nhap'=>'required|string|max:50|unique:tai_khoan,TenDangNhap'
        ]);

        $user = NguoiDung::create([
            'HoTen'=>$request->ho_ten,
            'Email'=>$request->email,
            'SoDienThoai'=>$request->so_dien_thoai,
            'LoaiNguoiDung'=>$request->loai_nguoi_dung
        ]);
        //tao tai khoan
        TaiKhoan::create([
            'TenDangNhap'=>$request->ten_dang_nhap,
            'MatKhau'=>Hash::make($request->mat_khau),
            'LoaiTaiKhoan'=> $request->loai === 'KhachHang' ? TaiKhoan::USER : TaiKhoan::ADMIN,
            'MaNguoiDung'=> $user->MaNguoidung
        ]);
        if($request->loai == 'KhachHang')
    }

}