<h2>Chọn phòng chiếu cho ngày: {{ request('ngay') }}</h2>

@if($phongs->isEmpty())
    <p>Không có phòng chiếu nào cho ngày này.</p>
@else
    <ul>
    @foreach($phongs as $phong)
        <li>
            <a href="{{ route('suatchieu.index', ['id' => $phim->MaPhim, 'maPhong' => $phong->MaPhong]) }}">
                {{ $phong->TenPhong }}
            </a>
        </li>
    @endforeach
    </ul>
@endif

<a href="{{ route('home.show', $phim->MaPhim) }}">← Quay lại chọn ngày</a>
