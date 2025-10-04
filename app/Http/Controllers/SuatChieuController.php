<?php

namespace App\Http\Controllers;

use App\Models\SuatChieu;
use App\Models\Phim;
use App\Models\PhongChieu;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SuatChieuController extends BaseCrudController
{
    protected $model = SuatChieu::class;
    protected $primaryKey = 'MaSuatChieu';

    public function index()
    {
        $suatChieus = parent::index();
        $phims = Phim::all();
        $phongChieus = PhongChieu::all();
        
        $editId = request()->get('edit');
        $suatChieu = null;
        
        if ($editId) {
            $suatChieu = $this->model::find($editId);
        }
        
        return view('AdminSuatChieu', compact('suatChieus', 'phims', 'phongChieus', 'suatChieu'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'MaPhim' => 'required|exists:Phim,MaPhim',
            'MaPhong' => 'required|exists:PhongChieu,MaPhong',
            'NgayGioChieu' => 'required|date|after_or_equal:now'
        ]);

        // Xử lý logic tự động điều chỉnh thời gian
        $ngayGioChieu = $this->adjustShowtime($request);

        // Kiểm tra xem thời gian sau điều chỉnh có hợp lệ không
        if ($ngayGioChieu < now()) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['NgayGioChieu' => 'Thời gian chiếu không được trong quá khứ sau khi điều chỉnh. Vui lòng chọn thời gian khác.']);
        }

        // Tạo dữ liệu mới với thời gian đã điều chỉnh
        $data = $request->all();
        $data['NgayGioChieu'] = $ngayGioChieu;

        $result = $this->model::create($data);
        
        return redirect()->route('admin.suatchieu.index')
                         ->with('success', 'Thêm suất chiếu thành công. Thời gian đã được điều chỉnh để tránh trùng lịch.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'MaPhim' => 'required|exists:Phim,MaPhim',
            'MaPhong' => 'required|exists:PhongChieu,MaPhong',
            'NgayGioChieu' => 'required|date|after_or_equal:now'
        ]);

        // Xử lý logic tự động điều chỉnh thời gian
        $ngayGioChieu = $this->adjustShowtime($request, $id);

        // Kiểm tra xem thời gian sau điều chỉnh có hợp lệ không
        if ($ngayGioChieu < now()) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['NgayGioChieu' => 'Thời gian chiếu không được trong quá khứ sau khi điều chỉnh. Vui lòng chọn thời gian khác.']);
        }

        // Cập nhật dữ liệu với thời gian đã điều chỉnh
        $item = $this->model::findOrFail($id);
        $item->update(array_merge($request->all(), ['NgayGioChieu' => $ngayGioChieu]));
        
        return redirect()->route('admin.suatchieu.index')
                         ->with('success', 'Cập nhật suất chiếu thành công. Thời gian đã được điều chỉnh để tránh trùng lịch.');
    }

    public function destroy($id)
    {
        $result = parent::destroy($id);
        
        return redirect()->route('admin.suatchieu.index')
                         ->with('success', 'Xóa suất chiếu thành công');
    }

    /**
     * Điều chỉnh thời gian chiếu tự động nếu trùng với suất chiếu khác trong cùng phòng
     */
    private function adjustShowtime(Request $request, $excludeId = null)
    {
        $maPhim = $request->MaPhim;
        $maPhong = $request->MaPhong;
        $ngayGioChieu = Carbon::parse($request->NgayGioChieu);
        
        // Lấy thông tin phim mới để biết thời lượng
        $phimMoi = Phim::find($maPhim);
        $thoiLuongPhimMoi = $phimMoi->ThoiLuong;

        $maxAttempts = 20; // Tăng số lần thử để xử lý nhiều suất chiếu liên tiếp
        $attempt = 0;
        
        do {
            $adjusted = false;
            
            // Tìm tất cả suất chiếu trong cùng PHÒNG (bất kể phim nào) trong ngày
            $query = SuatChieu::where('MaPhong', $maPhong)
                ->whereDate('NgayGioChieu', $ngayGioChieu->toDateString());

            if ($excludeId) {
                $query->where('MaSuatChieu', '!=', $excludeId);
            }

            $suatChieusTrongNgay = $query->orderBy('NgayGioChieu')->get();

            foreach ($suatChieusTrongNgay as $suatChieu) {
                // Lấy thông tin phim của suất chiếu hiện tại để biết thời lượng
                $phimHienTai = Phim::find($suatChieu->MaPhim);
                $thoiLuongPhimHienTai = $phimHienTai->ThoiLuong;

                $startTime = Carbon::parse($suatChieu->NgayGioChieu);
                $endTime = $startTime->copy()->addMinutes($thoiLuongPhimHienTai);
                
                // Kiểm tra nếu thời gian chiếu mới nằm trong khoảng thời gian chiếu của suất chiếu hiện có
                if ($ngayGioChieu->between($startTime, $endTime)) {
                    // Điều chỉnh thời gian chiếu mới thành thời gian kết thúc + 10 phút
                    $ngayGioChieu = $endTime->copy()->addMinutes(10);
                    $adjusted = true;
                    break; // Thoát vòng lặp để kiểm tra lại từ đầu với thời gian mới
                }
                
                // Kiểm tra xem suất chiếu mới có "cắt ngang" suất chiếu hiện có không
                // (thời gian bắt đầu mới trước khi kết thúc nhưng kết thúc mới sau khi bắt đầu)
                $endTimeMoi = $ngayGioChieu->copy()->addMinutes($thoiLuongPhimMoi);
                if ($ngayGioChieu->lt($endTime) && $endTimeMoi->gt($startTime)) {
                    $ngayGioChieu = $endTime->copy()->addMinutes(10);
                    $adjusted = true;
                    break;
                }
            }
            
            $attempt++;
        } while ($adjusted && $attempt < $maxAttempts);

        return $ngayGioChieu;
    }
}