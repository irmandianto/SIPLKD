@extends('layout.main')
@section('konten')
<!-- Main content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Kelola Mahasiswa Terdaftar </a></li>
		<li class="active">Edit Mahasiswa Terdaftar </li>
	</ol>
	<section class="content-header">
		<h1>
			Kelola Akun Mahasiswa
			<small>Control panel</small>
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
						<h3 class="box-title">Edit Data Mahasiswa</h3>
					</div>
					<!-- /.box-header -->
					<!-- form start -->
					<form role="form" action="/mhsterdaftar/{{$pengguna->id_peserta}}" method="POST">
						@method('PUT')
						@csrf
						<div class="box-body">
							<div class="form-group">
								@if(empty($pengguna->foto))
								<input type="hidden" name="foto" value="none.jpg">
								@else
								<input type="hidden" name="foto" value="{{$pengguna->foto}}">
								@endif
								<div class="text-center">
									<img src="{{Storage::url('foto/'.$pengguna->foto)}}" name="foto" width="200" height="200" class="rounded" alt="Foto Belum Di Upload">
								</div>
							</div>
							<div class="col-xs-6">
								<label>Masukkan Username</label>
								<div class="form-group has-feedback">
									<input type="text" name="username" class="form-control" placeholder="Username" value="{{$pengguna->username}}">
								</div>
							</div>
							<div class="col-xs-6">
								<label>Masukkan Password</label>
								<div class="form-group has-feedback">
									<input type="password"  name="password" class="form-control" placeholder="Harap masukkan password kembali" required="yes">
								</div>
							</div>
							<div class="col-xs-6">
								<label>Masukkan Nama Lengkap</label>
								<div class="form-group has-feedback">
									<input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap" value="{{$pengguna->nama_lengkap}}">

								</div>
							</div>
							<div class="col-xs-6">
								<label>Masukkan Email</label>
								<div class="form-group has-feedback">
									<input type="text" name="email" class="form-control" placeholder="Email" value="{{$pengguna->email}}">

								</div>
							</div>
							<div class="col-xs-6">
								<label>Masukkan Nama Panggilan </label>
								<div class="form-group has-feedback">
									<input type="text" name="nama_panggilan" class="form-control" placeholder="Nama Panggilan" value="{{$pengguna->nama_panggilan}}">

								</div>
							</div>
							<div class="col-xs-6">
								<div class="form-group has-feedback">
									<label>Masukkan Kontak / No HP </label>
									<input type="text" name="kontak" class="form-control" placeholder="Nomor Kontak" value="{{$pengguna->kontak}}">

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
										@if($fakultas->nama_fakultas == "$pengguna->nama_fakultas")
										<option value="{{$pengguna->nama_fakultas}}" selected="yes">{{$pengguna->nama_fakultas}}</option>
										@endif
										<option value="{{$fakultas->nama_fakultas}}">{{$fakultas->nama_fakultas}}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="col-xs-6">
								<label>Masukkan NIM</label>
								<div class="form-group has-feedback">
									<input type="text" name="nim" class="form-control" placeholder="Nomor Induk Mahasiswa" value="{{$pengguna->nim}}">
								</div>
							</div>
							<div class="col-xs-6">
								<label>Masukkan Tempat Lahir</label>
								<div class="form-group has-feedback">
									<input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" value="{{$pengguna->tempat_lahir}}">
								</div>
							</div>

							<div class="col-xs-6">
								<label>Masukkan Tanggal Lahir </label>
								<div class="form-group has-feedback">
									<input type="date" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir"value="{{$pengguna->tgl_lahir}}">
								</div>
							</div>


							<div class="col-xs-6">
								<label>Masukkan Alamat</label>
								<div class="form-group has-feedback">
									<input type="text" name="alamat" class="form-control" placeholder="Alamat" value="{{$pengguna->alamat}}">
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
										@if($pengguna->tahun_masuk == "$x")
										<option value="{{$pengguna->tahun_masuk}}" selected="yes">{{$pengguna->tahun_masuk}}</option>
										@endif
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
									<input type="text" name="progamstudi" class="form-control" placeholder="Progam Studi" value="{{$pengguna->progamstudi}}">
								</div>
							</div>
						</div>
						<div class="col-xs-6">
							<div class="form-group">
								<label>Nama Dosen PAI</label>
								<div class="form-group has-feedback">
									<input type="text" name="dosenpai" class="form-control" placeholder="Nama Dosen PAI"value="{{$pengguna->dosenpai}}">
								</div>
							</div>
						</div>
						<div class="col-xs-6">
							<div class="form-group">
								<label>Pilih Kode Seksi PAI (Sekarang : {{$pengguna->kodeseksi['kode_seksi_peserta']}})</label>
								<select class="form-control" name="id_kodeseksipeserta">
									@foreach($kode as $kodes)
									<option value="{{$kodes->id}}">{{$kodes->kode_seksi_peserta}}</option>
									@endforeach
								</select>
							</div>
						</div>

					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Submit</button>
						<a href="/mhsterdaftar" type="button" class="btn btn-warning">Kembali</a>
					</div>
				</form>
			</div>
			<!-- /.box -->
		</div>
	</div>
</section>

</div>

@endsection