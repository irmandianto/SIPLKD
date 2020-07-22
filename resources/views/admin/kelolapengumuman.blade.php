@extends('layout.main')
@section('konten')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Kelola Pengumuman</a></li>
  </ol>
  <section class="content-header">
    <h1>
      Kelola Pengumuman
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
          <a href="{{ route('pengumumans.create')}}" class="btn btn-primary">Tambah Pengumuman</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Judul Pengumuman</th>
                <th>Isi Pengumuman</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>@php($no = 1)
              @foreach($pengumuman as $pengumumans)
              <tr>
                <td>{{$no++}}</td>
                <td>{{$pengumumans->judul}}</td>
                <td>{{$pengumumans->isi_pengumuman}}</td>
                <td>
                  <form action="{{ route('pengumumans.destroy',$pengumumans->id)}}" method="POST">
                    <a href="{{ route('pengumumans.edit',$pengumumans->id)}}" type="button" class="btn btn-primary">Edit</a>
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