<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NguoiDung extends Model
{
    protected $table = 'nguoidung';        
    protected $primaryKey = 'MaNguoiDung';
    public $timestamps = false;             

    protected $fillable = [
        'HoTen',
        'SoDienThoai',
        'Email',
        'LoaiNguoiDung',
    ];

    
    const LOAI_KHACHHANG = 'KhachHang';
    const LOAI_NHANVIEN = 'NhanVien';

    public function nhanVien(){
        return $this->hasOne(NhanVien::class,'MaNguoiDung','MaNguoiDung');
    }
    public function khachHang(){
        return $this->hasOne(KhachHang::class,'MaNguoiDung','MaNguoiDung');
    }
    public function taiKhoan(){
        return $this->hasOne(TaiKhoan::class,'MaNguoiDung','MaNguoiDung');
    }
}
