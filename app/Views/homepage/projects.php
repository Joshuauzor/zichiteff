<?php echo view('homepage/partials/head') ?>
<?php echo view('homepage/partials/header') ?>
<?php echo view('homepage/partials/nav_bar') ?>

<!-- projects -->
    <section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center mb-5 pb-3">
				<div class="col-md-7 text-center heading-section ftco-animate">
					<span class="subheading">Our Global Work Projects</span>
					<h2 class="mb-4">Latest Projects</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="project">
						<a href="<?= base_url('public/images/paint.jpg')?>" class="img image-popup d-flex align-items-center" style="background-image: url(<?= base_url('public/images/paint.jpg')?>);">
							<div class="icon d-flex align-items-center justify-content-center mb-5"><span class="fa fa-plus"></span></div>
						</a>
						<div class="text">
							<span class="subheading">Paint</span>
							<h3>Paint Production</h3>
							<p><span class="fa fa-map-marker mr-1"></span> Lekki Phase 1, Lagos, NIGERIA</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="project">
						<a href="<?= base_url('public/images/land.jpg')?>" class="img image-popup d-flex align-items-center" style="background-image: url(<?= base_url('public/images/land.jpg')?>);">
							<div class="icon d-flex align-items-center justify-content-center mb-5"><span class="fa fa-plus"></span></div>
						</a>
						<div class="text">
							<span class="subheading">Land</span>
							<h3>12 hectares of land</h3>
							<p><span class="fa fa-map-marker mr-1"></span> Ikorodu, Lagos, NIGERIA</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="project">
						<a href="<?= base_url('public/images/project-1.jpg')?>" class="img image-popup d-flex align-items-center" style="background-image: url(<?= base_url('public/images/project-1.jpg')?>);">
							<div class="icon d-flex align-items-center justify-content-center mb-5"><span class="fa fa-plus"></span></div>
						</a>
						<div class="text">
							<span class="subheading">Building</span>
							<h3>Building A Condominium</h3>
							<p><span class="fa fa-map-marker mr-1"></span> Lagos, NIGERIA</p>
						</div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="project">
						<a href="<?= base_url('public/images/work.jpg')?>" class="img image-popup d-flex align-items-center" style="background-image: url(<?= base_url('public/images/work.jpg')?>);">
							<div class="icon d-flex align-items-center justify-content-center mb-5"><span class="fa fa-plus"></span></div>
						</a>
						<div class="text">
							<span class="subheading">Painting</span>
							<h3>Complex Painting of a duplex</h3>
							<p><span class="fa fa-map-marker mr-1"></span> Lekki, Lagos, Nigeria</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="project">
						<a href="<?= base_url('public/images/house-2.jpg')?>" class="img image-popup d-flex align-items-center" style="background-image: url(<?= base_url('public/images/house-2.jpg')?>);">
							<div class="icon d-flex align-items-center justify-content-center mb-5"><span class="fa fa-plus"></span></div>
						</a>
						<div class="text">
							<span class="subheading">Leasing</span>
							<h3>Leasing of Houses</h3>
							<p><span class="fa fa-map-marker mr-1"></span> Manchester City, England</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="project">
						<a href="<?= base_url('public/images/residential.jpg')?>" class="img image-popup d-flex align-items-center" style="background-image: url(<?= base_url('public/images/residential.jpg')?>);">
							<div class="icon d-flex align-items-center justify-content-center mb-5"><span class="fa fa-plus"></span></div>
						</a>
						<div class="text">
							<span class="subheading">Residential Building</span>
							<h3>Building A Residential House</h3>
							<p><span class="fa fa-map-marker mr-1"></span> Ajah, Lagos, Nigeria</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row mt-5">
				<div class="col text-center">
					<div class="block-27">
						<ul>
							<li><a href="#">&lt;</a></li>
							<li class="active"><span>1</span></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">&gt;</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
<!-- projects ends here -->

<?php echo view('homepage/partials/footer') ?>
