@extends('layouts.app')

@section('title', 'MoTeun | Home')

@section('content')
	<div class="container-fluid" style="background:linear-gradient(to right, #4f9a76, #d9ecc7);">
		<br><br><br><br><br><br>
		<div class="row text-white">
			<div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0">
				<div class="caption">
					<h1 class="mx-5" data-aos="fade-right">Monitoring Ternak dan Kebunmu</h1>
					<h2 class="mx-5" data-aos="fade-up">dengan MoTeun</h2>
				</div>
			</div>
			<div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0">
				<img class="img-fluid" src="assets/img/home4.png" width="90%">
			</div>
		</div>	
		<br><br><br>
	</div>

	<div class="container my-5">
		<h3 class="text-center" data-aos="fade-right">Tentang</h3>
		<center>
			<hr>
		</center>		

		<div class="row">
			<div class="col-lg-6" data-aos="fade-left">
				<img class="img-fluid" src="assets/img/home5.png">
			</div>

			<div class="col-lg-6" data-aos="fade-right">
				<div class="card">
					<div class="card-header" style="background:linear-gradient(to right, #4f9a76, #d9ecc7);">
					</div>
					<div class="card-body">
						@foreach($tentangs as $tentang)
						<p align="justify"><b>{{ $tentang->judul }}</b> adalah Aplikasi Monitoring Ternak dan Kebun berbasis Website yang bertujuan untuk membantu para peternak dan petani dalam memantau proses, kendala serta hasil dari aktivitas berternak dan bertani. MoTeun pun menyediakan layanan :
						</p>
						@endforeach
						
						<ul class="navbar-nav">
			              <li> {!! $tentang->poin !!}</li>
			              <li> {!! $tentang->poin2 !!}</li>
			              <li> {!! $tentang->poin3 !!}</li>
			              <li> {!! $tentang->poin4 !!}</li>
			              <li> {!! $tentang->poin5 !!}</li>
			            </ul>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="container-fluid" style="background:linear-gradient(to right, #4f9a76, #d9ecc7);" data-aos="fade-up">
		<br><br>
		<h3 class="text-white text-center" data-aos="fade-left">Layanan</h3>
		<center>
			<hr>
		</center>	

		<div class="container">	
			<div class="row fw-bold">
				<div class="col-lg-3 mb-3" data-aos="fade-down">
					<div class="card">
						<div class="card-body">
							<center><i class="fa-solid fa-clipboard-list fa-2xl mt-3"></i></center>
							<p href="/ternak" class="nav-link text-center mt-3">Mendata</p>
						</div>
					</div>
				</div>

				<div class="col-lg-3 mb-3" data-aos="fade-up">
					<div class="card">
						<div class="card-body">
							<center><i class="fa-solid fa-notes-medical fa-2xl mt-3"></i></center>
							<p href="/tani" class="nav-link text-center mt-3">Cek Kesehatan</p>
						</div>
					</div>
				</div>

				<div class="col-lg-3 mb-3" data-aos="fade-down">
					<div class="card">
						<div class="card-body">
							<center><i class="fa-solid fa-bell fa-2xl mt-3"></i></center>
							<p href="/diskusi" class="nav-link text-center mt-3">Peringatan</p>
						</div>
					</div>
				</div>

				<div class="col-lg-3 mb-3" data-aos="fade-up">
					<div class="card">
						<div class="card-body">
							<center><i class="fa-solid fa-comment-dots fa-2xl mt-3"></i></center>
							<p href="/diskusi" class="nav-link text-center mt-3">Forum</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<br><br><br>
	</div>

	<br><br>

	<div class="container my-5 py-5 px-5" style="background:linear-gradient(to right, #4f9a76, #d9ecc7);" data-aos="fade-up">
		<h3 class="text-center text-white" data-aos="fade-right">Tani</h3>
		<center>
			<hr>
		</center>	

		<div class="row">
			<div class="col-lg-3 mb-3" data-aos="fade-up">
				<div class="card">
					<div class="card-body">
						<h4 class="text-center">{{ $jumlahtani }}</h4>
						<a href="/tanis" class="nav-link text-center mt-2">Jumlah Tanaman</a>
					</div>
				</div>
			</div>

			<div class="col-lg-3 mb-3" data-aos="fade-down">
					<div class="card">
						<div class="card-body">
							<h4 class="text-center">{{ $jumlahkondisitani }}</h4>
							<a href="/ternaks" class="nav-link text-center mt-2">Kondisi</a>
						</div>
					</div>
				
			</div>
			<div class="col-lg-3 mb-3" data-aos="fade-up">
					<div class="card">
						<div class="card-body">
							<h4 class="text-center">{{ $jumlahalerttani }}</h4>
							<a href="#" class="nav-link text-center mt-2">Pemberitahuan</a>
						</div>
					</div>
				
			</div>
			<div class="col-lg-3 mb-3" data-aos="fade-down">
					<div class="card">
						<div class="card-body">
							<h4 class="text-center">{{ $jumlahmetode }}</h4>
							<a href="#" class="nav-link text-center mt-2">Perkembangan</a>
						</div>
					</div>
				
			</div>
		</div>
		
	</div>

	<br><br>

	<div class="container-fluid" style="background:linear-gradient(to right, #4f9a76, #d9ecc7);">
		<br>
		<div class="container my-5">
			<h3 class="text-center text-white" data-aos="fade-left">Artikel</h3>
			<center>
				<hr>
			</center>		

			<div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false" data-bs-interval="false">
			  	<div class="carousel-inner">
		            <div class="carousel-item active">
		                <div class="row">
		                	@foreach($artikels as $artikel)
		                    <div class="col-md-4 mb-3" data-aos="fade-up">
		                    	<div class="card-deck">
			                        <div class="card">
			                            <img class="img-fluid" alt="100%x280" src="assets/img/artikel/{{ $artikel->image }}">
			                            <div class="card-body">
			                                <h5 class="card-title my-3">{{ $artikel->judul }}</h5>
			                                <p>{!! Str::limit($artikel->deskripsi, 200, '...') !!}</p>

			                                <a href="{{ route('artikels.detail', ['id' => $artikel->id]) }}" class="btn nav-link text-white mt-4" style="background: #4f9a76;">Detail</a>
			                            </div>
			                        </div>
			                    </div>
		                    </div>
		                   	@endforeach

		                </div>
		            </div>
		        </div>
				<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
				    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				    <span class="visually-hidden">Previous</span>
				</button>
				<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
				    <span class="carousel-control-next-icon" aria-hidden="true"></span>
				    <span class="visually-hidden">Next</span>
				</button>
			</div>

		</div>
		<br>
	</div>

	<div class="container my-5">
		<h3 class="text-center" data-aos="fade-up">Ternak</h3>
		<center>
			<hr>
		</center>		

		<div class="row">
			<div class="col-lg-6">
				<img src="assets/img/home6.png" class="img-fluid" data-aos="fade-down">
			</div>

			<div class="col-lg-6">
				<div class="row">
					<div class="col-lg-6 mb-4" data-aos="fade-right">
						<div class="card">
							<div class="card-header" style="background:linear-gradient(to right, #4f9a76, #d9ecc7);">
							</div>
							<div class="card-body">
								<h4 class="text-center" data-aos="fade-up">{{ $jumlahternak }}</h4>
								<a href="tani.php" class="nav-link text-center mt-2">Jumlah Hewan</a>
							</div>
						</div>
					</div>

					<div class="col-lg-6 mb-4" data-aos="fade-left">
						<div class="card">
							<div class="card-header" style="background:linear-gradient(to right, #4f9a76, #d9ecc7);">
							</div>
							<div class="card-body">
								<h4 class="text-center">{{ $jumlahkondisiternak }}</h4>
								<a href="tani.php" class="nav-link text-center mt-2">Kondisi</a>
							</div>
						</div>
					</div>

					<div class="col-lg-6 mb-4" data-aos="fade-right">
						<div class="card">
							<div class="card-header" style="background:linear-gradient(to right, #4f9a76, #d9ecc7);">
							</div>
							<div class="card-body">
								<h4 class="text-center">{{ $jumlahalertternak }}</h4>
								<a href="tani.php" class="nav-link text-center mt-2">Pemberitahuan</a>
							</div>
						</div>
					</div>

					<div class="col-lg-6 mb-4" data-aos="fade-left">
						<div class="card">
							<div class="card-header" style="background:linear-gradient(to right, #4f9a76, #d9ecc7);">
							</div>
							<div class="card-body">
								<h4 class="text-center">{{ $jumlahgrow }}</h4>
								<a href="tani.php" class="nav-link text-center mt-2">Perkembangan</a>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
	
@endsection