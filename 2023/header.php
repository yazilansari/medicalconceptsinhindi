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
											<!-- <li><a href="javascript:void(0);" id="st-all" class="post-tabs active">All</a></li> -->
											<li><a href="text-health-education.php" id="st-beauty" class="post-tabs active">Text</a></li>
											<li><a href="video-health-education.php" id="st-video" class="post-tabs">Video</a></li>
											<li><a href="casestudy-health-education.php" id="st-test" class="post-tabs">Case Study</a></li>
											<!----<li><a href="student-health-education.php" id="st-travel" class="post-tabs">Student And Resident Forum</a></li>---->
											<!------<li><a href="#" id="st-travel2" class="post-tabs">Online Event Diary</a></li>---->
											<!----<li><a href="ejournals.php" id="st-travel3" class="post-tabs">E Journal</a></li>---->
										</ul>
									</div>
									<div class="life-style-post text-center">
										<div id="all" class="life-style-post-bx show">
											<div class="header-blog-carousel owl-carousel owl-btn-center-lr">
												<div class="item">
													<!-- <div class="blog-post blog-sm">
														<div class="dlab-post-media">
															<a href="post-standart.php"><img src="images/category/pic1.jpg" alt=""></a>
														</div>
														<div class="dlab-post-info">
															<div class="dlab-post-title ">
																<h5 class="post-title"><a href="post-standart.php">Ready or Not, the Return into of the Hobo Bag Is Nigh</a></h5>
															</div>
														</div>
													</div> -->
												</div>
												<div class="item">
													<!-- <div class="blog-post blog-sm">
														<div class="dlab-post-media">
															<a href="post-left-sidebar.php"><img src="images/category/pic2.jpg" alt=""></a>
														</div>
														<div class="dlab-post-info">
															<div class="dlab-post-title ">
																<h5 class="post-title"><a href="post-left-sidebar.php">This Week on Instagram, Celebri ties Went All-In on Prints</a></h5>
															</div>
														</div>
													</div> -->
												</div>
												<div class="item">
													<!-- <div class="blog-post blog-sm">
														<div class="dlab-post-media">
															<a href="post-full-width.php"><img src="images/category/pic3.jpg" alt=""></a>
														</div>
														<div class="dlab-post-info">
															<div class="dlab-post-title">
																<h5 class="post-title"><a href="post-header-image.php">Anniversary With An Exhibition At Dallas Contemporary</a></h5>
															</div>
														</div>
													</div> -->
												</div>
												<div class="item">
													<!-- <div class="blog-post blog-sm">
														<div class="dlab-post-media">
															<a href="post-slide-show.php"><img src="images/category/pic4.jpg" alt=""></a>
														</div>
														<div class="dlab-post-info">
															<div class="dlab-post-title ">
																<h5 class="post-title"><a href="post-slide-show.php">La Dolce Vita Meets Old School on Beach Style </a></h5>
															</div>
														</div>
													</div> -->
												</div>
											</div>
										</div>
										<div id="beauty" class="life-style-post-bx show">
											<div class="header-blog-carousel owl-carousel owl-carousel1 owl-btn-center-lr">
												<div class="item">
													<div class="blog-post blog-sm">
														<div class="dlab-post-media">
															<a href="diet-in-hypothyroidism.php"><img src="images/category/diet.jpg" alt=""></a>
														</div>
														<div class="dlab-post-info">
															<div class="dlab-post-title ">
																<h5 class="post-title"><a href="diet-in-hypothyroidism.php">Diet in hypothyroidism</a></h5>
															</div>
														</div>
													</div>
												</div>
												<div class="item">
													<div class="blog-post blog-sm">
														<div class="dlab-post-media">
															<a href="idli.php"><img src="images/category/idli.jpg" alt=""></a>
														</div>
														<div class="dlab-post-info">
															<div class="dlab-post-title ">
																<h5 class="post-title"><a href="idli.php">इडली</a></h5>
															</div>
														</div>
													</div>
												</div>
												<div class="item">
													<div class="blog-post blog-sm">
														<div class="dlab-post-media">
															<a href="veg.php"><img src="images/category/veg.jpg" alt=""></a>
														</div>
														<div class="dlab-post-info">
															<div class="dlab-post-title">
																<h5 class="post-title"><a href="veg.php">विनम्र निवेदन</a></h5>
															</div>
														</div>
													</div>
												</div>
												<!-- <div class="item">
													<div class="blog-post blog-sm">
														<div class="dlab-post-media">
															<a href="post-slide-show.php"><img src="images/category/pic4.jpg" alt=""></a>
														</div>
														<div class="dlab-post-info">
															<div class="dlab-post-title ">
																<h5 class="post-title"><a href="post-slide-show.php">La Dolce Vita Meets Old School on Beach Style </a></h5>
															</div>
														</div>
													</div>
												</div> -->
											</div>
											<div class="viewallpage"><a href="text-health-education.php">View All</a></div>
										</div>
										<div id="video" class="life-style-post-bx">
											<div class="header-blog-carousel owl-carousel owl-carousel1 owl-btn-center-lr">
												<div class="item">
													<div class="blog-post blog-sm">
														<div class="dlab-post-media">
															<a href="lung-exercises.php"><img src="images/category/lung-exercise-covid-patient.jpg" alt=""></a>
														</div>
														<div class="dlab-post-info">
															<div class="dlab-post-title ">
																<h5 class="post-title"><a href="lung-exercises.php">Lung exercises for covid patients</a></h5>
															</div>
														</div>
													</div>
												</div>
												<div class="item">
													<div class="blog-post blog-sm">
														<div class="dlab-post-media">
															<a href="disorder-of-thyroid.php"><img src="images/category/disorder-thyroid.jpg" alt=""></a>
														</div>
														<div class="dlab-post-info">
															<div class="dlab-post-title ">
																<h5 class="post-title"><a href="disorder-of-thyroid.php">Disorders of thyroid gland: Early recognition and management</a></h5>
															</div>
														</div>
													</div>
												</div>
												<div class="item">
													<div class="blog-post blog-sm">
														<div class="dlab-post-media">
															<a href="symptoms-prevention.php"><img src="images/category/diabetes.jpg" alt=""></a>
														</div>
														<div class="dlab-post-info">
															<div class="dlab-post-title">
																<h5 class="post-title"><a href="symptoms-prevention.php">Diabetes mellitus: Symptoms, prevention of complications and management</a></h5>
															</div>
														</div>
													</div>
												</div>
												<div class="item">
														<div class="blog-post blog-sm">
															<div class="dlab-post-media">
																<a href="part1today.php"><img src="images/category/part1today.jpg" alt=""></a>
															</div>
															<div class="dlab-post-info">
																<div class="dlab-post-title ">
																	<h5 class="post-title"><a href="part1today.php">PART 1 TODAY </a></h5>
																</div>
															</div>
														</div>
													</div>
												<div class="item">
													<div class="blog-post blog-sm">
														<div class="dlab-post-media">
															<a href="sunil-bansal.php"><img src="images/category/sunil-bansal.jpg" alt=""></a>
														</div>
														<div class="dlab-post-info">
															<div class="dlab-post-title ">
																<h5 class="post-title"><a href="sunil-bansal.php">Tips for Diabetics</a></h5>
															</div>
														</div>
													</div>
												</div>

												<!-- <div class="item">
													<div class="blog-post blog-sm">
														<div class="dlab-post-media">
															<a href="post-slide-show.php"><img src="images/category/pic4.jpg" alt=""></a>
														</div>
														<div class="dlab-post-info">
															<div class="dlab-post-title ">
																<h5 class="post-title"><a href="post-slide-show.php">La Dolce Vita Meets Old School on Beach Style </a></h5>
															</div>
														</div>
													</div>
												</div> -->
											</div>
											<div class="viewallpage"><a href="video-health-education.php">View All</a></div>
											<!----view-all---->
										</div>
										<div id="test" class="life-style-post-bx">
											<div class="header-blog-carousel owl-carousel owl-carousel1 owl-btn-center-lr">
												<!-- <div class="item">
													<div class="blog-post blog-sm">
														<div class="dlab-post-media">
															<a href="#">
																<img src="images/category/pic1.jpg" alt="">
															</a>
														</div>
														<div class="dlab-post-info">
															<div class="dlab-post-title ">
																<h5 class="post-title"><a href="#">Test article</a></h5>
															</div>
														</div>
													</div>
												</div> -->
												<div class="item">
													<div class="blog-post blog-sm">
														<div class="dlab-post-media">
															<a href="rakesh20.php"><img src="images/category/rakesh-20.jpg" alt=""></a>
														</div>
														<div class="dlab-post-info">
															<div class="dlab-post-title ">
																<h5 class="post-title"><a href="rakesh20.php">माईग्रेन</a></h5>
															</div>
														</div>
													</div>
												</div>
												<div class="item">
													<div class="blog-post blog-sm">
														<div class="dlab-post-media">
															<a href="rakesh19.php"><img src="images/category/rakesh-19.jpg" alt=""></a>
														</div>
														<div class="dlab-post-info">
															<div class="dlab-post-title">
																<h5 class="post-title"><a href="rakesh19.php">मिर्गी</a></h5>
															</div>
														</div>
													</div>
												</div>
												<div class="item">
													<div class="blog-post blog-sm blank1">
														<div class="dlab-post-media">
															<a href="#"><img src="images/category/pic4.jpg" alt=""></a>
														</div>
														<div class="dlab-post-info">
															<div class="dlab-post-title ">
																<h5 class="post-title"><a href="#">Test </a></h5>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="viewallpage"><a href="casestudy-health-education.php">View All</a></div>
										</div>
										<div id="travel" class="life-style-post-bx">
											<div class="header-blog-carousel owl-carousel owl-carousel1 owl-btn-center-lr">
												<div class="item">
													<div class="blog-post blog-sm">
														<div class="dlab-post-media">
															<a href="acute-kidney-injury.php"><img src="images/category/student-and-resident-forum.jpg" alt=""></a>
														</div>
														<div class="dlab-post-info">
															<div class="dlab-post-title ">
																<h5 class="post-title"><a href="acute-kidney-injury.php">Acute kidney injury</a></h5>
															</div>
														</div>
													</div>
												</div>
												<div class="item">
													<div class="blog-post blog-sm">
														<div class="dlab-post-media">
															<a href="amyloidosis-classification-diagnosis.php"><img src="images/category/nervous-system.jpg" alt=""></a>
														</div>
														<div class="dlab-post-info">
															<div class="dlab-post-title ">
																<h5 class="post-title"><a href="amyloidosis-classification-diagnosis.php">Amyloidosis - Classification and diagnosis</a></h5>
															</div>
														</div>
													</div>
												</div>
												<div class="item">
													<div class="blog-post blog-sm">
														<div class="dlab-post-media">
															<a href="#"><img src="images/category/amyloidosis.jpg" alt=""></a>
														</div>
														<div class="dlab-post-info">
															<div class="dlab-post-title">
																<h5 class="post-title"><a href="amyloidosis.php">Amyloidosis</a></h5>
															</div>
														</div>
													</div>
												</div>
												<!-- <div class="item">
													<div class="blog-post blog-sm">
														<div class="dlab-post-media">
															<a href="post-slide-show.php"><img src="images/category/pic4.jpg" alt=""></a>
														</div>
														<div class="dlab-post-info">
															<div class="dlab-post-title ">
																<h5 class="post-title"><a href="post-slide-show.php">La Dolce Vita Meets Old School on Beach Style </a></h5>
															</div>
														</div>
													</div>
												</div> -->
											</div>
											<div class="viewallpage"><a href="student-health-education.php">View All</a></div>
										</div>
										<!-----Travel-End----->
										<!-----Travel2-Start----->
										<!-- <div id="travel2" class="life-style-post-bx">
											<div class="header-blog-carousel owl-carousel owl-carousel1 owl-btn-center-lr">
												<div class="item">
													<div class="blog-post blog-sm">
														<div class="dlab-post-media">
															<a href="punarnava-e-journal-volume3.php"><img src="images/category/pic1.jpg" alt=""></a>
														</div>
														<div class="dlab-post-info">
															<div class="dlab-post-title ">
																<h5 class="post-title"><a href="punarnava-e-journal-volume3.php">
																Punarnava E-Journal (Volume 3)</a></h5>
															</div>
														</div>
													</div>
												</div>
												<div class="item">
													<div class="blog-post blog-sm">
														<div class="dlab-post-media">
															<a href="punarnava-e-journal-volume2.php"><img src="images/category/pic1.jpg" alt=""></a>
														</div>
														<div class="dlab-post-info">
															<div class="dlab-post-title ">
																<h5 class="post-title"><a href="punarnava-e-journal-volume2.php">
																Punarnava e-journal (Volume 2)</a></h5>
															</div>
														</div>
													</div>
												</div>
												<div class="item">
													<div class="blog-post blog-sm">
														<div class="dlab-post-media">
															<a href="punarnava-e-journal-volume1.php"><img src="images/category/pic3.jpg" alt=""></a>
														</div>
														<div class="dlab-post-info">
															<div class="dlab-post-title">
																<h5 class="post-title"><a href="punarnava-e-journal-volume1.php">Punarnava - The e-journal (Volume 1)</a></h5>
															</div>
														</div>
													</div>
												</div>												
											</div>
											<div class="viewallpage"><a href="onlinevent-health-education.php">View All</a></div>
										</div> -->
										<!---Travel2-Start------>


										<!-----E-Journal-Start----->
										<div id="travel3" class="life-style-post-bx">
											<div class="header-blog-carousel owl-carousel menuebook owl-btn-center-lr">												        <div class="item">
														<div class="blog-post blog-sm">
															<div class="dlab-post-media books">
																<a href="ejournals-april-2023.php">
																	<img src="images/maybook-cover.jpg" alt="">
																</a>
																<p class="text-black font-weight-400">May 2023</p>
															</div>
															<a href="ejournals-may-2023.php" class="phonemodal-menu"></a>
															<!-- <div class="dlab-post-info">
																<div class="dlab-post-title ">
																	<h5 class="post-title"><a href="punarnava-e-journal-volume3.php">
																	Buy</a></h5>
																</div>
															</div> -->
														</div>
													</div>
													<div class="item">
														<div class="blog-post blog-sm">
															<div class="dlab-post-media books">
																<a href="ejournals-april-2023.php">
																	<img src="images/aprilbook-cover.jpg" alt="">
																</a>
																<p class="text-black font-weight-400">April 2023</p>
															</div>
															<a href="ejournals-april-2023.php" class="phonemodal-menu"></a>
															<!-- <div class="dlab-post-info">
																<div class="dlab-post-title ">
																	<h5 class="post-title"><a href="punarnava-e-journal-volume3.php">
																	Buy</a></h5>
																</div>
															</div> -->
														</div>
													</div>
													<div class="item">
														<div class="blog-post blog-sm">
															<div class="dlab-post-media books">
																<a href="ejournals-march-2023.php">
																	<img src="images/book-cover3.jpg" alt="">
																</a>
																<p class="text-black font-weight-400">Mar 2023</p>
															</div>
															<a href="ejournals-march-2023.php" class="phonemodal-menu"></a>
															<!-- <div class="dlab-post-info">
																<div class="dlab-post-title ">
																	<h5 class="post-title"><a href="punarnava-e-journal-volume3.php">
																	Buy</a></h5>
																</div>
															</div> -->
														</div>
													</div>
													<div class="item">
														<div class="blog-post blog-sm">
															<div class="dlab-post-media books">
																<a href="ejournals-feb-2023.php">
																	<img src="images/book-cover.jpg" alt="">
																</a>
																<p class="text-black font-weight-400">Feb 2023</p>
															</div>
															<a href="ejournals-feb-2023.php" class="phonemodal-menu"></a>
															<!-- <div class="dlab-post-info">
																<div class="dlab-post-title ">
																	<h5 class="post-title"><a href="punarnava-e-journal-volume3.php">
																	Buy</a></h5>
																</div>
															</div> -->
														</div>
													</div>
													<div class="item">
														<div class="blog-post blog-sm">
															<div class="dlab-post-media books">
																<a href="ejournals-jan-2023.php">
																	<img src="images/book-cover2.jpg" alt="">
																</a>
																<p class="text-black font-weight-400">Jan 2023</p>
															</div>
															<a href="ejournals-jan-2023.php" class="phonemodal-menu"></a>
															<!-- <div class="dlab-post-info">
																<div class="dlab-post-title ">
																	<h5 class="post-title"><a href="punarnava-e-journal-volume3.php">
																	Buy</a></h5>
																</div>
															</div> -->
														</div>
													</div>	

													
													<div class="item">
														<div class="blog-post blog-sm">
															<div class="dlab-post-media books">
																<a href="ejournals-dec-2022.php">
																	<img src="images/book-cover08.jpg" alt="">
																</a>
																<p class="text-black font-weight-400">Dec 2022</p>
															</div>
															<a href="ejournals-dec-2022.php" class="phonemodal-menu"></a>
															<!-- <div class="dlab-post-info">
																<div class="dlab-post-title ">
																	<h5 class="post-title"><a href="punarnava-e-journal-volume3.php">
																	Buy</a></h5>
																</div>
															</div> -->
														</div>
													</div>													
													<div class="item">
														<div class="blog-post blog-sm">
															<div class="dlab-post-media books">
																<a href="#">
																	<img src="images/book-cover07.jpg" alt="">
																</a>
																<p class="text-black font-weight-400">Nov 2022</p>
															</div>
															<a href="ejournals-nov-2022.php" class="phonemodal-menu"></a>
															<!-- <div class="dlab-post-info">
																<div class="dlab-post-title ">
																	<h5 class="post-title"><a href="punarnava-e-journal-volume3.php">
																	Buy</a></h5>
																</div>
															</div> -->
														</div>
													</div>
													<div class="item">
														<div class="blog-post blog-sm">
															<div class="dlab-post-media books">
																<a href="ejournals-oct-2022.php">
																	<img src="images/book-cover06.jpg" alt="">
																</a>
																<p class="text-black font-weight-400">Oct 2022</p>
															</div>
															<a href="ejournals-oct-2022.php" class="phonemodal-menu"></a>
															<!-- <div class="dlab-post-info">
																<div class="dlab-post-title ">
																	<h5 class="post-title"><a href="punarnava-e-journal-volume3.php">
																	Buy</a></h5>
																</div>
															</div> -->
														</div>
													</div>	
													<div class="item">
														<div class="blog-post blog-sm">
															<div class="dlab-post-media books">
																<a href="ejournals-sep-2022.php">
																	<img src="images/book-cover05.jpg" alt="">
																</a>
																<p class="text-black font-weight-400">Sep 2022</p>
															</div>
															<a href="ejournals-sep-2022.php" class="phonemodal-menu"></a>
															<!-- <div class="dlab-post-info">
																<div class="dlab-post-title ">
																	<h5 class="post-title"><a href="punarnava-e-journal-volume3.php">
																	Buy</a></h5>
																</div>
															</div> -->
														</div>
													</div>	
													<div class="item">
														<div class="blog-post blog-sm">
															<div class="dlab-post-media books">
																<a href="ejournals-aug-2022.php">
																	<img src="images/book-cover04.jpg" alt="">
																</a>
																<p class="text-black font-weight-400">Aug 2022</p>
															</div>
															<a href="ejournals-aug-2022.php" class="phonemodal-menu"></a>
															<!-- <div class="dlab-post-info">
																<div class="dlab-post-title ">
																	<h5 class="post-title">
																		<a href="punarnava-e-journal-volume3.php">
																	Buy</a></h5>
																</div>
															</div> -->
														</div>
													</div>


												<!-- <div class="item">
													<div class="blog-post blog-sm">
														<div class="dlab-post-media">
															<a href="#"><img src="images/category/diet-in-hypothyroidism.jpg.jpg" alt=""></a>
														</div>
														<div class="dlab-post-info">
															<div class="dlab-post-title ">
																<h5 class="post-title"><a href="#">La Dolce Vita Meets Old School on Beach Style </a></h5>
															</div>
														</div>
													</div>
												</div> -->
											</div>
											<div class="viewallpage"><a href="ejournals.php">View All</a></div>
										</div><!---E-Journal-End--->

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
											<!-- <li><a href="javascript:void(0);" id="st-all" class="post-tabs active">All</a></li> -->
											<li><a href="text-medical-education.php" id="st-beauty01" class="post-tabs active">Text</a></li>
											<li><a href="video-medical-education.php" id="st-video02" class="post-tabs">Video</a></li>
											<li><a href="casestudy-medical-education.php" id="st-test03" class="post-tabs">Case Study</a></li>
											<li><a href="student-medical-education.php" id="st-travel04" class="post-tabs">Student And Resident Forum</a></li>
											<!----<li><a href="#" id="st-travel05" class="post-tabs">Online Event Diary</a></li>----->
											<li><a href="ejournals.php" id="st-travel06" class="post-tabs">E Journal</a></li>
										</ul>
									</div>
									<div class="life-style-post text-center">
										<!-- <div id="all" class="life-style-post-bx show">
											<div class="header-blog-carousel owl-carousel owl-btn-center-lr">
												<div class="item">
													<div class="blog-post blog-sm">
														<div class="dlab-post-media">
															<a href="post-standart.php"><img src="images/category/pic1.jpg" alt=""></a>
														</div>
														<div class="dlab-post-info">
															<div class="dlab-post-title ">
																<h5 class="post-title"><a href="post-standart.php">Ready or Not, the Return into of the Hobo Bag Is Nigh</a></h5>
															</div>
														</div>
													</div>
												</div>
												<div class="item">
													<div class="blog-post blog-sm">
														<div class="dlab-post-media">
															<a href="post-left-sidebar.php"><img src="images/category/pic2.jpg" alt=""></a>
														</div>
														<div class="dlab-post-info">
															<div class="dlab-post-title ">
																<h5 class="post-title"><a href="post-left-sidebar.php">This Week on Instagram, Celebri ties Went All-In on Prints</a></h5>
															</div>
														</div>
													</div>
												</div>
												<div class="item">
													<div class="blog-post blog-sm">
														<div class="dlab-post-media">
															<a href="post-full-width.php"><img src="images/category/pic3.jpg" alt=""></a>
														</div>
														<div class="dlab-post-info">
															<div class="dlab-post-title">
																<h5 class="post-title"><a href="post-header-image.php">Anniversary With An Exhibition At Dallas Contemporary</a></h5>
															</div>
														</div>
													</div>
												</div>
												<div class="item">
													<div class="blog-post blog-sm">
														<div class="dlab-post-media">
															<a href="post-slide-show.php"><img src="images/category/pic4.jpg" alt=""></a>
														</div>
														<div class="dlab-post-info">
															<div class="dlab-post-title ">
																<h5 class="post-title"><a href="post-slide-show.php">La Dolce Vita Meets Old School on Beach Style </a></h5>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div> -->
										<div id="beauty01" class="life-style-post-bx show">
											<div class="header-blog-carousel owl-carousel owl-carousel1 owl-btn-center-lr">
												<div class="item">
													<div class="blog-post blog-sm">
														<div class="dlab-post-media">
															<a href="procedure-and-interpretation.php">
																<img src="images/category/spirometory1.jpg" alt="">
															</a>
														</div>
														<div class="dlab-post-info">
															<div class="dlab-post-title ">
																<h5 class="post-title"><a href="procedure-and-interpretation1.php">Procedure and interpretation of spirometry</a></h5>
															</div>
														</div>
													</div>
												</div>
												<div class="item">
													<div class="blog-post blog-sm">
														<div class="dlab-post-media">
															<a href="procedure-and-interpretation2.php"><img src="images/category/spirometory-procedure.jpg" alt=""></a>
														</div>
														<div class="dlab-post-info">
															<div class="dlab-post-title ">
																<h5 class="post-title"><a href="procedure-and-interpretation2.php">Spirometry - Procedure and interpretation</a></h5>
															</div>
														</div>
													</div>
												</div>
												<div class="item">
													<div class="blog-post blog-sm">
														<div class="dlab-post-media">
															<a href="spirometry.php"><img src="images/category/spirometory.jpg" alt=""></a>
														</div>
														<div class="dlab-post-info">
															<div class="dlab-post-title">
																<h5 class="post-title"><a href="spirometry.php">Spirometry</a></h5>
															</div>
														</div>
													</div>
												</div>
												<!-- <div class="item">
													<div class="blog-post blog-sm">
														<div class="dlab-post-media">
															<a href="post-slide-show.php"><img src="images/category/pic4.jpg" alt=""></a>
														</div>
														<div class="dlab-post-info">
															<div class="dlab-post-title ">
																<h5 class="post-title"><a href="post-slide-show.php">La Dolce Vita Meets Old School on Beach Style </a></h5>
															</div>
														</div>
													</div>
												</div> -->
											</div>
											<div class="viewallpage"><a href="text-medical-education.php">View All</a></div>
										</div>
										<div id="video02" class="life-style-post-bx">
											<div class="header-blog-carousel owl-carousel owl-carousel1 owl-btn-center-lr">
												<div class="item">
													<div class="blog-post blog-sm">
														<div class="dlab-post-media">
															<a href="embryology-of-adrenal-glands.php"><img src="images/category/embryology-of-adrenal-gland.jpg" alt=""></a>
														</div>
														<div class="dlab-post-info">
															<div class="dlab-post-title ">
																<h5 class="post-title"><a href="embryology-of-adrenal-glands.php">Embryology of adrenal glands</a></h5>
															</div>
														</div>
													</div>
												</div>
												<div class="item">
													<div class="blog-post blog-sm">
														<div class="dlab-post-media">
															<a href="management-of-hypocortisolism.php"><img src="images/category/hypocortisolism1.jpg" alt=""></a>
														</div>
														<div class="dlab-post-info">
															<div class="dlab-post-title ">
																<h5 class="post-title"><a href="management-of-hypocortisolism.php">Management of a case of hypocortisolism</a></h5>
															</div>
														</div>
													</div>
												</div>
												<div class="item">
													<div class="blog-post blog-sm">
														<div class="dlab-post-media">
															<a href="evaluation-case-hypocortisolism.php"><img src="images/category/pic2.jpg" alt=""></a>
														</div>
														<div class="dlab-post-info">
															<div class="dlab-post-title">
																<h5 class="post-title"><a href="evaluation-case-hypocortisolism.php">Evaluation of a case of hypocortisolism</a></h5>
															</div>
														</div>
													</div>
												</div>
												<!-- <div class="item">
													<div class="blog-post blog-sm">
														<div class="dlab-post-media">
															<a href="post-slide-show.php"><img src="images/category/pic4.jpg" alt=""></a>
														</div>
														<div class="dlab-post-info">
															<div class="dlab-post-title ">
																<h5 class="post-title"><a href="post-slide-show.php">La Dolce Vita Meets Old School on Beach Style </a></h5>
															</div>
														</div>
													</div>
												</div> -->
											</div>
											<div class="viewallpage"><a href="video-medical-education-1.php">View All</a></div>
											<!----view-all---->
										</div>
										<div id="test03" class="life-style-post-bx">
											<div class="header-blog-carousel owl-carousel owl-carousel1 owl-btn-center-lr">
												<div class="item">
													<div class="blog-post blog-sm">
														<div class="dlab-post-media">
															<a href="icterus.php">
																<img src="images/category/iceterusimg.jpg" alt="">
															</a>
														</div>
														<div class="dlab-post-info">
															<div class="dlab-post-title ">
																<h5 class="post-title"><a href="icterus.php">Icterus</a></h5>
															</div>
														</div>
													</div>
												</div>
												<div class="item">
													<div class="blog-post blog-sm">
														<div class="dlab-post-media">
															<a href="Inguinoscrotal-hernia.php"><img src="images/category/inguinoscrotal-hernia.jpg" alt=""></a>
														</div>
														<div class="dlab-post-info">
															<div class="dlab-post-title ">
																<h5 class="post-title"><a href="Inguinoscrotal-hernia.php">D/D Inguinoscrotal hernia</a></h5>
															</div>
														</div>
													</div>
												</div>
												<div class="item">
													<div class="blog-post blog-sm">
														<div class="dlab-post-media">
															<a href="hydrocoel.php"><img src="images/category/right-sided-hydrocoel.jpg" alt=""></a>
														</div>
														<div class="dlab-post-info">
															<div class="dlab-post-title">
																<h5 class="post-title"><a href="hydrocoel.php">Right sided hydrocoel</a></h5>
															</div>
														</div>
													</div>
												</div>
												<!-- <div class="item">
													<div class="blog-post blog-sm">
														<div class="dlab-post-media">
															<a href="#"><img src="images/category/pic4.jpg" alt=""></a>
														</div>
														<div class="dlab-post-info">
															<div class="dlab-post-title ">
																<h5 class="post-title"><a href="#">La Dolce Vita Meets Old School on Beach Style </a></h5>
															</div>
														</div>
													</div>
												</div> -->
											</div>
											<div class="viewallpage"><a href="casestudy-medical-education.php">View All</a></div>
										</div>
										<div id="travel04" class="life-style-post-bx">
											<div class="header-blog-carousel owl-carousel owl-carousel1 owl-btn-center-lr">
												<div class="item">
													<div class="blog-post blog-sm">
														<div class="dlab-post-media">
															<a href="acute-kidney-injury.php"><img src="images/category/student-and-resident-forum.jpg" alt=""></a>
														</div>
														<div class="dlab-post-info">
															<div class="dlab-post-title ">
																<h5 class="post-title"><a href="acute-kidney-injury.php">Acute kidney injury</a></h5>
															</div>
														</div>
													</div>
												</div>
												<div class="item">
													<div class="blog-post blog-sm">
														<div class="dlab-post-media">
															<a href="amyloidosis-classification-diagnosis.php"><img src="images/category/nervous-system.jpg" alt=""></a>
														</div>
														<div class="dlab-post-info">
															<div class="dlab-post-title ">
																<h5 class="post-title"><a href="amyloidosis-classification-diagnosis.php">Amyloidosis - Classification and diagnosis</a></h5>
															</div>
														</div>
													</div>
												</div>
												<div class="item">
													<div class="blog-post blog-sm">
														<div class="dlab-post-media">
															<a href="amyloidosis.php"><img src="images/category/amyloidosis.jpg" alt=""></a>
														</div>
														<div class="dlab-post-info">
															<div class="dlab-post-title">
																<h5 class="post-title"><a href="amyloidosis.php">Amyloidosis</a></h5>
															</div>
														</div>
													</div>
												</div>
												<!-- <div class="item">
													<div class="blog-post blog-sm">
														<div class="dlab-post-media">
															<a href="post-slide-show.php"><img src="images/category/pic4.jpg" alt=""></a>
														</div>
														<div class="dlab-post-info">
															<div class="dlab-post-title ">
																<h5 class="post-title"><a href="post-slide-show.php">La Dolce Vita Meets Old School on Beach Style </a></h5>
															</div>
														</div>
													</div>
												</div> -->
											</div>
											<div class="viewallpage"><a href="student-medical-education.php">View All</a></div>
										</div>
										<!-----Travel-End----->
										<!-----Travel2-Start----->
										<div id="travel05" class="life-style-post-bx">
											<div class="header-blog-carousel owl-carousel owl-carousel1 owl-btn-center-lr">
												<div class="item">
													<!-- <div class="blog-post blog-sm">
														<div class="dlab-post-media">
															<a href="punarnava-e-journal-volume3.php"><img src="images/category/pic1.jpg" alt=""></a>
														</div>
														<div class="dlab-post-info">
															<div class="dlab-post-title ">
																<h5 class="post-title"><a href="punarnava-e-journal-volume3.php">
																Punarnava E-Journal (Volume 3)</a></h5>
															</div>
														</div>
													</div> -->
												</div>
												<div class="item">
													<!-- <div class="blog-post blog-sm">
														<div class="dlab-post-media">
															<a href="punarnava-e-journal-volume2.php"><img src="images/category/pic1.jpg" alt=""></a>
														</div>
														<div class="dlab-post-info">
															<div class="dlab-post-title ">
																<h5 class="post-title"><a href="punarnava-e-journal-volume2.php">
																Punarnava e-journal (Volume 2)</a></h5>
															</div>
														</div>
													</div> -->
												</div>
												<div class="item">
													<!-- <div class="blog-post blog-sm">
														<div class="dlab-post-media">
															<a href="punarnava-e-journal-volume1.php"><img src="images/category/pic3.jpg" alt=""></a>
														</div>
														<div class="dlab-post-info">
															<div class="dlab-post-title">
																<h5 class="post-title"><a href="punarnava-e-journal-volume1.php">Punarnava - The e-journal (Volume 1)</a></h5>
															</div>
														</div>
													</div> -->
												</div>
												<!-- <div class="item">
													<div class="blog-post blog-sm">
														<div class="dlab-post-media">
															<a href="post-slide-show.php"><img src="images/category/pic4.jpg" alt=""></a>
														</div>
														<div class="dlab-post-info">
															<div class="dlab-post-title ">
																<h5 class="post-title"><a href="post-slide-show.php">La Dolce Vita Meets Old School on Beach Style </a></h5>
															</div>
														</div>
													</div>
												</div> -->
											</div>
											<!-- <div class="viewallpage"><a href="onlinevent-medical-education.php">View All</a></div> -->
										</div><!---Travel2-Start------>


										<!-----E-Journal-Start----->
										<div id="travel06" class="life-style-post-bx">
											<div class="header-blog-carousel owl-carousel menuebook owl-btn-center-lr">
												<div class="item">
														<div class="blog-post blog-sm">
															<div class="dlab-post-media books">
																<a href="ejournals-april-2023.php">
																	<img src="images/maybook-cover.jpg" alt="">
																</a>
																<p class="text-black font-weight-400">May 2023</p>
															</div>
															<a href="ejournals-may-2023.php" class="phonemodal-menu"></a>
															<!-- <div class="dlab-post-info">
																<div class="dlab-post-title ">
																	<h5 class="post-title"><a href="punarnava-e-journal-volume3.php">
																	Buy</a></h5>
																</div>
															</div> -->
														</div>
													</div>	
												<div class="item">
													<div class="blog-post blog-sm">
														<div class="dlab-post-media books">
															<a href="ejournals-april-2023.php">
																<img src="images/aprilbook-cover.jpg" alt="">
															</a>
															<p class="text-black font-weight-400">April 2023</p>
														</div>
														<a href="ejournals-april-2023.php" class="phonemodal-menu"></a>
														<!-- <div class="dlab-post-info">
															<div class="dlab-post-title ">
																<h5 class="post-title"><a href="punarnava-e-journal-volume3.php">
																Buy</a></h5>
															</div>
														</div> -->
													</div>
												</div>	
												<div class="item">
													<div class="blog-post blog-sm">
														<div class="dlab-post-media books">
															<a href="ejournals-march-2023.php">
																<img src="images/book-cover3.jpg" alt="">
															</a>
															<p class="text-black font-weight-400">Mar 2023</p>
														</div>
														<a href="ejournals-march-2023.php" class="phonemodal-menu"></a>
														<!-- <div class="dlab-post-info">
															<div class="dlab-post-title ">
																<h5 class="post-title"><a href="punarnava-e-journal-volume3.php">
																Buy</a></h5>
															</div>
														</div> -->
													</div>
												</div>	
												<div class="item">
													<div class="blog-post blog-sm">
														<div class="dlab-post-media books">
															<a href="ejournals-feb-2023.php">
																<img src="images/book-cover.jpg" alt="">
															</a>
															<p class="text-black font-weight-400">Feb 2023</p>
														</div>
														<a href="ejournals-feb-2023.php" class="phonemodal-menu"></a>
														<!-- <div class="dlab-post-info">
															<div class="dlab-post-title ">
																<h5 class="post-title"><a href="punarnava-e-journal-volume3.php">
																Buy</a></h5>
															</div>
														</div> -->
													</div>
												</div>	
												<div class="item">
													<div class="blog-post blog-sm">
														<div class="dlab-post-media books">
															<a href="ejournals-jan-2023.php">
																<img src="images/book-cover2.jpg" alt="">
															</a>
															<p class="text-black font-weight-400">Jan 2023</p>
														</div>
														<a href="ejournals-jan-2023.php" class="phonemodal-menu"></a>
														<!-- <div class="dlab-post-info">
															<div class="dlab-post-title ">
																<h5 class="post-title"><a href="punarnava-e-journal-volume3.php">
																Buy</a></h5>
															</div>
														</div> -->
													</div>
												</div>
	
													
													<div class="item">
														<div class="blog-post blog-sm">
															<div class="dlab-post-media books">
																<a href="ejournals-dec-2022.php">
																	<img src="images/book-cover08.jpg" alt="">
																</a>
																<p class="text-black font-weight-400">Dec 2022</p>
															</div>
															<a href="ejournals-dec-2022.php" class="phonemodal-menu"></a>
															<!-- <div class="dlab-post-info">
																<div class="dlab-post-title ">
																	<h5 class="post-title"><a href="punarnava-e-journal-volume3.php">
																	Buy</a></h5>
																</div>
															</div> -->
														</div>
													</div>													
													<div class="item">
														<div class="blog-post blog-sm">
															<div class="dlab-post-media books">
																<a href="ejournals-nov-2022.php">
																	<img src="images/book-cover07.jpg" alt="">
																</a>
																<p class="text-black font-weight-400">Nov 2022</p>
															</div>
															<a href="ejournals-nov-2022.php" class="phonemodal-menu"></a>
															<!-- <div class="dlab-post-info">
																<div class="dlab-post-title ">
																	<h5 class="post-title"><a href="punarnava-e-journal-volume3.php">
																	Buy</a></h5>
																</div>
															</div> -->
														</div>
													</div>
													<div class="item">
														<div class="blog-post blog-sm">
															<div class="dlab-post-media books">
																<a href="ejournals-oct-2022.php">
																	<img src="images/book-cover06.jpg" alt="">
																</a>
																<p class="text-black font-weight-400">Oct 2022</p>
															</div>
															<a href="ejournals-oct-2022.php" class="phonemodal-menu"></a>
															<!-- <div class="dlab-post-info">
																<div class="dlab-post-title ">
																	<h5 class="post-title"><a href="punarnava-e-journal-volume3.php">
																	Buy</a></h5>
																</div>
															</div> -->
														</div>
													</div>
													<div class="item">
														<div class="blog-post blog-sm">
															<div class="dlab-post-media books">
																<a href="ejournals-sep-2022.php">
																	<img src="images/book-cover05.jpg" alt="">
																</a>
																<p class="text-black font-weight-400">Sep 2022</p>
															</div>
															<a href="ejournals-sep-2022.php" class="phonemodal-menu"></a>
															<!-- <div class="dlab-post-info">
																<div class="dlab-post-title ">
																	<h5 class="post-title"><a href="punarnava-e-journal-volume3.php">
																	Buy</a></h5>
																</div>
															</div> -->
														</div>
													</div>
													<div class="item">
														<div class="blog-post blog-sm">
															<div class="dlab-post-media books">
																<a href="ejournals-aug-2022.php">
																	<img src="images/book-cover04.jpg" alt="">
																</a>
																<p class="text-black font-weight-400">Aug 2022</p>
															</div>
															<a href="ejournals-aug-2022.php" class="phonemodal-menu"></a>
															<!-- <div class="dlab-post-info">
																<div class="dlab-post-title ">
																	<h5 class="post-title">
																		<a href="punarnava-e-journal-volume3.php">
																	Buy</a></h5>
																</div>
															</div> -->
														</div>
													</div>
												<!-- <div class="item">
													<div class="blog-post blog-sm">
														<div class="dlab-post-media">
															<a href="#"><img src="images/category/diet-in-hypothyroidism.jpg.jpg" alt=""></a>
														</div>
														<div class="dlab-post-info">
															<div class="dlab-post-title ">
																<h5 class="post-title"><a href="#">La Dolce Vita Meets Old School on Beach Style </a></h5>
															</div>
														</div>
													</div>
												</div> -->
											</div>
											<div class="viewallpage"><a href="ejournals.php">View All</a></div>
										</div><!---E-Journal-End--->
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