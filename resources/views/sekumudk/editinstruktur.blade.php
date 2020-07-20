@extends('layout.main')
@section('konten')
<!-- Main content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<ol class="breadcrumb">
		<li><a href="/users"><i class="fa fa-dashboard"></i> Kelola Akun Instruktur</a></li>
		<li class="active">Edit Akun Instruktur</li>
	</ol>
	<section class="content-header">
		<h1>
			Kelola Akun Instruktur
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
						<h3 class="box-title">Edit Data Instruktur</h3>
					</div>
					<!-- /.box-header -->
					<!-- form start -->
					<form role="form" action="{{route('datainstruktur.update', $editData->id)}}" method="POST">
						@method('PATCH')
						@csrf
						<div class="box-body">
							<div class="form-group">
								<label for="exampleInputEmail1">Nama Lengkap</label>
								<input type="text" name="nama_lengkap_user" class="form-control" id="exampleInputEmail1" placeholder="Nama Lengkap" value="{{$editData -> nama_lengkap_user}}">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Username</label>
								<input type="text" name="username" class="form-control" id="exampleInputText1" placeholder="Username" value="{{$editData->username}}" readonly="yes">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Password</label>
								<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Harap Masukkan Kembali Password" required="yes">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Email</label>
								<input type="email" name="email_user" class="form-control" id="exampleInputEmail1" placeholder="Email" value="{{$editData->email_user}}">
							</div>
							<div class="form-group">
								<label>Status User</label>
								<input type="text" name="level" class="form-control" id="exampleInputEmail1" placeholder="Email" value="{{$editData->level}}" readonly="yes">
							</div>
							<div class="form-group">
								<label>Jenis Kelamin</label>
								<select class="form-control" name="jk_user">
									@if($editData->jk_user == "Laki - Laki")
									<option value="Laki - Laki" selected="yes">Laki - Laki</option>
									<option value="Perempuan">Perempuan</option>
									@elseif($editData->jk_user == "Perempuan")
									<option value="Laki - Laki">Laki - Laki</option>
									<option value="Perempuan" selected="yes">Perempuan</option>
									@endif
								</select>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Kontak</label>
								<input type="text"  name="kontak_user" class="form-control" id="exampleInputText1" placeholder="Kontak" value="{{$editData->kontak_user}}">
							</div>
						</div>
						<!-- /.box-body -->

						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
							<a href="/datainstruktur" type="button" class="btn btn-warning">Kembali</a>
						</div>
					</form>
				</div>
				<!-- /.box -->
			</div>
		</div>
	</section>

</div>

@endsection