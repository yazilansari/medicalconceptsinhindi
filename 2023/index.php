<?php include 'handler/conn.php'; //print_r($_SESSION);?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">		
	<!-- FAVICONS ICON -->
	<!-- <link rel="icon" href="images/favicon.ico" type="image/x-icon" /> -->
	<!-- <link rel="shortcut icon" type="image/png" href="images/favicon.png" /> -->
	<link rel="icon" type="image/favicon.png" href="images/favicon.png">
	<!-- PAGE TITLE HERE -->
	<title>MCH PRAKASHAN - Medical Concepts in Hindi By Dr Pankaj Agarwal</title>
	
	<!-- MOBILE SPECIFIC -->
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<!--[if lt IE 9]>
	<script src="js/html5shiv.min.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->	
	<!-- STYLESHEETS -->
	<link rel="stylesheet" type="text/css" href="css/plugins.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/templete.css">
	<link class="skin" rel="stylesheet" type="text/css" href="css/skin/skin-1.css">
<style>
.pankajvideo { z-index: 111; }
.currentpage { text-align: center; }
.currentpage h4 { font-size: 22px; border-bottom: 1px solid #000; }
.currentpage02 { text-align: left; padding-left: 30px; }
.currentpage.currentbooks { text-align: left; }
.currentbooks h4 { font-size: 22px; color:#000; border-bottom: 1px solid #000; }
.band-register { }
.contributoor .currentpage h4 { font-size: 22px; display: none; border-bottom: 1px solid #fff;
    color: #fff; }
.bgkhand { padding: 35px 0; margin-bottom: 0px;
    padding-bottom: 15px; }
.khand1 { margin-bottom: 55px; }
.publicn { transform: translate(15px, 50px); }
.bookcover a { width: 100px; height: 38px; line-height: 38px; font-size: 15px; font-weight: 500; }
.aprillmargin { margin: 0px; margin-bottom: 50px; }
a.phonemodal-menu { width: 100%; height: 84%; margin-top: 0; background: none; border: none; }
.phonemodal-menu { position: absolute; top: 0; left: 0; width: 100%; height: 90%; }
.sidbarwidth { width: 800px; margin: auto; }
.widget.widget-author.sidebarabt { min-height: 365px; border: 1px solid #878686; }
.bookcover { position: relative; min-height: 358px; }
.currentbokcover { min-height: auto; }
.bookcover1 { min-height: auto; margin-bottom: 30px; }
.khand1 .bookcover1 p { color:#646566; }
.ejournal1size { margin-left: 15px; }
a.phonemodal { width: 100%; height: 90%; margin-top: 0; background: none; border: none; }
a.phonemodal:hover { background: none; }
.phonemodal { position: absolute; top: 0; left: 0; width: 100%; height: 90%; }
.modal-header.phoneline { border-bottom: 1px solid #b9b3b3; box-shadow: 0 0 2px #000;
    padding-top: 20px; padding-bottom: 5px; }
.subscribe-form .modal-header .close.phoneclose { position: absolute; top: 28px; font-weight: 200; }
.subscribe-form .sub-title.phonecolor .title { font-size: 24px; }
.phnetext input[type="number"] { background: #fff; color: #000; outline-color: #6868688c; margin-top: 10px; margin-bottom: 0px;
    font-size: 15px; border: 1px solid #a19e9e; width: 100%; border-radius: 5px; height: 45px; font-weight: 500; }
.phnetext input[type="number"]::-webkit-inner-spin-button, input[type="number"]::-webkit-outer-spin-button { display: none; }
.phnetext input[type="submit"] { width: 95px; height: 40px; background: #000; color: #fff;
    margin: 12px auto; display: block; margin-bottom: 0; border-radius: 5px; font-size: 16px; padding: 0; }
.widtsidebar { width: 830px; margin: 0 auto; }
.reload-btn, .section-head.healthh { margin-top: 80px; } 
.hltheducatn { margin-bottom: 80px; }
.viewallvideopankj { margin-top: 30px; text-align: center; }
.viewallvideopankj p { margin-bottom: 0px; }
.viewallvideopankj p a { background: #c11b1b; color: #FFE!important; padding: 10px 15px; border-radius: 5px; }

@media(max-width: 1280px) {
.contributoor { padding: 0 40px; padding-top: 10px; padding-bottom: 10px;  }
}

@media(max-width: 1024px) {
.site-footer .footer-link li a { font-size: 12px; }	
.blog-card-info h4 { font-size: 14px; line-height: 20px; }
.trending-post .dlab-post-info .post-title.lineheight1 { line-height: 18px; font-size: 12px; }
.trending-post .dlab-post-media { width: auto; min-width: auto; }
}
@media(max-width: 900px) {
.bookcover { min-height: 550px; }
}

@media(max-width: 575.98px) {
.header-author { height: 175px;	}
.itemone { padding: 0px; }
.publicn { transform: translate(0, 10px); }
.contributoor { transform: translate(0px, 10px); margin-bottom: 35px; }
.bookcover a { margin-bottom: 15px; }
.currentpage h4 { margin-bottom: 10px; margin-top: 8px; }
.widtsidebar { width: 100%; }
.reload-btn, .section-head.healthh { margin-top: 40px; }
.bookcover { min-height: auto; }
.hepankajagrwl { margin-top: 15px; }
.hltheducatn { margin-bottom: 50px; }
}	
</style>	
</head>
<body id="bg">
<div class="page-wraper">
<div class="col-md-12">
<?php
 include "popupform.php";
?>
<?php
 include "popupform-video.php";
?>
</div>
<!-- <div id="loading-area"></div> -->
	<!-- <div class="modal fade subscribe-modal-bx" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content subscribe-form">
				<div class="modal-header">
					<div class="sub-title">
						<h3 class="title">Join Us To Day</h3>
						<p>Receive Only The Best Posts Via Email</p>
					</div>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="script/mailchamp.php" method="post" class="dzSubscribe row align-items-center">
						<div class="col-lg-12 col-md-12">
							<div class="form-group">
								<input name="dzName" required="required" type="text" class="form-control" placeholder="Your Name ">
							</div>
						</div>
						<div class="col-lg-12 col-md-12">
							<div class="form-group">
								<input name="dzEmail" required="required" type="email" class="form-control" placeholder="Your Email Address">
							</div>
						</div>
						<div class="col-lg-12 col-md-12">
							<div class="form-group m-b0">
								<button name="submit" value="Submit" type="submit" class="btn secondry radius-no btn-block">Subscribe</button>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="dzSubscribeMsg"></div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	
	<div class="modal fade subscribe-modal-bx" id="phoneotp1" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content subscribe-form popupphonecss">
				<div class="modal-header phoneline">
					<div class="sub-title phonecolor">
						<h3 class="title">Login</h3>
						<p>Receive Only The Best Posts Via Email</p>
					</div>
					<button type="button" class="close phoneclose" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
						<div class="row">
							<div class="col-md-12">
								<div class="phnetext">
									<input type="number" placeholder="enter your phone no*" onkeydown="return event.keyCode !== 69" name="" required>
									<input type="submit" value="Login">
									<a href="#" data-toggle="modal" data-target="#phoneotp" data-dismiss="modal">Login</a>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade subscribe-modal-bx" id="phoneotp" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content subscribe-form popupphonecss">
				<div class="modal-header phoneline">
					<div class="sub-title phonecolor">
						<h3 class="title">Enter OTP</h3>
						<p>check your mobile for the otp</p>
					</div>
					<button type="button" class="close phoneclose" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
						<div class="row">
							<div class="col-md-12">
								<div class="phnetext">
									<input type="number" placeholder="One Time Password*" onkeydown="return event.keyCode !== 69" name="" required>
									<input type="submit" value="Submit">
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div> -->
	<!------END----->
	<!-- header -->
	<div class="container2">
    <header class="site-header mo-left header-full header">
		<!-- main header -->
		<div class="sticky-header main-bar-wraper navbar-expand-lg">
			<div class="main-bar clearfix ">
				<div class="container">
					<!-- website logo -->
					<div class="logo-header mostion">
						<a href="index.php"><img src="images/logo.png" alt=""></a>
					</div>
					
					<!-- nav toggle button -->
					<button class="navbar-toggler collapsed navicon justify-content-end" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
						<span></span>
						<span></span>
						<span></span>
					</button>
					
					<!-- extra nav -->
					<!-- <div class="extra-nav">
						<div class="extra-cell">
							<ul>
								<li class="search-btn mt-2">
									<a id="quik-search-btn" href="javascript:;"><i class="ti-search m-r10"></i><span>Search</span></a>
								</li>
								<li>
									<button type="button" data-toggle="modal" data-target="#exampleModal" class="btn secondry radius-no">Subscribe</button>
								</li>
							</ul>
						</div>
					</div> -->
					
					<!-- Quik search -->
					<div class="dlab-quik-search">
						<form action="#">
							<input name="search" value="" type="text" class="form-control" placeholder="Search...">
							<span id="quik-search"><i class="ti-search"></i></span>
						</form>
						<span class="search-remove" id="quik-search-remove"><i class="ti-close"></i></span>
					</div>
					
					<!-- main nav -->
					<div class="header-nav navbar-collapse collapse justify-content-left" id="navbarNavDropdown">
						<div class="logo-header">
							<a href="index.php"><img src="images/footer-logo.png" alt=""></a>
						</div>
						<ul class="nav navbar-nav">	
							<li class="active">
								<a href="index.php">Home </a>
								<!-- <ul class="sub-menu">
									<li><a href="index.php">Home 01</a></li>
									<li><a href="index-2.php">Home 02</a></li>
									<li><a href="index-3.php">Home 03</a></li>
									<li><a href="index-4.php">Home 04</a></li>
									<li><a href="index-5.php">Home 05</a></li>
								</ul>	 -->
							</li>
							<!-- <li>
								<a href="javascript:void(0);">Post Layout<i class="fa fa-chevron-down"></i></a>
								<ul class="sub-menu">
									<li><a href="post-standart.php">Post Standart</a></li>
									<li><a href="post-left-sidebar.php">Post Left Sidebar</a></li>
									<li><a href="post-header-image.php">Post Header Image</a></li>
									<li><a href="post-slide-show.php">Post Slide Show</a></li>
									<li><a href="post-side-image.php">Post Side Image</a></li>
									<li><a href="post-gallery.php">Post Gallery</a></li>
									<li><a href="post-gallery-alternative.php">Post Gallery Alt</a></li>
									<li><a href="post-link.php">Post Link</a></li>
									<li><a href="post-audio.php">Post Audio</a></li>
									<li><a href="post-video.php">Post Video</a></li>
									<li><a href="post-pagination.php">Post With Pagination</a></li>
									<li><a href="post-open-gutenberg.php">Post Open Gutenberg</a></li>
								</ul>
							</li> -->
							<li class="has-mega-menu post-slider life-style">
								<a href="javascript:void(0);">Health Education<i class="fa fa-chevron-down"></i></a>
								<div class="mega-menu">
									<div class="life-style-bx">
										<div class="life-style-tabs">
											<ul>
												<?php $count = 1; $q = "SELECT * FROM `mch_categories` WHERE `parent_category_id` = 1 AND `is_active` = 1";
													  $res = mysqli_query($conn, $q);
													  if(mysqli_num_rows($res) > 0) {
													  	while ($row = mysqli_fetch_assoc($res)) { ?>
													  		<li><a href="sub-categories.php?id=<?php echo base64_encode($row['id']); ?>" id="st-<?php echo $row['id']; ?>" class="post-tabs <?php echo $count == 1 ? 'active' : ''?>"><?php echo $row['name']; ?></a></li>
												<?php $count++; } } ?>
											</ul>
										</div>
										<div class="life-style-post text-center">
											<?php $countt = 1; $q = "SELECT * FROM `mch_categories` WHERE `parent_category_id` = 1 AND `is_active` = 1";
												  $res = mysqli_query($conn, $q);
												  if(mysqli_num_rows($res) > 0) {
												  while ($row = mysqli_fetch_assoc($res)) { ?>
													<div id="<?php echo $row['id']; ?>" class="life-style-post-bx <?php echo $countt == 1 ? 'show' : ''?>">
														<div class="header-blog-carousel owl-carousel owl-carousel1 owl-btn-center-lr">
												  	<?php $q2 = "SELECT * FROM `mch_sub_categories` WHERE `category_id` = ".$row['id']." AND `is_active` = 1";
												  	$res2 = mysqli_query($conn, $q2);
												  	if(mysqli_num_rows($res2) > 0) {
												  	while ($row2 = mysqli_fetch_assoc($res2)) { ?>
														<div class="item">
															<div class="blog-post blog-sm">
																<div class="dlab-post-media">
																	<a href="sub-category-details.php?id=<?php echo base64_encode($row2['id']); ?>"><img src="../uploads/assets/uploaded_data/subcategory_img/<?php echo $row2['thumbnail_image']; ?>" alt=""></a>
																</div>
																<div class="dlab-post-info">
																	<div class="dlab-post-title ">
																		<h5 class="post-title"><a href="sub-category-details.php?id=<?php echo base64_encode($row2['id']); ?>"><?php echo $row2['name']; ?></a></h5>
																	</div>
																</div>
															</div>
														</div>
													<?php } } ?>
														</div>
														<div class="viewallpage"><a href="sub-categories.php?id=<?php echo base64_encode($row['id']); ?>">View All</a></div>
													</div>
											<?php $countt++; } } ?>
											<!-----Travel-End----->
										</div>
									</div>
								</div>
							</li><!-----Health-Education-End----->

							<!----medical-education---->
							<li class="has-mega-menu post-slider life-style">
								<a href="javascript:void(0);">Medical Education<i class="fa fa-chevron-down"></i></a>
								<div class="mega-menu">
									<div class="life-style-bx">
										<div class="life-style-tabs">
											<ul>
												<?php $count = 1; $q = "SELECT * FROM `mch_categories` WHERE `parent_category_id` = 2 AND `is_active` = 1";
													  $res = mysqli_query($conn, $q);
													  if(mysqli_num_rows($res) > 0) {
													  	while ($row = mysqli_fetch_assoc($res)) { ?>
													  		<li><a href="sub-categories.php?id=<?php echo base64_encode($row['id']); ?>" id="st-<?php echo $row['id']; ?>" class="post-tabs <?php echo $count == 1 ? 'active' : ''?>"><?php echo $row['name']; ?></a></li>
												<?php $count++; } } ?>
											</ul>
										</div>
										<div class="life-style-post text-center">
											<?php $countt = 1; $q = "SELECT * FROM `mch_categories` WHERE `parent_category_id` = 2 AND `is_active` = 1";
												  $res = mysqli_query($conn, $q);
												  if(mysqli_num_rows($res) > 0) {
												  while ($row = mysqli_fetch_assoc($res)) { ?>
													<div id="<?php echo $row['id']; ?>" class="life-style-post-bx <?php echo $countt == 1 ? 'show' : ''?>">
													<div class="header-blog-carousel owl-carousel owl-carousel1 owl-btn-center-lr">
												  	<?php $q2 = "SELECT * FROM `mch_sub_categories` WHERE `category_id` = ".$row['id']." AND `is_active` = 1";
												  	$res2 = mysqli_query($conn, $q2);
												  	if(mysqli_num_rows($res2) > 0) {
												  	while ($row2 = mysqli_fetch_assoc($res2)) { ?>
														<div class="item">
															<div class="blog-post blog-sm">
																<div class="dlab-post-media">
																	<?php if(strtolower($row['name']) != 'e journal' && strtolower($row['name']) != 'e book') { ?>
																	<a href="sub-category-details.php?id=<?php echo base64_encode($row2['id']); ?>">
																		<img src="../uploads/assets/uploaded_data/subcategory_img/<?php echo $row2['thumbnail_image']; ?>" alt="">
																	</a>
																	<?php } else { ?>
																		<a href="ebook-ejournal-details.php?id=<?php echo base64_encode($row2['id']); ?>&type=<?php echo base64_encode(strtolower(str_replace(' ', '', $row['name']))); ?>">
																		<img src="../uploads/assets/uploaded_data/subcategory_img/<?php echo $row2['thumbnail_image']; ?>" alt="">
																	</a>
																	<?php } ?>
																</div>
																<div class="dlab-post-info">
																	<?php if(strtolower($row['name']) != 'e journal' && strtolower($row['name']) != 'e book') { ?>
																		<h5 class="post-title"><a href="sub-category-details.php?id=<?php echo base64_encode($row2['id']); ?>"><?php echo $row2['name']; ?></a></h5>
																	<?php } else { ?>
																		<h5 class="post-title"><a href="ebook-ejournal-details.php?id=<?php echo base64_encode($row2['id']); ?>&type=<?php echo base64_encode(strtolower(str_replace(' ', '', $row['name']))); ?>"><?php echo $row2['name']; ?></a></h5>
																	</a>
																	<?php } ?>
																</div>
															</div>
														</div>
												<?php } } ?>
															</div>
															<?php if(strtolower($row['name']) != 'e journal' && strtolower($row['name']) != 'e book') { ?>
																<div class="viewallpage"><a href="sub-categories.php?id=<?php echo base64_encode($row['id']); ?>">View All</a></div>
															<?php } else { ?>
																<div class="viewallpage"><a href="ebook-ejournal-details.php?id=<?php echo base64_encode($row['id']); ?>&type=<?php echo base64_encode(strtolower(str_replace(' ', '', $row['name']))); ?>">View All</a></div>
																	</a>
															<?php } ?>
														</div>
												<?php $countt++; } } ?>
										</div>
									</div>
								</div>
							</li><!------medical-education-end---->
							<!-- <li>
								<a href="javascript:void(0);">Shop<i class="fa fa-chevron-down"></i></a>
								<ul class="sub-menu">
									<li><a href="shop-product.php">Product</a></li>
									<li><a href="shop-product-details.php">Product Details</a></li>
									<li><a href="shop-cart.php">Cart</a></li>
									<li><a href="shop-checkout.php">Checkout</a></li>
								</ul>
							</li>
							<li>
								<a href="javascript:void(0);">Pages<i class="fa fa-chevron-down"></i></a>
								<ul class="sub-menu">
									<li><a href="about-me.php">About</a></li>
									<li><a href="archive.php">Archive</a></li>
									<li><a href="author.php">Author</a></li>
									<li><a href="category.php">Category</a></li>
									<li><a href="tags.php">Tags</a></li>
									<li><a href="search-results.php">Search results</a></li>
									<li><a href="coming-soon.php">Coming Soon</a></li>
									<li><a href="sitedown.php">Maintenance</a></li>
									<li><a href="error-404.php">Error 404</a></li>
								</ul>
							</li> -->
							<li><a href="contributors.php" title="Contributors">Contributors</a></li>
							<li><a href="gallery.php" title="Gallery">Gallery</a></li>
							<li>
								<a href="javascript:void(0);">About Us<i class="fa fa-chevron-down"></i></a>
								<ul class="sub-menu">
									<li><a href="about-me.php">About</a></li>
									<li><a href="contact-me.php">Contact Us</a></li>
								</ul>
							</li>
							
							<?php if(!isset($_SESSION['reg_id']) && empty($_SESSION['reg_id'])) { ?>
							<li class="loginsubscrtn">
								<a href="#" data-toggle="modal" data-target="#phoneotp1">Login</a>
								<!-----<ul class="sub-menu">								
									<li><a href="#" data-toggle="modal" data-target="#phoneotp1">Login Subscription</a></li>
									<li><a href="registration.php">Register Subscription</a></li>
								</ul>------>
							</li>
							<?php } else { ?>
							<li><a href="logout.php">Logout</a></li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
    </header>
    </div>
    <!-- header END -->
	<div class="header-author desktopview">
		<div class="author-bx">
			<div class="author-media">
				<img src="images/author.jpg" alt=""/>
			</div>
			<div class="author-info medicall">
				<ul class="author-social">
					<li><a href="https://www.facebook.com/profile.php?id=100063935207754" class=""><i class="fa fa-facebook"></i> <span>facebook</span></a></li>
					<li><a href="https://twitter.com/mch_drpankaj?lang=en" class=""><i class="fa fa-twitter"></i> <span>twitter</span></a></li>
					<!-- <li><a href="javascript:void(0);" class=""><i class="fa fa-instagram"></i> <span>instagram</span></a></li>
					<li><a href="javascript:void(0);" class=""><i class="fa fa-linkedin"></i> <span>linkedin</span></a></li> -->
				</ul>
			</div>
		</div>
	</div>
	<!-- Content -->

     <!--Mobile Banner Start-->
	<div class="mobileview">
		<div class="author-bx-mobile">
			<div class="author-media">
				<img src="images/author-mobile.jpg" alt=""/>
			</div>
			<div class="author-info medicall">
				<ul class="author-social author-social-mobile">
					<li><a href="https://www.facebook.com/profile.php?id=100063935207754" class=""><i class="fa fa-facebook"></i> <span>facebook</span></a></li>
					<li><a href="https://twitter.com/mch_drpankaj?lang=en" class=""><i class="fa fa-twitter"></i> <span>twitter</span></a></li>
					<!-- <li><a href="javascript:void(0);" class=""><i class="fa fa-instagram"></i> <span>instagram</span></a></li>
					<li><a href="javascript:void(0);" class=""><i class="fa fa-linkedin"></i> <span>linkedin</span></a></li> -->
				</ul>
			</div>
		</div>
	</div>
	<!-- Mobile Banner End -->
	
	
<!-- 	<div class="container">
		<div class="row">
			<div class="col-md-12 mt-4">
				<div class="section-head text-center">
					<span>E-Journal</span>
				</div>
			</div>
		</div>
	</div> -->
		<!-- Trending Post -->
	<div class="page-content bg-white">
		<!-- <div class="section-full trending-post-bx m-b20 pt-0 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.6s">
			<div class="container-fluid">
				<div class="trending-post-carousel owl-carousel owl-carousel00 owl-none">
					<div class="item">
						<div class="trending-post">
							<div class="dlab-post-media">
								<img src="images/trending-post/pic3.jpg" alt="">
							</div>
							<div class="dlab-post-info">
								<h6 class="post-title lineheight1"><a href="punarnava-e-journal-volume3.php">Punarnava E-Journal (Volume 3)</a></h6>
								<div class="dlab-post-meta">
									<ul>
										<li class="post-category"><a href="video.php">E-Journal</a></li>
										<li class="post-date">at <span>13th Oct, 2022</span></li>
									</ul>
								</div>
							</div>
						</div>
					</div>	
					<div class="item">
						<div class="trending-post">
							<div class="dlab-post-media">
								<img src="images/trending-post/pic3.jpg" alt="">
							</div>
							<div class="dlab-post-info">
								<h6 class="post-title lineheight1"><a href="punarnava-e-journal-volume2.php">Punarnava e-journal (Volume 2)</a></h6>
								<div class="dlab-post-meta">
									<ul>
										<li class="post-category"><a href="video.php">E-Journal</a></li>
										<li class="post-date">at <span>16th Sep, 2022</span></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="trending-post">
							<div class="dlab-post-media">
								<img src="images/trending-post/pic3.jpg" alt="">
							</div>
							<div class="dlab-post-info">
								<h6 class="post-title lineheight1"><a href="punarnava-e-journal-volume1.php">Punarnava - The e-journal (Volume 1)</a></h6>
								<div class="dlab-post-meta">
									<ul>
										<li class="post-category"><a href="video.php">E-Journal</a></li>
										<li class="post-date">at <span>16th Sep, 2022</span></li>
									</ul>
								</div>
							</div>
						</div>
					</div>

					<div class="item">
						<div class="trending-post">
							<div class="dlab-post-media">
								<img src="images/trending-post/pic3.jpg" alt="">
							</div>
							<div class="dlab-post-info">
								<h6 class="post-title lineheight1"><a href="pulmonary-embolism.php">Pulmonary Embolism(pe) Mcqs</a></h6>
								<div class="dlab-post-meta">
									<ul>
										<li class="post-category"><a href="video.php">E-Journal</a></li>
										<li class="post-date">at <span>13th Mar, 2023</span></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="trending-post">
							<div class="dlab-post-media">
								<img src="images/trending-post/pic3.jpg" alt="">
							</div>
							<div class="dlab-post-info">
								<h6 class="post-title lineheight1"><a href="remission.php">Remission ऑफ Diabetes</a></h6>
								<div class="dlab-post-meta">
									<ul>
										<li class="post-category"><a href="video.php">E-Journal</a></li>
										<li class="post-date">at <span>13th Mar, 2023</span></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="trending-post">
							<div class="dlab-post-media">
								<img src="images/trending-post/pic3.jpg" alt="">
							</div>
							<div class="dlab-post-info">
								<h6 class="post-title lineheight1"><a href="sugar-advantage.php">*शुगर को सही रखने क्या लाभ*</a></h6>
								<div class="dlab-post-meta">
									<ul>
										<li class="post-category"><a href="text.php">E-Journal</a></li>
										<li class="post-date">at <span>13th Mar, 2023</span></li>
									</ul>
								</div>
							</div>
						</div>
					</div>					
				</div>
			</div>
		</div> -->
		<!-- Trending Post End -->	
		<!-----
		<div class="container">
			<div class="row">
				<div class="col-md-12 mt-5">
					<div class="section-head text-center">
						<span>E-Books</span>
					</div>
				</div>
			</div>
		</div>----->
		<!-- Events Post Carousel -->
		

		<!-- Events Post End -->

		<!-- Buy Now Carousel -->
		<div class="container">
			<div class="row">
				<div class="col-md-12 mt-5">
					<div class="section-head text-center">
						<span>Medical Books and EJournals</span>
					</div>
				</div>
			</div>
		</div>

	<div class="bgkhand">
	<div class="container">
	<div class="row khand1">	
		<div class="section-full wow fadeIn" data-wow-duration="2s" data-wow-delay="0.9s">			

			<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="currentpage currentbooks p-0">
						<h4>Medical Books</h4>
					</div>
				</div>
				<?php $q = "SELECT * FROM `mch_sub_categories` WHERE `parent_category_id` = 2 AND `category_id` = 26 AND `is_active` = 1 ORDER BY `id` DESC";
					$res = mysqli_query($conn, $q);
					if(mysqli_num_rows($res) > 0) {
					while ($row = mysqli_fetch_assoc($res)) { ?>
					  	<div class="col-lg-2 col-md-2 col-sm-12">
							<div class="bookcover bookcover1  wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
								<p class="mb-0"><?php echo $row['name']; ?></p>
								<img src="../uploads/assets/uploaded_data/subcategory_img/<?php echo $row['thumbnail_image']; ?>" alt="">
								<!-----<a href="#" class="phonemodal" data-toggle="modal" data-target="#phoneotp1"></a>----->
								<a href="ebook-ejournal-details.php?id=<?php echo base64_encode($row['id']); ?>&type=ZWJvb2s=" class="phonemodal"></a>
							</div>
						</div>
				<?php } } ?>
			</div>
            <div class="row">
            <div class="col-md-6 brandheading1">
		        <img src="images/brand-register.png" usemap="#image-map">

                <map name="image-map">
                    <area target="_self" alt="Register Here" title="Register Here" href="registration.php" coords="523,61,727,103" shape="rect">
                </map>
		    </div>
		   <div class="col-md-6 brandheading1 band2">
		        <img src="images/Band_2.png" usemap="#image-map2">

                <map name="image-map2">
                    <area target="" alt="Registration" title="Registration" href="registration.php" coords="267,60,438,90" shape="rect">
                </map>
		    </div>
            </div>
			</div>
		</div>
		</div>
		</div>
	</div>
	<div class="currentresize">
	<div class="row aprillmargin m-0">
		<!-------
		<div class="col-md-3">
			<div class="contributoor">
			<div class="currentpage">
				<h4>Current Month</h4>
			</div>
			<div class="item itemone">
				<p class="mb-0 text-white">April 2023</p>
				<div class="bookcover wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
					<img src="images/aprilbook-cover.jpg" alt="">
					
				<a href="#" class="phonemodal" data-toggle="modal" data-target="#phoneotp1"></a>
				</div>
			</div>
			</div>
		</div>
		--------->		
		<div class="col-md-12 col-sm-12">
			<div class="currentpage currentpage02">
				<h4>EJOURNALS</h4>
			</div>
			<!----ejournal---col-md---->
			<div class="col-md-12 ejournal1size">	
			<div class="row">
			  	<!-- <div class="col-lg-2 col-md-2 col-sm-12">
					<div class="contributoor">
						<div class="currentpage">
							<h4>Current Month</h4>
						</div>
						<div class="item itemone">
							<div class="bookcover currentbokcover wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.2s; animation-name: fadeInUp;">
							<p class="mb-0 text-white">June 2023</p>
							<img src="images/junebook-cover.jpg" alt="">
							---<a href="#">Buy Now</a>----
							<a href="ejournals-june-15-2023.php?type=ZWpvdXJuYWw=" class="phonemodal"></a>
							-----<a href="ejournals-preview.php" class="phonemodal" data-toggle="modal" data-target="0#phoneotp1"></a>----
							</div>
						</div>
					</div>
				</div> -->
				<?php $count = 1; $q = "SELECT * FROM `mch_sub_categories` WHERE `parent_category_id` = 2 AND `category_id` = 21 AND `is_active` = 1 ORDER BY `id` DESC";
					$res = mysqli_query($conn, $q);
					if(mysqli_num_rows($res) > 0) {
					while ($row = mysqli_fetch_assoc($res)) { ?>
						<div class="col-lg-2 col-md-2 col-sm-12">
							<div class="bookcover bookcover1 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
								<p class="mb-0"><?php echo $row['name']; ?></p>
								<img src="../uploads/assets/uploaded_data/subcategory_img/<?php echo $row['thumbnail_image']; ?>" alt="">
								<a href="ebook-ejournal-details.php?id=<?php echo base64_encode($row['id']); ?>&type=ZWpvdXJuYWw=" class="phonemodal"></a>
							</div>
						</div>
				<?php } } ?>
			</div>
			</div>
			<!-----ejournal-col-md---->
			<!----crousel--ejournal----
			<div class="section-full publicn wow fadeIn mt-0" data-wow-duration="2s" data-wow-delay="0.9s">
				<div class="container-fluid">
					<div class="top-post-carousel owl-carousel publication owl-btn-center-lr owl-loaded owl-drag">
						<div class="item">
							<div class="bookcover wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
								<p class="mb-0">Jan 2023</p>
								<img src="images/book-cover2.jpg" alt="">
								<a href="#">Buy Now</a>
								<a href="#" class="phonemodal" data-toggle="modal" data-target="#phoneotp1"></a>
							</div>
						</div>
						
						<div class="item">
							<div class="bookcover wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
								<p class="mb-0">Feb 2023</p>
								<img src="images/book-cover.jpg" alt="">
								<a href="#">Buy Now</a>
								<a href="#" class="phonemodal" data-toggle="modal" data-target="#phoneotp1"></a>
							</div>
						</div>
						<div class="item">
							<div class="bookcover wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
								<p class="mb-0">Mar 2023</p>
								<img src="images/book-cover3.jpg" alt="">
								<a href="#">Buy Now</a>
								<a href="#" class="phonemodal" data-toggle="modal" data-target="#phoneotp1"></a>
							</div>
						</div>


						<div class="item">
							<p class="mb-0">Aug 2022</p>
							<div class="bookcover wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
								<img src="images/book-cover04.jpg" alt="">
								<a href="#">Buy Now</a>
								<a href="#" class="phonemodal" data-toggle="modal" data-target="#phoneotp1"></a>
							</div>
						</div>
						<div class="item">
							<p class="mb-0">Sep 2022</p>
							<div class="bookcover wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
								<img src="images/book-cover05.jpg" alt="">
								<a href="#">Buy Now</a>
								<a href="#" class="phonemodal" data-toggle="modal" data-target="#phoneotp1"></a>
							</div>
						</div>
						<div class="item">
							<p class="mb-0">Oct 2022</p>
							<div class="bookcover wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
								<img src="images/book-cover06.jpg" alt="">
								<a href="#">Buy Now</a>
								<a href="#" class="phonemodal" data-toggle="modal" data-target="#phoneotp1"></a>
							</div>
						</div>
						<div class="item">
							<p class="mb-0">Nov 2022</p>
							<div class="bookcover wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
								<img src="images/book-cover07.jpg" alt="">
								<a href="#">Buy Now</a>
								<a href="#" class="phonemodal" data-toggle="modal" data-target="#phoneotp1"></a>
							</div>
						</div>
						<div class="item">
							<p class="mb-0">Dec 2022</p>
							<div class="bookcover wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
								<img src="images/book-cover08.jpg" alt="">
								<a href="#">Buy Now</a>
								<a href="#" class="phonemodal" data-toggle="modal" data-target="#phoneotp1"></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>-------->
	</div>		
	</div>
	</div>		
		<!-- Category Grid Style -->
		<div class="section-full bg-white content-inner-1 category2">
			<div class="container">
				<div class="section-head text-center">
					<span>Categories</span>
				</div>
				<div class="category-owl owl-carousel owl-category owl-btn-center-lr" style="transition: all 3s ease 0s;">
				<?php $q = "SELECT `mch_sub_categories`.*, `mch_categories`.`name` AS `category_name` FROM `mch_sub_categories` LEFT JOIN `mch_categories` ON `mch_categories`.`id` = `mch_sub_categories`.`category_id` WHERE `mch_sub_categories`.`parent_category_id` = 2 AND `mch_sub_categories`.`is_active` = 1 GROUP BY `mch_sub_categories`.`category_id` ORDER BY `mch_sub_categories`.`id` DESC";
					$res = mysqli_query($conn, $q);
					if(mysqli_num_rows($res) > 0) {
					while ($row = mysqli_fetch_assoc($res)) { ?>
						<div class="item">
							<div class="category-box">
								<div class="category-media">							
									<img src="../uploads/assets/uploaded_data/subcategory_img/<?php echo $row['thumbnail_image']; ?>" alt="Diet">				
								</div>
								<div class="category-info">
									<a href="sub-categories.php?id=<?php echo base64_encode($row['category_id']); ?>" class="category-title"><?php echo $row['category_name']; ?></a>
								</div>
							</div>
						</div>
				<?php } } ?>
				</div>
			</div>
		</div>


		<!-- <div class="section-full bg-white content-inner-1">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-sm-12">
						<div class="section-head text-center">
							<span>About Us</span>
						</div>
						<div class="col-md-12 col-sm-12">
							<h4>विनम्र निवेदन</h4>
							<p>MCH का उद्दश्य पाठकों को स्वास्थ्य एवं चिकित्सा संबंधी जानकारियों को हिंदी में अवगत कराना है। यह इसलिये महत्वपूर्ण है क्योंकि किसी भी विषय को अपनी मातृभाषा में समझना अधिक सरल होता है। आधुनिक चिकित्सा विज्ञान के क्षेत्र में अपनी मातृभाषा में इस प्रकार की कोई व्यवस्था न होने के कारण, चिकित्सा विज्ञान के कुछ छात्र</p>
							<a href="#" class="readme">Read More</a>
						</div>
					</div>
					<div class="col-md-4 col-sm-12"></div>
					<div class="col-md-4 col-sm-12"></div>
				</div>
			</div>
		</div> -->
		<!--Health Now Carousel End-->
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-head text-center healthh">
						<span>Health Education</span>
					</div>
				</div>
			</div>
		</div>
		<!--Health Education Now Carousel End-->
		<div class="section-full bg-white wow fadeIn" data-wow-duration="2s" data-wow-delay="0.9s">
			<div class="container-fluid">
				<div class="top-post-carousel owl-carousel owl-none">
				<?php $q = "SELECT `mch_sub_categories`.*, `mch_categories`.`name` AS `category_name` FROM `mch_sub_categories` LEFT JOIN `mch_categories` ON `mch_categories`.`id` = `mch_sub_categories`.`category_id` WHERE `mch_sub_categories`.`parent_category_id` = 1 AND `mch_sub_categories`.`is_active` = 1 GROUP BY `mch_sub_categories`.`category_id` ORDER BY `mch_sub_categories`.`id` DESC";
					$res = mysqli_query($conn, $q);
					if(mysqli_num_rows($res) > 0) {
					while ($row = mysqli_fetch_assoc($res)) { ?>
						<div class="item">
							<div class="blog-card blog-grid overlay-post left radius-sm">
								<div class="dlab-post-media">
									<img src="../uploads/assets/uploaded_data/subcategory_img/<?php echo $row['thumbnail_image']; ?>" alt=""/>
								</div>
								<div class="blog-card-info">
									<div class="dlab-post-meta">
										<ul>
											<li class="post-tag"><a href="sub-categories.php?id=<?php echo base64_encode($row['category_id']); ?>"><?php echo $row['category_name']; ?></a></li>
										</ul>
									</div>
									<h4 class="title"><a href="sub-category-details.php?id=<?php echo base64_encode($row['id']); ?>"><?php echo $row['name']; ?></a></h4>
								</div>
							</div>
						</div>
				<?php } } ?>
				</div>
			</div>
		</div>
		<!-- Health Post End -->



		<div class="section-full bg-white content-inner-1">
			<div class="container">
				<!-- <div class="section-head text-center">
					<span>Feature Post</span>
				</div> -->
				<div class="row blog-box-style1">
					<!-- <div class="col-md-8 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
						<div class="blog-card blog-lg content-box">
							<div class="dlab-post-media">
								<img src="images/blog/blog-lg/pic1.jpg" alt=""/>
							</div>
							<div class="blog-card-info">
								<div class="dlab-post-meta">
									<ul>
										<li class="post-author"><span>by</span> <a href="adrenal-glands-miscellaneous-effects.php">Dr Pankaj Agarwal</a></li>
										<li class="post-category">in <a href="javascript:void(0);">Adrenal Glands, </a></li>
										<li class="post-date">at <span>13 Oct, 2022</span></li>
									</ul>
								</div>
								<h2><a href="adrenal-glands-miscellaneous-effects.php">Dr Pankaj Agarwal</a></h2>
								<div class="dlab-feed-meta">
									<ul>										
										<li class="post-view"><a href="javascript:void(0);"><i class="fa fa-eye"></i><span>397</span></a></li>
										<li class="post-share"><i class="fa fa-share-alt"></i><span>Share</span>
											<ul>
												<li><a href="https://www.facebook.com/profile.php?id=100063935207754"><i class="fa fa-facebook"></i></a></li>
												<li><a href="https://twitter.com/mch_drpankaj?lang=en"><i class="fa fa-twitter"></i></a></li>												
											</ul>
										</li>
									</ul>
								</div>
							</div>
								<p class="mt-3">Adrenal Glands Miscellaneous Effects Of GC</p>
								<a href="adrenal-glands-miscellaneous-effects.php" class="post-readmore" data-text="Read More">Read More</a>
						</div>
					</div> -->
					<!-- <div class="col-md-4 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.4s">
						<div class="blog-card blog-grid overlay-post left">
							<div class="dlab-post-media">
								<img src="images/blog/full/blog/pic4.jpg" alt="">
							</div>
							<div class="blog-card-info">
								<div class="dlab-post-meta">
									<ul>
										<li class="post-tag"><a href="tags.php">Beauty</a></li>
									</ul>
								</div>
								<h4 class="title"><a href="post-header-image.php">The Definitive Guide to Surviving Allergy Season</a></h4>
							</div>
						</div>
						<div class="blog-card blog-grid overlay-post left">
							<div class="dlab-post-media">
								<img src="images/blog/full/blog/pic6.jpg" alt="">
							</div>
							<div class="blog-card-info">
								<div class="dlab-post-meta">
									<ul>
										<li class="post-tag"><a href="tags.php">Beauty</a></li>
									</ul>
								</div>
								<h4 class="title"><a href="post-header-image.php">The Definitive Guide to Surviving Allergy Season</a></h4>
							</div>
						</div>
					</div> -->
					<div class="col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="side-bar sticky-top sidbarwidth mb-0">
								
							<!-- <div class="widget widget_categories wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
								<h6 class="widget-title"><span>EDUCATION</span></h6>
								<ul>
									<li><a href="#"> Health Education  </a> <span class="badge"><i class="fa fa-globe fa-lg" aria-hidden="true"></i></span> </li>
									<li><a href="#"> Medical Education  </a> <span class="badge"><i class="fa fa-globe fa-lg" aria-hidden="true"></i></span></li>
								</ul>
							</div> -->
									<!-- <li><a href="category.php">Fashion </a> <span class="badge">14</span></li>
									<li><a href="category.php">Food & Health </a> <span class="badge">05</span></li>
									<li><a href="category.php">Travel </a> <span class="badge">10</span></li> -->
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
					</div><!----About-Me-End---->
				</div><!------END--------->

				<!--Buy Now
				 <div class="row mt-5 mb-5">
					<div class="col-lg-4 col-md-8 col-sm-12 col-12">
						<div class="bookcover wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
							<img src="images/book-cover.jpg" alt="">
							<a href="#">Buy Now</a>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12 col-12">
						<div class="widget recent-posts-entry wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s">
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
										<h6 class="post-title"><a href="antiplatelet.php">Antiplatelet Therapy</a></h6>
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
										<h6 class="post-title"><a href="antiplatelet4.php">Antiplatelet Therapy 4</a></h6>
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
										<h6 class="post-title"><a href="lung-exercise.php">Lung Function Tests</a></h6>
									</div>
								</div>
							</div>
						</div> 
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12 col-12">
						 <div class="widget widget_categories wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s">
								<h6 class="widget-title"><span>Education</span></h6>
								<ul>
									<li><a href="#"> Health Education  </a> <span class="badge"><i class="fa fa-globe fa-lg" aria-hidden="true"></i></span> </li>
									<li><a href="#"> Medical Education </a> <span class="badge"><i class="fa fa-globe fa-lg" aria-hidden="true"></i></span></li>									
								</ul>
							</div> 
					</div>
				</div> -->
			</div>
		</div>
		<!-- <div class="section-full bg-white content-inner-3">
			<div class="container">
				<div class="section-head text-center">
					<span>LifeStyle</span>
				</div>
				<div class="row">
					<div class="col-md-4 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
						<div class="blog-card blog-grid">
							<div class="dlab-post-media">
								<img src="images/blog/blog-md/blog/pic1.jpg" alt=""/>
							</div>
							<div class="blog-card-info">
								<div class="dlab-post-meta">
									<ul>
										<li class="post-category"><a href="javascript:void(0);">beauty</a>, <a href="javascript:void(0);">beauty</a></li>
										<li class="post-date">at <span>12 August 2020</span></li>
									</ul>
								</div>
								<h4 class="title"><a href="post-audio.php">Natural Hair Guru Who Launch Products For Tresses</a></h4>
								<div class="dlab-feed-meta">
									<ul>
										<li class="post-like"><a href="javascript:void(0);"><i class="fa fa-thumbs-o-up"></i><span>231</span></a></li>
										<li class="post-dislike"><a href="javascript:void(0);"><i class="fa fa-thumbs-o-down"></i><span>584</span></a></li>
										<li class="post-view"><a href="javascript:void(0);"><i class="fa fa-eye"></i><span>397</span></a></li>
										<li class="post-share"><i class="fa fa-share-alt"></i><span>Share</span>
											<ul>
												<li><a href="javascript:;"><i class="fa fa-facebook"></i></a></li>
												<li><a href="javascript:;"><i class="fa fa-google-plus"></i></a></li>
												<li><a href="javascript:;"><i class="fa fa-linkedin"></i></a></li>
												<li><a href="javascript:;"><i class="fa fa-twitter"></i></a></li>
											</ul>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.4s">
						<div class="blog-card blog-grid">
							<div class="dlab-post-media">
								<img src="images/blog/blog-md/blog/pic2.jpg" alt=""/>
							</div>
							<div class="blog-card-info">
								<div class="dlab-post-meta">
									<ul>
										<li class="post-category"><a href="javascript:void(0);">beauty</a>, <a href="javascript:void(0);">beauty</a></li>
										<li class="post-date">at <span>12 August 2020</span></li>
									</ul>
								</div>
								<h4 class="title"><a href="post-pagination.php">Everything You Need to Know About Cultural</a></h4>
								<div class="dlab-feed-meta">
									<ul>
										<li class="post-like"><a href="javascript:void(0);"><i class="fa fa-thumbs-o-up"></i><span>231</span></a></li>
										<li class="post-dislike"><a href="javascript:void(0);"><i class="fa fa-thumbs-o-down"></i><span>584</span></a></li>
										<li class="post-view"><a href="javascript:void(0);"><i class="fa fa-eye"></i><span>397</span></a></li>
										<li class="post-share"><i class="fa fa-share-alt"></i><span>Share</span>
											<ul>
												<li><a href="javascript:;"><i class="fa fa-facebook"></i></a></li>
												<li><a href="javascript:;"><i class="fa fa-google-plus"></i></a></li>
												<li><a href="javascript:;"><i class="fa fa-linkedin"></i></a></li>
												<li><a href="javascript:;"><i class="fa fa-twitter"></i></a></li>
											</ul>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.6s">
						<div class="blog-card blog-grid">
							<div class="dlab-post-media">
								<img src="images/blog/blog-md/blog/pic3.jpg" alt=""/>
							</div>
							<div class="blog-card-info">
								<div class="dlab-post-meta">
									<ul>
										<li class="post-category"><a href="javascript:void(0);">beauty</a>, <a href="javascript:void(0);">beauty</a></li>
										<li class="post-date">at <span>12 August 2020</span></li>
									</ul>
								</div>
								<h4 class="title"><a href="post-open-gutenberg.php">Las Catalinas, Car-Free Costa Rica Town Welcomes</a></h4>
								<div class="dlab-feed-meta">
									<ul>
										<li class="post-like"><a href="javascript:void(0);"><i class="fa fa-thumbs-o-up"></i><span>231</span></a></li>
										<li class="post-dislike"><a href="javascript:void(0);"><i class="fa fa-thumbs-o-down"></i><span>584</span></a></li>
										<li class="post-view"><a href="javascript:void(0);"><i class="fa fa-eye"></i><span>397</span></a></li>
										<li class="post-share"><i class="fa fa-share-alt"></i><span>Share</span>
											<ul>
												<li><a href="javascript:;"><i class="fa fa-facebook"></i></a></li>
												<li><a href="javascript:;"><i class="fa fa-google-plus"></i></a></li>
												<li><a href="javascript:;"><i class="fa fa-linkedin"></i></a></li>
												<li><a href="javascript:;"><i class="fa fa-twitter"></i></a></li>
											</ul>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> -->
        <!-- Post Grid Style End -->
		<!-- Subscribe -->
        <!-- <div class="section-full mt-5">
			<div class="container">
				<form action="script/mailchamp.php" method="post" class="dzSubscribe subscribe-box row align-items-center">
					<div class="col-lg-12">
						<div class="dzSubscribeMsg"></div>
					</div>
					<div class="col-lg-3 col-md-12">
						<div class="sub-title">
							<h3 class="title">Join Us To Day</h3>
							<p>Receive Only The Best Posts Via Email</p>
						</div>
					</div>
					<div class="col-lg-3 col-md-4">
						<div class="input-group">
							<input name="dzName" required="required" type="text" class="form-control" placeholder="Your Name ">
						</div>
					</div>
					<div class="col-lg-3 col-md-4">
						<div class="input-group">
							<input name="dzEmail" required="required" type="email" class="form-control" placeholder="Your Email Address">
						</div>
					</div>
					<div class="col-lg-3 col-md-4">
						<div class="input-group">
							<button name="submit" value="Submit" type="submit" class="btn white">Subscribe</button>
						</div>
					</div>
				</form>
			</div>
		</div> -->
		<!-- Subscribe End -->
		<!-- Blog Post this Section is Deleted None-->
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="section-head hepankajagrwl text-center">
				<span>Health Education Videos</span>
			</div>
		</div>
	</div>
</div>
<!-------Health-Session-video-Pankaj----->
<!--Health Education Now Carousel End-->
		<div class="section-full bg-white hltheducatn wow fadeIn" data-wow-duration="2s" data-wow-delay="0.9s">
			<div class="container-fluid">
				<div class="top-post-carousel owl-carousel owl-category owl-none">
					<?php $q = "SELECT * FROM `mch_sub_categories` WHERE `parent_category_id` = 1 AND `category_id` = 3 AND `is_active` = 1 ORDER BY `id` DESC";
					$res = mysqli_query($conn, $q);
					if(mysqli_num_rows($res) > 0) {
					while ($row = mysqli_fetch_assoc($res)) {
						if(explode('.', $row['video_url'])[1] == 'youtube') { ?>
					    <div class="item">
							<div class="blog-card blog-grid overlay-post left radius-sm">
								<div class="dlab-post-media pankajvideo">
									<iframe width="560" height="315" src="<?php echo $row['video_url']; ?>" title="YouTube video player" 
									frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
									<?php if(!isset($_SESSION['reg_id']) && empty($_SESSION['reg_id'])) { ?>
									<!----<a href="#" class="registersubscribe" data-toggle="modal" data-target="#phoneotp1">Register For Membership</a>----->
									<a href="#" class="videoreable" data-toggle="modal" data-target="#readvideo"></a>
									<?php } else { ?>
									<?php if((!isset($_SESSION['payment']) && empty($_SESSION['payment'])) && (!isset($_SESSION['is_referral_code']) && empty($_SESSION['is_referral_code']))) { ?>
									<a href="#" class="videoreable" data-toggle="modal" data-target="#payvideo"></a>
									<?php } else { ?>
									<!-- <a href="#" class="registersubscribe" onclick="paynow('ejournal-april-2023');">Pay Now</a> -->
									<!-- <a href="ebook/2023/Thyroid" class="registersubscribe">View Book</a> -->
									<?php } } ?>
								</div>
								<!------
								<div class="blog-card-info">
									<div class="dlab-post-meta">
										<ul>
											<li class="post-tag"><a href="diet-in-hypothyroidism.php">TEXT</a></li>
										</ul>
									</div>
									<h4 class="title"><a href="diet-in-hypothyroidism.php">Diet in hypothyroidism</a></h4>
								</div>------>
							</div>
						</div><!---News-how-to-Prevent-Diabetes----->
					<?php } } } ?>
				</div>
			</div>
			
			<div class="col-md-12">
    			<div class="viewallvideopankj">
    			    <!----<p><a href="pankaj-agarwal-video-page.php">View All</a></p>------->
    			</div>
			</div>
		</div>
		<!-- Health Session End -->
		<!-------End-------->
		<!-- Blog Post this Section is Deleted None-End---->
		<!-- Blog Post End -->
		<!-- Latest Post -->
		<div class="section-full latest-post-bx wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s" >
			<div class="setResizeMargin">
				<div class="section-head text-black no-line">
					<h6 class="title-head text-uppercase"><span>Contributors</span></h6>
				</div>
				<div class="post-carousel owl-carousel owl-carousel00 btn-style-1">
					<?php $q = "SELECT * FROM `mch_contributors` WHERE `is_active` = 1 ORDER BY `id` DESC LIMIT 10";
					$res = mysqli_query($conn, $q);
					if(mysqli_num_rows($res) > 0) {
					while ($row = mysqli_fetch_assoc($res)) { ?>
					<div class="item">
						<div class="blog-card blog-grid post-boxed">
							<div class="dlab-post-media">
								<img src="../uploads/assets/uploaded_data/contributors_img/<?php echo $row['image']; ?>" alt=""/>
							</div>
							<div class="blog-card-info">
								<div class="dlab-post-meta">
									<ul>
										<li class="post-category"><!-- <a href="javascript:void(0);">beauty</a>, --> <a href="contributor-details.php?id=<?php echo base64_encode($row['id']); ?>">Contributor</a></li>
										<!-- <li class="post-date">at <span>12 August 2020</span></li> -->
									</ul>
								</div>
								<!-- <h4 class="title"><a href="post-slide-show.php">Dr. Pankaj Kumar Agarwal</a></h4> -->
								<h4><a href="contributor-details.php?id=<?php echo base64_encode($row['id']); ?>"><?php echo $row['name']; ?></a></h4>
								<div class="dlab-feed-meta leftalign1">
									<ul>
										<!-- <li class="post-like"><a href="javascript:void(0);"><i class="fa fa-thumbs-o-up"></i><span>231</span></a></li>
										<li class="post-dislike"><a href="javascript:void(0);"><i class="fa fa-thumbs-o-down"></i><span>584</span></a></li>
										 -->
										<!-- <li class="post-view"><a href="javascript:void(0);"><i class="fa fa-eye"></i><span>397</span></a></li> -->
										<li class="post-share"><i class="fa fa-share-alt"></i><span>Share</span>
											<ul>
												<li><a href="https://www.facebook.com/profile.php?id=100063935207754"><i class="fa fa-facebook"></i></a></li>
												<li><a href="https://twitter.com/mch_drpankaj?lang=en"><i class="fa fa-twitter"></i></a></li>
												<!-- <li><a href="javascript:;"><i class="fa fa-linkedin"></i></a></li> -->
												<!-- <li><a href="javascript:;"><i class="fa fa-twitter"></i></a></li> -->
											</ul>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div><!---1End--->
				<?php } } ?>
				</div>
			</div>
		</div>
		<!-- Latest Post End -->
		<!-- Most Popular -->
		<!-- <div class="section-full bg-white content-inner">
			<div class="container">
				<div class="section-head text-center">
					<h6 class="title-head text-uppercase"><span>Most popular</span></h6>
				</div>
				<div class="row sp40">
					<div class="col-lg-6 widget-post-bx wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
						<div class="blog-card blog-md clearfix wow fadeInUp">
							<div class="dlab-post-media">
								<img src="images/blog/popular-blog/pic1.jpg" alt="">
								<h2 class="post-count">1</h2>
							</div>
							<div class="dlab-post-info">
								<div class="dlab-post-meta">
									<ul>
										<li class="post-category"><a href="embryology-of-adrenal-glands.php">Adrenal glands</a>, <a href="javascript:void(0);">beauty</a></li>
										<li class="post-date">at <span> 13th Oct,2022</span></li>
									</ul>
								</div>
								<h4 class="title"><a href="embryology-of-adrenal-glands.php">Embryology of adrenal glands</a></h4>
								<div class="dlab-feed-meta">
									<ul>										
										<li class="post-share"><i class="fa fa-share-alt"></i><span>Share</span>
											<ul>
												<li><a href="https://www.facebook.com/profile.php?id=100063935207754"><i class="fa fa-facebook"></i></a></li>
												<li><a href="https://twitter.com/mch_drpankaj?lang=en"><i class="fa fa-twitter"></i></a></li>												
											</ul>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="blog-card blog-md clearfix wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.2s">
							<div class="dlab-post-media">
								<img src="images/blog/popular-blog/pic2.jpg" alt="">
								<h2 class="post-count">3</h2>
							</div>
							<div class="dlab-post-info">
								<div class="dlab-post-meta">
									<ul>
										<li class="post-category"> <a href="evaluation-case-hypocortisolism.php">Evaluation, Anotomy, hypocortisolism</a></li>
										<li class="post-date">at <span> 13th Oct,2022</span></li>
									</ul>
								</div>
								<h4 class="title"><a href="evaluation-case-hypocortisolism.php">Evaluation of a case of hypocortisolism</a></h4>
								<div class="dlab-feed-meta">
									<ul>										
										<li class="post-share"><i class="fa fa-share-alt"></i><span>Share</span>
											<ul>
												<li><a href="https://www.facebook.com/profile.php?id=100063935207754"><i class="fa fa-facebook"></i></a></li>
												<li><a href="https://twitter.com/mch_drpankaj?lang=en"><i class="fa fa-twitter"></i></a></li>												
											</ul>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="blog-card blog-md clearfix wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.9s">
							<div class="dlab-post-media">
								<img src="images/blog/popular-blog/pic3.jpg" alt="">
								<h2 class="post-count">5</h2>
							</div>
							<div class="dlab-post-info">
								<div class="dlab-post-meta">
									<ul>
										<li class="post-category"><a href="icterus.php">Icterus, Eyes</a></li>
										<li class="post-date">at <span>12 August 2019</span></li>
									</ul>
								</div>
								<h4 class="title"><a href="icterus.php">Icterus</a></h4>
								<div class="dlab-feed-meta">
									<ul>										
										<li class="post-share"><i class="fa fa-share-alt"></i><span>Share</span>
											<ul>
												<li><a href="https://www.facebook.com/profile.php?id=100063935207754"><i class="fa fa-facebook"></i></a></li>
												<li><a href="https://twitter.com/mch_drpankaj?lang=en"><i class="fa fa-twitter"></i></a></li>												
											</ul>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 widget-post-bx wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.8s">
						<div class="blog-card blog-md clearfix wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.3s">
							<div class="dlab-post-media">
								<img src="images/blog/popular-blog/pic4.jpg" alt="">
								<h2 class="post-count">2</h2>
							</div>
							<div class="dlab-post-info">
								<div class="dlab-post-meta">
									<ul>
										<li class="post-category"><a href="acute-kidney-injury.php">Acute kidney injusy</a></li>
										<li class="post-date">at <span> 20th Mar,2020</span></li>
									</ul>
								</div>
								<h4 class="title"><a href="acute-kidney-injury.php">Acute kidney injury</a></h4>
								<div class="dlab-feed-meta">
									<ul>										
										<li class="post-share"><i class="fa fa-share-alt"></i><span>Share</span>
											<ul>
												<li><a href="https://www.facebook.com/profile.php?id=100063935207754"><i class="fa fa-facebook"></i></a></li>
												<li><a href="https://twitter.com/mch_drpankaj?lang=en"><i class="fa fa-twitter"></i></a></li>												
											</ul>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="blog-card blog-md clearfix wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.6s">
							<div class="dlab-post-media">
								<img src="images/blog/popular-blog/pic5.jpg" alt="">
								<h2 class="post-count">4</h2>
							</div>
							<div class="dlab-post-info">
								<div class="dlab-post-meta">
									<ul>
										<li class="post-category"><a href="lung-exercise.php">Pneumonia, </a></li>
										<li class="post-date">at <span> 17th Oct,2021</span></li>
									</ul>
								</div>
								<h4 class="title"><a href="lung-exercise.php">Lung Exercises For Covid Patients</a></h4>
								<div class="dlab-feed-meta">
									<ul>										
										<li class="post-share"><i class="fa fa-share-alt"></i><span>Share</span>
											<ul>
												<li><a href="https://www.facebook.com/profile.php?id=100063935207754"><i class="fa fa-facebook"></i></a></li>
												<li><a href="https://twitter.com/mch_drpankaj?lang=en"><i class="fa fa-twitter"></i></a></li>												
											</ul>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="blog-card blog-md clearfix wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.9s">
							<div class="dlab-post-media">
								<img src="images/blog/popular-blog/pic6.jpg" alt="">
								<h2 class="post-count">6</h2>
							</div>
							<div class="dlab-post-info">
								<div class="dlab-post-meta">
									<ul>
										<li class="post-category"><a href="disorder-of-thyroid.php">Thyroid</a></li>
										<li class="post-date">at <span> 6th Feb,2021</span></li>
									</ul>
								</div>
								<h4 class="title"><a href="disorder-of-thyroid.php">Disorders Of Thyroid Gland: Early Recognition And Management</a></h4>
								<div class="dlab-feed-meta">
									<ul>										
										<li class="post-share"><i class="fa fa-share-alt"></i><span>Share</span>
											<ul>
												<li><a href="https://www.facebook.com/profile.php?id=100063935207754"><i class="fa fa-facebook"></i></a></li>
												<li><a href="https://twitter.com/mch_drpankaj?lang=en"><i class="fa fa-twitter"></i></a></li>												
											</ul>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> -->



<div class="widtsidebar">
	<div class="container">
		<div class="row mt-5">	
			<div class="col-lg-6 col-md-6 col-sm-12">
				<div class="widget widget-author sidebarabt wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
					<h6 class="widget-title">About Us</h6>
					<div class="author-profile-info">
						<!-- <div class="author-profile-pic">	
							<a href="javascript:void(0);">
								<img src="images/author.jpg" alt="Profile Pic" width="130" height="130">
							</a>
						</div> -->
						<div class="author-profile-content">
							<h6 class="title">विनम्र निवेदन</h6>
							<p>MCH PRAKASHAN का उद्दश्य पाठकों को स्वास्थ्य एवं चिकित्सा संबंधी जानकारियों को हिंदी में अवगत कराना है।..</p>
							<a href="about-me.php" class="readme">Read More</a>
							<ul class="social-icon m-b0 text-center">
								<!-- <li><a href="#" class="btn radius-xl"><i class="fa fa-instagram"></i></a></li> -->
								<li><a href="https://www.facebook.com/profile.php?id=100063935207754" class="btn radius-xl"><i class="fa fa-facebook"></i></a></li>
								<li><a href="https://twitter.com/mch_drpankaj?lang=en" class="btn radius-xl"><i class="fa fa-twitter"></i></a></li>
								<!-- <li><a href="javascript:void(0);" class="btn radius-xl"><i class="fa fa-pinterest-p"></i></a></li>
								<li><a href="javascript:void(0);" class="btn radius-xl"><i class="fa fa-youtube-play"></i></a></li> -->
							</ul>
						</div>
					</div>
				</div><!-----About-Me--->
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12">
				<div class="widget widget-author sidebarabt wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
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
<?php 
include 'footer.php'
?>