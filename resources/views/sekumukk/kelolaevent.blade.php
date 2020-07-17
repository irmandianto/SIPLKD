@extends('layout.main')
@section('konten')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <ol class="breadcrumb">
    <li><a href="/event"><i class="fa fa-dashboard"></i> Kelola Data Event</a></li>
  </ol>
  <section class="content-header">
    <!--     <small>Tambah Bahan Materi Kajian Dhuha</small> -->
    <h1>
      Event HomePage
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
          <a href="{{ route('event.create')}}" class="btn btn-primary">Tambah Event</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Event</th>
                <th>Deskripsi Event</th>
                <th>Foto Event</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>@php($no = 1)
              @foreach($event as $events)
              <tr>
                <td>{{$no++}}</td>
                <td>{{$events->nama_event}}</td>
                <td>{{$events->deskripsi_event}}</td>
                <td><img src="{{Storage::url('event/'.$events->foto_event)}}" width="150" height="150" class="rounded" alt="Foto Belum Di Upload"></td>
                <td>
                  <form action="{{ route('event.destroy',$events->id)}}" method="POST">
                    <a href="{{ route('event.edit',$events->id)}}" type="button" class="btn btn-primary">Edit</a>
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
