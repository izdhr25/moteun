@extends('layouts.app')

@section('title', 'MoTeun | Ternak')

@section('content')

	<div class="container my-5">
			<br><br><br><br><br>

			<h3 class="text-center" data-aos="fade-up">MoTeun</h3>
			<p class="text-center mb-5" data-aos="fade-down">Memudahkanmu untuk monitoring hewan ternak.</p>

			<div class="row">
				<div class="col-lg-6">
					<h5 class="my-3" data-aos="fade-left">Manfaat untuk Peternak</h5>
					<ul class="navbar-nav mt-4" data-aos="fade-right">
		              <li><i class="ri-checkbox-circle-fill"></i> Memudahkanmu mendata hewan ternak.</li>
		              <li><i class="ri-checkbox-circle-fill"></i> Mengecek kesehatan dari hewan ternakmu secara rutin.</li>
		              <li><i class="ri-checkbox-circle-fill"></i> Memberi tanda bahwa hewan ternakmu sudah siap dikembangbiakan.</li>
		              <li><i class="ri-checkbox-circle-fill"></i> Mengedukasi peternak pemula agar bisa beternak mulai dari nol.</li>
		              <li><i class="ri-checkbox-circle-fill"></i> Membantu perekonomian para peternak agar tidak gagal ternak dengan monitoring secara rutin.</li>
		              <li><i class="ri-checkbox-circle-fill"></i> Meningkatkan kualitas hewan ternak.</li>
		              <li><i class="ri-checkbox-circle-fill"></i> Saling bertukar pengalaman dengan para peternak lain.</li>	              
		            </ul>
		            
				</div>

				<div class="col-lg-6">
					<img src="assets/img/ternak.png" class="img-fluid" width="90%" data-aos="fade-down">
				</div>
			</div>
	</div>

	<div class="container my-5">
			<h3 class="text-center" data-aos="fade-down">Ternak</h3>
			<center>
				<hr>
			</center>		

			<div class="row">
				<div class="col-lg-6">
					<img src="assets/img/home6.png" class="img-fluid" data-aos="fade-down">
				</div>

				<div class="col-lg-6" data-aos="fade-up">
					<div class="row">
					<div class="col-lg-6 mb-4">
						<div class="card">
							<div class="card-header" style="background:linear-gradient(to right, #4f9a76, #d9ecc7);">
							</div>
							<div class="card-body">
								<h4 class="text-center">{{ $jumlahternak }}</h4>
								<a href="tani.php" class="nav-link text-center mt-2">Jumlah Hewan</a>
							</div>
						</div>
					</div>

					<div class="col-lg-6 mb-4" data-aos="fade-down">
						<div class="card">
							<div class="card-header" style="background:linear-gradient(to right, #4f9a76, #d9ecc7);">
							</div>
							<div class="card-body">
								<h4 class="text-center">{{ $jumlahkondisiternak }}</h4>
								<a href="tani.php" class="nav-link text-center mt-2">Kondisi</a>
							</div>
						</div>
					</div>

					<div class="col-lg-6 mb-4" data-aos="fade-up">
						<div class="card">
							<div class="card-header" style="background:linear-gradient(to right, #4f9a76, #d9ecc7);">
							</div>
							<div class="card-body">
								<h4 class="text-center">{{ $jumlahalertternak }}</h4>
								<a href="tani.php" class="nav-link text-center mt-2">Pemberitahuan</a>
							</div>
						</div>
					</div>

					<div class="col-lg-6 mb-4" data-aos="fade-down">
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