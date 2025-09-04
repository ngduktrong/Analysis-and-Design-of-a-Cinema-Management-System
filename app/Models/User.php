<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'nguoidung';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
