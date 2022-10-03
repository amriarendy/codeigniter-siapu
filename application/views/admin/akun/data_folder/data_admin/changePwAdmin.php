<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><?php echo $title ?></h1>
    </div>
    <div class="card" style="width:50%">
        <div class="card-body">
            <?php foreach ($tbl_admin as $a) : ?>
            <form method="POST" action="<?php echo base_url('admin/akun/AdminBidang/gantiPasswordAksi') ?>">
                    <input type="hidden" name="id" class="form-control" value="<?php echo $a->id_admin ?>">
                <div class="form-group">
                    <label>Nama Akun</label>
                    <input type="text" name="passBaru" class="form-control" value="<?php echo $a->nama_admin ?>" readonly>
                    <?php echo form_error('passBaru', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                    <div class="form-group">
                <label>Username Akun</label>
                    <input type="text" name="passBaru" class="form-control" value="<?php echo $a->user_admin ?>" readonly>
                    <?php echo form_error('passBaru', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label>Password Baru</label>
                    <input type="password" name="passBaru" class="form-control" value="">
                    <?php echo form_error('passBaru', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label>Ulangi Password Baru</label>
                    <input type="password" name="ulangPass" class="form-control" value="">
                    <?php echo form_error('ulangPass', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <button type="submit" class="btn btn-success">Ganti Password</button>
            </form>
        <?php endforeach; ?>
        </div>
    </div>
</div>