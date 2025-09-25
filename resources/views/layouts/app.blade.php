<!DOCTYPE html>
<html lang="en">
<<<<<<< HEAD

=======
>>>>>>> eb364c753f15b54bb4b3de0a9b39f40c4aea7a3e
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<<<<<<< HEAD
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>WELCOME</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    
=======
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
>>>>>>> eb364c753f15b54bb4b3de0a9b39f40c4aea7a3e
     <main>
        {{-- Nội dung riêng của từng view sẽ hiển thị ở đây --}}
        @yield('content')
    </main>

<<<<<<< HEAD
    <footer class=" text-light text-center py-3 mt-auto">
=======
    <footer>
>>>>>>> eb364c753f15b54bb4b3de0a9b39f40c4aea7a3e
        <p>© 2025 Rạp phim Laravel</p>
    </footer>


</body>
</html>