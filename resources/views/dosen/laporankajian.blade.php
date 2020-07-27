@extends('layout.main')
@section('konten')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <ol class="breadcrumb">
    <li><a href="/laporan"><i class="fa fa-dashboard"></i> Laporan Kajian Dhuha</a></li>
  </ol>
  <section class="content-header">
    <h1>
     Laporan Kajian Dhuha
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
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Laporan</th>
                <th>File</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>@php($no = 1)
              @foreach($data as $datas)
              <tr>
                <td>{{$no++}}</td>
                <td>{{$datas->judul_laporan}}</td>
                <td>{{$datas->file_laporan}}</td>
                <td>
                  <a href="" type="button" class="btn btn-primary">Download</a>
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