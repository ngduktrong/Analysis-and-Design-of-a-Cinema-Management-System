<?php

namespace App\Http\Controllers;

use App\Models\HoaDon;
use Illuminate\Http\Request;
use App\Models\Phim;
use App\Models\Ve;
use App\Models\SuatChieu;
use Illuminate\Support\Facades\Auth;
use App\Service\HoaDonService;

class VeController extends Controller
{
    protected $hoaDonService;
    public function __construct(HoaDonService $hoaDonService){
        $this->hoaDonService = $hoaDonService;
    }
    public function bookTicket(Request $request){
        $request->validate([
            'ma_suat_chieu'=>'required|exists:suatchieu,MaSuatChieu',
            'so_ghe'=>'required|string|min:10',
            'so_ghe.*'=> 'string|max:10',
            
        ]);
        
        $maNguoiDung = Auth::user()->MaNguoiDung;
        $dsVe = [];

        $hoaDon = $this->hoaDonService->createHoaDon($maNguoiDung);

        foreach($request->so_ghe as $ghe){
            $ve = Ve::create([
                'MaSuatChieu'=>$request->ma_suat_chieu,
                'MaPhong'=>Suatchieu::find($request->ma_suat_chieu)->MaPhong,
                'SoGhe'=> $ghe,
                'GiaVe'=>50000,
                'MaHoaDon'=>$hoaDon->MaHoaDon,
                'TrangThai'=>'Đã đặt',
                'NgayDat'=> now(),

            ]);

            $dsVe[] = $ve;
        }
        $hoaDon->update(['TongTien'=>count($dsVe)*50000]);
        return redirect()->back()->with('success', 'Dat thanh cong');
        }
}
