@extends('layout.main')
@section('konten')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Cari Data Evaluasi Ibadah Kajian Dhuha</li>
  </ol>
  <section class="content-header">

    <small>Yuk Muhasabah Diri</small>
    <h1>
      Evaluasi Ibadah Kajian Dhuha
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
          <div class="row">
            <form action="{{url('/evaluasi/cari')}}" method="GET">
              <div class="col-sm-3">
               <div class="form-group">
                <select class="form-control" name="tahun">
                  <option value="" selected="yes">Pilih tahun</option>
                  {{  $thn_skr = date('Y') }}
                  @php
                  for ($x = $thn_skr; $x >= 2007; $x--) {               
                  @endphp
                  <option value="{{$x}}">{{$x}}</option>
                  @php
                }
                @endphp
              </select>
            </div>
          </div>
          <div class="col-sm-3">
           <div class="form-group">
            <select class="form-control" name="bulan">
              <option value="" selected="yes">Pilih Bulan</option>
              <option value="01">Januari</option>
              <option value="02">Februari</option>
              <option value="03">Maret</option>
              <option value="04">April</option>
              <option value="05">Mei</option>
              <option value="06">Juni</option>
              <option value="07">Juli</option>
              <option value="08">Agustus</option>
              <option value="09">Septemmber</option>
              <option value="10">Oktober</option>
              <option value="11">November</option>
              <option value="12">Desember</option>
            </select>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Tampilkan</button>
      </form>
    </div>
    <div class="row">
      <div class="col-sm-3">
        <a href="{{ route('evaluasi.create')}}" class="btn-sm btn-success">Cetak</a>
        <a href="{{ route('evaluasi.create')}}" class="btn-sm btn-warning">Isi Evaluasi Ibadah</a>
      </div>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <!-- Main row -->
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Tanggal Evaluasi</th>
          <th>Sholat Berjamaah</th>
          <th>Tilawah Qur'an</th>
          <th>Sholat Dhuha</th>
          <th>Qiyamul Lail</th>
        </tr>
      </thead>
      <tbody>@php($no = 1)
        @foreach($cari as $caris)
        <tr>
          <td>{{$no++}}</td>
          <td>{{$caris->tgl_evaluasi}}</td>
          <td>{{$caris->shalat_berjamaah}} Kali</td>
          <td>{{$caris->tilawah_quran}} Halaman</td>
          <td>{{$caris->shalat_dhuha}} Rakaat</td>
          <td>{{$caris->qiyamul_lail}} Rakaat</td>
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