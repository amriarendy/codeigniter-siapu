<!-- <!DOCTYPE html> -->
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Sistem Informasi Administrasi dan Pelayanan - Login</title>

	<!-- Custom fonts for this template-->
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<!-- Custom styles for this template-->
	<link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary" background="assets/file/data_file/bg_login.jpg"> 
	<div class="container">
		<!-- Outer Row -->
<!-- 		<div class="row justify-content-center">
			<div class="col-xl-5 col-lg-6 col-md-7"> -->
				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="row">
							<div class="col-lg-12">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4" style="font-family: 'arial'; font-weight: bold;">Halaman Cek Akun User</h1>
									</div>
									<div class="col-md-5">
								            <a class="btn btn-sm btn-danger mb-1" href="<?php echo base_url('CekUser/logout') ?>"><i class="fas fa-exit" align="center"></i>Logout</a>
								        </div>
									<div class="card" style="margin-bottom: 120px; width: auto;">
								        <div class="card-header font-weight-bold bg-primary text-white">
								            Data User
								        </div> 
								        <?php foreach ($tbl_user as $u) : ?>
								    <div class="card-body">
								    <div class="row">
								        <div class="col-md-5">
								            <a class="btn btn-sm btn-success mb-3" href="<?php echo base_url('cek_aktived/CekMahasiswa/updateMahasiswa/'. $u->id) ?>"><i class="fas fa-edit" align="center"></i> Edit Data</a>
								        </div>
								        <div class="col-md-12">

								            <table class="font-weight-bold table table-striped">
								            	<tr>
								                    <td>Tanggal Akun Dibuat</td>
								                    <td>:</td>
								                    <td><?php echo $u->date_created ?></td>
								                </tr>
								                <tr>
								                    <td>ID</td>
								                    <td>:</td>
								                    <td><?php echo $u->id ?></td>
								                </tr>
								                <tr>
								                    <td>Nama</td>
								                    <td>:</td>
								                    <td><?php echo $u->name_user ?></td>
								                </tr>
								                <tr>
								                    <td>Username</td>
								                    <td>:</td>
								                    <td><?php echo $u->username ?></td>
								                </tr>
								                <tr>
								                    <td>Password</td>
								                    <td>:</td>
								                    <td><?php echo $u->password ?></td>
								                </tr>
												<tr>
								                    <td>Alamat</td>
								                    <td>:</td>
								                    <td><?php echo $u->alamat ?></td>
								                </tr>
								                <tr>
								                    <td>Tanggal Lahir</td>
								                    <td>:</td>
								                    <td><?php echo $u->tgl_lahir ?></td>
								                </tr>
												<tr>
								                    <td>Nomor Telepon/HP</td>
								                    <td>:</td>
								                    <td><?php echo $u->telp ?></td>
								                </tr>
								                <tr>
								                    <td>Nomor KTP</td>
								                    <td>:</td>
								                    <td><?php echo $u->no_ktp ?></td>
								                </tr>
								                <tr>
								                    <td>Pekerjaan</td>
								                    <td>:</td>
								                    <td><?php echo $u->pekerjaan ?></td>
								                </tr>
								                <tr>
								                    <td>Kategori Akun</td>
								                    <td>:</td>
								                    <td><?php echo $u->hak_layanan ?></td>
								                </tr>
								                <tr>
								                    <td>Aktifasi Akun</td>
								                    <td>:</td>
								                    <td>
								                    	<?php if($u -> is_active == '0'){ ?><small class="badge badge-warning">Akun Belum Aktif, Mohon Tunggu Konfirmasi Admin</small> <?php }
                            							else if($u -> is_active == '1'){ ?> <small  class="badge-success">Akun Aktif</small><?php } ?></td>
								                </tr>
								                <tr>
								                    <td>NIM Mahasiswa</td>
								                    <td>:</td>
								                    <td><?php echo $u->nim ?></td>
								                </tr>
								                <tr>
								                    <td>Prodi</td>
								                    <td>:</td>
								                    <td><?php echo $u->prodi ?></td>
								                </tr>
								                <tr>
								                    <td>Semester</td>
								                    <td>:</td>
								                    <td><?php echo $u->semester ?></td>
								                </tr>
								                <tr>
								                    <td>No KTM</td>
								                    <td>:</td>
								                    <td><?php echo $u->ktm ?></td>
								                </tr>
								                <tr>
								                    <td>Berkas</td>
								                    <td>:</td>
								                    <td><div class="form-group">
									                    <div>
									                    <img class="mb-1"style="width: 100px" src="<?php echo base_url() . 'assets/file/berkas_user/' . $u->berkas ?>">
									                    </div>
									                    <?php
									                        if($u -> berkas)
									                            { ?><a href="<?php echo base_url() . 'assets/file/berkas_user/' . $u->berkas ?>"><i class="badge badge-primary">Lihat Berkas</i></a> <?php 
									                        }else if($u -> berkas == null){ ?>
									                            <label  class="badge badge-danger">Berkas Masih Kosong!</label>
									                    <?php } ?>
									                </div>
									            	</td>
								                </tr>
								                <tr>
								                    <td>Foto Profil</td>
								                    <td>:</td>
								                    <td><div class="form-group">
									                    <label>Foto Profil</label>
									                    <div>
									                    <img class="mb-1"style="width: 100px" src="<?php echo base_url() . 'assets/file/photo_user/' . $u->image ?>">
									                    </div>
									                    <?php
									                        if($u -> berkas)
									                            { ?><a href="<?php echo base_url() . 'assets/file/photo_user/' . $u->image ?>"><i class="badge badge-primary">Lihat Berkas</i></a> <?php 
									                        }else if($u -> berkas == null){ ?>
									                            <label  class="badge badge-danger">Berkas Masih Kosong!</label>
									                    <?php } ?>
									                 </div>
									             </td>
								                <tr>
								                    <td>Pesan Dari Admin</td>
								                    <td>:</td>
								                    <td><div class="alert-warning" role="alert" align="center">"<?php echo $u->notice ?>"</div></td>
								                </tr>
								            </table>
								        
								        </div>
								    </div>
								    </div>

								    <?php endforeach; ?>
								</div>
								<p class="text-danger" role="alert" align="">Note : </p>
								</div>
							</div>
						</div>
					</div>
				</div>

<!-- 			</div>
		</div> -->
	</div>
	<!-- Bootstrap core JavaScript-->
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="js/sb-admin-2.min.js"></script>

</body>

</html>