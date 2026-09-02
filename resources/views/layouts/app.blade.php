<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <title>@yield('title')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>

    <div class="container">

        @if(session('success'))

            <div class="alert alert-success">
                {{ session('success') }}
            </div>

        @endif

        @yield('content')

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>