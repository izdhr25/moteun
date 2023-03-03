<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MoTeun | Register</title>

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
  <br><br><br><br><br><br><br>
  <div class="container">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            
            <center><img src="assets/img/moteun1.png" class="img-fluid" alt="Lambang" width="40%"></center>

            <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
            <div class="row justify-content-center">
              <div class="col-md-6 col-lg-6 col-xl-5 order-2 order-lg-1">
                
                

                <form class="mx-1 mx-md-4" method="POST" enctype="multipart/form-data" action="/register">
                @csrf

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw mt-5"></i>
                    <div class="form-outline flex-fill mb-0">
                      
                      <label class="form-label" for="name">Nama</label>
                      <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                   
                    </div>
                  </div>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fa-solid fa-image fa-lg me-3 fa-fw mt-5"></i>
                    <div class="form-outline flex-fill mb-0">
                      
                      <label class="form-label" for="gambar">Gambar</label>
                      <input type="file" class="form-control" name="image" placeholder="Gambar">
                      <input type="hidden" name="default" value="profile2.jpg">

                  @error('image')
                      <small style="color: red">{{ $message }}</small>
                  @enderror
                   
                    </div>
                  </div>

                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fa-solid fa-venus-mars a-lg me-3 fa-fw mt-5"></i>
                    <div class="form-outline flex-fill mb-0">
                      
                      <label class="form-label" for="jk">Jenis Kelamin</label>
                      <select id="jk" class="form-control @error('jk') is-invalid @enderror" name="jk" value="{{ old('jk') }}" required autocomplete="jk" autofocus>
                        <option value="Perempuan">Perempuan</option>
                        <option value="Laki - laki">Laki - laki</option>
                      </select>
                    </div>
                  </div>

                    @error('jk')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw mt-5"></i>
                    <div class="form-outline flex-fill mb-0">
                        
                        <label class="form-label" for="email">Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    </div>
                  </div>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                  
              </div>
              <div class="col-md-6 col-lg-6 col-xl-5 order-2 order-lg-1">
                <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fa-solid fa-phone fa-lg me-3 fa-fw mt-5"></i>
                      <div class="form-outline flex-fill mb-0">
                        
                        <label class="form-label" for="telepon">Telepon</label>
                        <input id="telepon" type="number" class="form-control @error('telepon') is-invalid @enderror" name="no_telp" value="{{ old('telepon') }}" required autocomplete="telepon" autofocus>
                      </div>
                    </div>

                      @error('telepon')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fa-solid fa-location-dot fa-lg me-3 fa-fw mt-5"></i>
                      <div class="form-outline flex-fill mb-0">
                          
                          <label class="form-label" for="alamat">Alamat</label>
                          <textarea id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" required></textarea>
                        
                      </div>
                    </div>

                      @error('alamat')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw mt-5"></i>
                      <div class="form-outline flex-fill mb-0">
                          
                          <label class="form-label" for="password">{{ __('Password') }}</label>
                          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                      
                      </div>
                    </div>

                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-key fa-lg me-3 fa-fw mt-5"></i>
                      <div class="form-outline flex-fill mb-0">
                          
                          <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                          <input id="role_id" type="hidden" class="form-control" name="role_id" required autocomplete="role_id" value="2">
                      </div>
                    </div>
                </div>
              </div>
                <div class="form-check d-flex justify-content-center mb-5">
                  <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" required/>
                  <label class="form-check-label" for="form2Example3">
                    Saya menyetujui semua syarat dan ketentuan di <a href="/terms">Terms of service</a>
                  </label>
                </div>

                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                  <button type="submit" class="btn btn-primary btn-lg">Register</button>
                </div>
              </form>
         
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br><br><br>

</div>
</body>
</html>
