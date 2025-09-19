<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>Quản lý rạp chiếu phim</h1>
        <nav>
            <a href="{{route('phim.index')}}">Quản lý rạp chiếu phim</a>
            <a href="{{route('phim.create')}}">edit</a>
        </nav>
    </header>
     <main>
        {{-- Nội dung riêng của từng view sẽ hiển thị ở đây --}}
        @yield('content')
    </main>

    <footer>
        <p>© 2025 Rạp phim Laravel</p>
    </footer>


</body>
</html>