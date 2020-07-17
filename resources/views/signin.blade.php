
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Signin | Sistem Layananan Kajian Dhuha</title>
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
<body>
 <div class="login-logo">
  <img src="img/logo.jpg">
</div>
<!-- /.login-logo -->
<div class="row justify-content-md-center">
  <div class="col-sm-12">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
      <div class="login-box-body">
        <p class="login-box-msg">Login untuk melanjutkan</p>
        @if (session('alert'))
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-danger"></i> Alert!</h4>
          {{ session('alert') }}
        </div>
        @endif
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
        <form action="{{url('/sign_in') }}" method="post">
          @csrf
          <div class="form-group has-feedback">
            <input type="text" name="username" class="form-control" placeholder="Username">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
            </div>
            <div class="col-xs-12">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Ingat saya tetap masuk
                </label>
              </div>
            </div>
            <div class="col-xs-12 text-center">
              <p>- atau -</p>
            </div>
            <div class="col-xs-12">
              <a type="button" href="/sign_up" class="btn btn-primary btn-block btn-flat">Daftar</a>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <!-- /.login-box-body -->
      </div>
    </div>
  </div>
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
