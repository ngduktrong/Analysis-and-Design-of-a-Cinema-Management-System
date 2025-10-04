<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký Tài Khoản</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .register-container {
            max-width: 500px;
            margin: 50px auto;
            padding: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="register-container">
            <h2 class="text-center mb-4">Đăng Ký Tài Khoản</h2>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-3">
                    <label for="HoTen" class="form-label">Họ và Tên</label>
                    <input type="text" class="form-control @error('HoTen') is-invalid @enderror" 
                           id="HoTen" name="HoTen" value="{{ old('HoTen') }}" required>
                    @error('HoTen')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="SoDienThoai" class="form-label">Số Điện Thoại</label>
                    <input type="text" class="form-control @error('SoDienThoai') is-invalid @enderror" 
                           id="SoDienThoai" name="SoDienThoai" value="{{ old('SoDienThoai') }}" required>
                    @error('SoDienThoai')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="Email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('Email') is-invalid @enderror" 
                           id="Email" name="Email" value="{{ old('Email') }}" required>
                    @error('Email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="TenDangNhap" class="form-label">Tên Đăng Nhập</label>
                    <input type="text" class="form-control @error('TenDangNhap') is-invalid @enderror" 
                           id="TenDangNhap" name="TenDangNhap" value="{{ old('TenDangNhap') }}" required>
                    @error('TenDangNhap')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="MatKhau" class="form-label">Mật Khẩu</label>
                    <input type="password" class="form-control @error('MatKhau') is-invalid @enderror" 
                           id="MatKhau" name="MatKhau" required>
                    @error('MatKhau')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="MatKhau_confirmation" class="form-label">Xác Nhận Mật Khẩu</label>
                    <input type="password" class="form-control" 
                           id="MatKhau_confirmation" name="MatKhau_confirmation" required>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Đăng Ký</button>
                </div>

                <div class="text-center mt-3">
                    <a href="{{ route('login') }}">Đã có tài khoản? Đăng nhập ngay</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>