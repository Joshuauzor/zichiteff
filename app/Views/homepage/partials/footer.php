
	<footer class="ftco-footer">
		<div class="container mb-5 pb-4">
			<div class="row">
				<div class="col-lg col-md-6">
					<div class="ftco-footer-widget">
						<h2 class="ftco-heading-2 d-flex align-items-center">About</h2>
						<p>Zichiteff is your one-stop shop for all your property needs..</p>
						<ul class="ftco-footer-social list-unstyled mt-4">
							<li><a href="<?= $masterInfo->twitter ?>" target="_blank"><span class="fa fa-twitter"></span></a></li>
							<li><a href="<?= $masterInfo->facebook ?>" target="_blank"><span class="fa fa-facebook"></span></a></li>
							<li><a href="<?= $masterInfo->instagram ?>" target="_blank"><span class="fa fa-instagram"></span></a></li>
							<li><a href="<?= $masterInfo->linkedin ?>" target="_blank"><span class="fa fa-linkedin"></span></a></li>
						</ul>
					</div>
				</div>

				<div class="col-lg-4 col-md-6">
					<div class="ftco-footer-widget">
						<h2 class="ftco-heading-2">Links</h2>
						<div class="d-flex">
							<ul class="list-unstyled mr-md-4">
								<li><a href="<?= base_url('home/projects')?>"><span class="fa fa-chevron-right mr-2"></span>Project</a></li>
								<li><a href="<?= base_url('home/about')?>"><span class="fa fa-chevron-right mr-2"></span>About Us</a></li>
								<li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Services</a></li>
								<li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Update</a></li>
								<li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Industries</a></li>
							</ul>
							<ul class="list-unstyled ml-md-5">
								<li><a href="<?= base_url('home/contact')?>"><span class="fa fa-chevron-right mr-2"></span>Contact</a></li>
								<li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Help</a></li>
								<li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Privacy Policy</a></li>
								<li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Terms of Use</a></li>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-lg col-md-6">
					<div class="ftco-footer-widget">
						<h2 class="ftco-heading-2">Services</h2>
						<ul class="list-unstyled">
							<li><a href="<?= base_url('home/services')?>"><span class="fa fa-chevron-right mr-2"></span>Lettings</a></li>
							<li><a href="<?= base_url('home/services')?>"><span class="fa fa-chevron-right mr-2"></span>Sales & Land Acquisition</a></li>
							<li><a href="<?= base_url('home/services')?>"><span class="fa fa-chevron-right mr-2"></span>Property Development</a></li>
							<li><a href="<?= base_url('home/services')?>"><span class="fa fa-chevron-right mr-2"></span>Paint Production</a></li>
						</ul>
					</div>
				</div>

				<div class="col-lg col-md-6">
					<div class="ftco-footer-widget">
						<h2 class="ftco-heading-2">Have a Question?</h2>
						<div class="block-23 mb-3">
							<ul>
								<li><span class="fa fa-map-marker mr-3"></span><span class="text"><?= $masterInfo->com_address ?></span></li>
								<li><a href="tel:+2349014902431"><span class="fa fa-phone mr-3"></span><span class="text"><?= $masterInfo->com_phone ?></span></a></li>
								<li><a href="mailto:<?= $masterInfo->com_email ?>"><span class="fa fa-paper-plane mr-3"></span><span class="text"><?= $masterInfo->com_email ?></span></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div> 
		<div class="container-fluid bg-primary">
			<div class="container">
				<div class="row">
					<div class="col-md-6 aside-stretch py-3">	
						<p class="mb-0">
							Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved |  <i class="fa fa-nothing" aria-hidden="true"></i>Zichiteff Powered by <a href="https://web.facebook.com/Zealtechnologized/" target="_blank">Zeal Technologies</a>
							</p>
						</div>
					</div>
				</div>
			</div>
		</footer>
		
		<div class="modal fade" id="requestAservice" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true" class="fa fa-close"></span>
						</button>
					</div>
					<!-- MAKE A REQUEST -->
					<div class="modal-body p-4 p-md-5">
						<form action="<?= base_url('home/request')?>" method="post" class="appointment-form ftco-animate">
							<h3>Request For A Service</h3>
							<div class="">
								<div class="form-group">
									<input type="text" class="form-control" value="<?= set_value('name')?>" name="name" placeholder="Full Name">
								</div>
								<div class="form-group">
									<input type="email" class="form-control" value="<?= set_value('email')?>"  name="email" placeholder="Email Address" required>
								</div>
								<div class="form-group">
									<input type="number" class="form-control" value="<?= set_value('phone')?>"  name="phone" placeholder="Phone" required>
								</div>
								<div class="form-group">
									<input type="text" class="form-control" value="<?= set_value('location')?>"  name="location" placeholder="Location" required>
								</div>
							</div>
							<div class="">
								<div class="form-group">
									<div class="form-field">
										<div class="select-wrap">
											<div class="icon"><span class="fa fa-chevron-down"></span></div>
											<select name="service" id="" class="form-control" required>
												<option value="" selected disabled>Select A Services</option>
												<?php foreach($totalServices as $row):?>
													<option value="<?= $row->services_id ?>" <?= set_select('service', $row->services_id)?> ><?= $row->type ?></option>
												<?php endforeach ?>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="">
								<div class="form-group">
									<textarea name="message" id=""  value="<?= set_value('message')?>" cols="30" rows="4" class="form-control" placeholder="Message" required></textarea>
								</div>
								<div class="form-group">
									<input type="submit" value="Request A Service" class="btn btn-primary py-3 px-4">
								</div>
							</div>
						</form>
					</div>
					<!-- ENDS HERE -->
				</div>
			</div>
		</div>

		<!-- loader -->
		<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

		<script src="<?= base_url('public/js/jquery.min.js')?>"></script>
		<script src="<?= base_url('public/js/jquery-migrate-3.0.1.min.js')?>"></script>
		<script src="<?= base_url('public/js/popper.min.js')?>"></script>
		<script src="<?= base_url('public/js/bootstrap.min.js')?>"></script>
		<script src="<?= base_url('public/js/jquery.easing.1.3.js')?>"></script>
		<script src="<?= base_url('public/js/jquery.waypoints.min.js')?>"></script>
		<script src="<?= base_url('public/js/jquery.stellar.min.js')?>"></script>
		<script src="<?= base_url('public/js/owl.carousel.min.js')?>"></script>
		<script src="<?= base_url('public/js/jquery.magnific-popup.min.js')?>"></script>
		<script src="<?= base_url('public/js/jquery.animateNumber.min.js')?>"></script>
		<script src="<?= base_url('public/js/bootstrap-datepicker.js')?>"></script>
		<script src="<?= base_url('public/js/jquery.timepicker.min.js')?>"></script>
		<script src="<?= base_url('public/js/scrollax.min.js')?>"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
		<script src="<?= base_url('public/js/google-map.js')?>"></script>
		
		<script src="<?= base_url('public/js/main.js')?>"></script>
		
	<!-- validation timeout -->
		<script>
			$(document).ready(function(){
				setTimeout(function(){
					$('.hide').hide()
				}, 6000);
			})
		</script>
	<!-- validation timeout -->

	<!--Start of Tawk.to Script-->
	<script type="text/javascript">
		var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
		(function(){
		var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
		s1.async=true;
		s1.src='https://embed.tawk.to/5fab67c38e1c140c2abced91/default';
		s1.charset='UTF-8';
		s1.setAttribute('crossorigin','*');
		s0.parentNode.insertBefore(s1,s0);
		})();
	</script>
	<!--End of Tawk.to Script-->
	</body>
	</html>