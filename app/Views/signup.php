<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="<?= base_url('assets') ?>/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="<?= base_url('assets') ?>/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="<?= base_url('assets') ?>/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="<?= base_url('assets') ?>/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="<?= base_url('assets') ?>/css/pace.min.css" rel="stylesheet" />
	<script src="<?= base_url('assets') ?>/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="<?= base_url('assets') ?>/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= base_url('assets') ?>/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="<?= base_url('assets') ?>/css/app.css" rel="stylesheet">
	<link href="<?= base_url('assets') ?>/css/icons.css" rel="stylesheet">
	<title>Signup Pelanggan</title>
</head>

<body class="bg-login">
	<!--wrapper-->
	<div class="wrapper">
		<div class="d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
					<div class="col mx-auto">
						<div class="card">
							<div class="card-body">
								<div class="border p-4 rounded">
									<div class="text-center">
										<h3 class="">Mendaftar Sebagai Pengguna</h3>
										<p>Sudah ada akun? <a href="<?= base_url('auth') ?>">Log In disini</a>
										</p>
									</div>
									<div class="login-separater text-center mb-4"> <span>DATA DIRI</span>
										<hr />
									</div>
									<div class="form-body">
										<?php if (session()->has('success')) : ?>
											<div class="alert alert-success border-0 bg-success alert-dismissible fade show">
												<div class="text-white"><?= session('success') ?></div>
												<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
											</div>
										<?php endif ?>
										<?php if (session()->has('danger')) : ?>
											<div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
												<div class="text-white"><?= session('danger') ?></div>
												<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
											</div>
										<?php endif ?>
										<form class="row g-3" action="<?= base_url('auth/signup') ?>" method="post" enctype="multipart/form-data">
											<div class="form-group mb-4">
												<label for="nama_lengkap">Nama Lengkap</label>
												<input type="text" class="form-control <?= (isset(session('errors')['nama_lengkap'])) ? 'is-invalid' : '' ?>" id="nama_lengkap" name="nama_lengkap" value="<?= old('nama_lengkap') ?>">
												<div class="invalid-feedback">
													<?php if (isset(session('errors')['nama_lengkap'])) : ?>
														<?= session('errors')['nama_lengkap'] ?>
													<?php endif; ?>
												</div>
											</div>
											<div class="form-group mb-4">
												<label for="file">Foto</label>
												<input type="file" class="form-control <?= (isset(session('errors')['file'])) ? 'is-invalid' : '' ?>" id="file" name="file">
												<div class="invalid-feedback">
													<?php if (isset(session('errors')['file'])) : ?>
														<?= session('errors')['file'] ?>
													<?php endif; ?>
												</div>
											</div>
											<div class="col-12">
												<label for="email">Email</label>
												<input type="email" class="form-control <?= (isset(session('errors')['email'])) ? 'is-invalid' : '' ?>" id="email" name="email" value="<?= old('email') ?>">
												<div class="invalid-feedback">
													<?php if (isset(session('errors')['email'])) : ?>
														<?= session('errors')['email'] ?>
													<?php endif; ?>
												</div>
											</div>
											<div class="col-12">
												<label for="username">Username</label>
												<input type="text" class="form-control <?= (isset(session('errors')['username'])) ? 'is-invalid' : '' ?>" id="username" name="username" value="<?= old('username') ?>">
												<div class="invalid-feedback">
													<?php if (isset(session('errors')['username'])) : ?>
														<?= session('errors')['username'] ?>
													<?php endif; ?>
												</div>
											</div>
											<div class="col-12">
												<label for="user_password">Password</label>
												<input type="password" class="form-control <?= (isset(session('errors')['user_password'])) ? 'is-invalid' : '' ?>" id="user_password" name="user_password">
												<div class="invalid-feedback">
													<?php if (isset(session('errors')['user_password'])) : ?>
														<?= session('errors')['user_password'] ?>
													<?php endif; ?>
												</div>
											</div>
											<div class="col-12">
												<label for="password_confirmation">Konfirmasi Password</label>
												<input type="password" class="form-control <?= (isset(session('errors')['password_confirmation'])) ? 'is-invalid' : '' ?>" id="password_confirmation" name="password_confirmation">
												<div class="invalid-feedback">
													<?php if (isset(session('errors')['password_confirmation'])) : ?>
														<?= session('errors')['password_confirmation'] ?>
													<?php endif; ?>
												</div>
											</div>
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" class="btn btn-primary"><i class='bx bx-user'></i>Sign up</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!--end wrapper-->
	<!-- Bootstrap JS -->
	<script src="<?= base_url('assets') ?>/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="<?= base_url('assets') ?>/js/jquery.min.js"></script>
	<script src="<?= base_url('assets') ?>/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="<?= base_url('assets') ?>/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="<?= base_url('assets') ?>/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<!--Password show & hide js -->
	<script>
		$(document).ready(function() {
			$("#show_hide_password a").on('click', function(event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
	</script>
	<!--app JS-->
	<script src="<?= base_url('assets') ?>/js/app.js"></script>
</body>

</html>