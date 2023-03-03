@extends('layouts.app')

@section('title', 'MoTeun | Tentang')

@section('content')
	<div class="container my-5">
		<br><br><br><br><br>
		<h3 class="text-center" data-aos="fade-up">Tentang</h3>
		<center>
			<hr>
		</center>		

		<div class="row">
			<div class="col-lg-6">
				<img class="img-fluid" src="assets/img/moteun1.png" data-aos="fade-down">
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

	<div class="container my-5">
		<h3 class="text-center" data-aos="fade-up">Visi dan Misi</h3>
		<center>
			<hr>
		</center>		

		<div class="row">
			<div class="col-lg-6">
				<img class="img-fluid" src="assets/img/home5.png" data-aos="fade-down">
			</div>

			<div class="col-lg-6" data-aos="fade-right">		
					@foreach($tentangs as $tentang)
						<h3 style="color: #4f9a76; font-weight: bolder;">Visi</h3>
						<p>{!! $tentang->visi !!}</p>
						<br>
						<h3 style="color: #4f9a76; font-weight: bolder;">Misi</h3>
						<p>{!! $tentang->misi !!}</p>
					@endforeach
			</div>
		</div>
	</div>
	
@endsection