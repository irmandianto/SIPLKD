	<form role="form" action="/profile/updatePeserta" method="POST" enctype="multipart/form-data">
		@csrf
		<div class="box-body">
			<div class="form-group">
				@if(empty($data->foto))
				<input type="hidden" name="foto" value="none.jpg">
				@else
				<input type="hidden" name="foto" value="{{$data->foto}}">
				@endif
				<div class="text-center">
					<img src="{{Storage::url('foto/'.$data->foto)}}" name="foto" width="200" height="200" class="rounded" alt="Foto Belum Di Upload">
				</div>
			</div>
			<div class="col-xs-6">
				<label>Masukkan Username</label>
				<div class="form-group has-feedback">
					<input type="text" name="username" class="form-control" placeholder="Username" value="{{$data->username}}">
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
					<input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap" value="{{$data->nama_lengkap}}">

				</div>
			</div>
			<div class="col-xs-6">
				<label>Masukkan Email</label>
				<div class="form-group has-feedback">
					<input type="text" name="email" class="form-control" placeholder="Email" value="{{$data->email}}">

				</div>
			</div>
			<div class="col-xs-6">
				<label>Masukkan Nama Panggilan </label>
				<div class="form-group has-feedback">
					<input type="text" name="nama_panggilan" class="form-control" placeholder="Nama Panggilan" value="{{$data->nama_panggilan}}">

				</div>
			</div>
			<div class="col-xs-6">
				<div class="form-group has-feedback">
					<label>Masukkan Kontak / No HP </label>
					<input type="text" name="kontak" class="form-control" placeholder="Nomor Kontak" value="{{$data->kontak}}">

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
						@foreach($fakultas as $fakulta)
						@if($fakulta->nama_fakultas == "$data->nama_fakultas")
						<option value="{{$data->nama_fakultas}}" selected="yes">{{$data->nama_fakultas}}</option>
						@endif
						<option value="{{$fakulta->nama_fakultas}}">{{$fakulta->nama_fakultas}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-xs-6">
				<label>Masukkan NIM</label>
				<div class="form-group has-feedback">
					<input type="text" name="nim" class="form-control" placeholder="Nomor Induk Mahasiswa" value="{{$data->nim}}">
				</div>
			</div>
			<div class="col-xs-6">
				<label>Masukkan Tempat Lahir</label>
				<div class="form-group has-feedback">
					<input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" value="{{$data->tempat_lahir}}">
				</div>
			</div>

			<div class="col-xs-6">
				<label>Masukkan Tanggal Lahir </label>
				<div class="form-group has-feedback">
					<input type="date" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir"value="{{$data->tgl_lahir}}">
				</div>
			</div>


			<div class="col-xs-6">
				<label>Masukkan Alamat</label>
				<div class="form-group has-feedback">
					<input type="text" name="alamat" class="form-control" placeholder="Alamat" value="{{$data->alamat}}">
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
						@if($data->tahun_masuk == "$x")
						<option value="{{$data->tahun_masuk}}" selected="yes">{{$data->tahun_masuk}}</option>
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
					<input type="text" name="progamstudi" class="form-control" placeholder="Progam Studi" value="{{$data->progamstudi}}">
				</div>
			</div>
		</div>
		<div class="col-xs-6">
			<div class="form-group">
				<label>Nama Dosen PAI</label>
				<div class="form-group has-feedback">
					<input type="text" name="dosenpai" class="form-control" placeholder="Nama Dosen PAI"value="{{$data->dosenpai}}">
				</div>
			</div>
		</div>
		<div class="col-xs-6">
			<div class="form-group">
				<label>Pilih Kode Seksi PAI (Sekarang : {{$data->kodeseksi['kode_seksi_peserta']}})</label>
				<select class="form-control" name="id_kodeseksipeserta">
					@foreach($kode as $kodes)
					<option value="{{$kodes->id}}">{{$kodes->kode_seksi_peserta}}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="exampleInputFile">Foto</label>
			<input type="file" name="foto" id="exampleInputFile">
		</div>
	</div>
	<!-- /.box-body -->

	<div class="box-footer">
		<button type="submit" class="btn btn-primary">Submit</button>
	</div>
</form>