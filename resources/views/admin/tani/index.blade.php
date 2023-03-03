@extends('layouts.admin')

@section('title', 'Data Tani')

@section('content')
<div class="container">
    
    @if($message = Session::get('message'))
        <div class="alert alert-success">
            <strong>Berhasil</strong>
            <p>{{ $message }}</p>
        </div>
    @endif

    <input type="button" value="Cetak" onclick="printPage()" class="btn btn-primary mb-3"/>

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
                        <form method="POST" action="{{ route('alltani.destroy', $tani->id )}}">
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
            <div class="d-flex">
            {{ $tanis->links() }}
        </div>
        </table>
    </div>
</div>
@endsection

<script>
   function printPage() {
      window.print();
   }
</script>