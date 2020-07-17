<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Layanan Kajian Dhuha</title>
  <link rel="shortcut icon" href="{{ asset('../img/logo.jpg')}}">
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
<body class="hold-transition skin-white sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <a href="dashboard" class="logo">
        <span class="logo-mini"> <img src="{{ asset('../img/logo.jpg')}}" width="40" height="40"></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><img src="{{ asset('../img/logo.jpg')}}" width="80" height="60"></span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Notifications: style can be found in dropdown.less -->
            <li class="dropdown notifications-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
              </a>
              <ul class="dropdown-menu">
                <li class="header">Pemberitahuan</li>
                <li>
                  <!-- inner menu: contains the actual data -->
                  <ul class="menu">
                    @foreach($datapengumuman as $dtpengumuman)
                    <li style="padding: 5px;">
                        <i class="fa fa-users text-aqua"></i>{{$dtpengumuman->isi_pengumuman}}
                    </li>
                    @endforeach

                  </ul>
                </li>
                <li class="footer"><a href="#">View all</a></li>
              </ul>
            </li>

            <!-- User Account: style can be found in dropdown.less -->
            @if(session('level') == "Peserta")
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
               @if(empty($datauser->foto))
               <img src="{{Storage::url('none.png')}}" class="user-image" alt="User Image">
               @else
               <img src="{{ Storage::url('foto/'.$datauser->foto) }}"  class="user-image" alt="User Image">
               @endif
               
               <span class="hidden-xs">{{session('username')}}</span>
             </a>
             <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                @if(empty($datauser->foto))
                <img src="{{Storage::url('none.png')}}"  class="img-circle" alt="User Image">
                @else
                <img src="{{ Storage::url('foto/'.$datauser->foto) }}"  class="img-circle" alt="User Image">
                @endif
                <p class="text-black">
                  {{ session('username')}}<br>
                  {{ $datauser->email }}<br>
                  <small>{{ session('level')}}</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="/profile" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{ url('/logout') }}" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          @else
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
             @if(empty($datauser->foto_user))
             <img src="{{Storage::url('none.png')}}" class="user-image" alt="User Image">
             @else
             <img src="{{ Storage::url('foto/'.$datauser->foto_user) }}"  class="user-image" alt="User Image">
             @endif

             <span class="hidden-xs">{{session('username')}}</span>
           </a>
           <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              @if(empty($datauser->foto_user))
              <img src="{{Storage::url('none.png')}}"  class="img-circle" alt="User Image">
              @else
              <img src="{{ Storage::url('foto/'.$datauser->foto_user) }}"  class="img-circle" alt="User Image">
              @endif
              <p class="text-black">
                {{ session('username')}}<br>
                {{ $datauser->email }}<br>
                <small>{{ session('level')}}</small>
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="/profile" class="btn btn-default btn-flat">Profile</a>
              </div>
              <div class="pull-right">
                <a href="{{ url('/logout') }}" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
        @endif
      </ul>
    </div>
  </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">Navigasi</li>
      <li>
        <a href="{{url('/dashboard')}}">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>
      @if(session('level') == "Instruktur")
      <li>
        <a href="/pendaftar">
          <i class="fa fa-files-o"></i>
          <span>Pendaftar Agenda</span>
        </a>
      </li>
      <li>
        <a href="/viewevaluasi">
          <i class="fa fa-th"></i> <span>Evaluasi Ibadah Peserta</span>
        </a>
      </li>
      <li>
        <a href="/entrinilai">
          <i class="fa fa-dashboard"></i> <span>Entry Nilai Kajian Dhuha</span>
        </a>
      </li>
      <li>
        <a href="{{ route('materi.index')}}">
          <i class="fa fa-files-o"></i>
          <span>Bahan Materi Kajian Dhuha</span>
        </a>
      </li>
      @elseif(session('level') == "Sekretaris Umum Lembaga Dakwah Kampus")
      <li>
        <a href="{{ route('datainstruktur.index')}}">
          <i class="fa fa-files-o"></i>
          <span>Pendaftaran Instruktur</span>
        </a>
      </li>
<!--       @elseif(session('level') == "sekumukk")
      <li>
        <a href="{{ route('pengumumans.index')}}">
          <i class="fa fa-files-o"></i>
          <span>Akun Pengguna</span>
        </a>
      </li>
      <li>
        <a href="{{ route('pengumumans.index')}}">
          <i class="fa fa-files-o"></i>
          <span>Pendaftar Agenda</span>
        </a>
      </li>
      <li>
        <a href="/laporankajian">
          <i class="fa fa-files-o"></i>
          <span>Laporan Kajian Dhuha</span>
        </a>
      </li> -->
      @elseif(session('level') == "Admin")
      <li>
        <a href="{{route('kodeseksi.index')}}">
          <i class="fa fa-dashboard"></i> <span>Kelola Kode Seksi Peserta</span>
        </a>
      </li>
      <li>
        <a href="{{ route('pengumumans.index')}}">
          <i class="fa fa-files-o"></i>
          <span>Kelola Pengumuman</span>
        </a>
      </li>
      <li>
        <a href="{{ route('users.index')}}">
          <i class="fa fa-th"></i> <span>Kelola Akun User</span>
        </a>
      </li>
      <li>
        <a href="/mhsterdaftar">
          <i class="fa fa-th"></i> <span>Kelola Mahasiswa Terdaftar</span>
        </a>
      </li>
      <li>
        <a href="{{ route('laporan.index')}}">
          <i class="fa fa-th"></i> <span>Kelola Laporan Kajian Dhuha</span>
        </a>
      </li>
      <li>
        <a href="{{ route('fakultas.index')}}">
          <i class="fa fa-th"></i> <span>Kelola Data Fakultas</span>
        </a>
      </li>
      <li>
        <a href="{{ route('jadwal.index')}}">
          <i class="fa fa-th"></i> <span>Kelola Jadwal Kajian</span>
        </a>
      </li>
      <li>
        <a href="{{ route('seksikajian.index')}}">
          <i class="fa fa-th"></i> <span>Kelola Seksi Kajian</span>
        </a>
      </li>

      @elseif(session('level') == "Dosen")
      <li>
        <a href="{{route('materi.index')}}">
          <i class="fa fa-dashboard"></i> <span>Bahan / Materi Kajian Dhuha</span>
        </a>
      </li>
      <li>
        <a href="/pendaftar">
          <i class="fa fa-files-o"></i>
          <span>Laporan Peserta Agenda</span>
        </a>
      </li>
      <li>
        <a href="/laporankajian">
          <i class="fa fa-th"></i> <span>Laporan Kajian Dhuha</span>
        </a>
      </li>
      @elseif(session('level') == "Sekretaris Umum Qatulistiwa Islam")
      <li>
        <a href="/pendaftar">
          <i class="fa fa-dashboard"></i> <span>Laporan Peserta Agenda</span>
        </a>
      </li>
      <li>
        <a href="/kodeseksii">
          <i class="fa fa-dashboard"></i> <span>Laporan Kode Seksi Peserta</span>
        </a>
      </li>
      <li>
        <a href="/akunpengguna">
          <i class="fa fa-dashboard"></i> <span>Laporan Akun Pengguna</span>
        </a>
      </li>
      <li>
        <a href="{{route('pengumumans.index')}}">
          <i class="fa fa-dashboard"></i> <span>Kelola Pengumuman</span>
        </a>
      </li>
      <li>
        <a href="{{route('event.index')}}">
          <i class="fa fa-dashboard"></i> <span>Kelola Event</span>
        </a>
      </li>
      <li>
        <a href="{{route('artikel.index')}}">
          <i class="fa fa-dashboard"></i> <span>Kelola Artikel</span>
        </a>
      </li>
      @else
      <li>
        <a href="{{ route('kartukajian.index')}}">
          <i class="fa fa-files-o"></i>
          <span>Kartu Kajian Dhuha</span>
        </a>
      </li>
      <li>
        <a href="{{ route('evaluasi.index')}}">
          <i class="fa fa-files-o"></i>
          <span>Evaluasi Ibadah Kajian Dhuha</span>
        </a>
      </li>
      <li>
        <a href="/lembarnilai">
          <i class="fa fa-files-o"></i>
          <span>Lembar Nilai Kajian Dhuha</span>
        </a>
      </li>
      <li>
        <a href="{{ route('materi.index')}}">
          <i class="fa fa-files-o"></i>
          <span>Bahan Materi Kajian Dhuha</span>
        </a>
      </li>

      @endif
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>