<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NhanVien extends NguoiDung
{
    protected $table = 'nhan_vien';
    protected $primaryKey = 'MaNguoiDung';
    public $incrementing = false; 
    public $timestamps = false;

    protected $fillable = [
        'MaNguoiDung',
        'VaiTro',
        'ChucVu',
        'Luong',
    ];

   
    const VAITRO_ADMIN   = 'Admin';
    const VAITRO_QUANLY  = 'QuanLy';
    const VAITRO_THUNGAN = 'ThuNgan';
    const VAITRO_BANVE   = 'BanVe';

  
    public function nguoiDung()
    {
        return $this->belongsTo(NguoiDung::class, 'MaNguoiDung', 'MaNguoiDung');
    }

   
    public function getVaiTroAttribute($value)
    {
        return ucfirst($value);
    }

    
    public function setVaiTroAttribute($value)
    {
        $roles = [
            self::VAITRO_ADMIN,
            self::VAITRO_QUANLY,
            self::VAITRO_THUNGAN,
            self::VAITRO_BANVE
        ];
        $this->attributes['VaiTro'] = in_array($value, $roles) ? $value : self::VAITRO_BANVE;
    }

    
    public function getLuongFormattedAttribute()
    {
        return number_format($this->Luong, 0, ',', '.') . ' VND';
    }
}
