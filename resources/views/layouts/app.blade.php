<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <!-- Isi title yang kita kirimkan dari views lain -->
    <title>@yield('title')</title>

    <!-- Memanggil Bootstrap/Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>

    <div class="container">

        @if(session('success'))

            <div class="alert alert-success">
                {{ session('success') }}
            </div>

        @endif

        <!-- Isi konten yang kita kirimkan dari views lain -->
        @yield('content')

    </div>


    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
