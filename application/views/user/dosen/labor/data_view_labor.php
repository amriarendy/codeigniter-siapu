<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1></div>

        <div class="alert alert-success font-weight-bold mb-4" style="width: 100%">Halaman Detail Data Pelayanan Pengungjung
        </div>

        <div class="card" style="margin-bottom: 120px; width: 100%">
            <div class="card-header font-weight-bold bg-primary text-white">
                Data Pelayanan Pengunjung
        </div>

 
        <form>
        <div class="card-body">
        <div class="row">
        <div class="col-md-10">
            <!-- <img style="width: 250px" src="<?php echo base_url('assets/file/photo_user/'.$tu->image)?>"> -->
        </div>
        <?php foreach ($tbl_labor as $labor) : ?>
        <div class="col-md-12">
                <table class="table table-striped table-hover">

                        <input type="hidden" name="id_labor" value="<?php echo $labor->id_labor ?>">
                    <tr>
                        <td>ID User</td>
                        <td>:</td>
                        <td><?php echo $labor->user_id ?></td>
                    </tr>
                    <tr>
                        <td>Nama User</td>
                        <td>:</td>
                        <td><?php echo $labor->name_user ?></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td>
                            <?php if($labor -> status_labor == 'Y'){ ?><a class="btn btn-sm btn btn-success">Selesai</a> <?php }
                            else if($labor -> status_labor == 'P'){ ?> <a  class="btn btn-sm btn btn-warning">Proses</a><?php }
                            else if($labor -> status_labor == 'U'){ ?> <a  class="btn btn-sm btn btn-danger">Ulangi!</a><?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Tanggal Masuk Berkas</td>
                        <td>:</td>
                        <td><?php echo $labor->time_stamp_labor ?></td>
                    </tr>
                    <tr>
                        <td>Judul</td>
                        <td>:</td>
                        <td><?php echo $labor->title_labor ?></td>
                    </tr>
                    <tr>
                        <td>Deskripsi</td>
                        <td>:</td>
                        <td><?php echo $labor->desc_labor ?></td>
                    </tr>
                    <tr>
                        <td>Nama Admin</td>
                        <td>:</td>
                        <td><?php echo $labor->name_admin ?></td>
                    </tr>

                    <tr>
                        <td>Berkas Anda</td>
                        <td>:</td>
                        <td><a style="color: blue;"><?php echo $labor->file_labor ?></a></td>
                    </tr>

                    <tr>
                        <td>Divisi Layanan Bidang</td>
                        <td>:</td>
                        <td>
                        <?php
                        if($labor -> berkas_labor)
                            { ?><a href="<?php echo base_url() . 'assets/file/berkas_admin/' . $labor->berkas_labor ?>"><i class="btn btn-sm btn btn-success">Download Berkas</i></a> <?php 
                        }else if($labor -> berkas_labor == null){ ?>
                            <label  class="btn btn-sm btn btn-danger">Berkas Masih Kosong!</label>
                        <?php } ?>
                    </td>
                    </tr>
                    
                </table>
            </div>
             <?php endforeach; ?>
        </div>
    </form>
    </div>
</div>