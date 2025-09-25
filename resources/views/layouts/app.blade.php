<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>WELCOME</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    


     <main>
        {{-- Nội dung riêng của từng view sẽ hiển thị ở đây --}}
        @yield('content')
    </main>


    <footer class=" text-light text-center py-3 mt-auto">
        <p>© 2025 Rạp phim Laravel</p>
    </footer>


</body>
</html>