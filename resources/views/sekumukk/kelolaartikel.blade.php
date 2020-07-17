@extends('layout.main')
@section('konten')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <ol class="breadcrumb">
    <li><a href="/event"><i class="fa fa-dashboard"></i> Kelola Data Artikel</a></li>
  </ol>
  <section class="content-header">
    <!--     <small>Tambah Bahan Materi Kajian Dhuha</small> -->
    <h1>
      Artikel HomePage
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
          <a href="{{ route('artikel.create')}}" class="btn btn-primary">Tambah Artikel</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Tanggal Artikel</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>@php($no = 1)
              @foreach($artikel as $artikels)
              <tr>
                <td>{{$no++}}</td>
                <td>{{$artikels->judul}}</td>
                <td>{{$artikels->tgl_artikel}}</td>
                <td>
                  <form action="{{ route('artikel.destroy',$artikels->id)}}" method="POST">
                    <a href="{{ route('artikel.edit',$artikels->id)}}" type="button" class="btn btn-primary">Edit</a>
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
