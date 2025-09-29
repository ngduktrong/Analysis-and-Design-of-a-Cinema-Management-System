@extends('layouts.app')

@section('content')
    <style>
        body {
            background-image: url('/img/home-wallpaper.jpg');
            position: relative;
            background-size: cover;
            background-position: center;
            background-repeat: repeat;
            height: min(800px);
            height: auto;


        }

        body::after {
            position: absolute;
            content: '';
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            z-index: 0;
            pointer-events: none;
            height: auto;
            height: min(1100px);

        }

        body>* {
            position: relative;
            z-index: 1;
        }

        .content-home {
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        .showing-film-list {
            list-style: none;
            max-width: 1200px;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            /* 3 phim mỗi hàng */
            gap: 20px;
            padding: 0;
            justify-items: start;
            /* căn trái các item */
        }

        .showing-film-item {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 10px;
            text-align: center;
            background-color: rgba(255, 255, 255, 0.8);
        }


        .showing-film {
            display: flex;
            flex-direction: column;
            align-items: center;

        }

        .film-poster {
            width: 100%;
            height: auto;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .show-film-status {
            color: aliceblue;
            margin-bottom: 60px;
        }
        .nav-item{
            padding: 0 10px;
        }
        .film-infor-detail{
            text-align: left;
            padding-left: 30px;

        }
        .film-infor-bookBtn{
            display: flex;
            justify-content: space-around;
            align-content: center;
        }
        .love-icon{
            display: flex;
            align-items: center;
            color: rgb(160, 160, 160);
            cursor: pointer;
            transition: color 0.3s ease;
            font-size: 26px;
            border-radius: 60px;


        }
        .love-icon:hover{
                color: rgb(68, 67, 67);;
            }
        .love-icon.active{
            color: red;
        }
        .btnbookTk{
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
            border-radius: 40px;
            padding: 10px 20px;

        }

    </style>
    <script>
        document.addEventListener('DOMContentLoaded',function(){
            document.querySelectorAll('.love-icon').forEach(function(icon){
                icon.addEventListener('click',function(){
                    this.classList.toggle('active');
                });
            });
        });

    </script>
    {{-- thanh điều hướng --}}
    <div class="home-controll">

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Cinema System</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">
                            <i class="fa-solid fa-house"></i>
                            Home
                        </a></li>

                        @guest
                            {{-- Khi chưa đăng nhập --}}
                            <li class="nav-item"><a class="nav-link" href="{{ route('auth.login') }}">Đăng Nhập</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('auth.register') }}">Đăng ký</a></li>
                        @else
                            {{-- Khi đã đăng nhập --}}
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-user"></i>
                                    {{ Auth::user()->TenDangNhap }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                    <li><a class="dropdown-item" href="#">Thông tin cá nhân</a></li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item">Đăng xuất</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest

                        <li class="nav-item"><a class="nav-link" href="#">Introduce Author</a></li>
                    </ul>
                </div>
            </div>
        </nav>


    </div>
    {{-- nội dung hiện thị chính --}}
    <div class="content-home">
        <div class="showing-film">


            <h2 class="show-film-status">Phim đang chiếu</h2>
            <ul class="showing-film-list">
                @forelse($phimDangChieu as $phim)
                    <li class="showing-film-item ">

                        <a href="{{ route('home.show', $phim->MaPhim) }}">
                            <img src="/img/{{ $phim->DuongDanPoster }}" alt="" class="film-poster"
                                style="height:250px">
                            <div class="file-infor">
                                <div class="film-infor-detail ">
                                    Tên Phim: {{ $phim->TenPhim }} <br>
                                    Khởi chiếu: {{ $phim->NgayKhoiChieu }} <br>
                                    Thời Lượng: {{ $phim->ThoiLuong }} <br>
                                    Quốc gia: {{ $phim->NuocSanXuat }}
                                </div>

                            </div>
                        </a>
                           <form action="{{route('suatchieu.phong',[$phim->MaPhim])}}" method="GET">
                                <div class="film-infor-bookBtn ">
                                    <i class="fa-solid fa-heart love-icon   "></i>
                                    <button class="btnbookTk btn-shadow " >Đặt Vé</button>
                                </div>
                                </form>

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
