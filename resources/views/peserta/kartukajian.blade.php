@extends('layout.main')
@section('konten')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <ol class="breadcrumb">
    <li><a href="/kartukajian"><i class="fa fa-dashboard"></i> Kartu Kajian Peserta</a></li>
  </ol>
  <section class="content-header">
    <h1>
      Kartu Kajian Peserta
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
          <a href="{{ route('kartukajian.create')}}" class="btn btn-primary btn-sm">Tambah Kartu Kajian</a>  
          <a href="/cetakkartu" class="btn btn-success btn-sm" target="_blank">Cetak Kartu</a>
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
                <th>Foto Instruktur</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>@php($no = 1)
              @foreach($kartu as $kartus)
              <tr>
                <td>{{$no++}}</td>
                <td>{{$kartus->seksi_kajian_dhuha}}<br>
                  <h6>Instruktur : {{$kartus->nama_lengkap_user}}</h6></td>
                  <td>{{$kartus->hari_kajian}}, 
                    {{ \Carbon\Carbon::parse($kartus->jam_kajian)->format('H:i')}}
                    -    {{ \Carbon\Carbon::parse($kartus->akhir_kajian)->format('H:i')}}</td>
                    <td> {{$kartus->kapasitas}} </td>
                    <td>
                      @if(empty($kartus->foto_user))
                      <img src="{{Storage::url('none.png')}}" width="50" height="50" class="img-circle" alt="User Image" class="img-circle">
                      @else
                      <img src="{{ Storage::url('foto/'.$kartus->foto_user) }}" width="50" height="50" class="img-circle" alt="User Image">
                      @endif
                    </td>
                    <td>
                      <form action="{{ route('kartukajian.destroy',$kartus->id_pesertakajian)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                      </form>
                    </td>
                  </tr>
                </tbody>
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