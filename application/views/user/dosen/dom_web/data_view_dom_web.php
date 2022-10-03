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
        <?php foreach ($tbl_dom_web as $dom_web) : ?>
        <div class="col-md-12">
                <table class="table table-striped table-hover">

                        <input type="hidden" name="id_dom_web" value="<?php echo $dom_web->id_dom_web ?>">
                    <tr>
                        <td>ID User</td>
                        <td>:</td>
                        <td><?php echo $dom_web->user_id ?></td>
                    </tr>
                    <tr>
                        <td>Nama User</td>
                        <td>:</td>
                        <td><?php echo $dom_web->name_user ?></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td>
                            <?php if($dom_web -> status_dom_web == 'Y'){ ?><a class="btn btn-sm btn btn-success">Selesai</a> <?php }
                            else if($dom_web -> status_dom_web == 'P'){ ?> <a  class="btn btn-sm btn btn-warning">Proses</a><?php }
                            else if($dom_web -> status_dom_web == 'U'){ ?> <a  class="btn btn-sm btn btn-danger">Ulangi!</a><?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Tanggal Masuk Berkas</td>
                        <td>:</td>
                        <td><?php echo $dom_web->time_stamp_dom_web ?></td>
                    </tr>
                    <tr>
                        <td>Judul</td>
                        <td>:</td>
                        <td><?php echo $dom_web->title_dom_web ?></td>
                    </tr>
                    <tr>
                        <td>Deskripsi</td>
                        <td>:</td>
                        <td><?php echo $dom_web->desc_dom_web ?></td>
                    </tr>
                    <tr>
                        <td>Nama Admin</td>
                        <td>:</td>
                        <td><?php echo $dom_web->name_admin ?></td>
                    </tr>

                    <tr>
                        <td>Berkas Anda</td>
                        <td>:</td>
                        <td><a style="color: blue;"><?php echo $dom_web->file_dom_web ?></a></td>
                    </tr>

                    <tr>
                        <td>Divisi Layanan Bidang</td>
                        <td>:</td>
                        <<td>
                        <?php
                        if($dom_web -> berkas_dom_web)
                            { ?><a href="<?php echo base_url() . 'assets/file/berkas_admin/' . $dom_web->berkas_dom_web ?>"><i class="btn btn-sm btn btn-success">Download Berkas</i></a> <?php 
                        }else if($dom_web -> berkas_dom_web == null){ ?>
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