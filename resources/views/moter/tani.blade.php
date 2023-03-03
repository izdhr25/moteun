@extends('layouts.app')

@section('title', 'MoTeun | Tani')

@section('content')

	<div class="container my-5">
	<br><br><br><br><br>

		<h3 class="text-center" data-aos="fade-up">MoTeun</h3>
		<p class="text-center mb-5" data-aos="fade-down">Memudahkanmu untuk monitoring tanaman pertanian.</p>

		<div class="row">
			<div class="col-lg-6">
				<h5 class="my-3" data-aos="fade-left">Manfaat untuk Petani</h5>

	            <ul class="navbar-nav mt-4" data-aos="fade-right">
	              <li><i class="ri-checkbox-circle-fill"></i> Memudahkanmu mendata tanaman pertanian.</li>
	              <li><i class="ri-checkbox-circle-fill"></i> Mengecek kesehatan dari tanamanmu secara rutin.</li>
	              <li><i class="ri-checkbox-circle-fill"></i> Memberi tanda bahwa tanaman pertanianmu sudah siap dikembangbiakan.</li>
	              <li><i class="ri-checkbox-circle-fill"></i> Mengedukasi petani pemula agar bisa bertani mulai dari nol.</li>
	              <li><i class="ri-checkbox-circle-fill"></i> Membantu perekonomian para petani agar tidak gagal panen.</li>
	              <li><i class="ri-checkbox-circle-fill"></i> Meningkatkan kualitas tanaman tanimu dengan monitoring secara rutin.</li>
	              <li><i class="ri-checkbox-circle-fill"></i> Saling bertukar pengalaman dengan para petani lain.</li>	              
	            </ul>
			</div>

			<div class="col-lg-6">
				<img src="assets/img/tani.png" class="img-fluid" width="90%" data-aos="fade-down">
			</div>
		</div>
	</div>

	<div class="container my-5 py-5 px-5" style="background:linear-gradient(to right, #4f9a76, #d9ecc7);" data-aos="fade-up">

		<h3 class="text-center text-white" data-aos="fade-down">Tani</h3>
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
@endsection