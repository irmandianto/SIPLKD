@extends('layout.main')
@section('konten')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <ol class="breadcrumb">
    <li><a href="mhsterdaftar"><i class="fa fa-dashboard"></i>Kelola Mahasiswa Terdaftar</a> </li>
  </ol>
  <section class="content-header">
    <h1>
      Data Mahasiswa Terdaftar
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
                <th>TTL</th>
                <th>Alamat</th>
                <th>Progam Studi</th>
                <th>Dosen PAI</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>@php($no = 1)
              @foreach($pengguna as $penggunas)
              <tr>
                <td>{{$no++}}</td>
                <td>{{$penggunas->nim}}</td>  
                <td>
                 @if(empty($penggunas->foto))
                 <img src="{{Storage::url('none.png')}}" width="30" height="30" class="img-circle" alt="User Image" class="img-circle">
                 @else
                 <img src="{{ Storage::url('foto/'.$penggunas->foto) }}" width="30" height="30"  class="img-circle" alt="User Image">
                 @endif
               </td>
               <td>{{$penggunas->nama_lengkap}}</td>
               <td>{{$penggunas->jk}}</td>
               <td>{{$penggunas->email}}</td>
               <td>{{$penggunas->kontak}}</td>
               <td>{{$penggunas->tempat_lahir}}, {{$penggunas->tgl_lahir}}</td>
               <td>{{$penggunas->alamat}}</td>
               <td>{{$penggunas->progamstudi}}</td>
               <td>{{$penggunas->dosenpai}}</td>
               <td>
                  <form action="/mhsterdaftar/{{$penggunas->id_peserta}}" method="GET">
                    <a href="/mhsterdaftar/{{$penggunas->id_peserta}}/edit" type="button" class="btn btn-primary">Edit</a>
                    @csrf
                    <button type="submit" class="btn btn-danger">Hapus</button>
                  </form>
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