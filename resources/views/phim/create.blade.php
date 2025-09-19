@extends('layouts.app')

@section('content')
    <h1>Thêm phim mới</h1>

    {{-- Hiển thị lỗi --}}
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form thêm phim --}}
    <form action="{{ route('phim.store') }}" method="POST">
        @csrf

        <div>
            <label for="TenPhim">Tên phim:</label>
            <input type="text" name="TenPhim" id="TenPhim" value="{{ old('TenPhim') }}" required>
        </div>

        <div>
            <label for="ThoiLuong">Thời lượng (phút):</label>
            <input type="number" name="ThoiLuong" id="ThoiLuong" value="{{ old('ThoiLuong') }}" required>
        </div>

        <div>
            <label for="NgayKhoiChieu">Ngày khởi chiếu:</label>
            <input type="date" name="NgayKhoiChieu" id="NgayKhoiChieu" value="{{ old('NgayKhoiChieu') }}" required>
        </div>

        <div>
            <label for="NuocSanXuat">Nước sản xuất:</label>
            <input type="text" name="NuocSanXuat" id="NuocSanXuat" value="{{ old('NuocSanXuat') }}" required>
        </div>

        <div>
            <label for="DinhDang">Định dạng:</label>
            <input type="text" name="DinhDang" id="DinhDang" value="{{ old('DinhDang') }}" required>
        </div>

        <div>
            <label for="MoTa">Mô tả:</label>
            <textarea name="MoTa" id="MoTa" rows="4" required>{{ old('MoTa') }}</textarea>
        </div>

        <div>
            <label for="DaoDien">Đạo diễn:</label>
            <input type="text" name="DaoDien" id="DaoDien" value="{{ old('DaoDien') }}" required>
        </div>

        <div>
            <label for="DuongDanPoster">Link poster:</label>
            <input type="url" name="DuongDanPoster" id="DuongDanPoster" value="{{ old('DuongDanPoster') }}" required>
        </div>

        <button type="submit">Thêm phim</button>
    </form>

    <p>
        <a href="{{ route('phim.index') }}">Quay lại danh sách phim</a>
    </p>
@endsection
