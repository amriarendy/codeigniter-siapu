<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card" style="width:50%">
        <div class="card-body">
            <?php foreach ($tbl_user as $tu) : ?>
            <form method="POST" action="<?php echo base_url('user/public_user/ChangePublic/gantiPasswordAksi') ?>">
                <input type="hidden" name="id" class="form-control" value="<?php echo $tu->id?>">
                <div class="form-group">
                    <label>Password Baru</label>
                    <input type="password" name="passBaru" class="form-control">
                    <?php echo form_error('passBaru', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label>Ulangi Password Baru</label>
                    <input type="password" name="ulangPass" class="form-control">
                    <?php echo form_error('ulangPass', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        <?php endforeach;?>
        </div>
    </div>
</div>