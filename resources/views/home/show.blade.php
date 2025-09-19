@extends('layouts.app')

@section('content')
    <h1>{{ $phim->TenPhim }}</h1>
    <p><strong>Thời lượng:</strong> {{ $phim->ThoiLuong }} phút</p>
    <p><strong>Ngày khởi chiếu:</strong> {{ $phim->NgayKhoiChieu }}</p>
    <p><strong>Nước sản xuất:</strong> {{ $phim->NuocSanXuat }}</p>
    <p><strong>Định dạng:</strong> {{ $phim->DinhDang }}</p>
    <p><strong>Đạo diễn:</strong> {{ $phim->DaoDien }}</p>
    <p><strong>Mô tả:</strong> {{ $phim->MoTa }}</p>
    
    @forelse($phim->suatChieu as $suat)
        <p>
            Suat chieu luc : {{$suat->NgayGioChieu}}
            <a href="{{route('customer.ghe.index',['masuatchieu'=> $suat->MaSuatChieu])}}">Dat ve</a>
        </p>
   
    @empty
        <p><em>Phim chưa được chiếu</em></p>
    @endforelse
     <a href="{{ route('home') }}">← Quay lại danh sách phim</a>
@endsection
