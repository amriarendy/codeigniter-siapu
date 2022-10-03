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
										<h1 class="h4 text-gray-900 mb-4" style="font-family: 'arial'; font-weight: bold;">Halaman Update Akun User</h1>
									</div>
									<div class="col-md-5">
								            <a class="btn btn-sm btn-danger mb-1" href="<?php echo base_url('CekUser/logout') ?>"><i class="fas fa-exit" align="center"></i>Logout</a>
								        </div>
								        <div class="card-header font-weight-bold bg-primary text-white">
								            Data User
								        </div> 

										<div class="card font-weight-bold" style="width: auto; margin-bottom: 100px;">
											<div class="card-body">
												<?php foreach ($tbl_user as $tu) : ?>
												<form method="POST" action="<?php echo base_url('cek_aktived/CekPublic/updatePublicAksi') ?>" enctype="multipart/form-data">

													<div class="form-group">
														<label>ID User</label>
														<input type="text" name="id" class="form-control" value="<?php echo $tu->id?>" readonly>
													</div>

													<div class="form-group">
														<label>Nama User</label>
														<input type="text" name="name_user" class="form-control" value="<?php echo $tu->name_user?>">
														<?php echo form_error('name_user', '<small class="text-danger pl-3">', '</small>'); ?>
													</div>

													<div class="form-group">
														<label>Username</label>
														<input type="text" name="username" class="form-control" value="<?php echo $tu->username?>">
													</div>

													<div class="form-group">
														<label>Kategori</label>
														<select name="hak_layanan" class="form-control">
									                            <?php if($tu -> hak_layanan == '1'){ ?>Dosen<?php }
									                            else if($tu -> hak_layanan == '2'){ ?>Mahasiswa<?php }
									                            else if($tu -> hak_layanan == '3'){ ?>Public<?php } ?>
									                        </option>
															<option value="1">Dosen</option>
															<option value="2">Mahasiswa</option>
															<option value="3">Public</option>
														</select>
														
													</div>

													<div class="form-group">
									                    <label>Tanggal Lahir</label>
									                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?php echo $tu->tgl_lahir ?>">
									                </div>
									                <div class="form-group">
									                    <label>No KTP</label>
									                    <input type="text" class="form-control" id="no_ktp" name="no_ktp" value="<?php echo $tu->no_ktp ?>">
									                    <?= form_error('no_ktp', '<small class="text-danger pl-3">', '</small>'); ?>
									                </div>
									                <div class="form-group">
									                    <label>No. Telepone</label>
									                    <input type="text" class="form-control" id="telp" name="telp" value="<?php echo $tu->telp ?>">
									                    <?= form_error('telp', '<small class="text-danger pl-3">', '</small>'); ?>
									                </div>
									                <div class="form-group">
									                    <label>Alamat</label>
									                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $tu->alamat ?>">
									                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
									                </div>
									                <div class="form-group">
									                    <label>Pekerjaan</label>
									                    <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?php echo $tu->pekerjaan ?>">
									                    <?= form_error('pekerjaan', '<small class="text-danger pl-3">', '</small>'); ?>
									                </div>
									                <div class="form-group">
									                    <label>Instansi</label>
									                    <input type="text" class="form-control" id="instansi" name="instansi" value="<?php echo $tu->instansi ?>">
									                    <?= form_error('instansi', '<small class="text-danger pl-3">', '</small>'); ?>
									                </div>

									                <div class="form-group">
									                    <label>Berkas</label>
									                    <div>
									                    <img class="mb-1" style="width: 150px" src="<?php echo base_url() . 'assets/file/berkas_user/' . $tu->berkas ?>">
									                    </div>
									                    <?php
									                        if($tu -> berkas)
									                            { ?><a href="<?php echo base_url() . 'assets/file/berkas_user/' . $tu->berkas ?>"><i class="badge badge-primary">Lihat Berkas</i></a> <?php 
									                        }else if($tu -> berkas == null){ ?>
									                            <label  class="badge badge-danger">Berkas Masih Kosong!</label>
									                    <?php } ?>
									                    <div  class="mt-1">
									                    <input type="file" class="form-control" name="berkas" id="berkas">
									                </div>
									                </div>
									                <div class="form-group">
									                    <label>Upload Foto Profil</label>
									                    <div>
									                    <img class="mb-1" style="width: 150px" src="<?php echo base_url() . 'assets/file/photo_user/' . $tu->image ?>">
									                    </div>
									                    <?php
									                        if($tu -> berkas)
									                            { ?><a href="<?php echo base_url() . 'assets/file/photo_user/' . $tu->image ?>"><i class="badge badge-primary">Lihat Berkas</i></a> <?php 
									                        }else if($tu -> berkas == null){ ?>
									                            <label  class="badge badge-danger">Berkas Masih Kosong!</label>
									                    <?php } ?>
									                    <div class="mt-1">
									                    <input type="file" name="image" class="form-control" value=""> 
									                </div>
									                 </div> 

													<button type="submit" class="btn btn-primary">Submit</button>
												</form>
											<?php endforeach ?>
											</div>
										</div>
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
</div>