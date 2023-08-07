<?php include 'handler/conn.php'; //print_r($_SESSION);?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">	
<!-- FAVICONS ICON -->
<link rel="icon" href="images/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
<!-- PAGE TITLE HERE -->
<title>MCH PRAKASHAN - Medical Concepts in Hindi By Dr Pankaj Agarwal</title>

<!-- MOBILE SPECIFIC -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!--[if lt IE 9]>
<script src="js/html5shiv.min.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
<script src="js/lightbox-plus-jquery.min.js"></script>
<!-- STYLESHEETS -->
<link rel="stylesheet" type="text/css" href="css/lightbox.min.css">
<link rel="stylesheet" type="text/css" href="css/plugins.css">
<link href="https://fonts.googleapis.com/css2?family=Hind:wght@500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/templete.css">
<link class="skin" rel="stylesheet" type="text/css" href="css/skin/skin-1.css">
<style>
@media(max-width: 575.98px) {
.header-author { height: 175px;	}
}
</style>
</head>
<body id="bg">
<div class="page-wraper">
<!-- <div id="loading-area"></div> -->
<div class="col-md-12">
<?php
 include "popupform.php";
?>
</div>
<div class="header-author desktopview">
	<div class="author-bx">
		<div class="author-media">
			<img src="images/author.jpg" alt=""/>
		</div>
		<div class="author-info">
			<!---
			<h2 class="title"></h2>
			<p></p>----->
			<ul class="author-social">
				<li><a href="https://www.facebook.com/profile.php?id=100063935207754" class=""><i class="fa fa-facebook"></i> <span>facebook</span></a></li>
				<li><a href="https://twitter.com/mch_drpankaj?lang=en" class=""><i class="fa fa-twitter"></i> <span>twitter</span></a></li>
				<!-- <li><a href="javascript:void(0);" class=""><i class="fa fa-instagram"></i> <span>instagram</span></a></li>
				<li><a href="javascript:void(0);" class=""><i class="fa fa-linkedin"></i> <span>linkedin</span></a></li> -->
			</ul>
		</div>
	</div>
</div>

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
<!-- header -->
<header class="site-header mo-left header-full header">
	<!-- main header -->
	<div class="sticky-header main-bar-wraper navbar-expand-lg">
		<div class="main-bar clearfix ">
			<div class="container maxwidth1">
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
							<li class="search-btn">
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
						<li>
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
											<!-- <li><a href="javascript:void(0);" id="st-all" class="post-tabs active">All</a></li> -->
											<!-- <li><a href="text-health-education.php" id="st-beauty" class="post-tabs active">Text</a></li>
											<li><a href="video-health-education.php" id="st-video" class="post-tabs">Video</a></li>
											<li><a href="casestudy-health-education.php" id="st-test" class="post-tabs">Case Study</a></li> -->
											<!----<li><a href="student-health-education.php" id="st-travel" class="post-tabs">Student And Resident Forum</a></li>---->
											<!------<li><a href="#" id="st-travel2" class="post-tabs">Online Event Diary</a></li>---->
											<!----<li><a href="ejournals.php" id="st-travel3" class="post-tabs">E Journal</a></li>---->
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
											<!-- <li><a href="javascript:void(0);" id="st-all" class="post-tabs active">All</a></li> -->
											<!-- <li><a href="text-medical-education.php" id="st-beauty01" class="post-tabs active">Text</a></li>
											<li><a href="video-medical-education.php" id="st-video02" class="post-tabs">Video</a></li>
											<li><a href="casestudy-medical-education.php" id="st-test03" class="post-tabs">Case Study</a></li>
											<li><a href="student-medical-education.php" id="st-travel04" class="post-tabs">Student And Resident Forum</a></li> -->
											<!----<li><a href="#" id="st-travel05" class="post-tabs">Online Event Diary</a></li>----->
											<!-- <li><a href="ejournals.php" id="st-travel06" class="post-tabs">E Journal</a></li> -->
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
																<a href="sub-category-details.php?id=<?php echo base64_encode($row2['id']); ?>">
																	<img src="../uploads/assets/uploaded_data/subcategory_img/<?php echo $row2['thumbnail_image']; ?>" alt="">
																</a>
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
<!-- header END --> 