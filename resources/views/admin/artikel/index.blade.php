@extends('layouts.admin')

@section('title', 'Data Artikel')

@section('content')
<div class="container">
    <a href="/allartikel/create" class="btn btn-primary mb-3">Tambah Data</a>
    

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
                    <th>Judul</th>
                    <th>Tgl Tulis</th>
                    <th>Penulis</th>
                    <th>Deskripsi</th>
                    <th class="text-center">Gambar</th>
                    <th>User</th>   
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach($artikels as $artikel)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $artikel->judul }}</td>
                    <td>{{ $artikel->tgl_tulis }}</td>
                    <td>{{ $artikel->penulis }}</td>
                    <td>{!! Str::limit($artikel->deskripsi, 50, '...') !!}</td>
                    <td><center><img src="assets/img/artikel/{{ $artikel->image }}" width="50%"></center></td>
                    <td>{{ $artikel->user }}</td>
                    <td>
                        <a href="{{ route('allartikel.edit', $artikel->id) }}" class="btn btn-warning btn-sm text-white">Edit</a>

                        <form method="POST" action="{{ route('allartikel.destroy', $artikel->id )}}">
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
            {{ $artikels->links() }}
        </div>
    </div>
</div>
@endsection

<script>
   function printPage() {
      window.print();
   }
</script>