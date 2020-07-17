@extends('layout.main')
@section('konten')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <ol class="breadcrumb">
    <li><a href="/kartukajian"><i class="fa fa-dashboard"></i> Kartu Kajian Peserta</a></li>
    <li class="active">Tambah Jadwal Kajian</li>
  </ol>
  <section class="content-header">
    <h1>
      Kartu Peserta
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
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
        <div class="box-header">
          <h5>Pilih jadwal kajian</h5>
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
                <th>Foto</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>@php($no = 1)
              @foreach($jadwal as $dtseksi)
              <tr>


                <td>{{$no++}}</td>
                <td>{{$dtseksi->seksi_kajian_dhuha}}<br>
                  <h6>Instruktur : {{$dtseksi->tutors['nama_lengkap_user']}}</h6></td>
                  <td>{{$dtseksi->jadwals['hari_kajian']}}, 
                    {{ \Carbon\Carbon::parse($dtseksi->jadwals['jam_kajian'])->format('H:i')}}
                    -    {{ \Carbon\Carbon::parse($dtseksi->jadwals['akhir-kajian'])->format('H:i')}}</td>
                    <td>{{$dtseksi->kapasitas}} </td>
                    <td>
                      @if(empty($dtseksi->tutors['foto_user']))
                      <img src="{{Storage::url('none.png')}}" width="30" height="30" class="img-circle" alt="User Image" class="img-circle">
                      @else
                      <img src="{{ Storage::url('foto/'.$dtseksi->tutors['foto_user']) }}" width="30" height="30" class="img-circle" alt="User Image">
                      @endif
                    </td>
                    <td>
                      @php(                          
                      $cek = DB::table('pesertakajiandhuhas')    
                      ->select('id_seksi_kajian_dhuha')               
                      ->where('id_seksi_kajian_dhuha', '=', "$dtseksi->id_seksi_kajian_dhuha")
                      ->count()
                      )
                      @if($dtseksi->kapasitas > $cek)
                      <form action="{{route('kartukajian.store')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id_seksi_kajian_dhuha" value="{{$dtseksi->id_seksi_kajian_dhuha}}">
                        <button class="btn btn-primary btn-sm" type="submit">Ambil</button>
                      </form>
                      @elseif($dtseksi->kapasitas <= $cek)
                      <span class="bg-red" style="padding: 5px">Penuh!</span>
                      @endif
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