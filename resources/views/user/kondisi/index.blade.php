@extends('layouts.master')

@section('title', 'Data Kondisi')

@section('content')
<div class="container">
    <a href="/kondisi/create" class="btn btn-primary mb-3">Tambah Data</a>

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
                    <th>ID Nama</th>
                    <th>Nama Hewan/Tanaman</th>
                    <th>Jenis</th>
                    <th>Tgl Sakit</th>
                    <th>Lama Sakit</th>
                    <th>Tgl Sembuh</th>
                    <th>Obat</th>
                    <th>Perawat</th>
                    <th>Status</th>
                    <th>User</th>   
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach($kondisis as $kondisi)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $kondisi->nama_id }}</td>
                    <td>{{ $kondisi->nama }}</td>
                    <td>{{ $kondisi->jenis }}</td>
                    <td>{{ $kondisi->tgl_sakit }}</td>
                    <td>{{ $kondisi->lama_sakit }} hari</td>
                    <td>{{ $kondisi->tgl_sembuh }}</td>
                    <td>{{ $kondisi->obat }}</td>
                    <td>{{ $kondisi->perawat }}</td>
                    <td>{{ $kondisi->status }}</td>
                    <td>{{ $kondisi->user }}</td>
                    <td>
                        <a href="{{ route('kondisi.edit', $kondisi->id) }}" class="btn btn-warning btn-sm text-white">Edit</a>
                        <form method="POST" action="{{ route('kondisi.destroy', $kondisi->id )}}">
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
            {{ $kondisis->links() }}
        </div>
    </div>
</div>
@endsection

<script>
   function printPage() {
      window.print();
   }
</script>