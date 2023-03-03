@extends('layouts.app')

@section('title', 'MoTeun | Artikel')

@section('content')


    <div class="container-fluid my-5">
    		<br><br><br><br><br>
    		<h3 class="text-center" data-aos="fade-down">Artikel</h3>
    		<center>
    			<hr style="background: black; height: 5px; width: 100px; border-radius: 10%" class="mb-5">
    		</center>	
    		<div class="container" data-aos="fade-up">
            <form action="" method="GET">
                <div class="row my-5">
                    <div class="col-lg-11">
                        <input type="text" class="form-control" name="query" placeholder="Cari...">
                    </div>
                     <div class="col-lg-1">
                        <button type="submit" class="btn btn-primary btn-sm">Cari</button>
                    </div>
                </div>
            </form>	
    			<div class="row">
                    @foreach($artikels as $artikel)
                    <div class="col-md-4 mb-3" data-aos="fade-left">
                        <div class="card-deck">
                            <div class="card">
                                <img class="img-fluid" alt="100%x280" src="assets/img/artikel/{{ $artikel->image }}">
                                <div class="card-body">
                                    <h5 class="card-title my-3">{{ $artikel->judul }}</h5>
                                    {!! Str::limit($artikel->deskripsi, 50, '...') !!}

                                    <a href="{{ route('artikels.detail', ['id' => $artikel->id]) }}" class="btn nav-link text-white mt-4" style="background: #4f9a76;">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
    		</div>
    		<br><br><br>
    </div>
@endsection