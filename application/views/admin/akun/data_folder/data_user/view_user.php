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
                    <form action="<?= base_url('admin/akun/DataUser'); ?>" method="POST">
                        <div class="input-group mb-3">
                          <input type="text" class="form-control" placeholder="Cari Data User..." name="keyword" autocomplete="off" autofocus>
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
            <a class="mb-2 mt-2 btn btn-sm btn-success" href="<?php echo base_url('admin/akun/DataUser/tambahData') ?>"><i class="fas fa-plus"> Tambah Data</i></a>

            <table class="table table-hover ">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ID</th>
                        <th scope="col">Nama User</th>
                        <th scope="col">Username</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Status</th>
                        <th scope="col">Akun Dibuat</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($tbl_user)) : ?>
                        <tr>
                            <td colspan="9">
                                <div class="alert alert-danger" role="alert" align="center">
                                    Data Tidak Ditemukan
                                </div>
                            </td>
                        </tr>
                    <?php endif;?>
                   <?php foreach ($tbl_user as $tu) :?>
                    <tr>
                        <td><?= ++$start; ?></td>
                        <td><?php echo $tu->id ?></td>
                        <td><?php echo $tu->name_user ?></td>
                        <td><?php echo $tu->username ?></td>
                        <td><?php if($tu -> hak_layanan == '1'){ ?>Dosen<?php }
                            else if($tu -> hak_layanan == '2'){ ?>Mahasiswa<?php }
                            else if($tu -> hak_layanan == '3'){ ?>Public<?php } ?>  
                        </td>
                        <td align="center"><?php if($tu -> is_active == '0'){ ?><a class="badge badge-danger">Tidak Aktif</a> <?php }
                            else if($tu -> is_active == '1'){ ?> <a  class="badge badge-success">Aktif</a><?php }
                             ?>
                        </td>
                        <td><?php echo $tu->date_created ?></td>
                        <td align="center"><img style="width: 65px" src="<?php echo base_url() . 'assets/file/photo_user/' . $tu->image ?>"></td>
                        <td>
                            <a href="<?php echo base_url('admin/akun/DataUser/gantiPassword/'. $tu->id) ?>" class="badge badge-warning">Password</a>
                            <a href="<?php echo base_url('admin/akun/DataUser/updateData/'. $tu->id) ?>" class="badge badge-primary">Update</a>
                            <a onclick="return confirm('Yakin Hapus?')" href="<?php echo base_url('admin/akun/DataUser/deleteData/'. $tu->id) ?>" class="badge badge-danger">delete</a>
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

