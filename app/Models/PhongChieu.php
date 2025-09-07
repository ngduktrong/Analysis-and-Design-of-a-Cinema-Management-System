<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhongChieu extends Model
{
    protected $table = 'phongchieu';   
    protected $primaryKey = 'MaPhong';
    public $timestamps = false;       

    protected $fillable = [
        'TenPhong',
        'SoLuongGhe',
        'LoaiPhong'
    ];

    
    public function ghe()
    {
        return $this->hasMany(Ghe::class, 'MaPhong', 'MaPhong');
    }

    
    public function suatchieu()
    {
        return $this->hasMany(SuatChieu::class, 'MaPhong', 'MaPhong');
    }
}
