@extends('layouts.master')

@section('title', 'Data Ternak')

@section('content')
<div class="container">
    <a href="/ternak" class="btn btn-primary mb-3">Kembali</a>
    <form action="{{ route('ternak.update', $ternak->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="">Nama Hewan</label>
            <input type="text" class="form-control" name="name" placeholder="Nama Hewan" value="{{ $ternak->name }}">
        </div>
        @error('nama')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
           <label for="">Kegunaan Hewan</label>
            <input type="text" class="form-control" name="hewan" placeholder="Kegunaan Hewan" value="{{ $ternak->hewan }}">
        </div>
        @error('hewan')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Jenis</label>
            <select class="form-control" name="jenis" placeholder="Jenis">
                <option value="{{ $ternak->jenis }}">{{ $ternak->jenis }}</option>
                @foreach($jenisternaks as $jenisternak)
                <option value="{{ $jenisternak->name }}">{{ $jenisternak->name }}</option>
                @endforeach
            </select>          
        </div>
        @error('jenis')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Kelamin</label>
            <select class="form-control" name="kelamin" placeholder="Kelamin">
                <option value="{{ $ternak->kelamin }}">{{ $ternak->kelamin }}</option>
                <option value="Jantan">Jantan</option>
                <option value="Betina">Betina</option>
            </select>          
        </div>
        @error('kelamin')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Lahir</label>
            <input type="date" class="form-control" name="lahir" placeholder="Lahir" id="d1" onchange="calculateDays()" value="{{ $ternak->lahir }}">
        </div>
        @error('lahir')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group input-group">
            <label for="">Umur</label>
            <div class="input-group">
              <input type="text" class="form-control" name="umur" id="output" readonly="" value="{{ $ternak->umur }}">
              <span class="input-group-text" id="basic-addon2">hari</span>
            </div>
        </div>
        @error('umur')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Mati</label>
            <input type="date" class="form-control" name="mati" placeholder="Mati" value="{{ $ternak->mati }}">
        </div>
        @error('mati')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Hasil</label>
            <textarea type="text" class="form-control ckeditor" id="content" name="hasil" placeholder="Hasil">{{ $ternak->hasil }}</textarea>
        </div>
        @error('hasil')
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