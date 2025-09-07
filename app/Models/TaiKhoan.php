<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaiKhoan extends Model
{
    protected $table = 'tai_khoan';
    protected $primaryKey = 'TenDangNhap'; 
    public $incrementing = false;         
    public $timestamps = false;

    protected $fillable = [
        'TenDangNhap',
        'MatKhau',
        'LoaiTaiKhoan',
        'MaNguoiDung',
    ];

  
    const ADMIN = 'admin';
    const USER = 'user';

    
    public function setLoaiTaiKhoanAttribute($value)
    {
        $this->attributes['LoaiTaiKhoan'] = strtolower($value) === self::ADMIN ? self::ADMIN : self::USER;
    }

   
    protected $hidden = ['MatKhau'];
}
