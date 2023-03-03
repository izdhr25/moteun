@extends('layouts.admin')

@section('title', 'Data Artikel')

@section('content')
<div class="container">
    <a href="/allartikel" class="btn btn-primary mb-3">Kembali</a>
    <form action="{{ route('allartikel.update', $allartikel->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="">Judul</label>
            <input type="text" class="form-control" name="judul" placeholder="Judul" value="{{ $allartikel->judul }}">
        </div>
        @error('judul')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Tanggal Tulis</label>
            <input type="date" class="form-control" name="tgl_tulis" id="" cols="30" rows="10" placeholder="Tanggal Tulis" value="{{ $allartikel->tgl_tulis }}">
        </div>

        @error('tgl_tulis')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Deskripsi</label>
            <textarea class="form-control ckeditor" name="deskripsi" id="content" cols="30" rows="10" placeholder="Deskripsi">{{ $allartikel->deskripsi }}</textarea>
        </div>

        @error('deskripsi')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Gambar</label>
            <img src="/assets/img/artikel/{{ $allartikel->image }}" alt="" class="img-fluid" width="90">
            <input type="file" class="form-control" name="image" placeholder="Gambar">
        </div>

        @error('image')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">User</label>
            <input class="form-control" name="user" id="" cols="30" rows="10" value="{{ $allartikel->user }}" readonly="">
        </div>

        @error('user')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">
                Submit
            </button>
        </div>
    </form>
</div>
@endsection