@extends('layout.main')
@section('konten')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Evaluasi Ibadah Kajian Dhuha</li>
  </ol>
  <section class="content-header">

    <small>Yuk Muhasabah Diri</small>
    <h1>
      Data Evaluasi Ibadah Peserta 
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
        @elseif (session('error'))
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-danger"></i> Alert!</h4>
          {{ session('error') }}
        </div>
        @endif
        <!-- /.box-header -->
        <div class="box-body">
          <!-- /.row (main row) -->
          <!-- /.row -->
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Foto Peserta</th>
                <th>Datatd Peserta</th>
                <th>Tanggal Evaluasi</th>
                <th>Sholat Berjamaah</th>
                <th>Tilawah Qur'an</th>
                <th>Sholat Dhuha</th>
                <th>Qiyamul Lail</th>
              </tr>
            </thead>
            
            <tbody>@php($no = 1)
              @foreach($data as $datas)
              <tr>
                <td>{{$no++}}</td>
                <td>
                  @if(empty($datas->foto))
                  <img src="{{Storage::url('none.png')}}" width="50" height="50" class="img-circle" alt="User Image" class="img-circle">
                  @else
                  <img src="{{ Storage::url('foto/'.$datas->foto) }}" width="50" height="50" class="img-circle" alt="User Image">
                  @endif
                </td>
                <td>
                  Nama : {{$datas->nama_lengkap}}<br>
                  NIM : {{$datas->nim}}<br>
                  Dosen PAI : {{$datas->dosenpai}}<br>
                  Jenis Kelamin : {{$datas->jk}}
                </td>
                <td>
                  @foreach($datas->evaluasis as $t)
                  {{$t->tgl_evaluasi}}<br>
                  @endforeach
                </td>
                <td>
                  @foreach($datas->evaluasis as $t)
                  {{$t->shalat_berjamaah}}<br>
                  @endforeach
                </td>
                <td>
                  @foreach($datas->evaluasis as $t)
                  {{$t->tilawah_quran}}<br>
                  @endforeach
                </td>
                <td>
                  @foreach($datas->evaluasis as $t)
                  {{$t->shalat_dhuha}}<br>
                  @endforeach
                </td>
                <td>
                  @foreach($datas->evaluasis as $t)
                  {{$t->qiyamul_lail}}<br>
                  @endforeach
                </td>

              </tr>
              @endforeach
            </tbody>
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