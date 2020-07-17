<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Cetak Lembar Nilai</title>
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
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- Main content -->
<section class="invoice">
  <!-- title row -->
  <div class="row">
    <div class="col-xs-12">
      <h2 class="page-header">
        <i class="fa fa-globe"></i> Lembar Nilai Peserta
        <small class="pull-right"><b>DateTime</b> : {{ now()->toDateTimeString() }}</small>
      </h2>
    </div>
    <!-- /.col -->
  </div>
  <!-- info row -->
  <div class="row invoice-info">
    <div class="col-sm-4 invoice-col">
      <h3>Biodata Peserta</h3>
      <address>

        @foreach($evaluasi as $eva)
        Nama :  <strong>{{$eva->nama_lengkap}}</strong><br>
        NIM : {{$eva->nama_lengkap}}<br>
        Alamat :{{$eva->alamat}}<br>
        Jenis Kelamin : {{$eva->jk}}<br>
        Fakultas : {{$eva->fakultas}}<br>
        Dosen PAI : {{$eva->dosenpai}}<br>
        Email: {{$eva->email}}
        @endforeach

      </address>
    </div>
    <div class="text-right">
      <img src="{{Storage::url('foto/'.$eva->foto)}}" width="150" height="150" class="rounded" alt="Foto Belum Di Upload">
    </div> 

    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Aspek Penilaian</th>
                <th>Nilai Huruf</th>
                <th>Huruf</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Kehadiran</td>
                @foreach($evaluasi as $eva)
                <td>
                  {{$kehadiran = $eva->nilai_kehadiran}}
                </td>
                <td>{{$eva->huruf_kehadiran}}</td>
                @endforeach
              </tr>
              <tr>
                <td>2</td>
                <td>Keaktifan</td>
                @foreach($evaluasi as $eva)
                <td>            
                  {{$keaktifan = $eva->nilai_keaktifan}}
                </td>
                <td>{{$eva->huruf_keaktifan}}</td>
                @endforeach

              </tr>
              <tr>
                <td>3</td>
                <td>Praktik Sholat Jenazah</td>
                @foreach($evaluasi as $eva)
                <td>
                  {{$praktikibadah = $eva->praktik_ibadah}}
                </td>
                <td>{{$eva->huruf_praktikibadah}}</td>
                @endforeach

              </tr>
              <tr>
                <td>3</td>
                <td>Praktik Sholat Jenazah</td>
                @foreach($evaluasi as $eva)
                <td>
                  {{$nilaiakhir = $eva->nilai_ujian}}
                </td>
                <td>{{$eva->huruf_ujianakhir}}</td>
                @endforeach
              </tr>
              <tr>
                <td colspan="2">Jumlah Nilai</td>
                <td colspan="2">{{$total = $kehadiran+$keaktifan+$praktikibadah+$nilaiakhir}}</td>
              </tr>
              <tr>
                <td colspan="2">Rataan</td>
                <td colspan="2">{{$rata = $total/4}}</td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

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
      var array = @json($datagrafik);

      new Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'myfirstchart',
  // Chart data records -- each  ntry in this array corresponds to a point on
  // the chart.

  data: @json($datagrafik),

  // The name of the data record attribute that contains x-"value"s.
  xkey: "tgl_evaluasi",
  // A list of names of data record attributes that contain y-"value"s.
  ykeys: ["shalat_berjamaah","shalat_dhuha","tilawah_quran","qiyamul_lail"],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ["Shalat Berjamaah", "Shalat Dhuha","Tilawah Qur'an","Qiyamul Lail"]
});
</script>
<script type="text/javascript">
  window.print();
</script>
</body>
</html>
