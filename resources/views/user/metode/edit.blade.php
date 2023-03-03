@extends('layouts.master')

@section('title', 'Data Perkembangan Tanaman')

@section('content')
<div class="container">
    <a href="/metode" class="btn btn-primary mb-3">Kembali</a>
    <form action="{{ route('metode.update', $metode->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="">ID Tanaman</label>
            <select class="form-control" name="id_tanaman" placeholder="ID Tanaman">
                <option value="{{ $metode->id_tanaman }}">{{ $metode->id_tanaman }}</option>
                @foreach($tanis as $tani)
                <option value="{{ $tani->name_id }}">{{ $tani->name_id }} - {{ $tani->name }} - {{ $tani->jenis }}</option>
                @endforeach
            </select>    
        </div>
        @error('id_tanaman')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">ID Pasangan</label>
            <select class="form-control" name="id_pasangan" placeholder="ID Pasangan">
                <option value="{{ $metode->id_pasangan }}">{{ $metode->id_pasangan }}</option>
                @foreach($tanis as $tani)
                <option value="{{ $tani->name_id }}">{{ $tani->name_id }} - {{ $tani->name }} - {{ $tani->jenis }}</option>
                @endforeach
            </select>    
        </div>
        @error('id_pasangan')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Keterangan</label>
            <textarea type="text" class="form-control ckeditor" id="content" name="keterangan" placeholder="Keterangan">{!! $metode->keterangan !!}</textarea>
        </div>
        @error('keterangan')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Hasil</label>
            <input type="text" class="form-control" name="hasil" placeholder="Hasil" value="{{ $metode->hasil }}">
        </div>
        @error('hasil')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Mulai</label>
            <input type="date" class="form-control" name="mulai" placeholder="Mulai" value="{{ $metode->mulai }}">
        </div>
        @error('mulai')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Akhir</label>
            <input type="date" class="form-control" name="akhir" placeholder="Akhir" value="{{ $metode->akhir }}">
        </div>
        @error('akhir')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Status</label>
            <select class="form-control" name="status" placeholder="status">
                <option value="{{ $metode->status }}">{{ $metode->status }}</option>
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
            <textarea type="text" class="form-control ckeditor" id="content" name="sebab" placeholder="Sebab">{!! $metode->sebab !!}</textarea>
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