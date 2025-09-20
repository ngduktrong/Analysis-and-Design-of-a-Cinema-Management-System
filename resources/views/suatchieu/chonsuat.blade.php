@extends('layouts.app')

@section('content')
    <h2>Chọn suất chiếu cho phim: {{ $phim->TenPhim }} (Phòng: {{ $phong->TenPhong }})</h2>

    @if($suatchieu->isEmpty())
        <p>Hiện chưa có suất chiếu nào cho phim này tại phòng này.</p>
    @else
        <ul>
            @foreach($suatchieu as $suat)
                <li>
                    {{ $suat->NgayGioChieu }} -
                    <a href="{{ route('customer.ghe.index', $suat->MaSuatChieu) }}">Chọn ghế</a>
                </li>
            @endforeach
        </ul>
    @endif

    <a href="{{ route('suatchieu.phong', $phim->MaPhim) }}">Quay lại chọn phòng</a>
@endsection
