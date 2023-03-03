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
    
    <!-- Assets Bootstrap 5 -->
    <link rel="stylesheet" type="text/css" href="assets/bootstrap5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    

    <!-- Assets Font Awesome -->
    <link rel="stylesheet" type="text/css" href="assets/fontawesome/css/all.min.css">
    

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&family=Roboto+Mono&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Chivo:wght@300;400;700;900&amp;display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/assets/vendor/aos/aos.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

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
	                            <li class="nav-item mx-2">
                                    @if(Auth::user()->role_id === 2)                                            
                                        <a class="nav-link text-white" href="/user">{{ __('Dashboard') }}</a>
                                    @endif
                                </li>
	                            <li class="nav-item dropdown">
	                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
	                                    {{ Auth::user()->name }}
	                                </a>

	                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
	                                    <a class="dropdown-item" href="/logout"
	                                       onclick="event.preventDefault();
	                                                     document.getElementById('logout-form').submit();">
	                                        {{ __('Logout') }}
	                                    </a>

	                                    <form id="logout-form" action="/logout" method="POST" class="d-none">
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

@yield('content')



	<div class="container-fluid" style="background: #4f9a76">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 my-3">
                    <img src="assets/img/moteun3.png" class="img-fluid" width="40%">

                        <a href="/tentang" class="nav-link text-white">Tentang</a>

                        <a href="/layanan" class="nav-link text-white">Layanan</a>

                        <a href="/tani" class="nav-link text-white">Tani</a>
                        
                        <a href="/ternak" class="nav-link text-white">Ternak</a>
                        
                        <a href="/obat" class="nav-link text-white">Obat</a>
                        
                        <a href="/diskusi" class="nav-link text-white">Forum</a>
                    
                        <a href="/daftar" class="nav-link text-white">Daftar</a>

                        <a href="/login" class="nav-link text-white">Login</a>
                </div>

                <div class="col-lg-3 my-3">
                    <p class="my-3 text-white"><b>KONTAK</b></p>
                    	@foreach($kontaks as $kontak)
                        <a href="{{ $kontak->instagram }}" class="nav-link fw-bold text-white"><i class="fa-brands fa-instagram fa-2x"></i></a>
                        
                        <a href="{{ $kontak->whatsapp }}" class="nav-link fw-bold text-white"><i class="fa-brands fa-whatsapp fa-2x"></i>

						<a href="{{ $kontak->linkedin }}" class="nav-link fw-bold text-white"><i class="fa-brands fa-linkedin fa-2x"></i></a>
                        @endforeach
                </div>

                
                <div class="col-lg-3 my-3">
                    <p class="my-3 text-white"><b>ALAMAT</b></p>
                    @foreach($kontaks as $kontak)
                    <a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.295886607473!2d106.98985671413901!3d-6.3557315639456915!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698c22161d4051%3A0x7a0a35b288779341!2sSMKN%202%20Kota%20Bekasi!5e0!3m2!1sid!2sid!4v1674393136324!5m2!1sid!2sid" class="mt-3 text-white nav-link">{!! $kontak->alamat !!}</a>
                    @endforeach
                </div>

                <div class="col-lg-3 my-3">
                    <div class="card bg-success my-3">
                        <div class="card-body p-sm-4">
                          <h5 class="text-white">MoTeun</h5>
                          @foreach($kontaks as $kontak)
                          <p class="mb-0 text-white">Hubungi kami <span class="text-white fs--1 fs-sm-1">{{ $kontak->email }}</span></p>
                          <br>
                          <a class="btn btn-light text-success" type="button" href="/login">
                            <svg class="bi bi-person me-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#76C279" viewBox="0 0 16 16">
                              <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"></path>
                            </svg>Login
                          </a>
                          @endforeach
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <div class="container-fluid py-1" style="background:linear-gradient(to right, #4f9a76, #d9ecc7);">
    <p class="text-white text-center mt-3"><b>Copyright &copy; {{ date('Y') }} Izdihar Fazrianti.</strong> All rights reserved.</b></p>
	</div>  
	<script>
        (function() { 
        var d = document, s = d.createElement('script');
        s.src = 'https://moteun.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
        })();
    </script>
    <script>   
        AOS.init(); 
    </script>
    <script>
    AOS.init({
        // Global settings:
        disable: false,
        startEvent: 'DOMContentLoaded',
        initClassName: 'aos-init', 
        animatedClassName: 'aos-animate', 
        useClassNames: false, 
        disableMutationObserver: false, 
        debounceDelay: 50, 
        throttleDelay: 99, 
        

        // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
        offset: 120, 
        delay: 0, 
        duration: 1000, 
        easing: 'ease', 
        once: false, 
        mirror: false, 
        anchorPlacement: 'top-bottom',

    });
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js" integrity="sha512-A7AYk1fGKX6S2SsHywmPkrnzTZHrgiVT7GcQkLGDe2ev0aWb8zejytzS8wjo7PGEXKqJOrjQ4oORtnimIRZBtw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script id="dsq-count-scr" src="//moteun.disqus.com/count.js" async></script>
    <script type="text/javascript" src="/assets/fontawesome/js/all.min.js"></script>
    <script type="text/javascript" src="/bootstrap5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/bootstrap5/js/jquery.min.js"></script>
    <script type="text/javascript" src="/assets/vendor/aos/aos.js"></script>
    <script type="text/javascript" src="/bootstrap5/js/counter.js"></script>
</body>
</html>