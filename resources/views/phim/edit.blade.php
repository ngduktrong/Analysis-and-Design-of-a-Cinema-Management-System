@extends('layouts.app')

@section('content')

<div>
    <h1>Them Phim Moi</h1>
    <form action=" {{route('phim.store')}}" methode="POST">
        @csrf
        
        <input type="text" name="TenPhim"  placeholder="Ten Phim" value="{{ old('TenPhim') }}">
        <input type="number" name="ThoiLuong" placeholder="Thời lượng">
        <input type="date" name="NgayKhoiChieu">
        <input type="text" name="NuocSanXuat" placeholder="Nước sản xuất">
        <input type="text" name="DinhDang" placeholder="Định dạng">
        <input type="text" name="DaoDien" placeholder="Đạo diễn">
    <textarea name="MoTa" placeholder="Mô tả"></textarea>
    <button type="submit">Lưu</button>
    </form>
</div>
@endsection