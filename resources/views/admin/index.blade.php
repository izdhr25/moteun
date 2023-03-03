@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-lg-4 mx-auto">
          <div class="info-box">
            <span class="info-box-icon bg-success elevation-2"><i class="fa-solid fa-seedling"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Tani</span>
              <span class="info-box-number">
                {{ $jumlahtani }}
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-lg-4 mx-auto">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-primary elevation-2"><i class="fa-solid fa-cow"></i></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Ternak</span>
              <span class="info-box-number">{{ $jumlahternak }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-lg-4 mx-auto">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-red elevation-2"><i class="fa-solid fa-bell"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pemberitahuan</span>
              <span class="info-box-number">{{ $jumlahalert }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-lg-4 mx-auto">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-purple elevation-2"><i class="fa-solid fa-temperature-arrow-up"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Kondisi</span>
              <span class="info-box-number">{{ $jumlahkondisi }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!--/. container-fluid -->

    <div class="container-fluid mt-3 mb-5">
      @if(!empty($notification))
        @foreach($notification as $notifications)
        <div class="alert alert-success alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Pemberitahuan!</strong> User {{ $notifications->user }} yang memiliki {{ $notifications->name }} dengan id {{ $notifications->name_id }} berjenis {{ $notifications->jenis }} dan berkelamin {{ $notifications->kelamin }} telah siap dikembangbiakan.
      </div>
        @endforeach
      <div class="d-flex">
          {{ $notification->links() }}
      </div>
      @endif
    </div>
@endsection