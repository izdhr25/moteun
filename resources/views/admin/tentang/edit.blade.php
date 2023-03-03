@extends('layouts.admin')

@section('title', 'Data Tentang Website')

@section('content')
<div class="container">

    <a href="/about" class="btn btn-primary mb-3">Kembali</a>

    @if($message = Session::get('message'))
        <div class="alert alert-success">
            <strong>Berhasil</strong>
            <p>{{ $message }}</p>
        </div>
    @endif
    <form action="{{ route('about.update' , $about->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="">Judul</label>
            <input type="text" class="form-control" name="judul" placeholder="Judul" value="{{ $about->judul }}">
        </div>
        @error('judul')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Isi</label>
            <textarea type="text"class="form-control ckeditor" id="content" name="isi" placeholder="Isi">{{ $about->isi }}</textarea>
        </div>
        @error('isi')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Poin</label>
            <textarea type="text" class="form-control ckeditor" id="content" name="poin" placeholder="Poin">{{ $about->poin }}</textarea>
        </div>
        @error('poin')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Poin</label>
            <textarea type="text" class="form-control ckeditor" id="content" name="poin2" placeholder="Poin 2">{{ $about->poin2 }}</textarea>
        </div>
        @error('poin2')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Poin 3</label>
            <textarea type="text" class="form-control ckeditor" id="content" name="poin3" placeholder="Poin 3">{{ $about->poin3 }}</textarea>
        </div>
        @error('poin3')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Poin 4</label>
            <textarea type="text" class="form-control ckeditor" id="content" name="poin4" placeholder="Poin 4">{{ $about->poin4 }}</textarea>
        </div>
        @error('poin4')
            <small style="color: red">{{ $message }}</small>
        @enderror


        <div class="form-group">
            <label for="">Poin 5</label>
            <textarea type="text" class="form-control ckeditor" id="content" name="poin5" placeholder="Poin 5">{{ $about->poin5 }}</textarea>
        </div>
        @error('poin5')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Visi</label>
            <input type="text" class="form-control" name="visi" placeholder="Visi" value="{{ $about->visi }}">
        </div>
        @error('visi')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Misi</label>
            <textarea id="body" class="form-control ckeditor" name="misi" placeholder="Misi" id="content">{{ $about->misi }}</textarea>
        </div>
        @error('misi')
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