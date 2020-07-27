@extends('layout.main')
@section('konten')
<!-- Main content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<ol class="breadcrumb">
		<li><a href="/users"><i class="fa fa-dashboard"></i> Kelola Akun User</a></li>
		<li class="active">Tambah Akun User</li>
	</ol>
	<section class="content-header">
		<h1>
			Kelola Akun User
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
						<h3 class="box-title">Tambah Data User</h3>
					</div>
					<!-- /.box-header -->
					<!-- form start -->
					<form role="form" action="{{route('users.store')}}" method="POST">
						@csrf
						<div class="box-body">
							<div class="form-group">
								<label for="exampleInputEmail1">Nama Lengkap</label>
								<input type="text" name="nama_lengkap_user" class="form-control" id="exampleInputEmail1" placeholder="Nama Lengkap">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Username</label>
								<input type="text" name="username" class="form-control" id="exampleInputText1" placeholder="Username">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Password</label>
								<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Email</label>
								<input type="email" name="email_user" class="form-control" id="exampleInputEmail1" placeholder="Email">
							</div>
							<div class="form-group">
								<label>Status User</label>
								<select class="form-control" name="level">
									<option value="Instruktur">Instruktur</option>
									<option value="Dosen">Dosen</option>
									<option value="Sekretaris Umum Lembaga Dakwah Kampus">Sekretaris Umum Lembaga Dakwah Kampus</option>
									<option value="Sekretaris Umum Qatulistiwa Islam">Sekretaris Umum Qatulistiwa Islam</option>
								</select>
							</div>
							<div class="form-group">
								<label>Jenis Kelamin</label>
								<select class="form-control" name="jk_user">
									<option value="Laki - Laki">Laki - Laki</option>
									<option value="Perempuan">Perempuan</option>
								</select>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Kontak</label>
								<input type="text"  name="kontak_user" class="form-control" id="exampleInputText1" placeholder="Kontak">
							</div>
						</div>
						<!-- /.box-body -->

						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
							<a href="/users" type="button" class="btn btn-warning">Kembali</a>
						</div>
					</form>
				</div>
				<!-- /.box -->
			</div>
		</div>
	</section>

</div>

@endsection