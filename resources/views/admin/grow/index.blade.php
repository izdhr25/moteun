@extends('layouts.admin')

@section('title', 'Data Perkembangan Hewan')

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
                    <th>ID Betina</th>
                    <th>ID Jantan</th>
                    <th>Mulai</th>
                    <th>Akhir</th>
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
                @foreach($grows as $grow)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td class="text-center">{{ $grow->id_betina }}</td>
                    <td class="text-center">{{ $grow->id_jantan }}</td>
                    <td>{{ $grow->mulai }}</td>
                    <td>{{ $grow->akhir }}</td>
                    <td>{!! $grow->keterangan !!}</td>
                    <td>{{ $grow->hasil }}</td>
                    <td>{{ $grow->status }}</td>
                    <td>{!! $grow->sebab !!}</td>
                    <td>{{ $grow->user }}</td>
                    <td>
                        <form method="POST" action="{{ route('allgrow.destroy', $grow->id )}}">
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
            {{ $grows->links() }}
        </div>
    </div>
</div>
@endsection

<script>
   function printPage() {
      window.print();
   }
</script>