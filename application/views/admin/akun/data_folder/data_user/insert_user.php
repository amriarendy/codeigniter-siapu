<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800 font-weight-bold"><?php echo $title ?></h1>
	</div>

	<div class="card" style="width: 60%; margin-bottom: 100px;">
		<div class="card-body">
			<form method="POST" action="<?php echo base_url('admin/akun/DataUser/tambahDataAksi') ?>" enctype="multipart/form-data">

				<div class="form-group">
					<label>Nama User</label>
					<input type="text" name="name_user" class="form-control" value="<?= set_value('name_user'); ?>">
				</div>

				<div class="form-group">
					<label>Username</label>
					<input type="text" name="username" class="form-control" value="<?= set_value('username'); ?>">
					<?php echo form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>

				<div class="form-group">
					<label>Password</label>
					<input type="password" name="password" class="form-control" value="">
					
				</div>

				<div class="form-group">
					<label>Kategori</label>
					<select name="hak_layanan" class="form-control">
						<option value="1">Dosen</option>
						<option value="2">Mahasiswa</option>
						<option value="3">Public</option>
					</select>
					
				</div>

				<div class="form-group">
                    <label>Tanggal Lahir</label><small class="text-primary pl-3">Semua User</small>
                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= set_value('tgl_lahir'); ?>">
                </div>
                <div class="form-group">
                    <label>No KTP</label><small class="text-primary pl-3">Semua User</small>
                    <input type="text" class="form-control" id="no_ktp" name="no_ktp" value="<?= set_value('no_ktp'); ?>">
                    <?= form_error('no_ktp', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label>No. Telepone</label><small class="text-primary pl-3">Semua User</small>
                    <input type="text" class="form-control" id="telp" name="telp" value="<?= set_value('telp'); ?>">
                    <?= form_error('telp', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label>No. NIDN</label>
                    <input type="text" class="form-control" id="nidn" name="nidn" value="<?= set_value('nidn'); ?>">
                     <?= form_error('nidn', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label>No. NIP</label>
                    <input type="text" class="form-control" id="nip" name="nip" value="<?= set_value('nip'); ?>">
                    <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label>Alamat</label><small class="text-primary pl-3">Semua User</small>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= set_value('alamat'); ?>">
                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label>Pekerjaan</label><small class="text-primary pl-3">Semua User</small>
                    <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?= set_value('pekerjaan'); ?>">
                    <?= form_error('pekerjaan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label>Unit Kerja</label>
                    <input type="text" class="form-control" id="unit_kerja" name="unit_kerja" value="<?= set_value('unit_kerja'); ?>">
                    <?= form_error('unit_kerja', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label>Jenis Dosen</label>
                    <input type="text" class="form-control" id="jenis_dosen" name="jenis_dosen" value="<?= set_value('jenis_dosen'); ?>">
                    <?= form_error('jenis_dosen', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                    <!-- <input type="text" class="form-control" id="hak_layanan" name="hak_layanan" value="1"> -->
                <div class="form-group">
                    <label>Instansi</label><small class="text-primary pl-3">Semua User</small>
                    <input type="text" class="form-control" id="instansi" name="instansi" value="<?= set_value('instansi'); ?>">
                    <?= form_error('instansi', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label>KTM Mahasiswa</label><small class="text-danger pl-3">Mahasiswa</small>
                    <input type="text" class="form-control" id="ktm" name="ktm" value="<?= set_value('ktm'); ?>">
                    <?= form_error('ktm', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label>NIM Mahasiswa</label><small class="text-danger pl-3">Mahasiswa</small>
                    <input type="text" class="form-control" id="nim" name="nim" value="<?= set_value('nim'); ?>">
                    <?= form_error('nim', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label>Prodi</label><small class="text-danger pl-3">Mahasiswa</small>
                    <input type="text" class="form-control" id="prodi" name="prodi" value="<?= set_value('prodi'); ?>">
                    <?= form_error('prodi', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label>Semester</label><small class="text-danger pl-3">Mahasiswa</small>
                    <input type="text" class="form-control" id="semester" name="semester" value="<?= set_value('semester'); ?>">
                    <?= form_error('semester', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
					<label>Aktifkan Akun</label><small class="text-primary pl-3">Semua User</small>
					<select name="is_active" class="form-control">
						<option value="1">Aktif</option>
						<option value="2">Non Aktifkan</option>
					</select>
				</div>
				<div class="form-group">
					<label>Pengecekan Akun</label><small class="text-primary pl-3">Semua User</small>
					<select name="cek_actived" class="form-control">
						<option value="1">Aktif</option>
						<option value="2">Non Aktifkan</option>
					</select>
				</div>

				<div class="form-group">
                    <label>Pesan Kan</label><small class="text-primary pl-3">Semua User</small>
                    <input type="text" class="form-control" id="notice" name="notice" value="<?= set_value('notice'); ?>">
                </div>

                <div class="form-group">
                    <label>Berkas</label>
                    <input type="file" class="form-control" name="berkas" id="berkas">
                </div>
                <div class="form-group">
                    <label>Upload Foto Profil</label>
                    <input type="file" name="image" class="form-control" value=""> 
                 </div>

				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>

</div>