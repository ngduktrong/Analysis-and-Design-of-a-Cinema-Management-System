@extends('layouts.app')

@section('content')
    <h2>Chọn ghế cho suất chiếu: {{ $suatchieu->phim->TenPhim }} (Phòng: {{ $suatchieu->phong->TenPhong }})</h2>

    @if(session('error'))
        <div style="color: red;">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('customer.ghe.chon', $suatchieu->MaSuatChieu) }}">
        @csrf
        <p>Danh sách ghế đã đặt: {{ implode(', ', $vedat) ?: 'Chưa có ai đặt' }}</p>

        <label for="so_ghe">Chọn ghế (vd: A1, A2...):</label>
        <input type="text" name="so_ghe[]" placeholder="Nhập ghế 1" required>
        <input type="text" name="so_ghe[]" placeholder="Nhập ghế 2 (tùy chọn)">
        
        <button type="submit">Xác nhận ghế</button>
    </form>
@endsection
