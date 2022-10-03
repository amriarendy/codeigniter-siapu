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
										<h1 class="h4 text-gray-900 mb-4">Halaman Cek Akun User</h1>
									</div>
									<div class="card" style="margin-bottom: 120px; width: auto;">
								        <div class="card-header font-weight-bold bg-primary text-white">
								            Data User
								        </div> 
								        <?php foreach ($tbl_user as $u) : ?>
								    <div class="card-body">
								    <div class="row">
								        <div class="col-md-5">
								            <img style="width: 250px" src="assets/file/photo_user/default.png">
								        </div>
								        <div class="col-md-12">

								            <table class="">
								            	<tr>
								                    <td class="badge">Tanggal Akun Dibuat</td>
								                    <td>:</td>
								                    <td><?php echo $u->date_created ?></td>
								                </tr>
								                <tr>
								                    <td class="badge">ID</td>
								                    <td>:</td>
								                    <td><?php echo $u->id ?></td>
								                </tr>
								                <tr>
								                    <td class="badge">Nama</td>
								                    <td>:</td>
								                    <td><?php echo $u->name_user ?></td>
								                </tr>
								                <tr>
								                    <td class="badge">Username</td>
								                    <td>:</td>
								                    <td><?php echo $u->username ?></td>
								                </tr>
								                <tr>
								                    <td class="badge">Password</td>
								                    <td>:</td>
								                    <td><?php echo $u->password ?></td>
								                </tr>
												<tr>
								                    <td class="badge">Alamat</td>
								                    <td>:</td>
								                    <td><?php echo $u->alamat ?></td>
								                </tr>
								                <tr>
								                    <td class="badge">Tanggal Lahir</td>
								                    <td>:</td>
								                    <td><?php echo $u->tgl_lahir ?></td>
								                </tr>
												<tr>
								                    <td class="badge">Nomor Telepon/HP</td>
								                    <td>:</td>
								                    <td><?php echo $u->telp ?></td>
								                </tr>
<!-- 								                <tr>
								                    <td class="badge">No NIDN <small class="badge badge-primary pl-3">Khusus Dosen</small></td>
								                    <td>:</td>
								                    <td><?php echo $u->id ?></td>
								                </tr>
								                <tr>
								                    <td class="badge">No NIP <small class="badge badge-primary pl-3">Khusus Dosen</small></td>
								                    <td>:</td>
								                    <td><?php echo $u->id ?></td>
								                </tr>
								                <tr>
								                    <td class="badge">Penempatan Unit Kerja <small class="badge badge-primary pl-3">Khusus Dosen</small></td>
								                    <td>:</td>
								                    <td><?php echo $u->id ?></td>
								                </tr> -->
								                <tr>
								                    <td class="badge">Nomor KTP</td>
								                    <td>:</td>
								                    <td><?php echo $u->ktp ?></td>
								                </tr>
								                <tr>
								                    <td class="badge">Pekerjaan</td>
								                    <td>:</td>
								                    <td><?php echo $u->pekerjaan ?></td>
								                </tr>
								                <tr>
								                    <td class="badge">Instansi</td>
								                    <td>:</td>
								                    <td><?php echo $u->instansi ?></td>
								                </tr>
								                <tr>
								                    <td class="badge">Kategori Akun</td>
								                    <td>:</td>
								                    <td><?php echo $u->hak_layanan ?></td>
								                </tr>
								                <tr>
								                    <td class="badge">Aktifasi Akun</td>
								                    <td>:</td>
								                    <td><?php echo $u->is_active ?></td>
								                </tr>
								                <tr>
								                    <td class="badge">Pesan Dari Admin</td>
								                    <td>:</td>
								                    <td><?php echo $u->notice ?></td>
								                </tr>
								                <!-- <tr>
								                    <td class="badge">NIM Mahasiswa <small class="badge badge-warning pl-3">Khusus Mahasiswa</small></td>
								                    <td>:</td>
								                    <td><?php echo $u->id ?></td>
								                </tr>
								                <tr>
								                    <td class="badge">Prodi <small class="badge badge-warning pl-3">Khusus Mahasiswa</small></td>
								                    <td>:</td>
								                    <td><?php echo $u->id ?></td>
								                </tr>
								                <tr>
								                    <td class="badge">Semester <small class="badge badge-warning pl-3">Khusus Mahasiswa</small></td>
								                    <td>:</td>
								                    <td><?php echo $u->id ?></td>
								                </tr>
								                <tr>
								                    <td class="badge">No KTM <small class="badge badge-warning pl-3">Khusus Mahasiswa</small></td>
								                    <td>:</td>
								                    <td><?php echo $u->id ?></td>
								                </tr> -->
								                <tr>
								                    <td class="badge">Berkas</td>
								                    <td>:</td>
								                    <td><?php echo $u->berkas ?></td>
								                </tr>
								            </table>
								        <a class="btn btn-sm btn-success mb-3" href="<?php echo base_url('user/dosen/dashboard/dataview') ?>"><i class="fas fa-edit"></i> Edit Data</a>
								        </div>
								    </div>
								    </div>
								    <?php endforeach; ?>
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