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
	<title>MCH - Medical Concepts in Hindi By Dr Pankaj Agarwal</title>
	
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
	
</head>
<body id="bg">
<div class="page-wraper">
<!-- <div id="loading-area"></div> -->
	<div class="modal fade subscribe-modal-bx" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
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
	<!-- header -->
    <header class="site-header mo-left header-full header">
		<!-- main header -->
		<div class="sticky-header main-bar-wraper navbar-expand-lg">
			<div class="main-bar clearfix ">
				<div class="container-fluid">
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
					<div class="extra-nav">
						<div class="extra-cell">
							<ul>
								<li class="search-btn mt-2">
									<a id="quik-search-btn" href="javascript:;"><i class="ti-search m-r10"></i><span>Search</span></a>
								</li>
								<!-- <li>
									<button type="button" data-toggle="modal" data-target="#exampleModal" class="btn secondry radius-no">Subscribe</button>
								</li> -->
							</ul>
						</div>
					</div>
					
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
												<!-- <li><a href="javascript:void(0);" id="st-all" class="post-tabs active">All</a></li> -->
												<li><a href="javascript:void(0);" id="st-beauty" class="post-tabs active">Text</a></li>
												<li><a href="javascript:void(0);" id="st-video" class="post-tabs">Video</a></li>
												<li><a href="javascript:void(0);" id="st-test" class="post-tabs">Case Study</a></li>
												<li><a href="javascript:void(0);" id="st-travel" class="post-tabs">Student And Resident Forum</a></li>
												<li><a href="javascript:void(0);" id="st-travel2" class="post-tabs">Online Event Diary</a></li>
												<li><a href="javascript:void(0);" id="st-travel3" class="post-tabs">E Journal</a></li>
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
												<div class="viewallpage"><a href="#">View All</a></div>
											</div>
											<div id="video" class="life-style-post-bx">
												<div class="header-blog-carousel owl-carousel owl-carousel1 owl-btn-center-lr">
													<div class="item">
														<div class="blog-post blog-sm">
															<div class="dlab-post-media">
																<a href="lung-exercise.php"><img src="images/category/lung-exercise-covid-patient.jpg" alt=""></a>
															</div>
															<div class="dlab-post-info">
																<div class="dlab-post-title ">
																	<h5 class="post-title"><a href="lung-exercise.php">Lung exercises for covid patients</a></h5>
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
												<div class="viewallpage"><a href="#">View All</a></div>
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
																	<h5 class="post-title"><a href="rakesh20.php">Rakesh 20</a></h5>
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
																	<h5 class="post-title"><a href="rakesh19.php">Rakesh 19</a></h5>
																</div>
															</div>
														</div>
													</div>
													<div class="item">
														<div class="blog-post blog-sm">
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
												<div class="viewallpage"><a href="#">View All</a></div>
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
												<div class="viewallpage"><a href="#">View All</a></div>
											</div>
											<!-----Travel-End----->
											<!-----Travel2-Start----->
											<div id="travel2" class="life-style-post-bx">
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
												<div class="viewallpage"><a href="#">View All</a></div>
											</div><!---Travel2-Start------>


											<!-----E-Journal-Start----->
											<div id="travel3" class="life-style-post-bx">
												<div class="header-blog-carousel owl-carousel owl-carousel1 owl-btn-center-lr">
													<div class="item">
														<div class="blog-post blog-sm">
															<div class="dlab-post-media">
																<a href="pulmonary-embolism.php"><img src="images/category/diet-in-hypothyroidism.jpg" alt=""></a>
															</div>
															<div class="dlab-post-info">
																<div class="dlab-post-title ">
																	<h5 class="post-title"><a href="pulmonary-embolism.php">
																	Pulmonary Embolism(PE) MCQs</a></h5>
																</div>
															</div>
														</div>
													</div>
													<div class="item">
														<div class="blog-post blog-sm">
															<div class="dlab-post-media">
																<a href="remission.php"><img src="images/category/diet-in-hypothyroidism.jpg" alt=""></a>
															</div>
															<div class="dlab-post-info">
																<div class="dlab-post-title ">
																	<h5 class="post-title"><a href="remission.php">
																	Remission ऑफ Diabetes</a></h5>
																</div>
															</div>
														</div>
													</div>
													<div class="item">
														<div class="blog-post blog-sm">
															<div class="dlab-post-media">
																<a href="sugar-advantage.php"><img src="images/category/diet-in-hypothyroidism.jpg" alt=""></a>
															</div>
															<div class="dlab-post-info">
																<div class="dlab-post-title">
																	<h5 class="post-title"><a href="sugar-advantage.php">*शुगर को सही रखने क्या लाभ*</a></h5>
																</div>
															</div>
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
												<div class="viewallpage"><a href="#">View All</a></div>
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
												<li><a href="javascript:void(0);" id="st-beauty01" class="post-tabs">Text</a></li>
												<li><a href="javascript:void(0);" id="st-video02" class="post-tabs">Video</a></li>
												<li><a href="javascript:void(0);" id="st-test03" class="post-tabs">Case Study</a></li>
												<li><a href="javascript:void(0);" id="st-travel04" class="post-tabs">Student And Resident Forum</a></li>
												<li><a href="javascript:void(0);" id="st-travel05" class="post-tabs">Online Event Diary</a></li>
												<li><a href="javascript:void(0);" id="st-travel06" class="post-tabs">E Journal</a></li>
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
																	<h5 class="post-title"><a href="procedure-and-interpretation.php">Procedure and interpretation of spirometry</a></h5>
																</div>
															</div>
														</div>
													</div>
													<div class="item">
														<div class="blog-post blog-sm">
															<div class="dlab-post-media">
																<a href="procedure-and-interpretation2.php"><img src="images/category/spirometory.jpg" alt=""></a>
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
												<div class="viewallpage"><a href="#">View All</a></div>
											</div>
											<div id="video02" class="life-style-post-bx">
												<div class="header-blog-carousel owl-carousel owl-carousel1 owl-btn-center-lr">
													<div class="item">
														<div class="blog-post blog-sm">
															<div class="dlab-post-media">
																<a href="#"><img src="images/category/embryology-of-adrenal-gland.jpg" alt=""></a>
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
																<a href="management-of-hypocortisolism.php"><img src="images/category/pic1.jpg" alt=""></a>
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
												<div class="viewallpage"><a href="#">View All</a></div>
												<!----view-all---->
											</div>
											<div id="test03" class="life-style-post-bx">
												<div class="header-blog-carousel owl-carousel owl-carousel1 owl-btn-center-lr">
													<div class="item">
														<div class="blog-post blog-sm">
															<div class="dlab-post-media">
																<a href="icterus.php">
																	<img src="images/category/diet-in-hypothyroidism.jpg" alt="">
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
																<a href="Inguinoscrotal-hernia.php"><img src="images/category/diet-in-hypothyroidism.jpg" alt=""></a>
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
																<a href="hydrocoel.php"><img src="images/category/diet-in-hypothyroidism.jpg" alt=""></a>
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
												<div class="viewallpage"><a href="#">View All</a></div>
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
												<div class="viewallpage"><a href="#">View All</a></div>
											</div>
											<!-----Travel-End----->
											<!-----Travel2-Start----->
											<div id="travel05" class="life-style-post-bx">
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
												<div class="viewallpage"><a href="#">View All</a></div>
											</div><!---Travel2-Start------>


											<!-----E-Journal-Start----->
											<div id="travel06" class="life-style-post-bx">
												<div class="header-blog-carousel owl-carousel owl-carousel1 owl-btn-center-lr">
													<div class="item">
														<div class="blog-post blog-sm">
															<div class="dlab-post-media">
																<a href="pulmonary-embolism.php"><img src="images/category/diet-in-hypothyroidism.jpg" alt=""></a>
															</div>
															<div class="dlab-post-info">
																<div class="dlab-post-title ">
																	<h5 class="post-title"><a href="pulmonary-embolism.php">
																	Pulmonary Embolism(PE) MCQs</a></h5>
																</div>
															</div>
														</div>
													</div>
													<div class="item">
														<div class="blog-post blog-sm">
															<div class="dlab-post-media">
																<a href="remission.php"><img src="images/category/diet-in-hypothyroidism.jpg" alt=""></a>
															</div>
															<div class="dlab-post-info">
																<div class="dlab-post-title ">
																	<h5 class="post-title"><a href="remission.php">
																	Remission ऑफ Diabetes</a></h5>
																</div>
															</div>
														</div>
													</div>
													<div class="item">
														<div class="blog-post blog-sm">
															<div class="dlab-post-media">
																<a href="sugar-advantage.php"><img src="images/category/diet-in-hypothyroidism.jpg" alt=""></a>
															</div>
															<div class="dlab-post-info">
																<div class="dlab-post-title">
																	<h5 class="post-title"><a href="sugar-advantage.php">*शुगर को सही रखने क्या लाभ*</a></h5>
																</div>
															</div>
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
												<div class="viewallpage"><a href="#">View All</a></div>
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
							<li><a href="about-me.php">About Us</a></li>
							<li><a href="contact-me.php">Contact Us</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
    </header>
    <!-- header END -->
	<div class="header-author">
		<div class="author-bx">
			<div class="author-media">
				<img src="images/author.jpg" alt=""/>
			</div>
			<div class="author-info">
				<h2 class="title">Medical Concepts in Hindi</h2>
				<p>Take care of your health.</p>
				<ul class="author-social">
					<li><a href="javascript:void(0);" class=""><i class="fa fa-facebook"></i> <span>facebook</span></a></li>
					<li><a href="javascript:void(0);" class=""><i class="fa fa-instagram"></i> <span>instagram</span></a></li>
					<li><a href="javascript:void(0);" class=""><i class="fa fa-linkedin"></i> <span>linkedin</span></a></li>
					<!-- <li><a href="javascript:void(0);" class=""><i class="fa fa-twitter"></i> <span>twitter</span></a></li> -->
				</ul>
			</div>
		</div>
	</div>
	<!-- Content -->
	<div class="page-content bg-white">
		<!-- Trending Post -->
		<div class="section-full trending-post-bx m-b20 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.6s">
			<div class="container-fluid">
				<div class="trending-post-carousel owl-carousel owl-carousel00 owl-none">
					<div class="item">
						<div class="trending-post">
							<div class="dlab-post-media">
								<img src="images/trending-post/pic1.jpg" alt="">
							</div>
							<div class="dlab-post-info">
								<h6 class="post-title"><a href="dr-rohit-kapoor.php">Tips to Controll Blood Pressure</a></h6>
								<div class="dlab-post-meta">
									<ul>
										<li class="post-category"><a href="video.php">Video</a></li>
										<li class="post-date">at <span>24 Sep 2019</span></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="trending-post">
							<div class="dlab-post-media">
								<img src="images/trending-post/pic2.jpg" alt="">
							</div>
							<div class="dlab-post-info">
								<h6 class="post-title"><a href="post-detail.php">Statistics Of Diabetes</a></h6>
								<div class="dlab-post-meta">
									<ul>
										<li class="post-category"><a href="video.php">Video</a></li>
										<li class="post-date">at <span>1st Oct, 2019</span></li>
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
								<h6 class="post-title"><a href="lung-exercise.php">Lung Function Test</a></h6>
								<div class="dlab-post-meta">
									<ul>
										<li class="post-category"><a href="text.php">Text</a></li>
										<li class="post-date">at <span>1 Oct, 2019</span></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="trending-post">
							<div class="dlab-post-media">
								<img src="images/trending-post/pic4.jpg" alt="">
							</div>
							<div class="dlab-post-info">
								<h6 class="post-title"><a href="proptosis.php">Proptosis</a></h6>
								<div class="dlab-post-meta">
									<ul>
										<li class="post-category"><a href="case-study.php">Case Study</a></li>
										<li class="post-date">at <span>3 Jul 2018</span></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="trending-post">
							<div class="dlab-post-media">
								<img src="images/trending-post/pic5.jpg" alt="">
							</div>
							<div class="dlab-post-info">
								<h6 class="post-title"><a href="diet-in-diabetes.php">Diet in Diabetes</a></h6>
								<div class="dlab-post-meta">
									<ul>
										<li class="post-category"><a href="video.php">Video</a></li>
										<li class="post-date">at <span>1 Oct, 2018</span></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Trending Post End -->	

		<!-- Buy Now Carousel -->
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-head text-center">
						<span>Publications</span>
					</div>
				</div>
			</div>
		</div>

		<div class="section-full bg-white wow fadeIn mt-0 mb-5" data-wow-duration="2s" data-wow-delay="0.9s">
			<div class="container-fluid">
				<div class="top-post-carousel owl-carousel owl-cover-post owl-none">
					<div class="item">
						<div class="bookcover wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
							<img src="images/book-cover.jpg" alt="">
							<a href="#">Buy Now</a>
						</div>
					</div><!---1end--->
					<div class="item">
						<div class="bookcover wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
							<img src="images/book-cover2.jpg" alt="">
							<a href="#">Buy Now</a>
						</div>
					</div><!---2end--->
					<div class="item">
						<div class="bookcover wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
							<img src="images/book-cover3.jpg" alt="">
							<a href="#">Buy Now</a>
						</div>
					</div><!---3end--->
					<div class="item">
						<div class="bookcover wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
							<img src="images/book-cover.jpg" alt="">
							<a href="#">Buy Now</a>
						</div>
					</div><!---4end--->
					<div class="item">
						<div class="bookcover wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
							<img src="images/book-cover.jpg" alt="">
							<a href="#">Buy Now</a>
						</div>
					</div><!---5end--->
					<div class="item">
						<div class="bookcover wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
							<img src="images/book-cover.jpg" alt="">
							<a href="#">Buy Now</a>
						</div>
					</div><!---6end--->
					<div class="item">
						<div class="bookcover wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
							<img src="images/book-cover.jpg" alt="">
							<a href="#">Buy Now</a>
						</div>
					</div><!---7end--->
					<div class="item">
						<div class="bookcover wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
							<img src="images/book-cover.jpg" alt="">
							<a href="#">Buy Now</a>
						</div>
					</div><!---8end--->
					<div class="item">
						<div class="bookcover wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
							<img src="images/book-cover.jpg" alt="">
							<a href="#">Buy Now</a>
						</div>
					</div><!---9end--->
					<div class="item">
						<div class="bookcover wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
							<img src="images/book-cover.jpg" alt="">
							<a href="#">Buy Now</a>
						</div>
					</div><!---10end--->
					<div class="item">
						<div class="bookcover wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
							<img src="images/book-cover.jpg" alt="">
							<a href="#">Buy Now</a>
						</div>
					</div><!---11end--->
					<div class="item">
						<div class="bookcover wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
							<img src="images/book-cover.jpg" alt="">
							<a href="#">Buy Now</a>
						</div>
					</div><!---12end--->
				</div>
			</div>
		</div>


		<!-- Buy Now Carousel End-->

		<!-- Blog Post Carousel -->
		<div class="section-full bg-white wow fadeIn" data-wow-duration="2s" data-wow-delay="0.9s">
			<div class="container-fluid">
				<div class="top-post-carousel owl-carousel owl-none">
					<div class="item">
						<div class="blog-card blog-grid overlay-post left radius-sm">
							<div class="dlab-post-media">
								<img src="images/blog/full/blog/pic1.jpg" alt=""/>
							</div>
							<div class="blog-card-info">
								<div class="dlab-post-meta">
									<ul>
										<li class="post-tag"><a href="video.php">Video</a></li>
									</ul>
								</div>
								<h4 class="title"><a href="dr-rohit-kapoor.php">Tips to Controll Blood Pressure</a></h4>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="blog-card blog-grid overlay-post left radius-sm">
							<div class="dlab-post-media">
								<img src="images/blog/full/blog/pic2.jpg" alt=""/>
							</div>
							<div class="blog-card-info">
								<div class="dlab-post-meta">
									<ul>
										<li class="post-tag"><a href="video.php">Video</a></li>
									</ul>
								</div>
								<h4 class="title"><a href="post-detail.php">Statistics Of Diabetes</a></h4>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="blog-card blog-grid overlay-post left radius-sm">
							<div class="dlab-post-media">
								<img src="images/blog/full/blog/pic3.jpg" alt=""/>
							</div>
							<div class="blog-card-info">
								<div class="dlab-post-meta">
									<ul>
										<li class="post-tag"><a href="text.php">Text</a></li>
									</ul>
								</div>
								<h4 class="title"><a href="lung-exercise.php">Lung Function Test</a></h4>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="blog-card blog-grid overlay-post left radius-sm">
							<div class="dlab-post-media">
								<img src="images/blog/full/blog/pic4.jpg" alt=""/>
							</div>
							<div class="blog-card-info">
								<div class="dlab-post-meta">
									<ul>
										<li class="post-tag"><a href="case-study.php">CASE STUDY</a></li>
									</ul>
								</div>
								<h4 class="title"><a href="proptosis.php">PROPTOSIS</a></h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Blog Post End -->

		
		<!-- Post Grid Style -->
		<div class="section-full bg-white content-inner-1">
			<div class="container">
				<div class="section-head text-center">
					<span>Category</span>
				</div>
				<div class="category-owl owl-carousel owl-btn-center-lr">
					<div class="item">
						<div class="category-box">
							<div class="category-media">							
								<img src="images/category/diet.jpg" alt="Diet">				
							</div>
							<div class="category-info">
								<a href="text.php" class="category-title">Text</a>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="category-box">
							<div class="category-media">							
								<img src="images/category/disorder-thyroid.jpg" alt="lung exercise covid patient">	
							</div>
							<div class="category-info">
								<a href="video.php" class="category-title">VIDEO</a>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="category-box">
							<div class="category-media">							
								<img src="images/category/rakesh-20.jpg" alt="Travel">	
							</div>
							<div class="category-info">
								<a href="case-study.php" class="category-title">Case Study</a>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="category-box">
							<div class="category-media">							
								<img src="images/category/student-and-resident-forum.jpg" alt="Travel">	
							</div>
							<div class="category-info">
								<a href="javascript:void(0);" class="category-title">Student and Resident Forum</a>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="category-box">
							<div class="category-media">							
								<img src="images/category/diet-in-hypothyroidism.jpg" alt="Pulmonary Embolism(PE) MCQs">	
							</div>
							<div class="category-info">
								<a href="javascript:void(0);" class="category-title">Online Event Diary</a>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="category-box">
							<div class="category-media">							
								<img src="images/category/diet-in-hypothyroidism.jpg" alt="Pulmonary Embolism(PE) MCQs">	
							</div>
							<div class="category-info">
								<a href="javascript:void(0);" class="category-title">E Journal</a>
							</div>
						</div>
					</div>

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




		<div class="section-full bg-white content-inner-1">
			<div class="container">
				<div class="section-head text-center">
					<span>Feature Post</span>
				</div>
				<div class="row blog-box-style1">
					<div class="col-md-8 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
						<div class="blog-card blog-lg content-box">
							<div class="dlab-post-media">
								<img src="images/blog/blog-lg/pic1.jpg" alt=""/>
							</div>
							<div class="blog-card-info">
								<div class="dlab-post-meta">
									<ul>
										<li class="post-author"><span>by</span> <a href="adrenal-glands-miscellaneous-effects.php">Dr Pankaj Agarwal</a></li>
										<li class="post-category">in <!-- <a href="javascript:void(0);">beauty</a>, --> <a href="javascript:void(0);">Adrenal Glands, </a></li>
										<li class="post-date">at <span>13 Oct, 2022</span></li>
									</ul>
								</div>
								<h2><a href="adrenal-glands-miscellaneous-effects.php">Dr Pankaj Agarwal</a></h2>
								<div class="dlab-feed-meta">
									<ul>
										<!-- <li class="post-like"><a href="javascript:void(0);"><i class="fa fa-thumbs-o-up"></i><span>231</span></a></li>
										<li class="post-dislike"><a href="javascript:void(0);"><i class="fa fa-thumbs-o-down"></i><span>584</span></a></li> -->
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
								<p class="mt-3">Adrenal Glands Miscellaneous Effects Of GC</p>
								<a href="adrenal-glands-miscellaneous-effects.php" class="post-readmore" data-text="Read More">Read More</a>
						</div>
					</div>
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
					<div class="col-lg-4 col-md-4 col-sm-12 col-12">
						<div class="side-bar sticky-top mb-0">
							<div class="widget widget-author wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
								<h6 class="widget-title">About Us</h6>
								<div class="author-profile-info">
									<!-- <div class="author-profile-pic">	
										<a href="javascript:void(0);">
											<img src="images/author.jpg" alt="Profile Pic" width="130" height="130">
										</a>
									</div> -->
									<div class="author-profile-content">
										<h6 class="title">विनम्र निवेदन</h6>
										<p>MCH का उद्दश्य पाठकों को स्वास्थ्य एवं चिकित्सा संबंधी जानकारियों को हिंदी में अवगत कराना है।..</p>
										<a href="about-me.php" class="readme">Read More</a>
										<ul class="social-icon m-b0 text-center">
											<li><a href="javascript:void(0);" class="btn radius-xl"><i class="fa fa-instagram"></i></a></li>
											<li><a href="javascript:void(0);" class="btn radius-xl"><i class="fa fa-twitter"></i></a></li>
											<li><a href="javascript:void(0);" class="btn radius-xl"><i class="fa fa-facebook"></i></a></li>
											<!-- <li><a href="javascript:void(0);" class="btn radius-xl"><i class="fa fa-pinterest-p"></i></a></li>
											<li><a href="javascript:void(0);" class="btn radius-xl"><i class="fa fa-youtube-play"></i></a></li> -->
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
		
		<!-- Blog Post this Section is Deleted None-End---->
		<!-- Blog Post End -->
		<!-- Latest Post -->
		<div class="section-full latest-post-bx wow fadeInRight mt-5" data-wow-duration="1s" data-wow-delay="0.2s" style="background-image:url(images/pattern/pt2.png);">
			<div class="setResizeMargin">
				<div class="section-head text-black no-line">
					<h6 class="title-head text-uppercase"><span>Contributors</span></h6>
				</div>
				<div class="post-carousel owl-carousel owl-carousel00 btn-style-1">
					<div class="item">
						<div class="blog-card blog-grid post-boxed">
							<div class="dlab-post-media">
								<img src="images/blog/blog-md/blog/pic6.jpg" alt=""/>
							</div>
							<div class="blog-card-info">
								<div class="dlab-post-meta">
									<ul>
										<li class="post-category"><!-- <a href="javascript:void(0);">beauty</a>, --> <a href="dr-pankaj-kumar-agarwal.php">Contributor</a></li>
										<li class="post-date">at <span>12 August 2020</span></li>
									</ul>
								</div>
								<!-- <h4 class="title"><a href="post-slide-show.php">Dr. Pankaj Kumar Agarwal</a></h4> -->
								<h4><a href="dr-pankaj-kumar-agarwal.php">Dr. Pankaj Agarwal</a></h4>
								<div class="dlab-feed-meta">
									<ul>
										<!-- <li class="post-like"><a href="javascript:void(0);"><i class="fa fa-thumbs-o-up"></i><span>231</span></a></li>
										<li class="post-dislike"><a href="javascript:void(0);"><i class="fa fa-thumbs-o-down"></i><span>584</span></a></li>
										 -->
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
					<div class="item">
						<div class="blog-card blog-grid post-boxed">
							<div class="dlab-post-media">
								<img src="images/blog/blog-md/blog/pic2.jpg" alt=""/>
							</div>
							<div class="blog-card-info">
								<div class="dlab-post-meta">
									<ul>
										<li class="post-category"><!-- <a href="javascript:void(0);">beauty</a>, --> <a href="dr-bipin.php">Contributor</a></li>
										<li class="post-date">at <span>12 August 2020</span></li>
									</ul>
								</div>
								<h4><a href="dr-bipin.php">Dr Bipin Sethi </a></h4>
								<div class="dlab-feed-meta">
									<ul>
										<!-- <li class="post-like"><a href="javascript:void(0);"><i class="fa fa-thumbs-o-up"></i><span>231</span></a></li>
										<li class="post-dislike"><a href="javascript:void(0);"><i class="fa fa-thumbs-o-down"></i><span>584</span></a></li> -->
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
					<div class="item">
						<div class="blog-card blog-grid post-boxed">
							<div class="dlab-post-media">
								<img src="images/blog/blog-md/blog/pic9.jpg" alt=""/>
							</div>
							<div class="blog-card-info">
								<div class="dlab-post-meta">
									<ul>
										<li class="post-category"><!-- <a href="javascript:void(0);">beauty</a>, --> <a href="dr-shashank-joshi.php">Contributor</a></li>
										<li class="post-date">at <span>12 August 2020</span></li>
									</ul>
								</div>								
								<h4><a href="dr-shashank-joshi.php">Dr Shashank Joshi</a></h4>
								<div class="dlab-feed-meta">
									<ul>
										<!-- <li class="post-like"><a href="javascript:void(0);"><i class="fa fa-thumbs-o-up"></i><span>231</span></a></li>
										<li class="post-dislike"><a href="javascript:void(0);"><i class="fa fa-thumbs-o-down"></i><span>584</span></a></li> -->
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
					<div class="item">
						<div class="blog-card blog-grid post-boxed">
							<div class="dlab-post-media">
								<img src="images/blog/blog-md/blog/pic4.jpg" alt=""/>
							</div>
							<div class="blog-card-info">
								<div class="dlab-post-meta">
									<ul>
										<li class="post-category"><!-- <a href="javascript:void(0);">beauty</a>, --> <a href="dr-sanjay-kalra.php">Contributor</a></li>
										<li class="post-date">at <span>12 August 2020</span></li>
									</ul>
								</div>
								<h4><a href="dr-sanjay-kalra.php">Dr Sanjay Kalra</a></h4>
								<div class="dlab-feed-meta">
									<ul>
										<!-- <li class="post-like"><a href="javascript:void(0);"><i class="fa fa-thumbs-o-up"></i><span>231</span></a></li>
										<li class="post-dislike"><a href="javascript:void(0);"><i class="fa fa-thumbs-o-down"></i><span>584</span></a></li> -->
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
		</div>
		<!-- Latest Post End -->
		<!-- Most Popular -->
		<div class="section-full bg-white content-inner">
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
										<!-- <li class="post-like"><a href="javascript:void(0);"><i class="fa fa-thumbs-o-up"></i><span>231</span></a></li>
										<li class="post-dislike"><a href="javascript:void(0);"><i class="fa fa-thumbs-o-down"></i><span>584</span></a></li> -->
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
						<div class="blog-card blog-md clearfix wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.2s">
							<div class="dlab-post-media">
								<img src="images/blog/popular-blog/pic2.jpg" alt="">
								<h2 class="post-count">3</h2>
							</div>
							<div class="dlab-post-info">
								<div class="dlab-post-meta">
									<ul>
										<li class="post-category"><!-- <a href="javascript:void(0);">beauty</a>, --> <a href="evaluation-case-hypocortisolism.php">Evaluation, Anotomy, hypocortisolism</a></li>
										<li class="post-date">at <span> 13th Oct,2022</span></li>
									</ul>
								</div>
								<h4 class="title"><a href="evaluation-case-hypocortisolism.php">Evaluation of a case of hypocortisolism</a></h4>
								<div class="dlab-feed-meta">
									<ul>
										<!-- <li class="post-like"><a href="javascript:void(0);"><i class="fa fa-thumbs-o-up"></i><span>231</span></a></li>
										<li class="post-dislike"><a href="javascript:void(0);"><i class="fa fa-thumbs-o-down"></i><span>584</span></a></li> -->
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
						<div class="blog-card blog-md clearfix wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.9s">
							<div class="dlab-post-media">
								<img src="images/blog/popular-blog/pic3.jpg" alt="">
								<h2 class="post-count">5</h2>
							</div>
							<div class="dlab-post-info">
								<div class="dlab-post-meta">
									<ul>
										<li class="post-category"><!-- <a href="javascript:void(0);">beauty</a>, --> <a href="icterus.php">Icterus, Eyes</a></li>
										<li class="post-date">at <span>12 August 2019</span></li>
									</ul>
								</div>
								<h4 class="title"><a href="icterus.php">Icterus</a></h4>
								<div class="dlab-feed-meta">
									<ul>
										<!-- <li class="post-like"><a href="javascript:void(0);"><i class="fa fa-thumbs-o-up"></i><span>231</span></a></li>
										<li class="post-dislike"><a href="javascript:void(0);"><i class="fa fa-thumbs-o-down"></i><span>584</span></a></li> -->
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
					<div class="col-lg-6 widget-post-bx wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.8s">
						<div class="blog-card blog-md clearfix wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.3s">
							<div class="dlab-post-media">
								<img src="images/blog/popular-blog/pic4.jpg" alt="">
								<h2 class="post-count">2</h2>
							</div>
							<div class="dlab-post-info">
								<div class="dlab-post-meta">
									<ul>
										<li class="post-category"><!-- <a href="javascript:void(0);">beauty</a>, --> <a href="acute-kidney-injury.php">Acute kidney injusy</a></li>
										<li class="post-date">at <span> 20th Mar,2020</span></li>
									</ul>
								</div>
								<h4 class="title"><a href="acute-kidney-injury.php">Acute kidney injury</a></h4>
								<div class="dlab-feed-meta">
									<ul>
										<!-- <li class="post-like"><a href="javascript:void(0);"><i class="fa fa-thumbs-o-up"></i><span>231</span></a></li>
										<li class="post-dislike"><a href="javascript:void(0);"><i class="fa fa-thumbs-o-down"></i><span>584</span></a></li> -->
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
						<div class="blog-card blog-md clearfix wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.6s">
							<div class="dlab-post-media">
								<img src="images/blog/popular-blog/pic5.jpg" alt="">
								<h2 class="post-count">4</h2>
							</div>
							<div class="dlab-post-info">
								<div class="dlab-post-meta">
									<ul>
										<li class="post-category"><!-- <a href="javascript:void(0);">beauty</a>, --> <a href="lung-exercise.php">Pneumonia, </a></li>
										<li class="post-date">at <span> 17th Oct,2021</span></li>
									</ul>
								</div>
								<h4 class="title"><a href="lung-exercise.php">Lung Exercises For Covid Patients</a></h4>
								<div class="dlab-feed-meta">
									<ul>
										<!-- <li class="post-like"><a href="javascript:void(0);"><i class="fa fa-thumbs-o-up"></i><span>231</span></a></li>
										<li class="post-dislike"><a href="javascript:void(0);"><i class="fa fa-thumbs-o-down"></i><span>584</span></a></li> -->
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
						<div class="blog-card blog-md clearfix wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.9s">
							<div class="dlab-post-media">
								<img src="images/blog/popular-blog/pic6.jpg" alt="">
								<h2 class="post-count">6</h2>
							</div>
							<div class="dlab-post-info">
								<div class="dlab-post-meta">
									<ul>
										<li class="post-category"><!-- <a href="javascript:void(0);">beauty</a>, --> <a href="disorder-of-thyroid.php">Thyroid</a></li>
										<li class="post-date">at <span> 6th Feb,2021</span></li>
									</ul>
								</div>
								<h4 class="title"><a href="disorder-of-thyroid.php">Disorders Of Thyroid Gland: Early Recognition And Management</a></h4>
								<div class="dlab-feed-meta">
									<ul>
										<!-- <li class="post-like"><a href="javascript:void(0);"><i class="fa fa-thumbs-o-up"></i><span>231</span></a></li>
										<li class="post-dislike"><a href="javascript:void(0);"><i class="fa fa-thumbs-o-down"></i><span>584</span></a></li> -->
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