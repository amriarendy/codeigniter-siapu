<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <!-- Tombol Cari -->
           <div class="row">
                <div class="col-md-5"> 
                    <form action="<?= base_url('admin/divisi1/layanan_divisi1/nidk_divisi1'); ?>" method="POST">
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
                        <th scope="col">Divisi</th>
                        <th scope="col">Date</th>
                        <th scope="col">title</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($tbl_nidk)) : ?>
                        <tr>
                            <td colspan="7">
                                <div class="alert alert-danger" role="alert" align="center">
                                    Data Tidak Ditemukan
                                </div>
                            </td>
                        </tr>
                    <?php endif;?>
                    <?php foreach ($tbl_nidk as $nidk) : ?>
                    <tr>
                        <th scope="row"><?= ++$start; ?></th>
                        <td><?php echo $nidk->name_user ?></td>
                        <td>
                            <?php if($nidk -> status_nidk == 'Y'){ ?><a class="badge badge-success">Selesai</a> <?php }
                            else if($nidk -> status_nidk == 'P'){ ?> <a  class="badge badge-warning">Proses</a><?php }
                                else if($nidk -> status_nidk == 'U'){ ?> <a  class="badge badge-danger">Ulangi!</a><?php } ?>
                        </td>
                        <td><?php echo $nidk->akses_id ?></td>
                        <td><?php echo $nidk->time_stamp_nidk ?></td>
                        <td><?php echo $nidk->title_nidk ?></td>
                        <td>
                            <a href="<?php echo base_url('admin/divisi1/layanan_divisi1/nidk_divisi1/dataView/'. $nidk->id_nidk) ?>" class="badge badge-primary">Lihat</a>
                            <a onclick="return confirm('Yakin Hapus?')" href="<?php echo base_url('admin/divisi1/layanan_divisi1/nidk_divisi1/deleteData/'. $nidk->id_nidk) ?>" class="badge badge-danger">delete</a>
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
