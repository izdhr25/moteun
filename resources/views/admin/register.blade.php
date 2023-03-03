@extends('layouts.admin')

@section('title', 'Register Admin')

@section('content')
<div class="container">
  <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            
            <center><img src="assets/img/moteun1.png" class="img-fluid" alt="Lambang" width="40%"></center>

            <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
            @if($message = Session::get('message'))
                <div class="alert alert-success">
                    <strong>Berhasil</strong>
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="row justify-content-center">
              <div class="col-md-6 col-lg-6 col-xl-5 order-2 order-lg-1">
                
                

                <form class="mx-1 mx-md-4" method="POST" enctype="multipart/form-data" action="/registeradmin">
                @csrf

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw mt-4"></i>
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
                    <i class="fa-solid fa-image fa-lg me-3 fa-fw mt-4"></i>
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
                    <i class="fa-solid fa-venus-mars a-lg me-3 fa-fw mt-4"></i>
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
                    <i class="fas fa-envelope fa-lg me-3 fa-fw mt-4"></i>
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
                      <i class="fa-solid fa-phone fa-lg me-3 fa-fw mt-4"></i>
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
                      <i class="fa-solid fa-location-dot fa-lg me-3 fa-fw mt-4"></i>
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
                      <i class="fas fa-lock fa-lg me-3 fa-fw mt-4"></i>
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
                      <i class="fas fa-key fa-lg me-3 fa-fw mt-4"></i>
                      <div class="form-outline flex-fill mb-0">
                          
                          <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                          <input id="role_id" type="hidden" class="form-control" name="role_id" required autocomplete="role_id" value="1">
                      </div>
                    </div>
                </div>
            </div>


                <div class="row">
                  <div class="col-lg-12 form-check d-flex justify-content-center mb-5">  
                    <label class="form-check-label" for="form2Example3">
                      <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" required/>
                      Saya menyetujui semua syarat dan ketentuan di <a href="/terms">Terms of service</a>
                    </label>
                  </div>

                  <div class="col-lg-12 d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-primary btn-lg">Register</button>
                  </div>
                </div>
              </form>

          </div>
        </div>
      </div>
  </div>
</div>
@endsection