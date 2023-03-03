@extends('layouts.admin')

@section('title', 'Data Tentang Website')

@section('content')
<div class="container">
    @if($message = Session::get('message'))
        <div class="alert alert-success">
            <strong>Berhasil</strong>
            <p>{{ $message }}</p>
        </div>
    @endif
    <form action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Judul</label>
            <input type="text" class="form-control" name="judul" placeholder="Judul">
        </div>
        @error('judul')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Isi</label>
            <textarea type="text" class="form-control" name="isi" placeholder="Isi"></textarea>
        </div>
        @error('isi')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Poin</label>
            <textarea type="text" class="form-control" name="poin" placeholder="Poin"></textarea>
        </div>
        @error('poin')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Poin</label>
            <textarea type="text" class="form-control" name="poin2" placeholder="Poin 2"></textarea>
        </div>
        @error('poin2')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Poin 3</label>
            <textarea type="text" class="form-control" name="poin3" placeholder="Poin 3"></textarea>
        </div>
        @error('poin3')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Poin 4</label>
            <textarea type="text" class="form-control" name="poin4" placeholder="Poin 4"></textarea>
        </div>
        @error('poin4')
            <small style="color: red">{{ $message }}</small>
        @enderror


        <div class="form-group">
            <label for="">Poin 5</label>
            <textarea type="text" class="form-control" name="poin5" placeholder="Poin 5"></textarea>
        </div>
        @error('poin5')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Visi</label>
            <input type="text" class="form-control" name="visi" placeholder="Visi">
        </div>
        @error('visi')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Misi</label>
            <textarea id="body" class="form-control" name="misi" placeholder="Misi"></textarea>
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