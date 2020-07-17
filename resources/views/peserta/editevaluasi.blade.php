@extends('layout.main')
@section('konten')
<!-- Main content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Evaluasi Ibadah</a></li>
    <li class="active">Tambah Evaluasi Ibadah</li>
  </ol>
  <section class="content-header">
    <small>Yuk Muhasabah Diri</small>
    <h1>
      Entri Evaluasi Ibadah
    </h1>

  </section>
  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
          <div class="box-header with-border">
            <h3 class="box-title">Tambah Evaluasi</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" action="{{route('evaluasi.update',$editevaluasi->id_evaluasi)}}" method="POST">
            @method('PATCH')
            @csrf
            <div class="box-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Tanggal</label>
                <input type="date" name="tgl_evaluasi" class="form-control" id="exampleInputText1" placeholder="Tanggal Evaluasi" value="{{$editevaluasi->tgl_evaluasi}}">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Sholat Berjamaah (Kali)</label>
                <input type="number" name="shalat_berjamaah" class="form-control" placeholder="0" value="{{$editevaluasi->shalat_berjamaah}}">
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Tilawah Qur'an (Halaman)</label>
                <input type="number" name="tilawah_quran" class="form-control" placeholder="0" value="{{$editevaluasi->tilawah_quran}}">
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Sholat Dhuha (Rakaat)</label>
                <input type="number" name="shalat_dhuha" class="form-control" placeholder="0" value="{{$editevaluasi->shalat_dhuha}}">
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Qiyamul Lail (Rakaat)</label>
                <input type="number" name="qiyamul_lail" class="form-control" placeholder="0" value="{{$editevaluasi->qiyamul_lail}}">
              </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Simpan</button> <a href="/peserta/evaluasi" class="btn btn-warning">Kembali</a>
            </div>
          </form>
        </div>
        <!-- /.box -->
      </div>
    </div>
  </section>

</div>

@endsection