@extends('layouts.admin')

@section('title', 'Data Jenis Tani')

@section('content')
<div class="container">
    <a href="/jenistani" class="btn btn-primary mb-3">Kembali</a>
    <form action="{{ route('jenistani.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Nama Jenis</label>
            <input type="text" class="form-control" name="name" placeholder="Nama Jenis">
        </div>
        @error('name')
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