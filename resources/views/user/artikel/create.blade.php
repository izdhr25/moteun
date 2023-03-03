@extends('layouts.master')

@section('title', 'Data Artikel')

@section('content')
<div class="container">
    <a href="/artikel" class="btn btn-primary mb-3">Kembali</a>
    <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Judul</label>
            <input type="text" class="form-control" name="judul" placeholder="Judul">
        </div>
        @error('title')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Tanggal Tulis</label>
            <input type="date" class="form-control" name="tgl_tulis" placeholder="Tanggal Tulis">
        </div>
        @error('tgl_tulis')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Penulis</label>
            <input type="text" class="form-control" name="penulis" placeholder="Penulis">
        </div>
        @error('penulis')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Deskripsi</label>
            <textarea type="text" class="form-control ckeditor" id="content" name="deskripsi" placeholder="Deskripsi"></textarea>
        </div>

        @error('deskripsi')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Gambar</label>
            <input type="file" class="form-control" name="image" placeholder="Gambar">
        </div>

        @error('image')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">User</label>
            <input type="text" class="form-control" name="user" placeholder="user" value="{{ Auth::user()->id }}" readonly="">
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