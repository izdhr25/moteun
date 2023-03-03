@extends('layouts.master')

@section('title', 'Data Pemberitahuan')

@section('content')
<div class="container">
    <a href="/alert/create" class="btn btn-primary mb-3">Tambah Data</a>
    
    
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
                    <th>Nama Hewan/Tanaman</th>
                    <th>ID</th>
                    <th>Jenis</th>
                    <th>Status</th>
                    <th>Umur Siap</th>
                    <th>Umur</th>
                    <th>Lahir/Ditanam</th>
                    <th>Keterangan</th>
                    <th>User</th>  
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach($alerts as $alert)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $alert->name }}</td>
                    <td class="text-center">{{ $alert->name_id }}</td>
                    <td>{{ $alert->jenis }}</td>
                    <td>{{ $alert->status }}</td>
                    <td class="text-center">{{ $alert->umur_siap }} hari</td>
                    <td class="text-center">{{ $alert->umur }} hari</td>
                    <td class="text-center">{{ $alert->lahir_ditanam }}</td>
                    <td>{!! Str::limit($alert->keterangan, 200, '...') !!}</td>
                    <td>{{ $alert->user }}</td>
                    <td>
                        <a href="{{ route('alert.edit', $alert->id) }}" class="btn btn-warning btn-sm text-white">Edit</a>
                        <form method="POST" action="{{ route('alert.destroy', $alert->id )}}">
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
            {{ $alerts->links() }}
        </div>
    </div>
</div>
@endsection

<script>
   function printPage() {
      window.print();
   }
</script>