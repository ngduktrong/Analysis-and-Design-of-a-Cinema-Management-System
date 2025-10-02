<?php

namespace App\Http\Controllers;

use App\Models\HoaDon;
use App\Models\KhachHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerHoaDonController extends Controller
{
    /**
     * Hiển thị danh sách hóa đơn của khách hàng hiện tại
     */
    public function index()
    {
        $maNguoiDung = Auth::user()->MaNguoiDung;
        $khachHang = KhachHang::where('MaNguoiDung', $maNguoiDung)->first();

        if (!$khachHang) {
            return redirect()->route('home')->with('error', 'Không tìm thấy khách hàng.');
        }

        // lấy danh sách hóa đơn kèm vé, suất chiếu, phòng, phim
        $hoaDons = HoaDon::where('MaKhachHang', $khachHang->MaKhachHang)
                         ->with([
                             'ves.suatChieu.phim',
                             'ves.suatChieu.phongChieu', // đã sửa phong → phongChieu
                             'ves.ghe'
                         ])
                         ->orderByDesc('NgayLap')
                         ->get();

        return view('HoaDonIndex', compact('hoaDons'));
    }

    /**
     * Tạo hóa đơn mới (luôn gán MaNhanVien = 6)
     */
    public function store(Request $request)
    {
        $maNguoiDung = Auth::user()->MaNguoiDung;
        $khachHang = KhachHang::where('MaNguoiDung', $maNguoiDung)->first();

        if (!$khachHang) {
            return redirect()->route('home')->with('error', 'Không tìm thấy khách hàng.');
        }

        $hoaDon = HoaDon::create([
            'MaKhachHang' => $khachHang->MaKhachHang,
            'MaNhanVien'  => 6,   // cố định nhân viên số 6
            'NgayLap'     => now(),
            'TongTien'    => 0,   // mặc định 0, sẽ cập nhật sau khi thêm vé
        ]);

        return redirect()->route('home')->with('success', 'Tạo hóa đơn thành công!');
    }

    /**
     * Xem chi tiết hóa đơn
     */
    public function show($id)
    {
        $hoaDon = HoaDon::with([
                        'ves.suatChieu.phim',
                        'ves.suatChieu.phongChieu', // sửa lại đúng quan hệ
                        'ves.ghe'
                    ])->findOrFail($id);

        return view('HoaDonShow', compact('hoaDon'));
    }
}
