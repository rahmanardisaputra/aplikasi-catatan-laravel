<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Aplikasi Laravel')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">Les Laravel</a>
            <div class="navbar-nav">
                <a class="nav-link" href="/">Beranda</a>
                <a class="nav-link" href="/catatan">Catatan</a>
                <a class="nav-link" href="/kontak">Kontak</a>

                @auth
                    <a class="nav-link" href="/profile">Profil</a>
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="nav-link">
                            Logout
                        </button>
                    </form>
                @else
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                @endauth
            </div>
        </div>
    </nav>

    <div class="container my-4">
        @yield('content')
    </div>

    <footer class="bg-dark text-light text-center py-3 mt-5">
        <small>&copy; {{ date('Y') }} - Belajar Laravel 30 Hari</small>
    </footer>

    <!-- Modal Konfirmasi Hapus -->
    <div class="modal fade" id="hapusModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Yakin ingin menghapus <strong id="namaItem"></strong>?</p>
                    <p class="text-danger small">Aksi ini tidak bisa dibatalkan.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <form id="formHapus" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-success">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script>
        window.bukaModalHapus = function(url, nama) {
            document.getElementById('namaItem').textContent = nama || 'item ini';
            document.getElementById('formHapus').action = url;
            var modal = new bootstrap.Modal(document.getElementById('hapusModal'));
            modal.show();
        }
    </script>


</body>
</html>
