@extends('layouts.app')

@section('content')
    @include('layouts.nav')
    <style>
         body {
            background-image: url('/img/{{ $phim->DuongDanPoster }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }


        body::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.6);
            z-index: 0;
            pointer-events: none;
            height: auto;
            height: min(1100px);
        }

        .container>* {
            position: relative;
            z-index: 1;
        }
        .container {
            margin-top: 50px;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: relative;;
            top:40%;
            right:-15%;
            transform:translate(-50%,-50%);
            width: 600px;
            z-index: 2;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        .message-box {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 5px;
        }

        .message-box h3 {
            margin-top: 0;
        }

        .message-box ul {
            list-style-type: none;
            padding-left: 0;
        }

        .message-box li {
            margin-bottom: 10px;
        }

        .message-box a {
            display: inline-block;
            margin-top: 15px;
            text-decoration: none;
            color: #007bff;
        }

        .message-box a:hover {
            text-decoration: underline;
        }
        .acceptBtn, .backBtn {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px 5px 0 0;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            color: white;
            font-weight: bold;
            
        }
        .action-buttons{
            display: flex;
            justify-content: flex-end;
            margin-left:20px;
        }
    </style>
    <div class="container">
        <h2>Xác nhận phòng chiếu </h2>

        <div class="message-box">
            <h3> {{ $phim->TenPhim }} - {{ $phong->TenPhong }}</h3>
            @if (!$suatchieu->isEmpty())
                <ul>
                    @foreach ($suatchieu as $suat)
                        <li>
                            {{ $suat->NgayGioChieu }} 

                        </li>
                    @endforeach
                </ul>
            @else
                <p>Hiện chưa có suất chiếu nào cho phim này tại phòng này.</p>
            @endif
            <div class="action-buttons">
            
            <a class="backBtn" href="{{ route('suatchieu.phong', $phim->MaPhim) }}">Quay lại</a>
            <a class="acceptBtn" href="{{ route('customer.ghe.index', $suat->MaSuatChieu) }}">Tiếp tục</a>
</div>
        </div>
    </div>
@endsection
