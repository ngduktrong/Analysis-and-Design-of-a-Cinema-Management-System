<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    protected $table = 'khachhang';
    protected $primaryKey = 'MaNguoiDung';
    public $incrementing = false; 
    public $timestamps = false;

    protected $fillable = [
        'MaNguoiDung',
        'DiemTichLuy',
    ];

   
    public function nguoiDung()
    {
        return $this->belongsTo(NguoiDung::class, 'MaNguoiDung', 'MaNguoiDung');
    }

   
    public function getDiemTichLuyAttribute($value)
    {
        return $value ?? 0;
    }

   
    public function congDiem($soDiem)
    {
        $this->DiemTichLuy += $soDiem;
        $this->save();
    }

   
    public function truDiem($soDiem)
    {
        $this->DiemTichLuy = max(0, $this->DiemTichLuy - $soDiem);
        $this->save();
    }
}
