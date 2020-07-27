@extends('layout.main')
@section('konten')
<!-- Main content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<ol class="breadcrumb">
		<li><a href="/bahan"><i class="fa fa-dashboard"></i>Lembar Nilai Kajian Dhuha </a></li>
	</ol>
	<section class="content-header">
		<small>Nilai Peserta</small>
		<h1>Nilai Kajian Dhuha</h1>

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
					</div>
					<!-- /.box-header -->
					<!-- form start -->
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
									<td>Nilai Ujian Akhir</td>
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
							<a href="/lembarnilai/cetak" target="_blank" class="btn btn-primary">Cetak</a>
						</div>
					</div>
					<!-- /.box -->
				</div>
			</div>
		</section>

	</div>

	@endsection