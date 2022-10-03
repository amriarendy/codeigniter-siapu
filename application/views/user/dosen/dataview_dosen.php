<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1></div>

        <div class="alert alert-success font-weight-bold mb-4" style="width: 65%">Halaman Detail Data Pelayanan Pengungjung
        </div>

        <div class="card" style="margin-bottom: 120px; width: 65%">
            <div class="card-header font-weight-bold bg-primary text-white">
                Data Pelayanan Pengunjung
        </div>
        
        
        <div class="card-body">
        <div class="row">
        <div class="col-md-10">
            <!-- <img style="width: 250px" src="<?php echo base_url('assets/file/photo_user/'.$tu->image)?>"> -->
        </div>
        <?php foreach ($tbl_user as $u) : ?>
        <div class="col-md-12">
            <form method="POST" action="<?php echo base_url('user/dosen/Dashboard/updateDataAksi') ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label>ID User</label>
                    <input type="text" name="id" id="id" class="form-control" value="<?php echo $u->id?>" readonly>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" value="<?php echo $u->username?>" readonly>
                </div>
                <div class="form-group">
                    <label>Kategori Layanan</label>
                    <input type="text" class="form-control" value="<?php echo $u->hak_layanan?>" readonly>
                </div>
                <div class="form-group">
                    <label>Tanggal Akun Dibuat</label>
                    <input type="text" class="form-control" value="<?php echo $u->date_created?>" readonly>
                </div>

                <div class="form-group">
                    <label>Nama User</label>
                    <input type="text" name="name_user" class="form-control" value="<?php echo $u->name_user?>">
                    <?php echo form_error('name_user', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?php echo $u->tgl_lahir ?>">
                </div>

                <div class="form-group">
                    <label>No KTP</label>
                    <input type="text" class="form-control" id="no_ktp" name="no_ktp" value="<?php echo $u->no_ktp ?>">
                    <?php echo form_error('no_ktp', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <label>No. Telepone</label>
                    <input type="text" class="form-control" id="telp" name="telp" value="<?php echo $u->telp ?>">
                    <?php echo form_error('telp', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <label>No. NIDN</label>
                    <input type="text" class="form-control" id="nidn" name="nidn" value="<?php echo $u->nidn ?>">
                    <?php echo form_error('nidn', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <label>No. NIP</label>
                    <input type="text" class="form-control" id="nip" name="nip" value="<?php echo $u->nip ?>">
                    <?php echo form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $u->alamat ?>">
                    <?php echo form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <label>Pekerjaan</label>
                    <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?php echo $u->pekerjaan ?>">
                    <?php echo form_error('pekerjaan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <label>Unit Kerja</label>
                    <input type="text" class="form-control" id="unit_kerja" name="unit_kerja" value="<?php echo $u->unit_kerja ?>">
                    <?php echo form_error('unit_kerja', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <label>Jenis Dosen</label>
                    <input type="text" class="form-control" id="jenis_dosen" name="jenis_dosen" value="<?php echo $u->jenis_dosen ?>">
                    <?php echo form_error('jenis_dosen', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <label>Instansi</label>
                    <input type="text" class="form-control" id="instansi" name="instansi" value="<?php echo $u->instansi ?>">
                    <?php echo form_error('instansi', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                <label>SK Terakhir</label>
                <div>
                <img style="width: 150px" src="<?php echo base_url() . 'assets/file/berkas_user/' . $u->berkas ?>">
                </div>
                    <input type="file" class="form-control" name="berkas" id="berkas">
                </div>

                <div class="form-group">
                <label>Upload Foto Profil</label>
                <div>
                <img style="width: 150px" src="<?php echo base_url() . 'assets/file/photo_user/' . $u->image ?>">
                </div>
                    <input type="file" name="image" class="form-control"> 
                </div> 

                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</div>