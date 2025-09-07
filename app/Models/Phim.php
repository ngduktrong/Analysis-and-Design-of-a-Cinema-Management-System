<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phim extends Model
{
  
    protected $table = 'phim';
    protected $primaryKey = 'MaPhim';
    public $timestamps = false; 

    
    protected $fillable = [
        'TenPhim',
        'ThoiLuong',
        'NgayKhoiChieu',
        'NuocSanXuat',
        'DinhDang',
        'MoTa',
        'DaoDien',
        'DuongDanPoster'
    ];

    
    public function getNgayKhoiChieuFormattedAttribute()
    {
        if (!$this->NgayKhoiChieu) {
            return null;
        }
        return date('d-m-Y', strtotime($this->NgayKhoiChieu));
    }
}
