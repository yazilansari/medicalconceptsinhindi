<?php
include 'header.php';
if(!isset($_GET['id']) || empty($_GET['id'])) {
	header('Location: index.php');exit();
}
$id = base64_decode($_GET['id']);
// echo $id;
$q = "SELECT `mch_posts`.*, `mch_contributors`.`name` AS `contributor_name`, `mch_contributors`.`image` AS `contributor_image` FROM `mch_posts` LEFT JOIN `mch_contributors` ON `mch_contributors`.`id` = `mch_posts`.`contributor_id` WHERE `mch_posts`.`is_active` = 1 AND `mch_posts`.`id` = $id";
$res = mysqli_query($conn, $q);
$row = mysqli_fetch_assoc($res);
?>
    <!-- header END -->
    <!-- Content -->
    <div class="page-content bg-white">
		<!-- Post Standart -->
		<div class="section-full content-inner bg-white">
			<div class="container">
				<div class="row">					
					<div class="col-lg-8 col-md-8 col-sm-12 col-12">
						<div class="blog-post blog-single sidebar">
							<div class="dlab-post-info">
								<div class="dlab-post-meta">
									<ul>
										<li class="post-author"><span>by</span> <a href="#"><?php echo $row['contributor_name']; ?></a></li>
										<!-- <li class="post-category">in <a href="javascript:void(0);">Diabetes,</a>--  <a href="javascript:void(0);">fashion</a> --</li> -->
										<li class="post-date">at <span><?php echo date('d M, Y', strtotime($row['date'])); ?></span></li>
									</ul>
								</div>
								<h2 class="title"><?php echo $row['title']; ?></h2>
								<?php if(!empty($row['image'])) { ?>
								<div class="dlab-post-media">
									<img src="../uploads/assets/uploaded_data/posts_img/<?php echo $row['sub_category_id'].'/'.$row['image']; ?>">
									<!-- <a href="javascript:;"><img src="images/blog/large/pic1.jpg" alt=""></a> -->
								</div>
								<?php } else { ?>
								<?php if(!empty($row['video_url'])) { ?>
								<div class="dlab-post-media maigrain">
									<iframe width="100%" height="315" src="<?php echo $row['video_url']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
									<!-- <img src="images/blog/blog-lg/maigrain.jpg"> -->
									<!-- <a href="javascript:;"><img src="images/blog/large/pic1.jpg" alt=""></a> -->
								</div>
								<?php } } ?>
								<div class="dlab-post-text text">
									<div class="readmre1"> 
										<?php echo $row['description']; ?>
									</div>
									<!-- <div class="wp-block-image">
										<figure class="alignright">
											<img src="images/gallery/pic1.jpg" width="400" alt="">
										</figure>
									</div>
									<p>Nullam hendreri rhoncus turpis, sit amet feugiat arcu efficitur ut. Phasellus blandit, diam sed tinci dunt dignissim, enim metus vulputate libero.</p>
									<p>Eget dignissim dolor nunc in metus. Duis suscipit lacus quis facilisis venenatis, assa dapibus quam.</p>
									<p>Nid dignissim neque mi id enim. Maecenas gravi odio et suscipit euismod, aortor urna scele risque ante, facilisis purus purus sodales arcu. </p>
									<p>Aenean vitae massa sit amet mi scipit scelerisque risus. Aliquam pretium sit amet nunc ut ligula.</p>
									<p>Cras ac erat sapien. Etiam porta, arcu sed scelerisque dapibus, orci felis tincidunt tellus, at bibendum ex velit ac dolor. Aenean auctor, lectus laoreet efficitur dapibus, orci nulla ultrices risus, sed olutpat nisl nulla at felis. Integer ligula risus, ultricies eu velit non, rutrum consectetur neque. Sed ullamcorper hendrerit. </p>
									<p>Nulla ultrices diam at odio malesuada lacinia. Fusce eget posuere purus. Donec accumsan vehicula mi, id imperdiet nulla ornare eu. Orci varius natoque penatibus et magnis dis parturient scetur ridiculus mus. </p>
									<p>Praesent vehicula neque et augue consectetur placerat. Ut pellente euismod sapien eget venenatis. Proin massa lacus, dapibus a scelerisque a, molestie sit amet mauris. Cras maximus lectus quis orci feu giat, at tristique velit bibendum. Etiam augue arcu, cursus id egestas ut, viverra ipsum sit amet aliquet tempus. </p> -->
								</div>
								<div class="post-footer">
									<div class="dlab-post-meta">
										<!-- <span class="title">TAGS : </span>
										<ul class="tag-list">
											<li class="post-tag"><a href="#">#video</a></li>
											<li class="post-tag"><a href="#">#Blog</a></li>
											<li class="post-tag"><a href="#">#Instagram</a></li>
											<li class="post-tag"><a href="#">#Image</a></li>
										</ul> -->
									</div>
									<div class="share-post">
										<ul class="list-inline m-b0">
											<li><a href="https://www.facebook.com/profile.php?id=100063935207754" class="btn sharp radius-xl facebook"><i class="fa fa-facebook"></i></a></li>
											<li><a href="https://twitter.com/mch_drpankaj?lang=en" class="btn sharp radius-xl twitter"><i class="fa fa-twitter"></i></a></li>
											<!-- <li><a href="javascript:void(0);" class="btn sharp radius-xl instagram"><i class="fa fa-instagram"></i></a></li>
											<li><a href="javascript:void(0);" class="btn sharp radius-xl linkedin"><i class="fa fa-linkedin"></i></a></li> -->
										</ul>
									</div>
								</div>
								<!-- <div class="share-post">
									<ul class="slide-social">
										<li><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
										<li><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
										<li><a href="javascript:void(0);"><i class="fa fa-pinterest"></i></a></li>
									</ul>
								</div> -->
							</div>
						</div>
						<div class="author-profile-info widget">
							<div class="author-profile-pic">	
								<a href="javascript:void(0);">
									<img src="../uploads/assets/uploaded_data/contributors_img/<?php echo $row['contributor_image']; ?>" alt="Profile Pic" width="130" height="130">
								</a>
							</div>
							<div class="author-profile-content">
								<h6 class="title"><?php echo $row['contributor_name']; ?></h6>
								<!-- <p>Integer leo turpis, dignissim eget massa ectetur placerat felis. Praesent maximus cursus ut pre tium. Praesent vel massa libero. Aenean fermentum ultrices interdum varius.</p> -->
								<!-- <ul class="social-icon m-b0">
									<li><a href="javascript:void(0);" class="btn radius-xl"><i class="fa fa-instagram"></i></a></li>
									<li><a href="javascript:void(0);" class="btn radius-xl"><i class="fa fa-twitter"></i></a></li>
									<li><a href="javascript:void(0);" class="btn radius-xl"><i class="fa fa-facebook"></i></a></li>
									<li><a href="javascript:void(0);" class="btn radius-xl"><i class="fa fa-pinterest-p"></i></a></li>
									<li><a href="javascript:void(0);" class="btn radius-xl"><i class="fa fa-youtube-play"></i></a></li>
								</ul> -->
							</div>
						</div>
						<div class="clear m-b30" id="comment-list">
							<div class="comments-area" id="comments">
								<div class="section-head text-center">
									<span>Comments 0</span>
								</div>
								<!-- comment list END -->
								<ol class="comment-list">
									<li class="comment">
										<div class="comment-body">
											<div class="comment-author vcard"> 
												<img  class="avatar photo" src="images/author-img/pic2.jpg" alt=""> 
												<cite class="fn">Lorem Ipsum</cite> 
												<span class="says">says:</span> 
												 <div class="comment-meta"> <a href="javascript:void(0);">October 6, 2015 at 7:15 am</a> </div>
												<!-- <div class="reply"> <a href="javascript:void(0);" class="comment-reply-link">Reply</a> </div> -->
											</div>
											<div class="comment-content">
												<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
											</div>
										</div>
										<!-- <ol class="children">
											<li class="comment odd parent">
												<div class="comment-body">
													<div class="comment-author vcard"> 
														<img  class="avatar photo" src="images/author-img/pic3.jpg" alt=""> 
														<cite class="fn">Lorem Ipsum</cite> 
														<span class="says">says:</span> 
														 <div class="comment-meta"> <a href="javascript:void(0);">October 6, 2015 at 7:15 am</a> </div>
														-- <div class="reply"> <a href="javascript:void(0);" class="comment-reply-link">Reply</a> </div> --
													</div>
													<div class="comment-content">
														<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
													</div>
												</div>
											</li>
										</ol> -->
									</li>									
								</ol>
										<!-- list END -->
								<!-- comment list END -->
							</div>
						</div>
						<!-- Form -->
						<div class="comments-area" id="respond">
							<div class="comment-respond">
								<div class="section-head text-center">
									<span>LEAVE A REPLY</span>
								</div>
								<h3 class="comment-reply-title" id="reply-title">
									<small> <a style="display:none;" href="javascript:void(0);" id="cancel-comment-reply-link" rel="nofollow">Cancel reply</a> </small>
								</h3>
								<form class="comment-form" id="commentform" method="post">
									<p class="comment-form-author">
										<label for="author">Name <span class="required">*</span></label>
										<input type="text" value="" placeholder="Name" id="author" required>
									</p>
									<p class="comment-form-email">
										<label for="email">Email <span class="required">*</span></label>
										<input type="text" value="" placeholder="Email" id="email" required>
									</p>
									<p class="comment-form-comment">
										<label for="comment">Comment</label>
										<textarea rows="8" placeholder="Add Your Comment" id="comment" required></textarea>
									</p>
									<p class="form-submit">
										<input type="submit" value="Post Comment" class="btn radius-no secondry" id="submit">
									</p>
								</form>
							</div>
						</div>
						<!-- Form END -->
					</div><!------col-8-end--->

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
		<!-- Post Standart End -->
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