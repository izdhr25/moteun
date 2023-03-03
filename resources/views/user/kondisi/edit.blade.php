@extends('layouts.master')

@section('title', 'Data Kondisi')

@section('content')
<div class="container">
    <a href="/kondisi" class="btn btn-primary mb-3">Kembali</a>
    <form action="{{ route('kondisi.update', $kondisi->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="">ID Hewan/Tanaman</label>
            <input type="text" class="form-control" name="nama_id" placeholder="ID Hewan" value="{{ $kondisi->nama_id }}">
        </div>
        @error('nama_id')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Nama Hewan/Tanaman</label>
            <select type="text" class="form-control" name="nama" placeholder="Digunakan untuk" value="{{ $kondisi->nama }}">
                <option value="Tanaman">Tanaman</option>
                <option value="Hewan">Hewan</option>
            </select>
        </div>
        @error('nama')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Jenis</label>
            <select class="form-control" name="jenis" placeholder="Jenis">
                <option value="{{ $kondisi->jenis }}">{{ $kondisi->jenis }}</option>
                @foreach($jenisternaks as $jenisternak)
                <option value="{{ $jenisternak->name }}">{{ $jenisternak->name }}</option>
                @endforeach

                @foreach($jenistanis as $jenistani)
                <option value="{{ $jenistani->name }}">{{ $jenistani->name }}</option>
                @endforeach
            </select>          
        </div>
        @error('jenis')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Tgl Sakit</label>
            <input type="date" class="form-control" name="tgl_sakit" placeholder="Tgl Sakit" id="d1" onchange="calculateDays()" value="{{ $kondisi->tgl_sakit }}">
        </div>
        @error('tgl_sakit')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group input-group">
            <label for="">Lama Sakit</label>
            <div class="input-group">
              <input type="text" class="form-control" name="lama_sakit" id="output" readonly="" value="{{ $kondisi->lama_sakit }}">
              <span class="input-group-text" id="basic-addon2">hari</span>
            </div>
        </div>
        @error('lama_sakit')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Tgl Sembuh</label>
            <input type="date" class="form-control" name="tgl_sembuh" placeholder="Tgl Sembuh" value="{{ $kondisi->tgl_sembuh }}">
        </div>
        @error('tgl_sembuh')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Obat</label>
            <select class="form-control" name="obat" placeholder="Obat">
                <option value="{{ $kondisi->obat }}">{{ $kondisi->obat }}</option>
                @foreach($obats as $obat)
                <option value="{{ $obat->nama_obat }}">{{ $obat->nama_obat }}</option>
                @endforeach
            </select>          
        </div>
        @error('obat')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Perawat</label>
            <input type="text" class="form-control" name="perawat" placeholder="Perawat" value="{{ $kondisi->perawat }}">
        </div>
        @error('perawat')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Status</label>
            <select class="form-control" name="status" placeholder="status" value="{{ $kondisi->status }}">
                <option value="{{ $kondisi->status }}">{{ $kondisi->status }}</option>
                <option value="Sembuh">Sembuh</option>
                <option value="Sakit">Sakit</option>
                <option value="Mati">Mati</option>
            </select>
        </div>

        @error('status')
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
    function calculateDays(){
        var harini = new Date();
        var d1 = document.getElementById('d1').value;
        const dateOne = new Date(d1);
        const dateTwo = new Date(harini);

        const time = Math.abs(dateTwo - dateOne);
        const days = Math.ceil(time / (1000 * 60 * 60 * 24));
        document.getElementById("output").value=days;
    }
</script>
@endsection