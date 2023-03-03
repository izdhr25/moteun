<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MoTeun | Login</title>

    <!-- Assets Bootstrap 5 -->
    <link rel="stylesheet" type="text/css" href="assets/bootstrap5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    
    <link rel='icon' href='/assets/img/moteunicon.png'>

    <!-- Assets Font Awesome -->
    <link rel="stylesheet" type="text/css" href="assets/fontawesome/css/all.min.css">
    

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&family=Roboto+Mono&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Chivo:wght@300;400;700;900&amp;display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <style type="text/css">
        body{
            font-family: 'Chivo';
        }

        hr{
            background: black; 
            height: 4px; 
            width: 100px; 
            border-radius: 10%;
            margin-top: 1rem;
            margin-bottom: 2rem; 
        }

        .dropdown:hover > .dropdown-menu {
            display: block;
        }
    </style>
</head>
<body>
    <header id="header" class="fixed-top" style="background:linear-gradient(to right, #4f9a76, #d9ecc7);">
        <nav class="navbar navbar-expand-md shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="assets/img/moteun3.png" class="img-fluid" width="30%">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto mt-2">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item mx-2">
                                    <a class="nav-link text-white" href="/">Home</a>
                                </li>
                                <li class="nav-item mx-2">
                                    <a class="nav-link text-white" href="/tentang">Tentang</a>
                                </li>
                                <li class="nav-item mx-2">
                                    <a class="nav-link text-white" href="/layanan">Layanan</a>
                                </li>
                                 <li class="nav-item mx-2">
                                    <a class="nav-link text-white" href="/tanis">Tani</a>
                                </li>
                                <li class="nav-item mx-2">
                                    <a class="nav-link text-white" href="/ternaks">Ternak</a>
                                </li>
                                <li class="nav-item mx-2">
                                    <a class="nav-link text-white" href="/artikels">Artikel</a>
                                </li>
                                <li class="nav-item mx-2">
                                    <a class="nav-link text-white" href="/forum">Forum</a>
                                </li>

                                @if (Route::has('login'))
                                    <li class="nav-item mx-2">
                                        <a class="nav-link text-white" href="/login">{{ __('Login') }}</a>
                                    </li>
                                @endif

                               
                                    <li class="nav-item mx-2">
                                        <a class="nav-link btn text-white" href="/register" style="background: #4f9a76">{{ __('Register') }}</a>
                                    </li>
                               

                                
                            @else
                                <li class="nav-item mx-2">
                                    <a class="nav-link text-white" href="/">Home</a>
                                </li>
                                <li class="nav-item mx-2">
                                    <a class="nav-link text-white" href="/tentang">Tentang</a>
                                </li>
                                <li class="nav-item mx-2">
                                    <a class="nav-link text-white" href="/layanan">Layanan</a>
                                </li>
                                 <li class="nav-item mx-2">
                                    <a class="nav-link text-white" href="/tanis">Tani</a>
                                </li>
                                <li class="nav-item mx-2">
                                    <a class="nav-link text-white" href="/ternaks">Ternak</a>
                                </li>
                                <li class="nav-item mx-2">
                                    <a class="nav-link text-white" href="/artikels">Artikel</a>
                                </li>
                                <li class="nav-item mx-2">
                                    <a class="nav-link text-white" href="/forum">Forum</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>

                            @endguest
                            <!-- <li class="nav-item dropdown mx-2">
                                <a href="#" class="nav-link dropdown-toggle text-white fw-bold" role="button"><img src="assets/img/indonesia.png" class="img-fluid"> ID</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item fw-bold" href="lang/id"><img src="assets/img/indonesia.png" class="img-fluid"> ID</a></li>
                                    <li><a class="dropdown-item fw-bold" href="lang/en"><img src="assets/img/amerika.png" class="img-fluid"> EN</a></li>
                                </ul>
                            </li> -->
                        </ul>
                    </div>
                </div>
        </nav>
    </header>
    <br><br><br><br><br>
    <div class="container py-5 my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <center><img src="assets/img/moteun1.png" class="img-fluid mt-4 my-5" alt="Lambang" width="40%"></center>
                        @if($message = Session::get('message'))
                            <div class="alert alert-success">
                                <strong>Berhasil</strong>
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <form method="POST">
                            @csrf

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    
                                        <a class="btn btn-link" href="/register">
                                            {{ __('Belum punya akun?') }}
                                        </a>
                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
