@extends('layout.main')
@section('konten')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <ol class="breadcrumb">
    <li><a href="/seksikajian"><i class="fa fa-dashboard"></i> Kelola Seksi Kajian</a></li>
  </ol>
  <section class="content-header">
    <h1>
      Kelola Seksi Kajian
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
        @if (session('error'))
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-warning"></i> Alert!</h4>
          {{ session('error') }}
        </div>
        @endif
        <div class="box-header">
          <a href="{{ route('seksikajian.create')}}" class="btn btn-primary">Tambah  Seksi Kajian</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Seksi Kajian Dhuha</th>
                <th>Jadwal</th>
                <th>Kapasitas</th>
                <th>Nama Instruktur</th>
                <th>Foto</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>@php($no = 1)
              @foreach($jadwal as $dtseksi)
              <tr>


                <td>{{$no++}}</td>
                <td>{{$dtseksi->seksi_kajian_dhuha}}</td>
                <td>{{$dtseksi->jadwals['hari_kajian']}}, 
                  {{ \Carbon\Carbon::parse($dtseksi->jadwals['jam_kajian'])->format('H:i')}}
                  -    {{ \Carbon\Carbon::parse($dtseksi->jadwals['akhir-kajian'])->format('H:i')}}</td>
                  <td> {{$dtseksi->kapasitas}} </td>
                  <td>{{$dtseksi->tutors['nama_lengkap_user']}}</td>
                  <td>
                    @if(empty($dtseksi->tutors['foto_user']))
                    <img src="{{Storage::url('none.png')}}" width="30" height="30" class="img-circle" alt="User Image" class="img-circle">
                    @else
                    <img src="{{ Storage::url('foto/'.$dtseksi->tutors['foto_user']) }}" width="30" height="30"  class="img-circle" alt="User Image">
                    @endif
                  </td>
                  <td>
                    <form action="{{ route('seksikajian.destroy',$dtseksi->id_seksi_kajian_dhuha)}}" method="POST">
                      <a href="{{ route('seksikajian.edit',$dtseksi->id_seksi_kajian_dhuha)}}" type="button" class="btn btn-primary btn-sm">Edit</a>
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                  </td>
                </tr>
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