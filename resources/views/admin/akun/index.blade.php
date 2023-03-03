@extends('layouts.admin')

@section('title', 'Data Akun Admin')

@section('content')
<div class="container">
    @if($message = Session::get('message'))
        <div class="alert alert-success">
            <strong>Berhasil</strong>
            <p>{{ $message }}</p>
        </div>
    @endif
    <form action="{{ route('akunadmin.update', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="">Gambar</label>
            <br>
            <img src="/assets/img/userprofile/{{ Auth::user()->image }}" alt="" class="img-fluid" width="20%">
            <input type="hidden" name="imageLama" value="{{ Auth::user()->image }}">
            <input type="file" class="form-control" name="image" placeholder="Gambar">
        </div>

        @error('image')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Jenis Kelamin</label>
            <select type="text" class="form-control" name="jk" placeholder="jenis Kelamin">
                <option value="{{ Auth::user()->jk }}">{{ Auth::user()->jk }}</option>
                <option value="Laki - laki">Laki - laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>
        @error('jk')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Nama</label>
            <input type="text" class="form-control" name="name" placeholder="Nama" value="{{ Auth::user()->name }}">
        </div>
        @error('name')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Email" value="{{ Auth::user()->email }}">
        </div>
        @error('email')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password" value="{{ Auth::user()->password }}">
        </div>
        @error('password')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Telepon</label>
            <input type="number" class="form-control" name="no_telp" placeholder="Telepon" value="{{ Auth::user()->no_telp }}">
        </div>
        @error('no_telp')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Alamat</label>
            <textarea class="form-control" name="alamat" placeholder="Telepon">{{ Auth::user()->alamat }}</textarea>
        </div>
        @error('alamat')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Role ID</label>
            <input class="form-control" name="role_id" id="" cols="30" rows="10" value="{{ Auth::user()->role_id }}" readonly="">
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