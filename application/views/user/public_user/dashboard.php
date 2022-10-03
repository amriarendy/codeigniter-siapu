<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4 col-lg-8">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="alert alert-success font-weight-bold mb-4 col-lg-8">
        Selamat Datang Anda Login Sebagai Dosen
    </div>

    <div class="card col-mb-4 col-lg-8" style="margin-bottom: 120px;">
        <div class="card-header font-weight-bold bg-primary text-white">
            Data pribadi
        </div>      
<?php foreach ($tbl_user as $u) : ?>
    <div class="card mb-3 col-lg-12" >
    <div class="row no-gutters ">
        <div class="col-md-4 col-lg-12" align="center" style="width:30px 30px;">
            <img style="width: 40%;" src="<?php echo base_url() . 'assets/file/photo_user/' . $u->image ?>">
        </div>
        <div class="col-md-12">
            <div class="card-body" style="font-family: 'Open Sans', sans-serifl; font-size:16px; padding: 5px 5px;" >
                <table class="table table-striped sm-1 md-3 col-lg-12">
                    <tr>
                        <td>ID</td>
                        <td> : </td>
                        <td><?php echo $u->id ?></td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td> : </td>
                        <td><?php echo $u->name_user ?></td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td> : </td>
                        <td><?php echo $u->username ?></td>
                    </tr>
                    <tr>
                        <td>Akun Dibuat</td>
                        <td> : </td>
                        <td><?php echo $u->date_created ?></td>
                    </tr>
                </table>
            </div>
        <a class="btn btn-sm btn-success mb-3" href="<?php echo base_url('user/public_user/dashboard/dataview/'. $u->id) ?>"><i class="fas fa-edit"></i> Edit Data</a>
        </div>
    </div>
    </div>
<?php endforeach; ?>
</div>
</div>