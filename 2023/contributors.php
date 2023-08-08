<?php
include 'header.php';
?>
<!-- header END -->

<!-- Content -->
<div class="page-content">
	<!-- Trending Post -->
	<div class="section-full content-inner-1">
		<div class="container">
			<div class="section-head text-center">
				<span>Contributors</span>
			</div>
			<div class="row blog-box-style1">
				<div class="col-md-8 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s" style="visibility: visible; animation-duration: 2s; animation-delay: 0.2s; animation-name: fadeInUp;">
					<div class="row">
					<?php $q = "SELECT * FROM `mch_contributors` WHERE `is_active` = 1 ORDER BY `id` DESC";
						$res = mysqli_query($conn, $q);
						if(mysqli_num_rows($res) > 0) {
						while ($row = mysqli_fetch_assoc($res)) { ?>
							<div class="col-md-6 col-sm-12">
								<div class="blog-card blog-grid overlay-post left"> 
									<div class="dlab-post-media">
										<img src="../uploads/assets/uploaded_data/contributors_img/<?php echo $row['image']; ?>" alt="">
									</div>
									<div class="blog-card-info">
										<div class="dlab-post-meta">
											<ul>
												<li class="post-tag"><a href="contributor-details.php?id=<?php echo base64_encode($row['id']); ?>">CONTRIBUTOR</a></li>
											</ul>
										</div>
										<h4 class="title"><a href="contributor-details.php?id=<?php echo base64_encode($row['id']); ?>"><?php echo $row['name']; ?></a></h4>
									</div>
								</div>
							</div><!----Pankaj-Agarwal-end---->
					<?php } } ?>
						<!-- <div class="col-md-12">
							<nav aria-label="Page navigation example">
								<ul class="pagination">
									<li class="page-item"><a class="page-link prevs" href="#">Previous</a></li>
									<li class="page-item active"><a class="page-link" href="contributors.php">1</a></li>
									<li class="page-item"><a class="page-link" href="contributors2.php">2</a></li>
									<li class="page-item"><a class="page-link" href="#">3</a></li>
									<li class="page-item"><a class="page-link nextt" href="#">Next</a></li>
								</ul>
							</nav>
						</div> -->
					</div>
				</div>
				<!-- <div class="col-lg-4 col-md-4 col-sm-12 col-12">
					<?php
					// include 'sidebar.php';
					?>
				</div> --><!------col-4-end--->

				<div class="col-lg-4 col-md-4 col-sm-12 col-12">
						<div class="side-bar sticky-top">
							<div class="widget widget-author wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
								<h6 class="widget-title">About Me</h6>
								<div class="author-profile-info">
									<!-- <div class="author-profile-pic">	
										<a href="javascript:void(0);">
											<img src="images/author.jpg" alt="Profile Pic" width="130" height="130">
										</a>
									</div> -->
									<div class="author-profile-content">
										<h6 class="title">विनम्र निवेदन</h6>
										<p>MCH PRAKASHAN का उद्दश्य पाठकों को स्वास्थ्य एवं चिकित्सा संबंधी जानकारियों को हिंदी में अवगत कराना है।..</p>
										<a href="#" class="readme">Read More</a>
										<ul class="social-icon m-b0  text-center">
											<!-- <li><a href="javascript:void(0);" class="btn radius-xl"><i class="fa fa-instagram"></i></a></li> -->
											<li><a href="https://www.facebook.com/profile.php?id=100063935207754" class="btn radius-xl"><i class="fa fa-facebook"></i></a></li>
											<li><a href="https://twitter.com/mch_drpankaj?lang=en" class="btn radius-xl"><i class="fa fa-twitter"></i></a></li>
											<!-- <li><a href="javascript:void(0);" class="btn radius-xl"><i class="fa fa-pinterest-p"></i></a></li> -->
											<!-- <li><a href="javascript:void(0);" class="btn radius-xl"><i class="fa fa-youtube-play"></i></a></li> -->
										</ul>
									</div>
								</div>
							</div><!-----About-Me--->
							<div class="widget widget-author wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
								<h6 class="widget-title">Vision & Mission</h6>
								<div class="author-profile-info">
									<!-- <div class="author-profile-pic">	
										<a href="javascript:void(0);">
											<img src="images/author.jpg" alt="Profile Pic" width="130" height="130">
										</a>
									</div> -->
									<div class="author-profile-content">
										<h6 class="title">Vision</h6>
										<p>Realizing the Full Potential of the Digital Space, Universal Access to Research and Education related to Medical Concepts, Full Participation in spreading Awareness in our Mother language. To Drive a New Era of Knowledge, Self-Awareness, and Good Health !</p><br>
										
										<h6 class="title">Mission</h6>
										<p>Endorsement of the Most Complex Medical Concepts in the Easiest Way.</p>
										<!-- <a href="#" class="readme">Read More</a> -->
										<!-- <ul class="social-icon m-b0">
											<li><a href="javascript:void(0);" class="btn radius-xl"><i class="fa fa-instagram"></i></a></li>
											<li><a href="javascript:void(0);" class="btn radius-xl"><i class="fa fa-twitter"></i></a></li>
											<li><a href="javascript:void(0);" class="btn radius-xl"><i class="fa fa-facebook"></i></a></li>
											<li><a href="javascript:void(0);" class="btn radius-xl"><i class="fa fa-pinterest-p"></i></a></li>
											<li><a href="javascript:void(0);" class="btn radius-xl"><i class="fa fa-youtube-play"></i></a></li>
										</ul> -->
									</div>
								</div>
							</div><!----Vision--&--Mission-end--->

							<!-- <div class="widget recent-posts-entry wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.8s">
								<h6 class="widget-title"><span>Recent Posts</span></h6>
								<div class="widget-post-bx">
									<div class="widget-post clearfix">
										<div class="dlab-post-media">
											<img src="images/blog/recent-blog/pic1.jpg" alt="">
										</div>
										<div class="dlab-post-info">
											<div class="dlab-post-meta">
												<ul>
													<li class="post-category"><a href="javascript:void(0);">Video</a></li>
													<li class="post-date">at <span>12 August, 2018</span></li>
												</ul>
											</div>
											<h6 class="post-title"><a href="#">Antiplatelet Therapy</a></h6>
										</div>
									</div>
									<div class="widget-post clearfix">
										<div class="dlab-post-media">
											<img src="images/blog/recent-blog/pic2.jpg" alt="">
										</div>
										<div class="dlab-post-info">
											<div class="dlab-post-meta">
												<ul>
													<li class="post-category"><a href="javascript:void(0);">Video</a></li>
													<li class="post-date">at <span>18 Oct, 2021</span></li>
												</ul>
											</div>
											<h6 class="post-title"><a href="#">Antiplatelet Therapy 4</a></h6>
										</div>
									</div>
									<div class="widget-post clearfix">
										<div class="dlab-post-media">
											<img src="images/blog/recent-blog/pic3.jpg" alt="">
										</div>
										<div class="dlab-post-info">
											<div class="dlab-post-meta">
												<ul>
													<li class="post-category"><a href="javascript:void(0);">Text</a></li>
													<li class="post-date">at <span>13 May, 2022</span></li>
												</ul>
											</div>
											<h6 class="post-title"><a href="#">Lung Function Tests</a></h6>
										</div>
									</div>
								</div>
							</div> -->
							<!-- <div class="widget widget_categories wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
								<h6 class="widget-title"><span>Categories</span></h6>
								<ul>
									<li><a href="category.php">Culture </a> <span class="badge">11</span> </li>
									<li><a href="category.php">Lifestyle </a> <span class="badge">08</span></li>
									<li><a href="category.php">Fashion </a> <span class="badge">14</span></li>
									<li><a href="category.php">Food & Health </a> <span class="badge">05</span></li>
									<li><a href="category.php">Travel </a> <span class="badge">10</span></li>
								</ul>
							</div> -->
							<!-- <div class="widget widget_categories wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
								<h6 class="widget-title"><span>EDUCATION</span></h6>
								<ul>
									<li><a href="#"> Health Education  </a> <span class="badge"><i class="fa fa-globe fa-lg" aria-hidden="true"></i></span> </li>
									<li><a href="#"> Medical Education  </a> <span class="badge"><i class="fa fa-globe fa-lg" aria-hidden="true"></i></span></li>
									-- <li><a href="category.php">Fashion </a> <span class="badge">14</span></li>
									<li><a href="category.php">Food & Health </a> <span class="badge">05</span></li>
									<li><a href="category.php">Travel </a> <span class="badge">10</span></li> --
								</ul>
							</div> -->
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
					</div><!------col-4-end--->


			</div>
		</div>
	</div>
	<!-- Trending Post End -->		
	<!-- Blog Post Carousel -->
	
	<!-- Blog Post End -->
	<!-- Post Grid Style -->

</div>    
<!-- Footer End-->
<?php
include 'footer.php';
?>