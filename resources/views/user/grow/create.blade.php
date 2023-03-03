@extends('layouts.master')

@section('title', 'Data Perkembangan Hewan')

@section('content')
<div class="container">
    <a href="/grow" class="btn btn-primary mb-3">Kembali</a>
    <form action="{{ route('grow.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">ID Betina</label>
            <select class="form-control" name="id_betina" placeholder="ID Betina">
                @foreach($ternaks as $ternak)
                <option value="{{ $ternak->name_id }}">{{ $ternak->name_id }} - {{ $ternak->name }} - {{ $ternak->jenis }} - {{ $ternak->kelamin }}</option>
                @endforeach
            </select>    
        </div>
        @error('id_betina')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">ID Jantan</label>
            <select class="form-control" name="id_jantan" placeholder="ID Jantan">
                @foreach($ternaks as $ternak)
                <option value="{{ $ternak->name_id }}">{{ $ternak->name_id }} - {{ $ternak->name }} - {{ $ternak->jenis }} - {{ $ternak->kelamin }}</option>
                @endforeach
            </select>    
        </div>
        @error('id_jantan')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Keterangan</label>
            <textarea type="text" class="form-control ckeditor" id="content" name="keterangan" placeholder="Keterangan"></textarea>
        </div>
        @error('keterangan')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Hasil</label>
            <input type="text" class="form-control" name="hasil" placeholder="Hasil">
        </div>
        @error('hasil')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Mulai</label>
            <input type="date" class="form-control" name="mulai" placeholder="Mulai">
        </div>
        @error('mulai')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Akhir</label>
            <input type="date" class="form-control" name="akhir" placeholder="Akhir">
        </div>
        @error('akhir')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Status</label>
            <select class="form-control" name="status" placeholder="status">
                <option value="Berhasil">Berhasil</option>
                <option value="Proses">Proses</option>
                <option value="Gagal">Gagal</option>
            </select>
        </div>

        @error('status')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Sebab</label>
            <textarea type="text" class="form-control ckeditor" id="content" name="sebab" placeholder="Sebab"></textarea>
        </div>
        @error('sebab')
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