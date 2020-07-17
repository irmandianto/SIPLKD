	<form role="form" action="/profile/updateUser" method="POST" enctype="multipart/form-data">
		@csrf
		<div class="box-body">
			<div class="form-group">
				<label for="exampleInputEmail1">Nama Lengkap</label>
				<input type="text" name="nama_lengkap_user" class="form-control" id="exampleInputEmail1" placeholder="Nama Lengkap" value="{{$data->nama_lengkap_user}}">
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Username</label>
				<input type="text" name="username" class="form-control" id="exampleInputText1" placeholder="Username" value="{{$data->username}}">
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Password</label>
				<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Masukkan kembali password" required="yes">
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Email</label>
				<input type="email" name="email_user" class="form-control" id="exampleInputEmail1" placeholder="Email" value="{{$data->email_user}}">
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Kontak</label>
				<input type="text"  name="kontak_user" class="form-control" id="exampleInputText1" placeholder="Kontak" value="{{$data->kontak_user}}">
			</div>
			<div class="form-group">
				<label>Jenis Kelamin</label>
				<select class="form-control" name="jk_user">
					<option value="Laki - Laki">Laki - Laki</option>
					<option value="Perempuan">Perempuan</option>
				</select>
			</div>
			<div class="form-group">
				<div class="text-center">
					<img src="{{Storage::url('foto/'.$data->foto_user)}}" width="200" height="200" class="rounded" alt="Foto Belum Di Upload">
				</div>
			</div>
			<div class="form-group">
				<label for="exampleInputFile">Foto</label>
				<input type="file" name="foto_user" id="exampleInputFile">
			</div>
		</div>
		<!-- /.box-body -->

		<div class="box-footer">
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
	</form>
