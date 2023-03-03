@extends('layouts.master')

@section('title', 'Data Tani')

@section('content')
<div class="container">
    <a href="/tani/create" class="btn btn-primary mb-3">Tambah Data</a>
    
    
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
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Kegunaan</th>
                    <th>Jenis</th>
                    <th>Kelamin</th>
                    <th>Ditanam</th>
                    <th>Umur</th>
                    <th>Dipanen</th>
                    <th>Hasil</th>
                    <th>User</th>   
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach($tanis as $tani)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td class="text-center">{{ $tani->id }}</td>
                    <td>{{ $tani->name }}</td>
                    <td>{{ $tani->tanaman }}</td>
                    <td>{{ $tani->jenis }}</td>
                    <td>{{ $tani->kelamin }}</td>
                    <td>{{ $tani->ditanam }}</td>
                    <td>{{ $tani->umur }} hari</td>
                    <td>{{ $tani->dipanen }}</td>
                    <td>{!! $tani->hasil !!}</td>
                    <td>{{ $tani->user }}</td>
                    <td>
                        <a href="{{ route('tani.edit', $tani->id) }}" class="btn btn-warning btn-sm text-white">Edit</a>
                        <form method="POST" action="{{ route('tani.destroy', $tani->id )}}">
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
            {{ $tanis->links() }}
        </div>
    </div>
</div>
@endsection

<script>
   function printPage() {
      window.print();
   }
</script>