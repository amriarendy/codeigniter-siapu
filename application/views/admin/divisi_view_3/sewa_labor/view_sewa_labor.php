<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

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
                    <?php foreach ($tbl_sewa_labor as $sewa_labor) : ?>

                    <?php $i = 1; ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?php echo $sewa_labor->name_user ?></td>
                        <td align="center">
                            <?php if($sewa_labor -> status_sewa_labor == 'Y'){ ?><a class="badge badge-success">Selesai</a> <?php }
                            else if($sewa_labor -> status_sewa_labor == 'P'){ ?> <a  class="badge badge-warning">Proses</a><?php }
                                else if($sewa_labor -> status_sewa_labor == 'U'){ ?> <a  class="badge badge-danger">Ulangi!</a><?php } ?>
                        </td>
                        <td><?php echo $sewa_labor->title_sewa_labor ?></td>
                        <td><?php echo $sewa_labor->time_stamp_sewa_labor ?></td>
                        <td>
                            <a href="<?php echo base_url('admin/divisi3/layanan_divisi3/sewa_labor_divisi3/dataView/'. $sewa_labor->id_sewa_labor) ?>" class="badge badge-primary">Lihat</a>
                            <a onclick="return confirm('Yakin Hapus?')" href="<?php echo base_url('admin/divisi3/layanan_divisi3/sewa_labor_divisi3/deleteData/'. $sewa_labor->id_sewa_labor) ?>" class="badge badge-danger">delete</a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>

                </tbody>
            </table> 
        </div>
    </div>
</div>
        </div>
    </div>
</div>
