<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1></div>

        <div class="alert alert-success font-weight-bold mb-4" style="width: 100%">Halaman Detail Data Pelayanan Pengungjung
        </div>

        <div class="card" style="margin-bottom: 120px; width: 100%">
            <div class="card-header font-weight-bold bg-primary text-white">
                Data Pelayanan Pengunjung
        </div>
        <?php foreach ($tbl_dom_ojs as $dom_ojs) : ?>
        <?php foreach ($tbl_admin as $ta) : ?>
        <form method="POST" action="<?php echo base_url('admin/akun/layanan_infrastruktur_controllers_admin/dom_ojs_admin/updateDataAksi')?>" enctype="multipart/form-data">
        <div class="card-body mx-10">
            <!-- <div class="col-md-5 mb-3">
                <img src="<?php echo base_url('assets/photo/user-2.png') ?>">
            </div> -->
            <div class="col-md-12">
                <table class="table table-striped table-hover">
                    
                    <input type="hidden" name="id_dom_ojs" value="<?php echo $dom_ojs->id_dom_ojs ?>"></td>
                    <tr>
                        <td>ID User</td>
                        <td>:</td>
                        <td><?php echo $dom_ojs->user_id ?></td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><?php echo $dom_ojs->name_user ?></td>
                    </tr>
                    <tr>
                        <td>ID Admin</td>
                        <td>:</td>
                        <td><input type="text" name="admin_id" class="form-control" value="<?php echo $ta->id_admin ?>" readonly></td>
                    </tr>
                    <tr>
                        <td>Nama Admin</td>
                        <td>:</td>
                        <td><input type="text" name="name_admin" class="form-control" value="<?php echo $ta->nama_admin ?>" readonly></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td>
                            <select type="text" name="status_dom_jos" class="form-control">
                                <option value="<?php echo $dom_jos->status_dom_jos ?>">
                                    <?php if($dom_jos -> status_dom_jos == 'Y'){ ?><a>Selesai</a> <?php }
                                        else if($dom_jos -> status_dom_jos == 'P'){ ?> <a>Proses</a><?php }
                                        else if($dom_jos -> status_dom_jos == 'U'){ ?> <a>Berkas Belum Lengkap!</a><?php } ?></option>
                                <option value="U">Berkas Belum Lengkap!</option>
                                <option value="P">Proses</option>
                                <option value="Y">Selesai</option>
                                <?php echo form_error('status_dom_jos','<div class="text-small text-danger"></div>'); ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Tanggal Masuk Berkas</td>
                        <td>:</td>
                        <td><?php echo $dom_ojs->time_stamp_dom_ojs ?></td>
                    </tr>
                    <tr>
                        <td>Perihal</td>
                        <td>:</td>
                        <td><?php echo $dom_ojs->title_dom_ojs ?></td>
                    </tr>
                    <tr>
                        <td>Deskripsi</td>
                        <td>:</td>
                        <td><?php echo $dom_ojs->desc_dom_ojs ?></td>
                    </tr>
                    <tr>
                        <td>Berkas User</td>
                        <td>:</td>
                        <td>
                        <?php
                        if($dom_ojs -> file_dom_ojs)
                            { ?><a href="<?php echo base_url() . 'assets/file/berkas_user/' . $dom_ojs->file_dom_ojs ?>"><i class="btn btn-sm btn btn-success">Download Berkas</i></a> <?php 
                        }else if($dom_ojs -> file_dom_ojs == null){ ?>
                            <label  class="btn btn-sm btn btn-danger">Berkas Masih Kosong!</label>
                        <?php } ?>
                        </td>
                    </tr>

                    <tr>
                        <td>Masukan Berkas</td>
                        <td>:</td>
                        <td><input type="file" name="berkas_dom_ojs" class="form-control"></td>
                        
                    </tr>
                    
                </table>
            </div>
            <center> 
            <button type="submit" class="btn btn-success ">Update!</button>
            </center> 
        </div>
    </form>
        <?php endforeach; ?>
        <?php endforeach; ?>
    </div>

</div>