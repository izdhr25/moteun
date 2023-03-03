@extends('layouts.admin')

@section('title', 'Data Akun User')

@section('content')
<div class="container">

    <div class="alert alert-info d-flex align-items-center" role="alert">
      <i class="fa-solid fa-circle-exclamation mr-3"></i>
      <div>
        Role ID = 1 (Admin)
        <br>
        Role ID = 2 (User)
      </div>
    </div>

    <input type="button" value="Cetak" onclick="printPage()" class="btn btn-primary my-3"/>

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
                    <th class="text-center">Gambar</th>
                    <th class="text-center">ID</th>
                    <th class="text-center">Jenis Kelamin</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Password</th>
                    <th class="text-center">Telepon</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">Role ID</th>  
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach($akunusers as $akunuser)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td class="text-center"><img src="/assets/img/userprofile/{{ $akunuser->image }}" width="70%"></td>
                    <td class="text-center">{{ $akunuser->id }}</td>
                    <td class="text-center">{{ $akunuser->jk }}</td>
                    <td>{{ $akunuser->name }}</td>
                    <td class="text-center">{{ $akunuser->email }}</td>
                    <td class="text-center">{{  Str::limit($akunuser->password, 10, '...') }}</td>
                    <td class="text-center">{{ $akunuser->no_telp }}</td>
                    <td>{{ $akunuser->alamat }}</td>
                    <td>{{ $akunuser->role_id }}</td>
                    <td>
                        <form method="POST" action="{{ route('akunuser.destroy', $akunuser->id )}}">
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
            {{ $akunusers->links() }}
        </div>
    </div>
</div>
@endsection

<script>
   function printPage() {
      window.print();
   }
</script>