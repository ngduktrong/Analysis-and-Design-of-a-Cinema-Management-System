@extends('layouts.app')

@section('content')
    <style>
        body {
            /* background-image: url('/img/riri-williams-3840x2160-22692.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat; */
            height: min(1100px)
            
        }
        .content-home{
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }
        .showing-film-list{
            list-style: none;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            padding: 0;
        }
        .showing-film-item{
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 10px;
            width: 400px;
            text-align: center;
            background-color: rgba(255, 255, 255, 0.8);
        }
        .film-poster{
            width: 100%;
            height: auto;
            border-radius: 5px;
            margin-bottom: 10px;
        }
    </style>
    <div class="content-home">
        <div class="showing-film">
          

            <h2>Phim đang chiếu</h2>
            <ul class="showing-film-list">
                @forelse($phimDangChieu as $phim)
                    <li class="showing-film-item">
                        
                        <a href="{{ route('home.show', $phim->MaPhim) }}">
                            <img src="/img/{{$phim->DuongDanPoster}}" alt="" class="film-poster">
                            {{ $phim->TenPhim }} (Khởi chiếu: {{ $phim->NgayKhoiChieu }})
                        </a>
                         
                    </li>
                    
                @empty
                    <li>Hiện tại chưa có phim nào đang chiếu.</li>
                @endforelse
            </ul>
        </div>
        <div class="upcoming-film">
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
        </div>
    </div>
@endsection
