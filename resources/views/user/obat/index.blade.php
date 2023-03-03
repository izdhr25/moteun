@extends('layouts.master')

@section('title', 'Data Obat')

@section('content')
<div class="container">
    <a href="/obat/create" class="btn btn-primary mb-3">Tambah Data</a>

    <input type="button" value="Cetak" onclick="printPage()" class="btn btn-primary mb-3"/>

    @if($message = Session::get('message'))
        <div class="alert alert-success">
            <strong>Berhasil</strong>
            <p>{{ $message }}</p>
        </div>
    @endif

    <form action="" method="GET">
        <div class="row">
            <div class="col-lg-11">
                <input type="text" class="form-control" name="query" placeholder="Cari...">
            </div>
             <div class="col-lg-1">
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </div>
    </form>


    <div class="table-responsive my-3">
        <table class="table table-hover table-stripped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Obat</th>
                    <th>Untuk</th>
                    <th>Jenis</th>
                    <th>Obat</th>
                    <th>Dosis</th>
                    <th>Perawat</th>
                    <th>User</th>   
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach($obats as $obat)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $obat->nama_obat }}</td>
                    <td>{{ $obat->nama }}</td>
                    <td>{{ $obat->jenis }}</td>
                    <td>{{ $obat->obat }}</td>
                    <td>{{ $obat->dosis }}</td>
                    <td>{{ $obat->perawat }}</td>
                    <td>{{ $obat->user }}</td>
                    <td>
                        <a href="{{ route('obat.edit', $obat->id) }}" class="btn btn-warning btn-sm text-white">Edit</a>
                        <form method="POST" action="{{ route('obat.destroy', $obat->id )}}">
                        @method('DELETE')
                        @csrf    
                            <button type="submit" class="btn btn-danger btn-sm">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex">
            {{ $obats->links() }}
        </div>
    </div>
</div>
@endsection

<script>
   function printPage() {
      window.print();
   }
</script>