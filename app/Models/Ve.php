<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ve extends Model
{
    protected $table = 've';            
    protected $primaryKey = 'MaVe';    
    public $timestamps = false;          

    protected $fillable = [
        'MaSuatChieu',
        'MaPhong',
        'SoGhe',
        'MaHoaDon',
        'GiaVe',
        'TrangThai',
        'NgayDat',
        'NgayGioChieu'
    ];

    

    public function suatChieu()
    {
        return $this->belongsTo(SuatChieu::class, 'MaSuatChieu', 'MaSuatChieu');
    }

    
    public function phongChieu()
    {
        return $this->belongsTo(PhongChieu::class, 'MaPhong', 'MaPhong');
    }

    
    public function hoaDon()
    {
        return $this->belongsTo(HoaDon::class, 'MaHoaDon', 'MaHoaDon');
    }

   
    public function getNgayGioChieuFormattedAttribute()
    {
        if (!$this->NgayGioChieu) return '';
        return \Carbon\Carbon::parse($this->NgayGioChieu)->format('d-m-Y H:i');
    }
}
