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
            <form method="POST" action="<?php echo base_url('user/public_user/Dashboard/updateDataAksi') ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label>ID User</label>
                    <input type="text" name="id" class="form-control" value="<?php echo $u->id?>" readonly>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="" class="form-control" value="<?php echo $u->username?>" readonly>
                </div>
                <div class="form-group">
                    <label>Kategori Layanan</label>
                    <input type="text" name="" class="form-control" value="<?php echo $u->hak_layanan?>" readonly>
                </div>
                <div class="form-group">
                    <label>Tanggal Akun Dibuat</label>
                    <input type="text" name="" class="form-control" value="<?php echo $u->date_created?>" readonly>
                </div>
                <div class="form-group">
                    <label>Nama User</label>
                    <input type="text" name="name_user" class="form-control" value="<?php echo $u->name_user?>">
                    <?php echo form_error('name_user', '<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tgl_lahir" value="<?php echo $u->tgl_lahir ?>">
                </div>
                <div class="form-group">
                    <label>No KTP</label>
                    <input type="text" class="form-control" name="no_ktp" value="<?php echo $u->no_ktp ?>">
                    <?= form_error('no_ktp', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label>No. Telepone</label>
                    <input type="text" class="form-control" name="telp" value="<?php echo $u->telp ?>">
                    <?= form_error('telp', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control" name="alamat" value="<?php echo $u->alamat ?>">
                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label>Pekerjaan</label>
                    <input type="text" class="form-control" name="pekerjaan" value="<?php echo $u->pekerjaan ?>">
                    <?= form_error('pekerjaan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label>Instansi</label>
                    <input type="text" class="form-control" name="instansi" value="<?php echo $u->instansi ?>">
                    <?= form_error('instansi', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label>Foto KTP</label>
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
                    <input type="file" name="image" class="form-control" value=""> 
                 </div>
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</div>