@extends('layouts.admin')

@section('title', 'Data Perkembangan Tanaman')

@section('content')
<div class="container">

    
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
                    <th>ID Tanaman</th>
                    <th>ID Pasangan</th>
                    <th>Mulai</th>
                    <th>AKhir</th>
                    <th>Keterangan</th>
                    <th>Hasil</th>
                    <th>Status</th>
                    <th>Sebab</th>
                    <th>User</th>   
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach($metodes as $metode)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td class="text-center">{{ $metode->id_tanaman }}</td>
                    <td class="text-center">{{ $metode->id_pasangan }}</td>
                    <td>{{ $metode->mulai }}</td>
                    <td>{{ $metode->akhir }}</td>
                    <td>{!! $metode->keterangan !!}</td>
                    <td>{{ $metode->hasil }}</td>
                    <td>{{ $metode->status }}</td>
                    <td>{!! $metode->sebab !!}</td>
                    <td>{{ $metode->user }}</td>
                    <td>
                    
                        <form method="POST" action="{{ route('allmetode.destroy', $metode->id )}}">
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
            {{ $metodes->links() }}
        </div>
    </div>
</div>
@endsection

<script>
   function printPage() {
      window.print();
   }
</script>