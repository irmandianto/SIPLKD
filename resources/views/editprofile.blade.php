@extends('layout.main')
@section('konten')
<!-- Main content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<ol class="breadcrumb">
		<li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li class="active">My Profile</li>
	</ol>
	<section class="content-header">
		<h1>
			Info Data Profile
			<small>Control panel</small>
		</h1>

	</section>
	<section class="content">
		<div class="row">
			<!-- left column -->
			<div class="col-md-12">
				<!-- general form elements -->
				<div class="box box-primary">
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
					<div class="box-header with-border">
						<h3 class="box-title">Harap Upload Foto Anda!</h3>
					</div>
					@if(session('level') == "Peserta")	
					@include('editadmin')
					@else
					@include('edituser')
					@endif
				</div>
				<!-- /.box -->
			</div>
		</div>
	</section>

</div>

@endsection