@extends('layout.main')
@section('konten')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <ol class="breadcrumb">
    <li><a href="/jadwal"><i class="fa fa-dashboard"></i> Kelola Jadwal</a></li>
  </ol>
  <section class="content-header">
    <h1>
      Kelola Jadwal
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
          <a href="{{ route('jadwal.create')}}" class="btn btn-primary">Tambah Jadwal</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Hari Kajian</th>
                <th>Jam Kajian</th>
                <th>Akhir Kajian</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>@php($no = 1)
              @foreach($getKajian as $kajians)
              <tr>
                <td>{{$no++}}</td>
                <td>{{$kajians->hari_kajian}}</td>
                <td>{{$kajians->jam_kajian}}</td>
                <td>{{$kajians->akhir_kajian}}</td>
                <td>
                  <form action="{{ route('jadwal.destroy',$kajians->id_jadwal)}}" method="POST">
                    <a href="{{ route('jadwal.edit',$kajians->id_jadwal)}}" type="button" class="btn btn-primary">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                  </form>
                </td>
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