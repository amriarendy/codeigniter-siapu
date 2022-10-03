<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800 font-weight-bold"><?php echo $title ?></h1>
	</div>

	<div class="card" style="width: 60%; margin-bottom: 100px;">
		<div class="card-body">
			<?php foreach ($tbl_admin as $ta) : ?>
			<form method="POST" action="<?php echo base_url('admin/akun/AdminBidang/updateDataAksi') ?>" enctype="multipart/form-data">

				<div class="form-group">
					<label>ID Admin</label>
					<input type="text" name="id_admin" class="form-control" value="<?php echo $ta->id_admin?>" readonly>
				</div>

				<div class="form-group">
					<label>Nama Admin</label>
					<input type="text" name="nama_admin" class="form-control" value="<?php echo $ta->nama_admin?>">
					
				</div>

				<div class="form-group">
					<label>Username</label>
					<input type="text" name="user_admin" class="form-control" value="<?php echo $ta->user_admin?>">
					<?php echo form_error('user_admin', '<div class="text-small text-danger"></div>'); ?>
				</div>

				<div class="form-group">
					<label>Hak Akses</label>
					<select name="hak_akses" class="form-control">
						<option value="<?php echo $ta->hak_akses?>"><?php echo $ta->hak_akses?></option>
						<option value="1">Admin</option>
						<option value="2">Divisi Database Dan Sistem Terintegrasi</option>
						<option value="3">Divisi Infrastruktur Dan Jaringan</option>
						<option value="4">Divisi Layanan TI Dan Administrasi Umum</option>
					</select>
				</div>

				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		<?php endforeach ?>
		</div>
	</div>

</div>