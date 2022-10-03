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
                    <form action="<?= base_url('admin/akun/layanan_dosen_controllers_admin/Nidk_admin'); ?>" method="POST">
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
                    <!-- <?php if(empty($tbl_main_ojs)) : ?>
                        <tr>
                            <td colspan="7">
                                <div class="alert alert-danger" role="alert" align="center">
                                    Data Tidak Ditemukan
                                </div>
                            </td>
                        </tr>
                    <?php endif;?> -->
                    <?php foreach ($tbl_main_ojs as $main_ojs) : ?>
                    <tr>
                        <th scope="row"><?= ++$start; ?></th>
                        <td><?php echo $main_ojs->name_user ?></td>
                        <td align="center">
                            <?php if($main_ojs -> status_main_ojs == 'Y'){ ?><a class="btn btn-sm btn btn-success">Selesai</a> <?php }
                            else if($main_ojs -> status_main_ojs == 'P'){ ?> <a  class="btn btn-sm btn btn-warning">Proses</a><?php }
                            else if($main_ojs -> status_main_ojs == 'U'){ ?> <a  class="btn btn-sm btn btn-danger">Ulangi!</a><?php }
                            ?>
                        </td>
                        <td><?php echo $main_ojs->title_main_ojs ?></td>
                        <td><?php echo $main_ojs->time_stamp_main_ojs ?></td>
                        <td>
                            <a href="<?php echo base_url('admin/akun/layanan_infrastruktur_controllers_admin/main_ojs_admin/dataView/'. $main_ojs->id_main_ojs) ?>" class="badge badge-primary">Lihat</a>
                            <a onclick="return confirm('Yakin Hapus?')" href="<?php echo base_url('admin/akun/layanan_infrastruktur_controllers_admin/main_ojs_admin/deleteData/'. $main_ojs->id_main_ojs) ?>" class="badge badge-danger">delete</a>
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
