<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><?php echo $title ?></h1>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>
            <!-- Tombol Cari -->
           <div class="row">
                <div class="col-md-5">  
                    <form action="<?= base_url('admin/akun/AdminBidang'); ?>" method="POST">
                        <div class="input-group mb-3">
                          <input type="text" class="form-control" placeholder="Cari Data Admin..." name="keyword" autocomplete="off" autofocus>
                          <div class="input-group-append">
                            <input class="btn btn-primary" type="submit" name="submit">
                          </div>
                        </div>
                    </form>
                </div>
            </div>

             <h5>Hasil Data : <?=$total_rows; ?></h5>

            <div class="row">

        <div class="col-lg-12">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>
            <a class="mb-2 mt-2 btn btn-sm btn-success" href="<?php echo base_url('admin/akun/AdminBidang/tambahData') ?>"><i class="fas fa-plus"> Tambah Data</i></a>

            <table class="table table-hover ">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ID</th>
                        <th scope="col">Nama Admin</th>
                        <th scope="col">Username</th>
                        <th scope="col">Divisi</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($tbl_admin)) : ?>
                        <tr>
                            <td colspan="7">
                                <div class="alert alert-danger" role="alert" align="center">
                                    Data Tidak Ditemukan
                                </div>
                            </td>
                        </tr>
                    <?php endif;?>
                    <?php foreach ($tbl_admin as $ta) :?>
                    <tr>
                        <th scope="row"><?= ++$start; ?></th>
                        <td><?php echo $ta->id_admin ?></td>
                        <td><?php echo $ta->nama_admin ?></td>
                        <td><?php echo $ta->user_admin ?></td>
                        <td><?php if($ta -> hak_akses == '1'){ ?>Administrator<?php }
                            else if($ta -> hak_akses == '2'){ ?>Divisi Database Dan Sistem Terintegrasi<?php }
                            else if($ta -> hak_akses == '3'){ ?>Divisi Infrastruktur Dan Jaringan<?php }
                            else if($ta -> hak_akses == '4'){ ?>Divisi Layanan TI Dan Administrasi Umum<?php } ?>
                         </td>
                        <td>
                            <a href="<?php echo base_url('admin/akun/AdminBidang/gantiPassword/'. $ta->id_admin) ?>" class="badge badge-warning">Password</a>
                            <a href="<?php echo base_url('admin/akun/AdminBidang/updateData/'. $ta->id_admin) ?>" class="badge badge-primary">Update</a>
                            <a onclick="return confirm('Yakin Hapus?')" href="<?php echo base_url('admin/akun/AdminBidang/deleteData/'. $ta->id_admin) ?>" class="badge badge-danger">delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table> 
            <?php echo $this->pagination->create_links(); ?>
        </div>
    </div>
</div>
        </div>
    </div>

