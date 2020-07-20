@extends('layout.main')
@section('konten')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Pendaftaran Instruktur</a></li>
  </ol>
  <section class="content-header">
    <h1>
      Pendaftaran Instruktur
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
          <a href="{{ route('datainstruktur.create')}}" class="btn btn-primary">Tambah Instruktur</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Username</th>
                <th>Email</th>
                <th>Kontak</th>
              </tr>
            </thead>
            <tbody>@php($no = 1)
              @foreach($dataUser as $users)
              <tr>
                <td>{{$no++}}</td>
                <td>{{$users->nama_lengkap_user}}</td>
                <td>{{$users->username}}</td>
                <td>{{$users->email_user}}</td>
                <td>{{$users->kontak_user}}</td>
                <td>
                  <form action="{{ route('datainstruktur.destroy',$users->id)}}" method="POST">
                    <a href="{{ route('datainstruktur.edit',$users->id)}}" type="button" class="btn btn-primary">Edit</a>
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