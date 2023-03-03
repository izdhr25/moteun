@extends('layouts.admin')

@section('title', 'Data Kontak Website')

@section('content')
<div class="container">
    <a href="/kontak" class="btn btn-primary mb-3">Kembali</a>
    @if($message = Session::get('message'))
        <div class="alert alert-success">
            <strong>Berhasil</strong>
            <p>{{ $message }}</p>
        </div>
    @endif
    <form action="{{ route('kontak.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Instagram</label>
            <input type="text" class="form-control" name="instagram" placeholder="Instagram">
        </div>
        @error('instagram')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Whatsapp</label>
            <input type="text" class="form-control" name="whatsapp" placeholder="Whatsapp">
        </div>
        @error('whatsapp')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Linkedin</label>
            <input type="text" class="form-control" name="linkedin" placeholder="Linkedin">
        </div>
        @error('linkedin')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Email">
        </div>
        @error('email')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Alamat</label>
            <textarea id="body" class="form-control ckeditor" id="content" name="alamat" placeholder="Alamat"></textarea>
        </div>
        @error('alamat')
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