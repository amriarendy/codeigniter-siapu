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
                    <form action="<?= base_url('user/mahasiswa/layanan_user_mahasiswa/mhs_dikti_mahasiswa'); ?>" method="POST">
                        <div class="input-group mb-3">
                          <input type="text" class="form-control" placeholder="Search Keyword..." name="keyword" autocomplete="off" autofocus>
                          <div class="input-group-append">
                            <input class="btn btn-primary" type="submit" name="submit">
                          </div>
                        </div>
                    </form>
                </div>
            </div> -->

            <a class="btn btn-sm btn-success mb-3" href="<?php echo base_url('user/mahasiswa/layanan_user_mahasiswa/mhs_dikti_mahasiswa/tambahData') ?>"><i class="fas fa-plus"></i>Tambah Data</a> 
        
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
                    <!-- <?php if(empty($tbl_mhs_dikti)) : ?>
                        <tr>
                            <td colspan="7">
                                <div class="alert alert-danger" role="alert" align="center">
                                    Data Tidak Ditemukan
                                </div>
                            </td>
                        </tr>
                    <?php endif;?> -->
                    <?php foreach ($tbl_mhs_dikti as $mhs_dikti) : ?>
                    <tr>
                        <th scope="row"><?= ++$start; ?></th>
                        <td><?php echo $mhs_dikti->name_user ?></td>
                        <td>
                            <?php if($mhs_dikti -> status_mhs_dikti == 'Y'){ ?><a class="badge badge-success">Selesai</a> <?php }
                            else if($mhs_dikti -> status_mhs_dikti == 'P'){ ?> <a  class="badge badge-warning">Proses</a><?php }
                                else if($mhs_dikti -> status_mhs_dikti == 'U'){ ?> <a  class="badge badge-danger">Ulangi!</a><?php } ?>
                        </td>
                        <td><?php echo $mhs_dikti->title_mhs_dikti ?></td>
                        <td><?php echo $mhs_dikti->time_stamp_mhs_dikti ?></td>
                        
                        <td>
                            <a href="<?php echo base_url('user/mahasiswa/layanan_user_mahasiswa/mhs_dikti_mahasiswa/dataView/'. $mhs_dikti->id_mhs_dikti)?>" class="badge badge-primary">Lihat</a>
                            <a onclick="return confirm('Yakin Hapus?')" href="<?php echo base_url('user/mahasiswa/layanan_user_mahasiswa/mhs_dikti_mahasiswa/deleteData/'. $mhs_dikti->id_mhs_dikti)?>" class="badge badge-danger">delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table> 
            <!-- <?php echo $this->pagination->create_links(); ?> -->
        </div>
    </div>
</div>