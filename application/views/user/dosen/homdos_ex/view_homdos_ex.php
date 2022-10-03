<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

<div class="row">
        <div class="col-lg">
            
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <!-- Tombol Cari -->
           <!-- <div class="row">
                <div class="col-md-5">  
                    <form action="<?= base_url('user/dosen/layanan_user_dosen/homdos_ex_dosen'); ?>" method="POST">
                        <div class="input-group mb-3">
                          <input type="text" class="form-control" placeholder="Search Keyword..." name="keyword" autocomplete="off" autofocus>
                          <div class="input-group-append">
                            <input class="btn btn-primary" type="submit" name="submit">
                          </div>
                        </div>
                    </form>
                </div>
            </div> -->

            <a class="btn btn-sm btn-success mb-3" href="<?php echo base_url('user/dosen/layanan_user_dosen/homdos_ex_dosen/tambahData') ?>"><i class="fas fa-plus"></i>Tambah Data</a> 

            <table class="table table-hover ">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama User</th>
                        <th scope="col">Status</th>
                        <th scope="col">Pelayanan</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <?php if(empty($tbl_homdos_ex)) : ?>
                        <tr>
                            <td colspan="7">
                                <div class="alert alert-danger" role="alert" align="center">
                                    Data Tidak Ditemukan
                                </div>
                            </td>
                        </tr>
                    <?php endif;?> -->
                    <?php foreach ($tbl_homdos_ex as $homdos_ex) : ?>
                    <tr>
                        <th scope="row"><?= ++$start; ?></th>
                        <td><?php echo $homdos_ex->name_user ?></td>
                        <td>
                            <?php if($homdos_ex -> status_homdos_ex == 'Y'){ ?><a class="badge badge-success">Selesai</a> <?php }
                            else if($homdos_ex -> status_homdos_ex == 'P'){ ?> <a  class="badge badge-warning">Proses</a><?php }
                                else if($homdos_ex -> status_homdos_ex == 'U'){ ?> <a  class="badge badge-danger">Ulangi!</a><?php } ?>
                        </td>
                        <td><?php echo $homdos_ex->title_homdos_ex ?></td>
                        <td><?php echo $homdos_ex->time_stamp_homdos_ex ?></td>
                        
                        <td>
                            <a href="<?php echo base_url('user/dosen/layanan_user_dosen/homdos_ex_dosen/dataView/'. $homdos_ex->id_homdos_ex)?>" class="badge badge-primary">Lihat</a>
                            <a onclick="return confirm('Yakin Hapus?')" href="<?php echo base_url('user/dosen/dashboard/deleteData/'. $homdos_ex->id_homdos_ex)?>" class="badge badge-danger">delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
           <!--  <?php echo $this->pagination->create_links(); ?>  -->
        </div>
    </div>
</div>