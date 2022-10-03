
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
                    <form action="<?= base_url('user/dosen/layanan_user_dosen/nup_dosen'); ?>" method="POST">
                        <div class="input-group mb-3">
                          <input type="text" class="form-control" placeholder="Search Keyword..." name="keyword" autocomplete="off" autofocus>
                          <div class="input-group-append">
                            <input class="btn btn-primary" type="submit" name="submit">
                          </div>
                        </div>
                    </form>
                </div>
            </div> -->

            <a class="btn btn-sm btn-success mb-3" href="<?php echo base_url('user/dosen/layanan_user_dosen/nup_dosen/tambahData') ?>"><i class="fas fa-plus"></i>Tambah Data</a> 

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
                    <!-- <?php if(empty($tbl_nup)) : ?>
                        <tr>
                            <td colspan="7">
                                <div class="alert alert-danger" role="alert" align="center">
                                    Data Tidak Ditemukan
                                </div>
                            </td>
                        </tr>
                    <?php endif;?> -->
                    <?php foreach ($tbl_nup as $nup) : ?>
                    <tr>
                        <th scope="row"><?= ++$start; ?></th>
                        <td><?php echo $nup->name_user ?></td>
                        <td>
                            <?php if($nup -> status_nup == 'Y'){ ?><a class="badge badge-success">Selesai</a> <?php }
                            else if($nup -> status_nup == 'P'){ ?> <a  class="badge badge-warning">Proses</a><?php }
                                else if($nup -> status_nup == 'U'){ ?> <a  class="badge badge-danger">Ulangi!</a><?php } ?>
                        </td>
                        <td><?php echo $nup->title_nup ?></td>
                        <td><?php echo $nup->time_stamp_nup ?></td>
                        
                        <td>
                            <a href="<?php echo base_url('user/dosen/layanan_user_dosen/nup_dosen/dataView/'. $nup->id_nup)?>" class="badge badge-primary">Lihat</a>
                            <a onclick="return confirm('Yakin Hapus?')" href="<?php echo base_url('user/dosen/layanan_user_dosen/nup_dosen/deleteData/'. $nup->id_nup)?>" class="badge badge-danger">delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table> 
            <!-- <?php echo $this->pagination->create_links(); ?> -->
        </div>
    </div>
</div>