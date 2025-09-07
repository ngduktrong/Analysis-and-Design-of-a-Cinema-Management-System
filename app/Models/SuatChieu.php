<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuatChieu extends Model
{
    protected $table = 'suatchieu';      
    protected $primaryKey = 'MaSuatChieu';
    public $timestamps = false;          

    protected $fillable = [
        'MaPhim',
        'MaPhong',
        'NgayGioChieu'
    ];

   
    public function getNgayGioChieuFormattedAttribute()
    {
        if (!$this->NgayGioChieu) {
            return null;
        }
        return date('d-m-Y H:i', strtotime($this->NgayGioChieu));
    }

  
    public function phim()
    {
        return $this->belongsTo(Phim::class, 'MaPhim', 'MaPhim');
    }

   
    public function phong()
    {
        return $this->belongsTo(PhongChieu::class, 'MaPhong', 'MaPhong');
    }
}
