@extends('layouts.app')

@section('content')
    <h2>Chọn phòng cho phim: {{ $phim->TenPhim }}</h2>

    @if($phongs->isEmpty())
        <p>Hiện chưa có phòng nào chiếu phim này.</p>
    @else
        <ul>
            @foreach($phongs as $phong)
                <li>
                    <a href="{{ route('suatchieu.index', ['id'=>$phim->MaPhim,'maPhong'=>$phong->MaPhong]) }}">
                        {{ $phong->TenPhong }}
                        {{$phong->LoaiPhong}}
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
