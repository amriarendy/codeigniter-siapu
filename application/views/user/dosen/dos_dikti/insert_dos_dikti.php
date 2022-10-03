<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card" style="width: 60%; margin-bottom: 100px;">
        <div class="card-body">
            <?php foreach ($tbl_user as $tu) : ?>
            <form method="POST" action="<?php echo base_url('user/dosen/layanan_user_dosen/dos_dikti_dosen/tambahDataAksi')?>" enctype="multipart/form-data">

                <button type="submit" class="btn btn-success">Submit</button>

                <div class="form-group">
                    <label>id user</label>
                    <input type="text" name="user_id" class="form-control" value="<?php echo $tu->id ?>" readonly>
                </div>
                <div class="form-group">
                    <label>nama user</label>
                    <input type="text" name="name_user" class="form-control" value="<?php echo $tu->name_user ?>" readonly>
                </div>

                <!-- <div class="form-group">
                    <label>ID Layanan</label>
                    <input type="text" name="layanan_id" class="form-control" value="<?php echo $tl->id_layanan ?>">
                </div>
                <div class="form-group">
                    <label>hak layanan</label>
                    <input type="text" name="hak_layanan" class="form-control" value="<?php echo $tl->keterangan_layanan ?>">
                </div>

                <div class="form-group">
                    <label>Id Akses</label>
                    <input type="text" name="akses_id" class="form-control" value="<?php echo $ta->id_akses ?>">
                </div>
                <div class="form-group">
                    <label>Divisi</label>
                    <input type="text" name="nama_layanan" class="form-control" value="<?php echo $ta->keterangan_akses ?>">
                </div> -->

                <div class="form-group">
                    <label>tanggal</label>
                    <input type="text" name="time_stamp_dos_dikti" class="form-control" value="<?php echo date("d F Y");?>" readonly>
                </div>

                    <input type="hidden" name="status_dos_dikti" class="form-control" value="P">

                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title_dos_dikti" class="form-control" value="Pengajuan PD Dikti" readonly>
                </div>

                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="desc_dos_dikti" class="form-control"></textarea>
                    <?= form_error('desc_dos_dikti', '<small class="text-danger pl-3">', '</small>'); ?> 
                </div>

                <div class="form-group">
                        <label>Berkas</label>
                        <input type="file" name="file_dos_dikti" class="form-control" value=""> 
                 
                 </div> 

                <button type="submit" class="btn btn-success">Submit</button>
            </form>
            <?php endforeach; ?>
        </div>
    </div>
</div>
