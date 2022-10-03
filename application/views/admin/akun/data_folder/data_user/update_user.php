<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800 font-weight-bold"><?php echo $title ?></h1>
	</div>

	<div class="card" style="width: 60%; margin-bottom: 100px;">
		<div class="card-body">
			<?php foreach ($tbl_user as $tu) : ?>
			<form method="POST" action="<?php echo base_url('admin/akun/DataUser/updateDataAksi') ?>" enctype="multipart/form-data">

				<div class="form-group">
					<label>ID User</label><small class="text-primary pl-3">Semua User</small>
					<input type="text" name="id" class="form-control" value="<?php echo $tu->id?>" readonly>
				</div>

				<div class="form-group">
					<label>Nama User</label><small class="text-primary pl-3">Semua User</small>
					<input type="text" name="name_user" class="form-control" value="<?php echo $tu->name_user?>">
					<?php echo form_error('name_user', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>

				<div class="form-group">
					<label>Username</label><small class="text-primary pl-3">Semua User</small>
					<input type="text" name="username" class="form-control" value="<?php echo $tu->username?>">
					<?php echo form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>

				<div class="form-group">
					<label>Kategori</label><small class="text-primary pl-3">Semua User</small>
					<select name="hak_layanan" class="form-control">
						<option value="<?php echo $tu->hak_layanan?>"><?php echo $tu->hak_layanan?></option>
						<option value="1">Dosen</option>
						<option value="2">Mahasiswa</option>
						<option value="3">Public</option>
					</select>
					
				</div>

				<div class="form-group">
                    <label>Tanggal Lahir</label><small class="text-primary pl-3">Semua User</small>
                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?php echo $tu->tgl_lahir ?>">
                </div>
                <div class="form-group">
                    <label>No KTP</label><small class="text-primary pl-3">Semua User</small>
                    <input type="text" class="form-control" id="no_ktp" name="no_ktp" value="<?php echo $tu->no_ktp ?>">
                    <?= form_error('no_ktp', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label>No. Telepone</label><small class="text-primary pl-3">Semua User</small>
                    <input type="text" class="form-control" id="telp" name="telp" value="<?php echo $tu->telp ?>">
                    <?= form_error('telp', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label>No. NIDN</label><small class="text-warning pl-3">Dosen</small>
                    <input type="text" class="form-control" id="nidn" name="nidn" value="<?php echo $tu->nidn ?>">
                     <?= form_error('nidn', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label>No. NIP</label><small class="text-warning pl-3">Dosen</small>
                    <input type="text" class="form-control" id="nip" name="nip" value="<?php echo $tu->nip ?>">
                    <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label>Alamat</label><small class="text-primary pl-3">Semua User</small>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $tu->alamat ?>">
                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label>Pekerjaan</label><small class="text-primary pl-3">Semua User</small>
                    <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?php echo $tu->pekerjaan ?>">
                    <?= form_error('pekerjaan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label>Unit Kerja</label><small class="text-warning pl-3">Dosen</small>
                    <input type="text" class="form-control" id="unit_kerja" name="unit_kerja" value="<?php echo $tu->unit_kerja ?>">
                    <?= form_error('unit_kerja', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label>Jenis Dosen</label><small class="text-warning pl-3">Dosen</small>
                    <input type="text" class="form-control" id="jenis_dosen" name="jenis_dosen" value="<?php echo $tu->jenis_dosen ?>">
                    <?= form_error('jenis_dosen', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                    <!-- <input type="text" class="form-control" id="hak_layanan" name="hak_layanan" value="1"> -->
                <div class="form-group">
                    <label>Instansi</label><small class="text-primary pl-3">Semua User</small>
                    <input type="text" class="form-control" id="instansi" name="instansi" value="<?php echo $tu->instansi ?>">
                    <?= form_error('instansi', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <label>NIM Mahasiswa</label><small class="text-danger pl-3">Mahasiswa</small>
                    <input type="text" class="form-control" id="nim" name="nim" value="<?php echo $tu->nim ?>">
                    <?= form_error('nim', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label>Prodi</label><small class="text-danger pl-3">Mahasiswa</small>
                    <input type="text" class="form-control" id="prodi" name="prodi" value="<?php echo $tu->prodi ?>">
                    <?= form_error('prodi', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
					<label>Aktifkan Akun</label><small class="text-primary pl-3">Semua User</small>
					<select name="is_active" class="form-control">
						<option value="<?php echo $tu->is_active?>">
                            <?php if($tu -> is_active == '0'){ ?>Tidak Aktif<?php }
                            else if($tu -> is_active == '1'){ ?>Aktif<?php } ?></option>
						<option value="1">Aktif</option>
						<option value="0">Non Aktifkan</option>
					</select>
					
				</div>

				<div class="form-group">
					<label>Pengecekan Akun</label><small class="text-primary pl-3">Semua User</small>
					<select name="cek_actived" class="form-control">
						<option value="<?php echo $tu->cek_actived ?>"><?php if($tu -> cek_actived == '0'){ ?>Tidak Aktif<?php }
                            else if($tu -> cek_actived == '1'){ ?>Aktif<?php } ?></option>
						<option value="1">Aktif</option>
						<option value="0">Non Aktifkan</option>
					</select>
				</div>

				<div class="form-group">
                    <label>Pesan Kan</label><small class="text-primary pl-3">Semua User</small>
                    <input type="text" class="form-control" id="notice" name="notice" value="<?php echo $tu->notice ?>"></input>
                </div>

                <div class="form-group">
                    <label>Berkas</label>
                    <div>
                    <img style="width: 150px" src="<?php echo base_url() . 'assets/file/berkas_user/' . $tu->berkas ?>">
                    </div>
                    <?php
                        if($tu -> berkas)
                            { ?><a href="<?php echo base_url() . 'assets/file/berkas_user/' . $tu->berkas ?>"><i class="badge badge-success">Lihat Berkas</i></a> <?php 
                        }else if($tu -> berkas == null){ ?>
                            <label  class="badge badge-danger">Berkas Masih Kosong!</label>
                    <?php } ?>
                    <input type="file" class="form-control" name="berkas" id="berkas">
                </div>
                <div class="form-group">
                    <label>Upload Foto Profil</label>
                    <div>
                    <img style="width: 150px" src="<?php echo base_url() . 'assets/file/photo_user/' . $tu->image ?>">
                    </div>
                    <?php
                        if($tu -> berkas)
                            { ?><a href="<?php echo base_url() . 'assets/file/photo_user/' . $tu->image ?>"><i class="badge badge-success">Lihat Berkas</i></a> <?php 
                        }else if($tu -> berkas == null){ ?>
                            <label  class="badge badge-danger">Berkas Masih Kosong!</label>
                    <?php } ?>
                    <input type="file" name="image" class="form-control" value=""> 
                 </div> 

				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		<?php endforeach ?>
		</div>
	</div>

</div>