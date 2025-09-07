<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    protected $table = 'hoadon';         
    protected $primaryKey = 'MaHoaDon';
    public $timestamps = false;           

    protected $fillable = [
        'MaNhanVien',
        'MaKhachHang',
        'NgayLap',
        'TongTien'
    ];

    public function nhanVien()
    {
        return $this->belongsTo(NguoiDung::class, 'MaNhanVien', 'MaNguoiDung');
    }

    
    public function khachHang()
    {
        return $this->belongsTo(NguoiDung::class, 'MaKhachHang', 'MaNguoiDung');
    }

    
    public function ve()
    {
        return $this->hasMany(Ve::class, 'MaHoaDon', 'MaHoaDon');
    }
}
