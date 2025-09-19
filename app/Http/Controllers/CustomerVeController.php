<?php

namespace App\Http\Controllers;

use App\Models\HoaDon;
use Illuminate\Http\Request;
use App\Models\Phim;
use App\Models\Ve;
use App\Models\SuatChieu;
use Illuminate\Support\Facades\Auth;
use App\Service\HoaDonService;

class CustomerVeController extends Controller
{
   
    protected $hoaDonService;
    public function __construct(HoaDonService $hoaDonService){
        $this->hoaDonService = $hoaDonService;
    }
    public function confirm(){
            $masuatchieu = session('ma_suat_chieu');
            $chonghe = session('chon_ghe',[]);
            if(!$masuatchieu || empty($chonghe)){
                return redirect()->back()->with('error','bạn chưa chọn ghế');

            }
            $suatchieu = SuatChieu::with('phong','phim')->findOrFail($masuatchieu);
            return view('VeConfirm',compact('suatchieu','chonghe'));
        }

    public function bookTicket(Request $request){
        $masuatchieu = session('ma_suat_chieu');
        $chonghe = session('chon_ghe',[]);
        if(!$masuatchieu || empty($chonghe)){
            return redirect()->route('home')->with('error','ban chua chon ghe');
        }
        
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
        session()->forget(['ma_suat_chieu','chon_ghe']);
        return redirect()->back()->with('success', 'Dat thanh cong');
        }
}
