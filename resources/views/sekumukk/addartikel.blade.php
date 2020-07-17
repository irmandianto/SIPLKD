@extends('layout.main')
@section('konten')
<!-- Main content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<ol class="breadcrumb">
		<li><a href="/event"><i class="fa fa-dashboard"></i> Kelola Data Artikel</a></li>
		<li class="active">Tambah Artikel</li>
	</ol>
	<section class="content-header">
		<small>Tambah Artikel HomePage</small>
<!-- 		<h1>
			Unggah Bahan Materi Kajian Dhuha
		</h1> -->

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
						<h3 class="box-title">Tambah Artikel HomePage</h3>
					</div>
					<!-- /.box-header -->
					<!-- form start -->
					<form role="form" action="{{route('artikel.store')}}" method="POST" >
						@csrf
						<div class="box-body">
							<div class="form-group">
								<label for="exampleInputText1">Judul</label>
								<input type="text" name="judul" class="form-control" id="exampleInputText1" placeholder="Judul Artikel">
							</div>
							<div class="form-group">
								<label for="exampleInputText1">Isi Artikel</label>
								<textarea name="isi_artikel" class="form-control" id="exampleInputTextArea1" placeholder="Isi Artikel" rows="20"></textarea>
							</div>

							<div class="form-group">
								<label for="exampleInputFile">Tanggal Artikel</label>
								<input type="date" name="tgl_artikel" id="exampleInputFile" class="form-control">
							</div>
						</div>
						<!-- /.box-body -->

						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
							<a  href="/artikel" type="button" class="btn btn-warning">Kembali</a>
						</div>
					</form>
				</div>
				<!-- /.box -->
			</div>
		</div>
	</section>

</div>

@endsection