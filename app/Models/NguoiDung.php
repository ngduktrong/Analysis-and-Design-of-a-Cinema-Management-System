<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NguoiDung extends Model
{
    protected $table = 'nguoi_dung';        
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
}
