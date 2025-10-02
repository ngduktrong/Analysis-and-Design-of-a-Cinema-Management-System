@extends('layouts.app')

@section('content')
<h2>Xác nhận vé</h2>

<p>Phim: <b>{{ $suatchieu->phim->TenPhim }}</b></p>
<p>Phòng: {{ $suatchieu->phongChieu->TenPhong }}</p>
<p>Suất chiếu: {{ $suatchieu->NgayGioChieu }}</p>
<p>Ghế đã chọn: {{ implode(', ', $chonGhe) }}</p>
<p>Tổng tiền tạm: {{ count($chonGhe) * 50000 }} VND</p>

@if(session('error'))
    <p style="color:red">{{ session('error') }}</p>
@endif

<form method="POST" action="{{ route('ve.book') }}">
    @csrf
    <button type="submit">Xác nhận đặt vé</button>
</form>

<a href="{{ route('customer.ghe.index', $suatchieu->MaSuatChieu) }}">Quay lại chọn ghế</a>
@endsection
