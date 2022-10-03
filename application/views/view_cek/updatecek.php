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
		<div class="row justify-content-center">
			<div class="col-xl-5 col-lg-6 col-md-7">
				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="row">S
							<div class="col-lg-12">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4">Aplikasi Pelayanan <br> PTIPD UIN STS JAMBI</h1>
									</div>
									<?php echo $this->session->flashdata('message') ?>
									<form class="user" method="POST" action="<?php echo base_url('CekUser') ?>">
										<div class="form-group">
											<input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukan Email Anda..." name="username">
											<?php echo form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
										</div>
										<div class="form-group">
											<input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password">
											<?php echo form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
										</div>
										<hr>
										<button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
									</form>
									<hr>
									<div class="text-center">
										<a class="small" href="<?php echo base_url() . 'assets/file/data_file/bukupanduan.pdf' ?>">PANDUAN PELAYANAN PTIPD</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
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