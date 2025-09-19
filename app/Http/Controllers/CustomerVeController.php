<?php

namespace App\Http\Controllers;

use App\Models\HoaDon;
use App\Models\KhachHang;
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

        //lay ma khach hang tuong ung
        $khachHang = KhachHang::where('MaNguoiDung',$maNguoiDung)->first();
        if (!$khachHang) {
            return redirect()->route('home')->with('error', 'Không tìm thấy khách hàng.');
}
        $dsVe = [];

        $hoaDon = $this->hoaDonService->createHoaDon($khachHang->MaKhachHang);

        foreach($chonghe as $ghe){
            $ve = Ve::create([
                'MaSuatChieu'=>$masuatchieu,
                'MaPhong'=>Suatchieu::findOrFail($masuatchieu)->MaPhong,
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
        return redirect()->route('home')->with('success', 'Đặt thành công');

        }
}
