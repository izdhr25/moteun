@extends('layouts.master')

@section('title', 'Data Tani')

@section('content')
<div class="container">
    <a href="/tani" class="btn btn-primary mb-3">Kembali</a>
    <form action="{{ route('tani.update', $tani->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="">Nama Tanaman</label>
            <input type="text" class="form-control" name="name" placeholder="Nama Tanaman" value="{{ $tani->name }}">
        </div>
        @error('nama')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
           <label for="">Kegunaan Tanaman</label>
            <input type="text" class="form-control" name="tanaman" placeholder="Kegunaan Tanaman" value="{{ $tani->tanaman }}">
        </div>
        @error('tanaman')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Jenis</label>
            <select class="form-control" name="jenis" placeholder="Jenis">
                <option value="{{ $tani->jenis }}">{{ $tani->jenis }}</option>
                @foreach($jenistanis as $jenistani)
                <option value="{{ $jenistani->name }}">{{ $jenistani->name }}</option>
                @endforeach
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
            <label for="">Ditanam</label>
            <input type="date" class="form-control" name="ditanam" placeholder="Ditanam" id="d1" onchange="calculateDays()" value="{{ $tani->ditanam }}">
        </div>
        @error('ditanam')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group input-group">
            <label for="">Umur</label>
            <div class="input-group">
              <input type="text" class="form-control" name="umur" id="output" readonly="" value="{{ $tani->umur }}">
              <span class="input-group-text" id="basic-addon2">hari</span>
            </div>
        </div>
        @error('umur')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Dipanen</label>
            <input type="date" class="form-control" name="dipanen" placeholder="Dipanen" value="{{ $tani->dipanen }}">
        </div>
        @error('dipanen')
            <small style="color: red">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="">Hasil</label>
            <textarea type="text" class="form-control ckeditor" id="content" name="hasil" placeholder="Hasil">{{ $tani->hasil }}</textarea>
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