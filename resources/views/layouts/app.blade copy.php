<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Aplikasi Laravel')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">Les Laravel</a>
            <div class="navbar-nav">
                <a class="nav-link" href="/">Beranda</a>
                <a class="nav-link" href="/halo">Halo</a>
                <a class="nav-link" href="/catatan">Catatan</a>
                <a class="nav-link" href="/about">Tentang</a>
                <a class="nav-link" href="/kontak">Kontak</a>

                
            </div>
        </div>
    </nav>

    <div class="container my-4">
        @if(session('sukses'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('sukses') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @yield('content')
    </div>

    <footer class="bg-dark text-light text-center py-3 mt-5">
        <small>&copy; {{ date('Y') }} - Belajar Laravel 30 Hari</small>
    </footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
