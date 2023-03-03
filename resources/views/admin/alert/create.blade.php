@extends('layouts.admin')

@section('title', 'Data Pemberitahuan')

@section('content')
<div class="container">
    <a href="/allalert" class="btn btn-primary mb-3">Kembali</a>

	<div class="alert alert-warning d-flex align-items-center" role="alert">
	  <i class="fa-solid fa-triangle-exclamation mr-3"></i>
	  <div>
	    Penting untuk memastikan bahwa hewan atau tanaman yang dipakai untuk berkembang biak sehat dan memenuhi standar kualitas agar hasil yang diperoleh optimal.
	  </div>
	</div>
    <form action="{{ route('allalert.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Nama Hewan/Tanaman</label>
            <select type="text" class="form-control" name="name">
                @foreach($tanis as $tani)
                <option value="{{ $tani->name }}">{{ $tani->name }} - {{ $tani->kelamin }}</option>
                @endforeach

                @foreach($ternaks as $ternak)
                <option value="{{ $ternak->name }}">{{ $ternak->name }} - {{ $ternak->kelamin }}</option>
                @endforeach
            </select>
        </div>
        @error('name')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">ID Hewan/Tanaman</label>
            <select type="text" class="form-control" name="name_id">
                @foreach($tanis as $tani)
                    <option value="{{ $tani->id }}">{{ $tani->id }} - {{ $tani->name }} - {{ $tani->kelamin }}</option>
                @endforeach

                @foreach($ternaks as $ternak)
                    <option value="{{ $ternak->id }}">{{ $ternak->id }} - {{ $ternak->name }} - {{ $ternak->kelamin }}</option>
                @endforeach
            </select>
        </div>
        @error('name_id')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Hewan/Tanaman</label>
            <select type="text" class="form-control" name="jenis" placeholder="Digunakan untuk">
                <option value="Tanaman">Tanaman</option>
                <option value="Hewan">Hewan</option>
            </select>
        </div>
        @error('jenis')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Kelamin</label>
            <select type="text" class="form-control" name="kelamin">
                <option value="Betina">Betina</option>
                <option value="Jantan">Jantan</option>
                <option value="Tanaman Berumah Tunggal">Tanaman Berumah Tunggal (Ganda)</option>
            </select>
        </div>
        @error('kelamin')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Status</label>
            <br>
            <input type="text" name="status" class="form-control" id="status" readonly>
        </div>

        @error('ready')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group input-group">
            <label for="">Umur Siap</label>
            <div class="input-group">
              <input type="text" class="form-control" name="umur_siap" id="umur_siap" onkeyup="statusSubject()">
              <span class="input-group-text" id="basic-addon2">hari</span>
            </div>
        </div>
        @error('umur_siap')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group input-group">
            <label for="">Umur Saat Ini</label>
            <div class="input-group">
              <input type="text" class="form-control" name="umur" id="umur" onkeyup="statusSubject()">
              <span class="input-group-text" id="basic-addon2">hari</span>
            </div>
        </div>
        @error('umur')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Keterangan</label>
            <input type="text" class="form-control" name="keterangan" placeholder="Keterangan">
        </div>
        @error('keterangan')
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

<script>
    function statusSubject(){
        var umur_siap = parseInt(document.getElementById('umur_siap').value);
        var umur = parseInt(document.getElementById('umur').value);
        var selisih = umur_siap - umur;

        if(umur_siap == umur) {
            const siap = "Siap";
            document.getElementById('status').value = siap;
        } else {
            const belum = "Belum Siap";
            document.getElementById('status').value = belum;
        }
    }
</script>
@endsection