@extends('layouts.app')

@section('content')
    <h2>Xác nhận vé</h2>

    <p>Phim: <b>{{ $suatchieu->phim->TenPhim }}</b></p>
    <p>Phòng: {{ $suatchieu->phong->TenPhong }}</p>
    <p>Suất chiếu: {{ $suatchieu->NgayGioChieu }}</p>
    <p>Ghế đã chọn: {{ implode(', ', $chonghe) }}</p>
    <p>Tổng tiền: {{ count($chonghe) * 50000 }} VND</p>

    <form method="POST" action="{{ route('ve.book') }}">
        @csrf
        <button type="submit">Xác nhận đặt vé</button>
    </form>

    <a href="{{ route('customer.ghe.index', $suatchieu->MaSuatChieu) }}">Quay lại chọn ghế</a>
@endsection