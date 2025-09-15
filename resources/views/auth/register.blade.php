@extends('layouts.app')
@section('content')
    <h2>Dang ky</h2>
    @if(session('error'))
        <div style='color: red;'>{{session('error')}}</div>
    @endif
    @if(session('success'))
        <div style='color: green;'>{{session('success')}}</div>
    @endif
    <form method="POST" action="{{route('auth.register')}}">
        @csrf
            <div>
                <label for="ho_ten">Ho Ten:</label>
                <input type="text" name="ho_ten" id="ho_ten" value="{{ old('ho_ten') }}" required>
                @error('ho_ten')
                    <div style="color: red">{{ $message }}</div>
                @enderror

            </div>
            <div>
            <label for="ten_dang_nhap">
                Ten Dang Nhap:
            </label>
            <input type="text" name="ten_dang_nhap" id="ten_dang_nhap" value="{{ old('ten_dang_nhap') }}" required>
                @error('ten_dang_nhap')
                    <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <div>
            <label for="mat_khau">Mat Khau: </label>
            <input type="password" name="mat_khau" id="mat_khau" required>
                @error('mat_khau')
                    <div style="color: red">{{ $message }}</div>
                @enderror
            </div> 
            <div>
                <label for="email">Nhap Email: </label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required>
                @error('email')
                    <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="so_dien_thoai">Nhap So Dien Thoai: </label>
                <input type="text" name="so_dien_thoai" id="so_dien_thoai" value="{{ old('so_dien_thoai') }}" required>
                @error('so_dien_thoai')
                    <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit">Dang ky</button>
    </form>