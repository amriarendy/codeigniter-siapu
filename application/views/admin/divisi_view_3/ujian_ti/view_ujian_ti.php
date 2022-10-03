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
                    <form action="<?= base_url('admin/divisi3/layanan_divisi3/ujian_ti_divisi3'); ?>" method="POST">
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
                    <?php if(empty($tbl_ujian_ti)) : ?>
                        <tr>
                            <td colspan="7">
                                <div class="alert alert-danger" role="alert" align="center">
                                    Data Tidak Ditemukan
                                </div>
                            </td>
                        </tr>
                    <?php endif;?>
                    <?php foreach ($tbl_ujian_ti as $ujian_ti) : ?>
                    <tr>
                        <th scope="row"><?= ++$start; ?></th>
                        <td><?php echo $ujian_ti->name_user ?></td>
                        <td>
                            <?php if($ujian_ti -> status_ujian_ti == 'Y'){ ?><a class="badge badge-success">Selesai</a> <?php }
                            else if($ujian_ti -> status_ujian_ti == 'P'){ ?> <a  class="badge badge-warning">Proses</a><?php }
                                else if($ujian_ti -> status_ujian_ti == 'U'){ ?> <a  class="badge badge-danger">Ulangi!</a><?php } ?>
                        </td>
                        <td><?php echo $ujian_ti->title_ujian_ti ?></td>
                        <td><?php echo $ujian_ti->time_stamp_ujian_ti ?></td>
                        <td>
                            <a href="<?php echo base_url('admin/divisi3/layanan_divisi3/ujian_ti_divisi3/dataView/'. $ujian_ti->id_ujian_ti) ?>" class="badge badge-primary">Lihat</a>
                            <a onclick="return confirm('Yakin Hapus?')" href="<?php echo base_url('admin/divisi3/layanan_divisi3/ujian_ti_divisi3/deleteData/'. $ujian_ti->id_ujian_ti) ?>" class="badge badge-danger">delete</a>
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
