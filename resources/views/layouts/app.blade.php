<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pakar Forward Chaining</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Mengatur body dan html agar mengisi 100% tinggi layar */
        html, body {
            height: 100%;
            margin: 0;
        }

        /* Menambahkan Flexbox untuk memastikan footer tetap di bawah */
        .content-wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100%;
        }

        .main-content {
            flex-grow: 1; /* Agar konten mengisi ruang yang tersisa */
        }

        footer {
            background-color: #007bff; /* Ubah warna footer */
            padding: 1rem;
            text-align: center;
            position: relative;
            width: 100%;
        }

        .navbar-nav .nav-item .nav-link {
            color: white !important; /* Warna link navbar */
        }
    </style>
</head>
<body>
    <!-- Wrapper untuk mengelola konten dan footer -->
    <div class="content-wrapper">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-primary">
            <a class="navbar-brand text-white" href="{{ route('home') }}">Sistem Pakar Forward Chaining</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link text-white" href="{{ route('konsultasi.index') }}">Konsultasi</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="{{ route('informasi.index') }}">Informasi</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="{{ route('login.index') }}">Login Admin</a></li>
                </ul>
            </div>
        </nav>

        <!-- Content -->
        <div class="container my-5 main-content">
            @yield('content')
        </div>

        <!-- Footer -->
        <footer class="text-center text-white bg-primary py-3">
            <p class="mb-0">Sistem Pakar Mendiagnosa Kecanduan Game Online</p>
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</body>
</html>
