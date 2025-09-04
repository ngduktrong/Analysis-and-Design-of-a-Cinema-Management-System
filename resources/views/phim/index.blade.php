<!DOCTYPE html>
<html>
<head>
    <title>Danh sách phim</title>
</head>
<body>
    <h1>Phim đang chiếu</h1>
    <ul>
        @foreach($movies as $movie)
            <li>
                <strong>{{ $movie->TenPhim }}</strong> 
                ({{ $movie->ThoiLuong }} phút, {{ $movie->NuocSanXuat }})
                
               <p>Ngày khởi chiếu là: {{$movie-> NgayKhoiChieu}}</p> 
            </li>
        @endforeach
    </ul>
</body>
</html>