<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class TaiKhoan extends Authenticatable
{
    use HasApiTokens;
    protected $table = 'taikhoan';
    protected $primaryKey = 'MaNguoiDung'; 
    public $incrementing = false;  
    protected $keyType = 'int';       
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
    public function nguoiDung(){
        return $this->belongsTo(NguoiDung::class,'MaNguoiDung','MaNguoiDung');
    }

   
    protected $hidden = ['MatKhau'];
    public function getAuthPassword()
{
    return $this->MatKhau;
}
}
