@extends('layout.main')
@section('konten')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Pendaftar Peserta Agenda</a></li>
  </ol>
  <section class="content-header">
    <h1>
      Laporan Pendaftar Peserta Agenda
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
          <a href="/pendaftar/cetak" target="_blank" class="btn btn-success">Cetak</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Foto Peserta</th>
                <th>Nama Lengkap</th>
                <th>Jenis Kelamin</th>
                <th>Email</th>
                <th>Kontak</th>
                <th>Seksi Kajian Dhuha</th>
                <th>Foto Instruktur</th>
                <th>Nama Instruktur</th>
                <th>Hari Kajian</th>
                <th>Jam Kajian</th>
                <th>Selesai Kajian</th>
              </tr>
            </thead>
            <tbody>@php($no = 1)
              @foreach($agenda as $agendas)
              <tr>
                <td>{{$no++}}</td>
                <td>{{$agendas->nim}}</td>
                <td>
                   @if(empty($agendas->foto))
                    <img src="{{Storage::url('none.png')}}" width="30" height="30" class="img-circle" alt="User Image" class="img-circle">
                    @else
                    <img src="{{ Storage::url('foto/'.$agendas->foto) }}" width="30" height="30"  class="img-circle" alt="User Image">
                    @endif
                </td>
                <td>{{$agendas->nama_lengkap}}</td>
                <td>{{$agendas->jk}}</td>
                <td>{{$agendas->email}}</td>
                <td>{{$agendas->kontak}}</td>
                <td>{{$agendas->seksi_kajian_dhuha}}</td>
                <td>
                  @if(empty($agendas->foto))
                    <img src="{{Storage::url('none.png')}}" width="30" height="30" class="img-circle" alt="User Image" class="img-circle">
                    @else
                    <img src="{{ Storage::url('foto/'.$agendas->foto_user) }}" width="30" height="30"  class="img-circle" alt="User Image">
                    @endif
                </td>
                <td>{{$agendas->nama_lengkap_user}}</td>
                <td>{{$agendas->hari_kajian}}</td>
                <td>{{$agendas->jam_kajian}}</td>
                <td>{{$agendas->akhir_kajian}}</td>
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