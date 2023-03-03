@extends('layouts.app')

@section('title', 'MoTeun | Layanan')

@section('content')
	<div class="container-fluid my-5">
		<br><br><br><br><br>
		<h3 class="text-center" data-aos="fade-up">Layanan</h3>
		<center>
			<hr>
		</center>	

		<div class="container mb-3">	
			<div class="row fw-bold">
				<div class="col-lg-3 mb-3" data-aos="fade-left">
					<div class="card">
						<div class="card-body">
							<center><i class="fa-solid fa-clipboard-list fa-2xl mt-3"></i></center>
							<p href="ternak.php" class="nav-link text-center mt-3">Mendata</p>
						</div>
					</div>
				</div>

				<div class="col-lg-3 mb-3" data-aos="fade-right">
					<div class="card">
						<div class="card-body">
							<center><i class="fa-solid fa-notes-medical fa-2xl mt-3"></i></center>
							<p href="tani.php" class="nav-link text-center mt-3">Cek Kesehatan</p>
						</div>
					</div>
				</div>

				<div class="col-lg-3 mb-3" data-aos="fade-left">
					<div class="card">
						<div class="card-body">
							<center><i class="fa-solid fa-bell fa-2xl mt-3"></i></center>
							<p href="diskusi.php" class="nav-link text-center mt-3">Peringatan</p>
						</div>
					</div>
				</div>

				<div class="col-lg-3 mb-3" data-aos="fade-right">
					<div class="card">
						<div class="card-body">
							<center><i class="fa-solid fa-comment-dots fa-2xl mt-3"></i></center>
							<p href="diskusi.php" class="nav-link text-center mt-3">Forum</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<br>

		<div class="container" style="background: #4f9a76; width: 50rem;" data-aos="fade-up">
			<br>
			<h3 class="mt-5 text-white" data-aos="fade-down">Kenapa memilih MoTeun?</h3>
			<ul class="navbar-nav text-white">
	          <li data-aos="fade-left"><i class="ri-checkbox-circle-fill"></i> Mendata jumlah dan umur tanaman dan hewan dengan efisien.</li>
	          <li data-aos="fade-right"><i class="ri-checkbox-circle-fill"></i> Mengecek kesehatan tanaman dan hewan secara rutin.</li>
	          <li data-aos="fade-left"><i class="ri-checkbox-circle-fill"></i> Memberi tanda bahwa tanaman dan hewan sudah siap dikembangbiakan.</li>
	          <li data-aos="fade-right"><i class="ri-checkbox-circle-fill"></i> Saling bertukar pengalaman mengenai tanaman dan hewan yang dibudidayakan.</li>
	        </ul>
	        <br><br>
		</div>
	</div>
	@endsection