@extends('layouts.admin')

@section('title', 'Data Jenis Tani')

@section('content')
<div class="container">
    <a href="/jenistani/create" class="btn btn-primary mb-3">Tambah Data</a>
    

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
                    <th width="20">No</th>
                    <th class="text-center">Nama Jenis</th>
                    <th class="text-center" width="20">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @php
                    $i = 1;
                @endphp

                @foreach($jenistanis as $jenistani)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $jenistani->name }} </td>
                    <td>
                        <form method="POST" action="{{ route('jenistani.destroy', $jenistani->id )}}">
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
            {{ $jenistanis->links() }}
        </div>
    </div>
</div>
@endsection

<script>
   function printPage() {
      window.print();
   }
</script>