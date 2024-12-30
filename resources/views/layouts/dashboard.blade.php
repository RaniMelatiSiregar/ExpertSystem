<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  {{-- <title>{{ $title }}</title> --}}

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('js/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  
  <style>
    .content-wrapper {
        margin-left: 0 !important;
    }
    .main-header {
        margin-left: 0 !important;
    }
    .main-footer {
        margin-left: 0 !important;
    }
  </style>
</head>
<body class="hold-transition">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-primary w-100">
        <div class="container-fluid">
          <a class="navbar-brand text-white" href="{{route('dashboard')}}">
            <i class="fas fa-home"></i> Dashboard
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav">
              
              <li class="nav-item">
                <a class="nav-link text-white" href="{{route('settingpenyakit.index')}}">
                  <i class="fas fa-stethoscope"></i> Setting Penyakit & Solusi
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link text-white" href="{{route('settinggejala.index')}}">
                  <i class="fas fa-list"></i> Setting Gejala
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link text-white" href="{{route('aturan.index')}}">
                  <i class="fas fa-cogs"></i> Setting Aturan
                </a>
              </li>

              <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="nav-link text-white bg-transparent border-0">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </li>

            </ul>
          </div>
        </div>
      </nav>
      
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            {{-- <h1 class="m-0 text-dark">{{ $title }}</h1> --}}
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      @yield('content')
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer bg-primary text-white text-center">
    Sistem Pakar Mendiagnosa Kecanduan Game Online
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('js/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('js/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.min.js') }}"></script>

</body>
</html>