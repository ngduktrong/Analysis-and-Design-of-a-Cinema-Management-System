<?php

namespace App\Http\Controllers;

use App\Models\SuatChieu;
use Illuminate\Http\Request;
use App\Models\Ve;
use App\Models\PhongChieu;

class CustomerGheController extends Controller
{
    // hien thi so ghe
    public function index($maSuatChieu){
        $suatchieu = SuatChieu::with('phong')->findOrFail($maSuatChieu);
        // lay ra ghe da dat va danh dau
        $vedat = Ve::where('MaSuatChieu',$suatchieu->MaSuatChieu)->pluck('SoGhe')->toArray();
        return view('GheIndex',compact('suatchieu','vedat'));
    }
    //chon ghe
    public function chonGhe(Request $request,$maSuatChieu){
        $request->validate([
            'so_ghe'=>'required| array| min :1',
            'so_ghe.*'=>'string|max :10'
        ]);
        session([
            'chon_ghe'=>$request->so_ghe,
            'ma_suat_chieu'=>$maSuatChieu
        ]);
        return redirect()->route('ve.confirm');
    }
}
