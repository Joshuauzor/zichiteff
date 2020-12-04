<body>
	<!-- validation messages -->
		<?php echo view('validationMessages')?>
	<!-- validation messages end-->
	<!-- validation message -->
	<?php if (isset($validation)) : ?>
		<div class="alert alert-danger" role="alert">
			<?= $validation->listErrors() ?>
		</div>
	<?php endif ?>
	<!-- ends here -->
	<div class="py-1 top">
		<div class="container">
			<div class="row">
				<div class="col-sm text-center text-md-left mb-md-0 mb-2 pr-md-4 d-flex topper align-items-center">
					<p class="mb-0 w-100">
						<span class="fa fa-paper-plane"></span>
						<span class="text"><?= $masterInfo->com_email ?></span>
					</p>
				</div>
				<div class="col-sm justify-content-center d-flex mb-md-0 mb-2">
					<div class="social-media">
						<p class="mb-0 d-flex">
							<a href="<?= $masterInfo->facebook ?>" target="_blank" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
							<a href="<?= $masterInfo->twitter ?>" target="_blank" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
							<a href="<?= $masterInfo->instagram ?>" target="_blank" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
							<a href="<?= $masterInfo->linkedin ?>" target="_blank" class="d-flex align-items-center justify-content-center"><span class="fa fa-linkedin"><i class="sr-only">Dribbble</i></span></a>
						</p>
					</div>
				</div>
				<div class="col-sm-12 col-md-6 col-lg-7 d-flex topper align-items-center text-lg-right justify-content-end">
					<p class="mb-0 register-link"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#requestAservice">Request A Service</a></p>
				</div>
			</div>
		</div>
	</div>
	<div class="pt-4 pb-5">
		<div class="container">
			<div class="row d-flex align-items-start align-items-center px-3 px-md-0">
				<div class="col-md-4 d-flex mb-2 mb-md-0">
					<a class="navbar-brand d-flex align-items-center" href="index.html">
						<span class="flaticon flaticon-crane"></span>
						<span class="ml-2">Zichiteff <small>Property need</small></span>
					</a>
				</div>
				<div class="col-md-4 d-flex topper mb-md-0 mb-2 align-items-center">
					<div class="icon d-flex justify-content-center align-items-center">
						<span class="fa fa-map"></span>
					</div>
					<div class="pr-md-4 pl-md-3 pl-3 text">
						<p class="con"><span>Call</span> <span><?= $masterInfo->com_phone ?></span></p>
						<p class="con">Call Us Now 24/7 Customer Support</p>
					</div>
				</div>
				<div class="col-md-4 d-flex topper mb-md-0 align-items-center">
					<div class="icon d-flex justify-content-center align-items-center"><span class="fa fa-paper-plane"></span>
					</div>
					<div class="text pl-3 pl-md-3">
						<p class="hr"><span>Our Location</span></p>
						<p class="con"><?= $masterInfo->com_address ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>

