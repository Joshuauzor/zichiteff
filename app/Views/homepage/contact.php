<?php echo view('homepage/partials/head') ?>
<?php echo view('homepage/partials/header') ?>
<?php echo view('homepage/partials/nav_bar') ?>

<section class="ftco-section contact-section ftco-no-pb" id="contact-section" style="margin-top: -3%;">
		<div class="container">
			<div class="row justify-content-center mb-5 pb-3">
				<div class="col-md-7 heading-section text-center ftco-animate">
					<span class="subheading">Contact us</span>
					<h2 class="mb-4">Message us for more details</h2>
					<p>Please contact us today for all your property needs by completing the form below; you can also use the live chat support to contact us immediately. If you would rather prefer to talk to us, please call us</p>
				</div>
			</div>

			<div class="row block-9">
				<div class="col-md-8">
					<form action="#" class="p-4 p-md-5 contact-form" method="post">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Your Name">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Your Email">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Subject">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
								</div>
							</div>
						</div>
					</form>
					
				</div>

				<div class="col-md-4 d-flex pl-md-5">
					<div class="row">
						<div class="dbox w-100 d-flex ftco-animate">
							<div class="icon d-flex align-items-center justify-content-center">
								<span class="fa fa-map-marker"></span>
							</div>
							<div class="text">
								<p><span>Address:</span>Mayfair Garden Business Complex, Lekki Epe Expressway, Lagos, Nigeria.</p>
							</div>
						</div>
						<div class="dbox w-100 d-flex ftco-animate">
							<div class="icon d-flex align-items-center justify-content-center">
								<span class="fa fa-phone"></span>
							</div>
							<div class="text">
								<p><span>Phone:</span> <a href="tel:+234 9014902431">+234 9014902431 | +447488583083</a></p>
							</div>
						</div>
						<div class="dbox w-100 d-flex ftco-animate">
							<div class="icon d-flex align-items-center justify-content-center">
								<span class="fa fa-paper-plane"></span>
							</div>
							<div class="text">
								<p><span>Email:</span> <a href="mailto:info@zichitef.com">info@zichitef.com</a></p>
							</div>
						</div>
						<div class="dbox w-100 d-flex ftco-animate">
							<div class="icon d-flex align-items-center justify-content-center">
								<span class="fa fa-globe"></span>
							</div>
							<div class="text">
								<p><span>Website</span> <a href="https://zichitef.com/">www.zichitef.com</a></p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div id="map" class="map"></div>
				</div>
			</div>
		</div>
	</section>
<?php echo view('homepage/partials/footer') ?>
    
