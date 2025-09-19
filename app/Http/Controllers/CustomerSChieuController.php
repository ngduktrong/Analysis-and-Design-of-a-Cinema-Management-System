<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuatChieu;
use App\Models\Phim;
use App\Models\PhongChieu;

class CustomerSChieuController extends Controller
{
    public function index(){
        $suatchieu = SuatChieu::with(['phim','phong'])->get();
        return view('suatchieu.index',compact('suatchieu'));
    }
    
}
