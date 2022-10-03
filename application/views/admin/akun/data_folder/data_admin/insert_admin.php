<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800 font-weight-bold"><?php echo $title ?></h1>
	</div>

	<div class="card" style="width: 60%; margin-bottom: 100px;">
		<div class="card-body">
			<form method="POST" action="<?php echo base_url('admin/akun/AdminBidang/tambahDataAksi') ?>" enctype="multipart/form-data">

				<div class="form-group">
					<label>Nama Admin</label>
					<input type="text" name="nama_admin" class="form-control">
					<?php echo form_error('nama_admin', '<div class="text-small text-danger"></div>'); ?>
				</div>

				<div class="form-group">
					<label>Username</label>
					<input type="text" name="user_admin" class="form-control">
					<?php echo form_error('user_admin', '<div class="text-small text-danger"></div>'); ?>
				</div>

				<div class="form-group">
					<label>Password</label>
					<input type="password" name="password_admin" class="form-control">
					<?php echo form_error('password_admin', '<div class="text-small text-danger"></div>'); ?>
				</div>

				<div class="form-group">
					<label>Hak Akses</label>
					<select name="hak_akses" class="form-control">
						<option value="">--Pilih Hak Akses--</option>
						<option value="1">Admin</option>
						<option value="2">Divisi Database Dan Sistem Terintegrasi</option>
						<option value="3">Divisi Infrastruktur Dan Jaringan</option>
						<option value="4">Divisi Layanan TI Dan Administrasi Umum</option>
					</select>
					<?php echo form_error('hak_akses', '<div class="text-small text-danger"></div>'); ?>
				</div>

				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>

</div>