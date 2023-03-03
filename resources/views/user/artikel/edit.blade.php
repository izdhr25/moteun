@extends('layouts.master')

@section('title', 'Data Artikel')

@section('content')
<div class="container">
    <a href="/artikel" class="btn btn-primary mb-3">Kembali</a>
    <form action="{{ route('artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="">Judul</label>
            <input type="text" class="form-control" name="judul" placeholder="Judul" value="{{ $artikel->judul }}">
        </div>
        @error('judul')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Tanggal Tulis</label>
            <input type="date" class="form-control" name="tgl_tulis" id="" cols="30" rows="10" placeholder="Tanggal Tulis" value="{{ $artikel->tgl_tulis }}">
        </div>

        @error('tgl_tulis')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Deskripsi</label>
            <textarea type="text" class="form-control ckeditor" id="content" name="deskripsi" placeholder="Deskripsi">{{ $artikel->deskripsi }}</textarea>
        </div>

        @error('deskripsi')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Gambar</label>
            <img src="/assets/img/artikel/{{ $artikel->image }}" alt="" class="img-fluid" width="90">
            <input type="file" class="form-control" name="image" placeholder="Gambar">
        </div>

        @error('image')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">User</label>
            <input class="form-control" name="user" id="" cols="30" rows="10" value="{{ $artikel->user }}" readonly="">
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