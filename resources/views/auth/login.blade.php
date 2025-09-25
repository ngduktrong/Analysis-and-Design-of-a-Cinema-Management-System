@extends('layouts.app')
@section('content')
    <h2>Dang nhap</h2>
    @if(session('error'))
        <div style="color: red">
            {{ session('error') }}
        </div>
    @endif
    @if(session('success'))
        <div style="color:red">
            {{ session('success') }}
        </div>
        @endif
    <form method="POST" action="{{route('auth.login')}}">
        @csrf
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
            <label for="mat_khau">Mật khẩu</label>
            <input type="password" name="mat_khau" id="mat_khau" required>
            @error('mat_khau')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Dang nhap</button>
    </form>
    <p>
        Chua co tai khoan? <a href="{{ route('auth.register') }}">Dang ky</a>
    </p>
@endsection