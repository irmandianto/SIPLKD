@extends('layout.main')
@section('konten')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <ol class="breadcrumb">
    <li><a href="/entrinilai"><i class="fa fa-dashboard"></i>Entri Nilai Kajian Dhuha</a></li>
    <li><a href="#"></i>List Entri Nilai</a></li>
  </ol>
  <section class="content-header">
    <h1>
      Data Nilai Peserta Kajian
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
                <th>NIM</th>
                <th>Foto Peserta</th>
                <th>Nama Lengkap</th>
                <th>Jenis Kelamin</th>
                <th>Nilai Peserta</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>@php($no = 1)
              @foreach($nilai as $nilais)
              <tr>
                <td>{{$no++}}</td>
                <td>{{$nilais->datapesertakajian->datapeserta['nim']}}</td>
                <td>
                 @if(empty($nilais->datapesertakajian->datapeserta['foto']))
                 <img src="{{Storage::url('none.png')}}" width="30" height="30" class="img-circle" alt="User Image" class="img-circle">
                 @else
                 <img src="{{ Storage::url('foto/'.$nilais->datapesertakajian->datapeserta['foto']) }}" width="30" height="30"  class="img-circle" alt="User Image">
                 @endif
               </td>
               <td>{{$nilais->datapesertakajian->datapeserta['nama_lengkap']}}</td>
               <td>{{$nilais->datapesertakajian->datapeserta['jk']}}</td>
               <td>Nilai Keaktifan : {{$nilais->datapesertakajian->datanilai['nilai_keaktifan']}}<br>
                 Nilai Kehadiran : {{$nilais->datapesertakajian->datanilai['nilai_kehadiran']}}<br>
                 Nilai Praktik Ibadah : {{$nilais->datapesertakajian->datanilai['praktik_ibadah']}}<br>
                 Nilai Ujian : {{$nilais->datapesertakajian->datanilai['nilai_ujian']}} 
               </td>
               <td>
                <form action="/entrinilai/list/{{$nilais->id_nilai}}" method="POST">
                  <a href="/entrinilai/list/{{$nilais->id_nilai}}/edit" type="button" class="btn btn-primary">Edit</a>
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