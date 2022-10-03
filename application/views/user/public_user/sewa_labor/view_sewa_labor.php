<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

<div class="row">
        <div class="col-lg">
            
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <a class="btn btn-sm btn-success mb-3" href="<?php echo base_url('user/public_user/layanan_user_public/sewa_labor_public/tambahData') ?>"><i class="fas fa-plus"></i>Tambah Data</a> 

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
                    <?php foreach ($tbl_sewa_labor as $sewa_labor) : ?>
                    <tr>
                        <th scope="row"><?= ++$start; ?></th>
                        <td><?php echo $sewa_labor->name_user ?></td>
                        <td>
                            <?php if($sewa_labor -> status_sewa_labor == 'Y'){ ?><a class="badge badge-success">Selesai</a> <?php }
                            else if($sewa_labor -> status_sewa_labor == 'P'){ ?> <a  class="badge badge-warning">Proses</a><?php }
                                else if($sewa_labor -> status_sewa_labor == 'U'){ ?> <a  class="badge badge-danger">Ulangi!</a><?php } ?>
                        </td>
                        <td><?php echo $sewa_labor->title_sewa_labor ?></td>
                        <td><?php echo $sewa_labor->time_stamp_sewa_labor ?></td>
                        
                        <td>
                            <a href="<?php echo base_url('user/public_user/layanan_user_public/sewa_labor_public/dataView/'. $sewa_labor->id_sewa_labor)?>" class="badge badge-primary">Lihat</a>
                            <a onclick="return confirm('Yakin Hapus?')" href="<?php echo base_url('user/public_user/layanan_user_public/sewa_labor_public/deleteData/'. $sewa_labor->id_sewa_labor)?>" class="badge badge-danger">delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table> 
        </div>
    </div>
</div>