@extends('layout.main')
@section('konten')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Bahan Materi Kajian Dhuha </a></li>
  </ol>
  <section class="content-header">
    <!--     <small>Tambah Bahan Materi Kajian Dhuha</small> -->
    <h1>
      Bahan Materi Kajian Dhuha
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
        @if(session('level') == "Dosen")
        <div class="box-header">
          <a href="{{ route('materi.create')}}" class="btn btn-primary">Tambah Materi</a>
        </div>
        @endif
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Judul Bahan</th>
                <th>File</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>@php($no = 1)
              @foreach($bahan as $bahans)
              <tr>
                <td>{{$no++}}</td>
                <td>{{$bahans->judul_materi}}</td>
                <td>{{$bahans->file}}</td>
                <td>
                  @if(session('level') == "Dosen")
                  <form action="{{ route('materi.destroy',$bahans->id)}}" method="POST">
                    <a href="{{ route('materi.edit',$bahans->id)}}" type="button" class="btn btn-primary">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                  </form>
                  @else
                  <a href="{{ Storage::url('public/bahanmateri/'.$bahans->file)}}" type="button" class="btn btn-primary">Download</a>
                  @endif

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
