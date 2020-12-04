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
						<a href="<?= base_url('public/images/project-1.jpg')?>" class="img image-popup d-flex align-items-center" style="background-image: url(<?= base_url('public/images/project-1.jpg')?>);">
							<div class="icon d-flex align-items-center justify-content-center mb-5"><span class="fa fa-plus"></span></div>
						</a>
						<div class="text">
							<span class="subheading">Building</span>
							<h3>Building A Condominium</h3>
							<p><span class="fa fa-map-marker mr-1"></span> San Francisco, California, USA</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="project">
						<a href="<?= base_url('public/images/project-2.jpg')?>" class="img image-popup d-flex align-items-center" style="background-image: url(<?= base_url('public/images/project-2.jpg')?>);">
							<div class="icon d-flex align-items-center justify-content-center mb-5"><span class="fa fa-plus"></span></div>
						</a>
						<div class="text">
							<span class="subheading">Building</span>
							<h3>Building A Condominium</h3>
							<p><span class="fa fa-map-marker mr-1"></span> San Francisco, California, USA</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="project">
						<a href="<?= base_url('public/images/project-3.jpg')?>" class="img image-popup d-flex align-items-center" style="background-image: url(<?= base_url('public/images/project-3.jpg')?>);">
							<div class="icon d-flex align-items-center justify-content-center mb-5"><span class="fa fa-plus"></span></div>
						</a>
						<div class="text">
							<span class="subheading">Building</span>
							<h3>Building A Condominium</h3>
							<p><span class="fa fa-map-marker mr-1"></span> San Francisco, California, USA</p>
						</div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="project">
						<a href="<?= base_url('public/images/project-4.jpg')?>" class="img image-popup d-flex align-items-center" style="background-image: url(<?= base_url('public/images/project-4.jpg')?>);">
							<div class="icon d-flex align-items-center justify-content-center mb-5"><span class="fa fa-plus"></span></div>
						</a>
						<div class="text">
							<span class="subheading">Building</span>
							<h3>Building A Condominium</h3>
							<p><span class="fa fa-map-marker mr-1"></span> San Francisco, California, USA</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="project">
						<a href="<?= base_url('public/images/project-5.jpg')?>" class="img image-popup d-flex align-items-center" style="background-image: url(<?= base_url('public/images/project-5.jpg')?>);">
							<div class="icon d-flex align-items-center justify-content-center mb-5"><span class="fa fa-plus"></span></div>
						</a>
						<div class="text">
							<span class="subheading">Building</span>
							<h3>Building A Condominium</h3>
							<p><span class="fa fa-map-marker mr-1"></span> San Francisco, California, USA</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="project">
						<a href="<?= base_url('public/images/project-6.jpg')?>" class="img image-popup d-flex align-items-center" style="background-image: url(<?= base_url('public/images/project-6.jpg')?>);">
							<div class="icon d-flex align-items-center justify-content-center mb-5"><span class="fa fa-plus"></span></div>
						</a>
						<div class="text">
							<span class="subheading">Building</span>
							<h3>Building A Condominium</h3>
							<p><span class="fa fa-map-marker mr-1"></span> San Francisco, California, USA</p>
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
							<li><a href="#">4</a></li>
							<li><a href="#">5</a></li>
							<li><a href="#">&gt;</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
<!-- projects ends here -->

<?php echo view('homepage/partials/footer') ?>
