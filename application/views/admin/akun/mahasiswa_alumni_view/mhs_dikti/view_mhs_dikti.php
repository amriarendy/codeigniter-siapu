<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><?php echo $title ?></h1>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <div class="row">
                <div class="col-md-5">  
                    <form action="<?= base_url('admin/akun/mahasiswa_alumni/mhs_dikti_admin'); ?>" method="POST">
                        <div class="input-group mb-3">
                          <input type="text" class="form-control" placeholder="Search Keyword..." name="keyword" autocomplete="off" autofocus>
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
            
            <table class="table table-hover ">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama User</th>
                        <th scope="col">Status</th>
                        <th scope="col">title</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($tbl_mhs_dikti)) : ?>
                        <tr>
                            <td colspan="7">
                                <div class="alert alert-danger" role="alert" align="center">
                                    Data Tidak Ditemukan
                                </div>
                            </td>
                        </tr>
                    <?php endif;?>
                    <?php foreach ($tbl_mhs_dikti as $mhs_dikti) : ?>
                    <tr>
                        <th scope="row"><?= ++$start; ?></th>
                        <td><?php echo $mhs_dikti->name_user ?></td>
                        <td>
                            <?php if($mhs_dikti -> status_mhs_dikti == 'Y'){ ?><a class="badge badge-success">Selesai</a> <?php }
                            else if($mhs_dikti -> status_mhs_dikti == 'P'){ ?> <a  class="badge badge-warning">Proses</a><?php }
                            else if($mhs_dikti -> status_mhs_dikti == 'U'){ ?> <a  class="badge badge-danger">Ulangi!</a><?php }
                            ?>
                        </td>
                        <td><?php echo $mhs_dikti->title_mhs_dikti ?></td>
                        <td><?php echo $mhs_dikti->time_stamp_mhs_dikti ?></td>
                        <td>
                            <a href="<?php echo base_url('admin/akun/mahasiswa_alumni/mhs_dikti_admin/dataView/'. $mhs_dikti->id_mhs_dikti) ?>" class="badge badge-primary">Lihat</a>
                            <a onclick="return confirm('Yakin Hapus?')" href="<?php echo base_url('admin/akun/mahasiswa_alumni/mhs_dikti_admin/deleteData/'. $mhs_dikti->id_mhs_dikti) ?>" class="badge badge-danger">delete</a>
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
</div>
