@extends('layouts.admin')

@section('title', 'Data Kontak Website')

@section('content')
<div class="container">
    <a href="/kontak/create" class="btn btn-primary mb-3">Tambah Data</a>
    
    @if($message = Session::get('message'))
        <div class="alert alert-success">
            <strong>Berhasil</strong>
            <p>{{ $message }}</p>
        </div>
    @endif

    @php
        $i = 1;
    @endphp
    @foreach($kontaks as $kontak)

    <div class="form-group">
            <label for="">Instagram</label>
            <input type="text" class="form-control" name="instagram" placeholder="Instagram" readonly="" value="{{ $kontak->instagram }}">
        </div>
        @error('instagram')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Whatsapp</label>
            <input type="text" class="form-control" name="whatsapp" placeholder="Whatsapp" readonly="" value="{{ $kontak->whatsapp }}">
        </div>
        @error('whatsapp')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Linkedin</label>
            <input type="text" class="form-control" name="linkedin" placeholder="Linkedin" readonly="" value="{{ $kontak->linkedin }}">
        </div>
        @error('linkedin')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Email" readonly="" value="{{ $kontak->email }}">
        </div>
        @error('email')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Alamat</label>
            <textarea id="body" class="form-control ckeditor" id="content" name="alamat" placeholder="Alamat" readonly="">{{ $kontak->alamat }}</textarea>
        </div>
        @error('alamat')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <a href="{{ route('kontak.edit', $kontak->id) }}" class="btn btn-warning form-control text-white">Edit</a>

    
    @endforeach
</div>
@endsection