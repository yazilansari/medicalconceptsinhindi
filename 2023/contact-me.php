<?php
include 'header.php';
?>
    <!-- header END -->
    <!-- header END -->
	<!-- Content -->
	<div class="page-content bg-white">
		<!-- Blog Post -->
		<div class="section-full bg-white content-inner contact-form">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-md-8 col-sm-12 col-12">
						<div class="bgcontact">
						<div class="blog-post blog-single mb-0">
							<!-- <div class="dlab-post-media m-b50 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s">
								<img src="images/about/pic7.jpg" alt="">
							</div> -->
							<div class="dlab-post-info">
								<div class="dlab-post-text text mt-0">
									<h1 class="font-weight-600">Contact Us</h1>
									<!-- <p class="first-content">Lorem ipsum dolor sit amet, conse ctetur adipiscing elit. Sed maximus orci ac condi mentum efficitur. Suspendi potenti. Fusce diam felis, ullamcor aca felis sed, volutpat varius tortor. Ut eleifend justo sed quam blandit, vehicula ante hendrerit. Sed condimentum libero vel eros porta, eu malesuada nulla bibendum. Proin varius sollicitudin nulla quis fermentum. Nunc vitae arcu eget diam gravida ultrices finibus nec mi. Maecenas egestas libero.</p> -->
								</div>
							</div>
						</div>
						<form method="post" class="dzForm" action="script/contact.php">
							<div class="dzFormMsg"></div>
							<input type="hidden" value="Contact" name="dzToDo">
							<div class="row">
								<div class="col-md-12 col-sm-12">
									<div class="form-group">
										<input name="Name" type="text" required="" class="form-control" placeholder="Name">
									</div>
								</div>
								<div class="col-md-12 col-sm-12">
									<div class="form-group">
										<input name="Email" type="email" class="form-control" required="" placeholder="Email Id">
									</div>
								</div>
								<div class="col-md-12 col-sm-12">
									<div class="form-group">
										<input name="Phone Number" type="number" class="form-control" required="" placeholder="Phone Number">
									</div>
								</div>
								<div class="col-md-12 col-sm-12">
									<div class="form-group">
										<textarea name="dzMessage" rows="4" class="form-control" required="" placeholder="Add Your Message"></textarea>
									</div>
								</div>
								<!-- <div class="col-md-12 col-sm-12">
									<div class="form-group">
										<div class="g-recaptcha" data-sitekey="Put reCaptcha Site Key" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></div>
										<input class="form-control d-none" style="display:none;" data-recaptcha="true" required data-error="Please complete the Captcha">
									</div>
								</div> -->
								<div class="col-md-12 col-sm-12">
									<div class="form-group">
										<button name="submit" type="submit" value="Submit" class="btn radius-no primary">Send Message</button>
									</div>
								</div>
							</div>
						</form>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12 col-12 m-b30">
						<div class="side-bar sticky-top">
							<div class="widget widget-author wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
								<h6 class="widget-title mb-3">Visit Us</h6>
								<div class="author-profile-info">
									<!-- <div class="author-profile-pic">	
										<a href="javascript:void(0);">
											<img src="images/author.jpg" alt="Profile Pic" width="130" height="130">
										</a>
									</div> -->
									<div class="author-profile-content">
										<!-- <h6 class="title">I Am Shailja Reddy</h6>
										<p>There are many variations of passages of Lorem Ipsum available.</p> -->
										<div class="visitus">
											<p class="mb-1"><i class="fa fa-map-marker" aria-hidden="true"></i> <b>Address</b></p>
											<div class="col-md-12"><hr class="mb-2 mt-0"></div>
											<p class="pl-3">Hormone Care and Research Center, SB-5 Shastri Nagar, Ghaziabad – 201 002</p>

											<p class="mb-1"><i class="fa fa-envelope" aria-hidden="true"></i> <b>Email Id:</b></p>
											<div class="col-md-12"><hr class="mb-2 mt-0"></div>
											<p class="pl-3"><a href="mailto:info@medicalconceptsinhindi.com">info@medicalconceptsinhindi.com</a></p>
										</div>
										<ul class="social-icon m-b0">
											<li><a href="https://www.facebook.com/profile.php?id=100063935207754" class="btn radius-xl"><i class="fa fa-facebook"></i></a></li>
											<li><a href="https://twitter.com/mch_drpankaj?lang=en" class="btn radius-xl"><i class="fa fa-twitter"></i></a></li>
											<!-- <li><a href="javascript:void(0);" class="btn radius-xl"><i class="fa fa-instagram"></i></a></li>
											<li><a href="javascript:void(0);" class="btn radius-xl"><i class="fa fa-pinterest-p"></i></a></li>
											<li><a href="javascript:void(0);" class="btn radius-xl"><i class="fa fa-youtube-play"></i></a></li> -->
										</ul>
									</div>
								</div>

								<div class="col-md-12 mt-3">
									<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3500.575338957375!2d77.4578388154298!3d28.67243138902408!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cf18d9f3ac1f9%3A0xacc80a27f5feda28!2sHormone%20Care%20and%20Research%20Center!5e0!3m2!1sen!2sin!4v1679901144608!5m2!1sen!2sin" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
								</div>
							</div>
							<!-- <div class="widget widget-vlog wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.4s">
								<h6 class="widget-title"><span>Latest Vlog</span></h6>
								<div class="widget-carousel owl-carousel owl-dots-style1 owl-none owl-theme">
									<div class="item">
										<div class="post-box">
											<img src="images/video-post/pic1.jpg" alt="">
											<a href="https://www.youtube.com/watch?v=Dj6CKxQue7U" class="popup-youtube video"><i class="fa fa-youtube-play"></i></a>
										</div>
									</div>
									<div class="item">
										<div class="post-box">
											<img src="images/video-post/pic2.jpg" alt="">
											<a href="https://www.youtube.com/watch?v=Dj6CKxQue7U" class="popup-youtube video"><i class="fa fa-youtube-play"></i></a>
										</div>
									</div>
									<div class="item">
										<div class="post-box">
											<img src="images/video-post/pic3.jpg" alt="">
											<a href="https://www.youtube.com/watch?v=Dj6CKxQue7U" class="popup-youtube video"><i class="fa fa-youtube-play"></i></a>
										</div>
									</div>
								</div>
							</div> -->
						</div>

						
					</div>
				</div>
			</div>
		</div>
		<!-- Blog Post End -->
		<!-- Instagram Post Carousel -->
		<!-- <div class="section-full insta-post-carousel owl-carousel owl-none wow fadeIn lightgallery" data-wow-duration="2s" data-wow-delay="0.6s">
			<div class="item">
				<span data-exthumbimage="images/blog/card/small/pic1.jpg" data-src="images/blog/card/full-img/pic1.jpg" class="check-km dlab-img-effect" title="Title Come Here">		
					<img src="images/blog/card/pic1.jpg" alt="">
				</span>
			</div>
			<div class="item">
				<span data-exthumbimage="images/blog/card/small/pic2.jpg" data-src="images/blog/card/full-img/pic2.jpg" class="check-km dlab-img-effect" title="Title Come Here">		
					<img src="images/blog/card/pic2.jpg" alt="">
				</span>
			</div>
			<div class="item">
				<span data-exthumbimage="images/blog/card/small/pic3.jpg" data-src="images/blog/card/full-img/pic3.jpg" class="check-km dlab-img-effect" title="Title Come Here">		
					<img src="images/blog/card/pic3.jpg" alt="">
				</span>
			</div>
			<div class="item">
				<span data-exthumbimage="images/blog/card/small/pic4.jpg" data-src="images/blog/card/full-img/pic4.jpg" class="check-km dlab-img-effect" title="Title Come Here">		
					<img src="images/blog/card/pic4.jpg" alt="">
				</span>
			</div>
			<div class="item">
				<span data-exthumbimage="images/blog/card/small/pic5.jpg" data-src="images/blog/card/full-img/pic5.jpg" class="check-km dlab-img-effect" title="Title Come Here">		
					<img src="images/blog/card/pic5.jpg" alt="">
				</span>
			</div>
			<div class="item">
				<span data-exthumbimage="images/blog/card/small/pic6.jpg" data-src="images/blog/card/full-img/pic6.jpg" class="check-km dlab-img-effect" title="Title Come Here">		
					<img src="images/blog/card/pic6.jpg" alt="">
				</span>
			</div>
			<div class="item">
				<span data-exthumbimage="images/blog/card/small/pic7.jpg" data-src="images/blog/card/full-img/pic7.jpg" class="check-km dlab-img-effect" title="Title Come Here">		
					<img src="images/blog/card/pic7.jpg" alt="">
				</span>
			</div>
		</div> -->
		<!-- Blog Card Carousel End -->
    </div>
    <!-- Content END-->
	<!-- Footer -->
<?php
include 'footer.php';
?>