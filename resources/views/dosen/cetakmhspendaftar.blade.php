<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Cetak Pendaftar Agenda</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="/../admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/../admin/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/../admin/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/../admin/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
   folder instead of downloading all of them to reduce the load. -->
   <link rel="stylesheet" href="/../admin/dist/css/skins/_all-skins.min.css">
   <!-- Morris chart -->
   <link rel="stylesheet" href="/../admin/bower_components/morris.js/morris.css">
   <!-- jvectormap -->
   <link rel="stylesheet" href="/../admin/bower_components/jvectormap/jquery-jvectormap.css">
   <!-- Date Picker -->
   <link rel="stylesheet" href="/../admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
   <!-- Daterange picker -->
   <link rel="stylesheet" href="/../admin/bower_components/bootstrap-daterangepicker/daterangepicker.css">
   <!-- bootstrap wysihtml5 - text editor -->
   <link rel="stylesheet" href="/../admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

   

   <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400,700,300italic,400italic,400italic">
</head>
<!-- Main content -->
<div class="col-xs-12">
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-globe"></i> Laporan Pendaftar Agenda
          <small class="pull-right"><b>DateTime</b> : {{ now()->toDateTimeString() }}</small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
     <!-- Table row -->
     <div class="row text-center">
      <div class="col-xs-12 table-responsive">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>NIM</th>
              <th>Foto Peserta</th>
              <th>Nama Lengkap</th>
              <th>Jenis Kelamin</th>
              <th>Foto Instruktur</th>
              <th>Nama Instruktur</th>
              <th>Seksi Kajian Dhuha</th>
              <th>Jadwal Kajian</th>
            </tr>
          </thead>
          <tbody>@php($no = 1)
            @foreach($agenda as $agendas)
            <tr>
              <td>{{$no++}}</td>
              <td>{{$agendas->nim}}</td>
              <td>
               @if(empty($agendas->foto))
               <img src="{{Storage::url('none.png')}}" width="40" height="40" class="img-circle" alt="User Image" class="img-circle">
               @else
               <img src="{{ Storage::url('foto/'.$agendas->foto) }}" width="40" height="40"  class="img-circle" alt="User Image">
               @endif
             </td>
             <td>{{$agendas->nama_lengkap}}</td>
             <td>{{$agendas->jk}}</td>
             <td>
              @if(empty($agendas->foto))
              <img src="{{Storage::url('none.png')}}" width="40" height="40" class="img-circle" alt="User Image" class="img-circle">
              @else
              <img src="{{ Storage::url('foto/'.$agendas->foto_user) }}" width="40" height="40"  class="img-circle" alt="User Image">
              @endif
            </td>
            <td>{{$agendas->nama_lengkap_user}}</td>
            <td>{{$agendas->seksi_kajian_dhuha}}</td>
            <td><b>Hari :</b> {{$agendas->hari_kajian}} <br>
              <b>Mulai :</b>{{$agendas->jam_kajian}}<br>
              <b>Selesai : </b>{{$agendas->akhir_kajian}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
</div>
<!-- jQuery 3 -->
<script src="/../admin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/../admin/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Morris.js charts -->
<script src="/../admin/bower_components/raphael/raphael.min.js"></script>
<script src="/../admin/bower_components/morris.js/morris.min.js"></script>

<!-- Bootstrap 3.3.7 -->
<script src="/../admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Sparkline -->
<script src="/../admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="/../admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/../admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="/../admin/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/../admin/bower_components/moment/min/moment.min.js"></script>
<script src="/../admin/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="/../admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="/../admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="/../admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/../admin/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/../admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/../admin/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/../admin/dist/js/demo.js"></script>

<script type="text/javascript">
  window.print();
</script>
</body>
</html>
