<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <link rel='icon' href='/assets/img/moteunicon.png'>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/lte/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/lte/dist/css/adminlte.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="/assets/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="/assets/bootstrap5/css/bootstrap.min.css">

    <script src="//cdn.ckeditor.com/4.16.1/full/ckeditor.js"></script>

    <script>
      CKEDITOR.replace('content');
    </script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
  
    </ul>

    <!-- Right navbar links -->
    
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link mt-2 text-center">
      <img src="/assets/img/moteun1.png" alt="MoTeun Logo" class="img-fluid rounded-pill" style="opacity: .8;" width="60%">
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/assets/img/userprofile/{{ Auth::user()->image }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info my-auto">
          <a href="{{ route('akunadmin.index') }}" class="d-block nav-link">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
              <a href="/user" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard    
                </p>
              </a>
          </li>

          <li class="nav-item">
              <a href="/" target="_blank" class="nav-link">
              <i class="nav-icon fas fa-link"></i>
                <p>
                  Lihat Website   
                </p>
              </a>
          </li>
          <li class="nav-item menu-open">
            <a href="/user" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Data MoTeun
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/alltani" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Tani</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/allternak" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Ternak</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/allobat" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Obat</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/allkondisi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Kondisi</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/allartikel" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Artikel</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/allalert" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Pemberitahuan</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/allgrow" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Progress Hewan</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/allmetode" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Progress Tanaman</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/jenisternak" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jenis Ternak</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/jenistani" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jenis Tani</p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item">
            <a href="/about" class="nav-link">
              <i class="nav-icon fa-solid fa-earth-asia"></i>
              <p>
                Tentang Website
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/kontak" class="nav-link">
              <i class="nav-icon fa-solid fa-map-pin"></i>
              <p>
                Kontak dan Alamat
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/akunadmin" class="nav-link">
              <i class="nav-icon fa-solid fa-id-badge"></i>
              <p>
                Akun Admin
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/registeradmin" class="nav-link">
              <i class="nav-icon fa-solid fa-user"></i>
              <p>
                Daftar Admin
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/akunuser" class="nav-link">
              <i class="nav-icon fa-solid fa-users"></i>
              <p>
                Akun User & Admin
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/logout" class="nav-link">
              <i class="nav-icon fas fa-arrow-left"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
   <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@yield('title')</h1>
          </div>
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col-md-6 -->
          <div class="col-lg-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">@yield('title')</h5>
              </div>
              <div class="card-body">
                @yield('content')

                <strong>Copyright &copy; {{ date('Y') }} Izdihar Fazrianti.</strong> All rights reserved.
              </div>
            </div>
          </div>
          <!-- /.col-md-12 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<script type="text/javascript" src="/assets/bootstrap5/js/bootstrap.bundle.min.js"></script>
<!-- jQuery -->
<script src="/lte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/lte/dist/js/adminlte.min.js"></script>
<script type="text/javascript" src="/assets/fontawesome/js/all.min.js"></script>
</body>
</html>
