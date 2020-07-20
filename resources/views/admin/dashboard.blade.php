@extends('layout.main')
@section('konten')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
  </ol>
  <section class="content-header">
    <h1>
      Dashboard
    </h1>

  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
     <div class="callout callout-info">
      <h1>Halo selamat datang,{{ session('username')}}!</h1>

      <p>Semoga hari mu menyenangkan :).</p>
    </div>
  </div>  
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
