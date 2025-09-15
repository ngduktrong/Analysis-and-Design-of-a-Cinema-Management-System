@extends('layouts.app')

@section('content')
    <h1>Trang chủ</h1>

    <h2>Phim đang chiếu</h2>
    <ul>
        @forelse($phimDangChieu as $phim)
            <li>
                <a href="{{ route('home.show', $phim->MaPhim) }}">
                    {{ $phim->TenPhim }} (Khởi chiếu: {{ $phim->NgayKhoiChieu }})
                </a>
            </li>
        @empty
            <li>Hiện tại chưa có phim nào đang chiếu.</li>
        @endforelse
    </ul>

    <h2>Phim sắp chiếu</h2>
    <ul>
        @forelse($phimSapChieu as $phim)
            <li>
                <a href="{{ route('home.show', $phim->MaPhim) }}">
                    {{ $phim->TenPhim }} (Khởi chiếu: {{ $phim->NgayKhoiChieu }})
                </a>
            </li>
        @empty
            <li>Không có phim sắp chiếu.</li>
        @endforelse
    </ul>
@endsection
