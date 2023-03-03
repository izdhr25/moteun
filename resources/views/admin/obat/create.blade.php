@extends('layouts.admin')

@section('title', 'Data Obat')

@section('content')
<div class="container">
    <a href="/allobat" class="btn btn-primary mb-3">Kembali</a>
    <form action="{{ route('allobat.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Nama Obat</label>
            <input type="text" class="form-control" name="nama_obat" placeholder="Nama Obat">
        </div>
        @error('nama_obat')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
           <label for="">Untuk Hewan/Tanaman</label>
            <select type="text" class="form-control" name="nama" placeholder="Digunakan untuk">
                <option value="Tanaman">Tanaman</option>
                <option value="Hewan">Hewan</option>
            </select>
        </div>
        @error('nama')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Jenis</label>
            <input type="text" class="form-control" name="jenis" placeholder="Jenis">
        </div>
        @error('jenis')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Obat</label>
            <select type="text" class="form-control" name="obat" placeholder="Digunakan untuk">
                <option value="Tanaman">Tanaman</option>
                <option value="Hewan">Hewan</option>
            </select>
        </div>
        @error('obat')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group input-group">
            <label for="">Dosis</label>
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Dosis" aria-label="Dosis" aria-describedby="basic-addon2" name="dosis">
              
            </div>
        </div>
        @error('dosis')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Perawat</label>
            <input type="text" class="form-control" name="perawat" placeholder="Perawat">
        </div>
        @error('perawat')
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