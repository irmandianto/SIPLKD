
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Signup | Sistem Layananan Kajian Dhuha</title>
  <link rel="shortcut icon" href="img/logo.jpg">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/admin/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/admin/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/admin/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="/admin/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition">
  <!-- /.login-logo -->
  <div class="login-box-body">
    <div class="login-logo">
      <img src="img/logo.jpg">
    </div>
    @if (session('error'))
    <div class="alert alert-danger alert-dismissible show fade">
      <div class="alert-body">
        <button class="close" data-dismiss="alert">
          <span>&times;</span>
        </button>
        {{ session('success') }}
      </div>
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
    <div class="row" style="padding: 0px 50px 0px 50px;">
      <div class="col-xs-12">

        <form action="{{url('/sign_up') }}" method="post">
          @csrf
          <div class="col-xs-6">
            <label>Masukkan Username</label>
            <div class="form-group has-feedback">
              <input type="text" name="username" class="form-control" placeholder="Username">
            </div>
          </div>
          <div class="col-xs-6">
            <label>Masukkan Password</label>
            <div class="form-group has-feedback">
              <input type="password"  name="password" class="form-control" placeholder="Password">
            </div>
          </div>
          <div class="col-xs-6">
            <label>Masukkan Nama Lengkap</label>
            <div class="form-group has-feedback">
              <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap">

            </div>
          </div>
          <div class="col-xs-6">
            <label>Masukkan Email</label>
            <div class="form-group has-feedback">
              <input type="text" name="email" class="form-control" placeholder="Email">

            </div>
          </div>
          <div class="col-xs-6">
            <label>Masukkan Nama Panggilan </label>
            <div class="form-group has-feedback">
              <input type="text" name="nama_panggilan" class="form-control" placeholder="Nama Panggilan">

            </div>
          </div>
          <div class="col-xs-6">
            <div class="form-group has-feedback">
              <label>Masukkan Kontak / No HP </label>
              <input type="text" name="kontak" class="form-control" placeholder="Nomor Kontak">

            </div>
          </div>
          <div class="col-xs-6">
            <div class="form-group">
              <label>Pilih Jenis Kelamin</label>
              <select class="form-control" name="jk">
                <option>Laki -laki</option>
                <option>Perempuan</option>
              </select>
            </div>
          </div>
          <div class="col-xs-6">
            <div class="form-group">
              <label>Pilih Fakultas</label>
              <select class="form-control" name="fakultas">
                @foreach($data as $fakultas)
                <option value="{{$fakultas->nama_fakultas}}">{{$fakultas->nama_fakultas}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-xs-6">
            <label>Masukkan NIM</label>
            <div class="form-group has-feedback">
              <input type="text" name="nim" class="form-control" placeholder="Nomor Induk Mahasiswa">
            </div>
          </div>
          <div class="col-xs-6">
            <label>Masukkan Tempat Lahir</label>
            <div class="form-group has-feedback">
              <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir">
            </div>
          </div>

          <div class="col-xs-6">
            <label>Masukkan Tanggal Lahir </label>
            <div class="form-group has-feedback">
              <input type="date" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir">
            </div>
          </div>


          <div class="col-xs-6">
            <label>Masukkan Alamat</label>
            <div class="form-group has-feedback">
              <input type="text" name="alamat" class="form-control" placeholder="Alamat">
            </div>
          </div>

          <div class="col-xs-6">
            <div class="form-group">
              <label>Tahun Masuk</label>
              <select class="form-control" name="tahun_masuk">
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
        <div class="col-xs-6">
          <div class="form-group">
            <label>Progam bidang studi</label>
            <div class="form-group has-feedback">
              <input type="text" name="progamstudi" class="form-control" placeholder="Progam Studi">
            </div>
          </div>
        </div>
        <div class="col-xs-6">
          <div class="form-group">
            <label>Nama Dosen PAI</label>
            <div class="form-group has-feedback">
              <input type="text" name="dosenpai" class="form-control" placeholder="Nama Dosen PAI">
            </div>
          </div>
        </div>
        <div class="col-xs-6">
          <div class="form-group">
            <label>Pilih Kode Seksi PAI</label>
            <select class="form-control" name="id_kodeseksipeserta">
              @foreach($kode as $kodes)
              <option value="{{$kodes->id}}">{{$kodes->kode_seksi_peserta}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-xs-12">
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Selesai</button>
          </div>
        </div>
        <div class="col-xs-12">
          <div class="form-group">
            <a type="button" href="/sign_in" class="btn btn-primary btn-block btn-flat">Login</a>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<div class="fixed-bottom" style="padding-top: 40px">
  <div class="row text-center">
   <strong>Copyright &copy; 2020 Qatulistiwa Islam rights reserved</strong>
 </div>
</div>
<!-- jQuery 3 -->
<script src="/admin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="/admin/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
