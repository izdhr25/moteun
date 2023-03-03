@extends('layouts.admin')

@section('title', 'Tentang Website')

@section('content')
<div class="container">
    <a href="/about/create" class="btn btn-primary mb-3">Tambah Data</a>
    
    @if($message = Session::get('message'))
        <div class="alert alert-success">
            <strong>Berhasil</strong>
            <p>{{ $message }}</p>
        </div>
    @endif

    @php
        $i = 1;
    @endphp
    @foreach($tentangs as $about)

    <div class="form-group">
        <label for="">Judul</label>
        <input type="text" class="form-control" name="judul" placeholder="Judul" value="{{ $about->judul }}" readonly="">
    </div>

    <div class="form-group">
        <label for="">Isi</label>
        <textarea type="text" class="form-control ckeditor" id="content" name="isi" placeholder="Isi" readonly="">{{ $about->isi }}</textarea>
    </div>

    <div class="form-group">
        <label for="">Poin</label>
        <textarea type="text" class="form-control ckeditor" id="content" name="poin" placeholder="Poin" readonly="">{{ $about->poin }}</textarea>
    </div>

    <div class="form-group">
        <label for="">Poin</label>
        <textarea type="text" class="form-control ckeditor" id="content" name="poin2" placeholder="Poin 2" readonly="">{{ $about->poin2 }}</textarea>
    </div>

    <div class="form-group">
        <label for="">Poin 3</label>
        <textarea type="text" class="form-control ckeditor" id="content" name="poin3" placeholder="Poin 3" readonly="">{{ $about->poin3 }}</textarea>
    </div>

    <div class="form-group">
        <label for="">Poin 4</label>
        <textarea type="text" class="form-control ckeditor" id="content" name="poin4" placeholder="Poin 4" readonly="">{{ $about->poin4 }}</textarea>
    </div>

    <div class="form-group">
        <label for="">Poin 5</label>
        <textarea type="text" class="form-control ckeditor" id="content" name="poin5" placeholder="Poin 5" readonly="">{{ $about->poin5 }}</textarea>
    </div>

    <div class="form-group">
        <label for="">Visi</label>
        <input type="text" class="form-control ckeditor" id="content" name="visi" placeholder="Visi" value="{{ $about->visi }}" readonly="">
    </div>

    <div class="form-group">
        <label for="">Misi</label>
        <textarea class="form-control ckeditor" id="content" name="misi" placeholder="Misi" readonly="">{{ $about->misi }}</textarea>
    </div>

    <a href="{{ route('about.edit', $about->id) }}" class="btn btn-warning form-control text-white">Edit</a>

    
    @endforeach
</div>
@endsection