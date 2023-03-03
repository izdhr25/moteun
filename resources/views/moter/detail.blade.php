@extends('layouts.app')

@section('title', 'MoTeun | Detail')

@section('content')


	<br><br><br><br><br>

	<div class="container-fluid my-5">
		
			<h3 class="text-center">Detail</h3>
			<center>
				<hr style="background: black; height: 5px; width: 100px; border-radius: 10%" class="mb-5">
			</center>	
			<div class="container">	
				<div class="row">
					<h5>{{ $artikel->tgl_tulis }}</h5>
					<h5>{{ $artikel->penulis }}</h5>
					<h2 class="mb-5">{{ $artikel->judul }}</h2>
					<div class="col-lg-5">
						<center><img src="/assets/img/artikel/{{ $artikel->image }}" class="img-fluid" width="100%"></center>
					</div>
					
					<div class="col-lg-7 my-auto">
						<p>{!! $artikel->deskripsi !!}</p>
					</div>

					<div class="col-lg-12 mt-3">
						<div id="disqus_thread"></div>
					</div>
				</div>
			</div>
			<br><br><br>
	</div>
	@endsection