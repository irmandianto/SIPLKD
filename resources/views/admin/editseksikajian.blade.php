@extends('layout.main')
@section('konten')
<!-- Main content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<ol class="breadcrumb">
		<li><a href="/seksikajian"><i class="fa fa-dashboard"></i> Kelola Seksi Kajia</a></li>
		<li class="active">Edit Seksi Kajian</li>
	</ol>
	<section class="content-header">
		<h1>
			Kelola Seksi Kajian
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
						<h3 class="box-title">Edit Data Seksi Kajian</h3>
					</div>
					<!-- /.box-header -->
					<!-- form start -->
					<form role="form" action="{{route('seksikajian.update',$cari->id_seksi_kajian_dhuha)}}" method="POST">
						@method('PATCH')
						@csrf
						<div class="box-body">
							<div class="form-group">
								<label for="exampleInputEmail1">Seksi Kajian Dhuha</label>
								<input type="text" name="seksi_kajian_dhuha" class="form-control" id="exampleInputEmail1" placeholder="Nama Seksi Kajian" value="{{$cari->seksi_kajian_dhuha}}">
							</div>
							<div class="form-group">
								<label>Instruktur</label>
								<select class="form-control" name="id">
									@foreach($idtutor as $idt)
									<option value="{{$idt->id}}">{{$idt->nama_lengkap_user}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label>Jadwal Kajian</label>
								<select class="form-control" name="id_jadwal">
									@foreach($idjadwal as $idj)
									<option value="{{$idj->id_jadwal}}">{{$idj->hari_kajian}} | <b>Mulai </b>: {{$idj->jam_kajian}} |<b> Selesai </b>: {{$idj->akhir_kajian}} </option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Kapasitas</label>
								<input type="text"  name="kapasitas" class="form-control" id="exampleInputText1" placeholder="Kapasitas" value="{{$cari->kapasitas}}">
							</div>
						</div>
						<!-- /.box-body -->

						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
								<a href="/seksikajian" type="submit" class="btn btn-warning">Kembali</a>
						</div>
					</form>
				</div>
				<!-- /.box -->
			</div>
		</div>
	</section>

</div>

@endsection