@extends('layout.main')
@section('konten')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  @if(session('level') == "Admin")
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Kelola Kode Seksi Peserta</a></li>
  </ol>
  <section class="content-header">
    <h1>
      Kelola Kode Seksi Peserta
      <small>Control panel</small>
    </h1>

  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="box">
        @if (session('success'))
        <div class="alert alert-info alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-warning"></i> Alert!</h4>
          {{ session('success') }}
        </div>
        @endif
        <div class="box-header">
          <a href="{{ route('kodeseksi.create')}}" class="btn btn-primary">Tambah Kode Seksi Peserta</a>
        </div>
      @else
        <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Laporan Kode Seksi</a></li>

  </ol>
  <section class="content-header">
    <h1>
      Laporan Kode Seksi
      <small>Control panel</small>
    </h1>

  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="box">
        <div class="box-header">
          <a href="/laporankodeseksi" target="_blank" class="btn btn-primary">Cetak Kode Seksi Peserta</a>
        </div>
        @endif

        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode Seksi Peserta</th>
                @if(session('level') == "Admin")
                <th>Action</th>
                @endif
              </tr>
            </thead>
            <tbody>@php($no = 1)
              @foreach($kodeseksi as $kodes)
              <tr>
                <td>{{$no++}}</td>
                <td>{{$kodes->kode_seksi_peserta}}</td>
                @if(session('level') == "Admin")
                <td>
                  <form action="{{ route('kodeseksi.destroy',$kodes->id)}}" method="POST">
                    <a href="{{ route('kodeseksi.edit',$kodes->id)}}" type="button" class="btn btn-primary">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                  </form>
                </td>
                @endif
              </tr>
              @endforeach
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->  


      </div>  
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection