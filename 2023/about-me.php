<?php
include'header.php';
?>
    <!-- header END -->
	<!-- Content -->
	<div class="page-content bg-white">
		<!-- Blog Post -->
		<div class="section-full bg-white content-inner">
			<div class="container">
				<div class="section-head text-center">
					<h6 class="title-head text-uppercase"><span>About Us</span></h6>
				</div>
				<div class="row">
					<!-- <div class="col-lg-12 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s">
						<div class="dlab-post-media m-b50">
							<a href="post-standart.html"><img src="images/about/pic4.jpg" alt=""></a>
						</div>
					</div> -->
					<div class="col-lg-12 col-md-12 col-sm-12 col-12">
						<!-- <div class="blog-post blog-single"> -->
						<div class="blog-post">
							<div class="dlab-post-info">
								<div class="dlab-post-text text mt-0">
									<?php $q = "SELECT * FROM `mch_about` WHERE `is_active` = 1";
										$res = mysqli_query($conn, $q);
										if(mysqli_num_rows($res) > 0) {
										$row = mysqli_fetch_assoc($res);
										echo $row['about'];
									} ?>	
								</div>
							</div>
						</div>
					</div>
					<!-- <div class="col-md-4">
						<div class="dlab-post-text text mt-0">
							<h2><span class="font-22">डा पंकज कुमार अग्रवाल</span></h2>
							<p class="first-content mb-2">01 जुलाई, 2018</p>
							<p class="first-content mb-0">MD DM (Endocrinology)</p>
							<p class="first-content mb-0"><a href="mailto:drpankaj.endo@gmail.com">drpankaj.endo@gmail.com</a></p>
							<p class="first-content mb-0"><a href="tel:9810125568">9810125568</a></p>
							<p class="first-content mb-2">हार्मोन केयर एवं रिसर्च सेंटर</p>
							<p class="first-content mb-0">गाजियाबाद</p>
						</div>			
					</div> -->
					<!-- <div class="col-lg-4 col-md-4 col-sm-12 col-12">
						<div class="side-bar sticky-top">
							<div class="widget widget-ads wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.6s">
								<div class="widget-post">
									<img alt="" src="images/ads.jpg">
								</div>
							</div>
							<div class="widget widget-vlog wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.4s">
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
							</div>
						</div>
					</div> -->
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