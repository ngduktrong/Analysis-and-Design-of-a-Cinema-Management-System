<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ghe extends Model
{
    protected $table = 'ghe';       
    public $timestamps = false;     

    protected $fillable = [
        'MaPhong',
        'SoGhe'
    ];

    
    public function phongChieu()
    {
        return $this->belongsTo(PhongChieu::class, 'MaPhong', 'MaPhong');
    }
}
