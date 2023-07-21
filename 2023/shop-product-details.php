<?php 
include 'header.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="description" content="MyDiary - Blog HTML Template" />
	<meta property="og:title" content="MyDiary - Blog HTML Template" />
	<meta property="og:description" content="MyDiary - Blog HTML Template" />
	<meta property="og:image" content="" />
	<meta name="format-detection" content="telephone=no">
	
	<!-- FAVICONS ICON -->
	<link rel="icon" href="images/favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
	
	<!-- PAGE TITLE HERE -->
	<title>MyDiary - Blog HTML Template</title>
	
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
	<link rel="stylesheet" type="text/css" href="css/star-rating-svg.css">
	<link class="skin" rel="stylesheet" type="text/css" href="css/skin/skin-1.css">
	
</head>
<body id="bg">
<div class="page-wraper">
<div id="loading-area"></div>
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
	<div class="header-author">
		<div class="author-bx">
			<div class="author-media">
				<img src="images/author.jpg" alt=""/>
			</div>
			<div class="author-info">
				<h2 class="title">Hi. i am Shailja Reddy</h2>
				<p>I am a developer based in Melbourne</p>
				<ul class="author-social">
					<li><a href="javascript:void(0);" class=""><i class="fa fa-facebook"></i> <span>facebook</span></a></li>
					<li><a href="javascript:void(0);" class=""><i class="fa fa-instagram"></i> <span>instagram</span></a></li>
					<li><a href="javascript:void(0);" class=""><i class="fa fa-twitter"></i> <span>twitter</span></a></li>
					<li><a href="javascript:void(0);" class=""><i class="fa fa-linkedin"></i> <span>linkedin</span></a></li>
				</ul>
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
						<a href="index.html"><img src="images/logo-black.png" alt=""></a>
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
								<li class="search-btn">
									<a id="quik-search-btn" href="javascript:;"><i class="ti-search m-r10"></i><span>Search</span></a>
								</li>
								<li>
									<button type="button" data-toggle="modal" data-target="#exampleModal" class="btn secondry radius-no">Subscribe</button>
								</li>
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
							<a href="index.html"><img src="images/logo.png" alt=""></a>
						</div>
						<ul class="nav navbar-nav">	
							<li class="active">
								<a href="javascript:void(0);">Home<i class="fa fa-chevron-down"></i></a>
								<ul class="sub-menu">
									<li><a href="index.html">Home 01</a></li>
									<li><a href="index-2.html">Home 02</a></li>
									<li><a href="index-3.html">Home 03</a></li>
									<li><a href="index-4.html">Home 04</a></li>
									<li><a href="index-5.html">Home 05</a></li>
								</ul>	
							</li>
							<li>
								<a href="javascript:void(0);">Post Layout<i class="fa fa-chevron-down"></i></a>
								<ul class="sub-menu">
									<li><a href="post-standart.html">Post Standart</a></li>
									<li><a href="post-left-sidebar.html">Post Left Sidebar</a></li>
									<li><a href="post-header-image.html">Post Header Image</a></li>
									<li><a href="post-slide-show.html">Post Slide Show</a></li>
									<li><a href="post-side-image.html">Post Side Image</a></li>
									<li><a href="post-gallery.html">Post Gallery</a></li>
									<li><a href="post-gallery-alternative.html">Post Gallery Alt</a></li>
									<li><a href="post-link.html">Post Link</a></li>
									<li><a href="post-audio.html">Post Audio</a></li>
									<li><a href="post-video.html">Post Video</a></li>
									<li><a href="post-pagination.html">Post With Pagination</a></li>
									<li><a href="post-open-gutenberg.html">Post Open Gutenberg</a></li>
								</ul>
							</li>
							<li class="has-mega-menu post-slider life-style">
								<a href="javascript:void(0);">Category<i class="fa fa-chevron-down"></i></a>
								<div class="mega-menu">
									<div class="life-style-bx">
										<div class="life-style-tabs">
											<ul>
												<li><a href="javascript:void(0);" id="st-all" class="post-tabs active">All</a></li>
												<li><a href="javascript:void(0);" id="st-beauty" class="post-tabs">Beauty</a></li>
												<li><a href="javascript:void(0);" id="st-lifestyle" class="post-tabs">Lifestyle</a></li>
												<li><a href="javascript:void(0);" id="st-fashion" class="post-tabs">Fashion</a></li>
												<li><a href="javascript:void(0);" id="st-travel" class="post-tabs">Travel</a></li>
											</ul>
										</div>
										<div class="life-style-post text-center">
											<div id="all" class="life-style-post-bx show">
												<div class="header-blog-carousel owl-carousel owl-btn-center-lr">
													<div class="item">
														<div class="blog-post blog-sm">
															<div class="dlab-post-media">
																<a href="post-standart.html"><img src="images/category/pic1.jpg" alt=""></a>
															</div>
															<div class="dlab-post-info">
																<div class="dlab-post-title ">
																	<h5 class="post-title"><a href="post-standart.html">Ready or Not, the Return into of the Hobo Bag Is Nigh</a></h5>
																</div>
															</div>
														</div>
													</div>
													<div class="item">
														<div class="blog-post blog-sm">
															<div class="dlab-post-media">
																<a href="post-left-sidebar.html"><img src="images/category/pic2.jpg" alt=""></a>
															</div>
															<div class="dlab-post-info">
																<div class="dlab-post-title ">
																	<h5 class="post-title"><a href="post-left-sidebar.html">This Week on Instagram, Celebri ties Went All-In on Prints</a></h5>
																</div>
															</div>
														</div>
													</div>
													<div class="item">
														<div class="blog-post blog-sm">
															<div class="dlab-post-media">
																<a href="post-full-width.html"><img src="images/category/pic3.jpg" alt=""></a>
															</div>
															<div class="dlab-post-info">
																<div class="dlab-post-title">
																	<h5 class="post-title"><a href="post-header-image.html">Anniversary With An Exhibition At Dallas Contemporary</a></h5>
																</div>
															</div>
														</div>
													</div>
													<div class="item">
														<div class="blog-post blog-sm">
															<div class="dlab-post-media">
																<a href="post-slide-show.html"><img src="images/category/pic4.jpg" alt=""></a>
															</div>
															<div class="dlab-post-info">
																<div class="dlab-post-title ">
																	<h5 class="post-title"><a href="post-slide-show.html">La Dolce Vita Meets Old School on Beach Style </a></h5>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div id="beauty" class="life-style-post-bx">
												<div class="header-blog-carousel owl-carousel owl-btn-center-lr">
													<div class="item">
														<div class="blog-post blog-sm">
															<div class="dlab-post-media">
																<a href="post-standart.html"><img src="images/category/pic1.jpg" alt=""></a>
															</div>
															<div class="dlab-post-info">
																<div class="dlab-post-title ">
																	<h5 class="post-title"><a href="post-standart.html">Ready or Not, the Return into of the Hobo Bag Is Nigh</a></h5>
																</div>
															</div>
														</div>
													</div>
													<div class="item">
														<div class="blog-post blog-sm">
															<div class="dlab-post-media">
																<a href="post-left-sidebar.html"><img src="images/category/pic2.jpg" alt=""></a>
															</div>
															<div class="dlab-post-info">
																<div class="dlab-post-title ">
																	<h5 class="post-title"><a href="post-left-sidebar.html">This Week on Instagram, Celebri ties Went All-In on Prints</a></h5>
																</div>
															</div>
														</div>
													</div>
													<div class="item">
														<div class="blog-post blog-sm">
															<div class="dlab-post-media">
																<a href="post-full-width.html"><img src="images/category/pic3.jpg" alt=""></a>
															</div>
															<div class="dlab-post-info">
																<div class="dlab-post-title">
																	<h5 class="post-title"><a href="post-header-image.html">Anniversary With An Exhibition At Dallas Contemporary</a></h5>
																</div>
															</div>
														</div>
													</div>
													<div class="item">
														<div class="blog-post blog-sm">
															<div class="dlab-post-media">
																<a href="post-slide-show.html"><img src="images/category/pic4.jpg" alt=""></a>
															</div>
															<div class="dlab-post-info">
																<div class="dlab-post-title ">
																	<h5 class="post-title"><a href="post-slide-show.html">La Dolce Vita Meets Old School on Beach Style </a></h5>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div id="lifestyle" class="life-style-post-bx">
												<div class="header-blog-carousel owl-carousel owl-btn-center-lr">
													<div class="item">
														<div class="blog-post blog-sm">
															<div class="dlab-post-media">
																<a href="post-standart.html"><img src="images/category/pic1.jpg" alt=""></a>
															</div>
															<div class="dlab-post-info">
																<div class="dlab-post-title ">
																	<h5 class="post-title"><a href="post-standart.html">Ready or Not, the Return into of the Hobo Bag Is Nigh</a></h5>
																</div>
															</div>
														</div>
													</div>
													<div class="item">
														<div class="blog-post blog-sm">
															<div class="dlab-post-media">
																<a href="post-left-sidebar.html"><img src="images/category/pic2.jpg" alt=""></a>
															</div>
															<div class="dlab-post-info">
																<div class="dlab-post-title ">
																	<h5 class="post-title"><a href="post-left-sidebar.html">This Week on Instagram, Celebri ties Went All-In on Prints</a></h5>
																</div>
															</div>
														</div>
													</div>
													<div class="item">
														<div class="blog-post blog-sm">
															<div class="dlab-post-media">
																<a href="post-full-width.html"><img src="images/category/pic3.jpg" alt=""></a>
															</div>
															<div class="dlab-post-info">
																<div class="dlab-post-title">
																	<h5 class="post-title"><a href="post-header-image.html">Anniversary With An Exhibition At Dallas Contemporary</a></h5>
																</div>
															</div>
														</div>
													</div>
													<div class="item">
														<div class="blog-post blog-sm">
															<div class="dlab-post-media">
																<a href="post-slide-show.html"><img src="images/category/pic4.jpg" alt=""></a>
															</div>
															<div class="dlab-post-info">
																<div class="dlab-post-title ">
																	<h5 class="post-title"><a href="post-slide-show.html">La Dolce Vita Meets Old School on Beach Style </a></h5>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div id="fashion" class="life-style-post-bx">
												<div class="header-blog-carousel owl-carousel owl-btn-center-lr">
													<div class="item">
														<div class="blog-post blog-sm">
															<div class="dlab-post-media">
																<a href="post-standart.html"><img src="images/category/pic1.jpg" alt=""></a>
															</div>
															<div class="dlab-post-info">
																<div class="dlab-post-title ">
																	<h5 class="post-title"><a href="post-standart.html">Ready or Not, the Return into of the Hobo Bag Is Nigh</a></h5>
																</div>
															</div>
														</div>
													</div>
													<div class="item">
														<div class="blog-post blog-sm">
															<div class="dlab-post-media">
																<a href="post-left-sidebar.html"><img src="images/category/pic2.jpg" alt=""></a>
															</div>
															<div class="dlab-post-info">
																<div class="dlab-post-title ">
																	<h5 class="post-title"><a href="post-left-sidebar.html">This Week on Instagram, Celebri ties Went All-In on Prints</a></h5>
																</div>
															</div>
														</div>
													</div>
													<div class="item">
														<div class="blog-post blog-sm">
															<div class="dlab-post-media">
																<a href="post-full-width.html"><img src="images/category/pic3.jpg" alt=""></a>
															</div>
															<div class="dlab-post-info">
																<div class="dlab-post-title">
																	<h5 class="post-title"><a href="post-header-image.html">Anniversary With An Exhibition At Dallas Contemporary</a></h5>
																</div>
															</div>
														</div>
													</div>
													<div class="item">
														<div class="blog-post blog-sm">
															<div class="dlab-post-media">
																<a href="post-slide-show.html"><img src="images/category/pic4.jpg" alt=""></a>
															</div>
															<div class="dlab-post-info">
																<div class="dlab-post-title ">
																	<h5 class="post-title"><a href="post-slide-show.html">La Dolce Vita Meets Old School on Beach Style </a></h5>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div id="travel" class="life-style-post-bx">
												<div class="header-blog-carousel owl-carousel owl-btn-center-lr">
													<div class="item">
														<div class="blog-post blog-sm">
															<div class="dlab-post-media">
																<a href="post-standart.html"><img src="images/category/pic1.jpg" alt=""></a>
															</div>
															<div class="dlab-post-info">
																<div class="dlab-post-title ">
																	<h5 class="post-title">Ready or Not, the Return into of the Hobo Bag Is Nigh</h5>
																</div>
															</div>
														</div>
													</div>
													<div class="item">
														<div class="blog-post blog-sm">
															<div class="dlab-post-media">
																<a href="post-left-sidebar.html"><img src="images/category/pic2.jpg" alt=""></a>
															</div>
															<div class="dlab-post-info">
																<div class="dlab-post-title ">
																	<h5 class="post-title"><a href="post-left-sidebar.html">This Week on Instagram, Celebri ties Went All-In on Prints</a></h5>
																</div>
															</div>
														</div>
													</div>
													<div class="item">
														<div class="blog-post blog-sm">
															<div class="dlab-post-media">
																<a href="post-full-width.html"><img src="images/category/pic3.jpg" alt=""></a>
															</div>
															<div class="dlab-post-info">
																<div class="dlab-post-title">
																	<h5 class="post-title"><a href="post-header-image.html">Anniversary With An Exhibition At Dallas Contemporary</a></h5>
																</div>
															</div>
														</div>
													</div>
													<div class="item">
														<div class="blog-post blog-sm">
															<div class="dlab-post-media">
																<a href="post-slide-show.html"><img src="images/category/pic4.jpg" alt=""></a>
															</div>
															<div class="dlab-post-info">
																<div class="dlab-post-title ">
																	<h5 class="post-title"><a href="post-slide-show.html">La Dolce Vita Meets Old School on Beach Style </a></h5>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</li>
							<li>
								<a href="javascript:void(0);">Shop<i class="fa fa-chevron-down"></i></a>
								<ul class="sub-menu">
									<li><a href="shop-product.html">Product</a></li>
									<li><a href="shop-product-details.html">Product Details</a></li>
									<li><a href="shop-cart.html">Cart</a></li>
									<li><a href="shop-checkout.html">Checkout</a></li>
								</ul>
							</li>
							<li>
								<a href="javascript:void(0);">Pages<i class="fa fa-chevron-down"></i></a>
								<ul class="sub-menu">
									<li><a href="about-me.html">About</a></li>
									<li><a href="archive.html">Archive</a></li>
									<li><a href="author.html">Author</a></li>
									<li><a href="category.html">Category</a></li>
									<li><a href="tags.html">Tags</a></li>
									<li><a href="search-results.html">Search results</a></li>
									<li><a href="coming-soon.html">Coming Soon</a></li>
									<li><a href="sitedown.html">Maintenance</a></li>
									<li><a href="error-404.html">Error 404</a></li>
								</ul>
							</li>
							<li><a href="contact-me.html">Contact</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
    </header>
    <!-- header END -->
    <!-- Content -->
    <div class="page-content bg-white">
		<!-- Product details -->
		<div class="container content-inner-1 woo-entry">
			<div class="row">
				<div class="col-md-5 col-lg-7">
					<div class="product-gallery">
						<div class="dlab-thum-bx">
							<img src="images/product/product/item1.jpg" alt="">
						</div>
					</div>
				</div>
				<div class="col-md-7 col-lg-5">
					<form method="post" class="cart sticky-top">
						<div class="dlab-post-title">
							<h3 class="post-title">Emerald Raincoat</h3>
							<h6 class="m-tb10 category">
								<strong class="shop-item-rating">
									<span class="rating-bx"> 
										<i class="fa fa-star"></i> 
										<i class="fa fa-star"></i> 
										<i class="fa fa-star"></i> 
										<i class="fa fa-star-o"></i> 
										<i class="fa fa-star-o"></i> 
									</span>
								</strong>
								<span class="title">3 Reviews</span>
							</h6>
							<h4 class="product-price">$140</h4>
						</div>
						<p class="m-b10">Integer leo turpis, dignissim eget massa nec, consectetur plac erat felis. Pra esent maximus cursus upretium. Prae sent vel massa libero. Aenean fer mentum ultrices quis similique.</p>
						<div class="dlab-divider bg-gray tb15"><i class="icon-dot c-square"></i></div>
						<div class="cart-select-box">
							<div class="select-box">
								<div class="title">Color</div>
								<select>
									<option>Select position</option>
									<option>blue</option>
									<option>red</option>
									<option>green</option>
									<option>orange</option>
									<option>white</option>
								</select>
							</div>
							<div class="select-box">
								<div class="title">Size</div>
								<select>
									<option>Select position</option>
									<option>Xl</option>
									<option>LG</option>
									<option>MD</option>
									<option>SM</option>
								</select>
							</div>
						</div>
						<div class="cart-info">
							<div class="info-bx">
								<div class="quantity btn-quantity style-1">
									<input id="demo_vertical2" type="text" value="01" name="demo_vertical2"/>
								</div>
							</div>
							<div class="info-bx cart-btn">
								<button class="btn secondry btn-block radius-no">Add to Cart</button>
							</div>
							<div class="info-bx">
								<a href="javascript:void(0)" class="like-btn"><i class="la la-heart-o"></i></a>
							</div>
						</div>
						<div class="shop-item-tage">
							<span>SKU: </span>
							<a href="javascript:void(0);">111-1570001</a>
						</div>
						<div class="shop-item-tage">
							<span>Category: </span>
							<a href="javascript:void(0);">Outerwear </a>
						</div>	
						<div class="shop-item-tage mb-5">
							<span>Tags: </span>
							<a href="javascript:void(0);">Women, </a>
							<a href="javascript:void(0);">Dress, </a>
							<a href="javascript:void(0);">Top</a>
						</div>
						<ul class="social-icon m-b0">
							<li><a href="javascript:void(0);" class="btn radius-xl"><i class="fa fa-instagram"></i></a></li>
							<li><a href="javascript:void(0);" class="btn radius-xl"><i class="fa fa-twitter"></i></a></li>
							<li><a href="javascript:void(0);" class="btn radius-xl"><i class="fa fa-facebook"></i></a></li>
							<li><a href="javascript:void(0);" class="btn radius-xl"><i class="fa fa-pinterest-p"></i></a></li>
							<li><a href="javascript:void(0);" class="btn radius-xl"><i class="fa fa-youtube-play"></i></a></li>
						</ul>
					</form>
				</div>
			</div>
		</div>
		<div class="container content-inner">
			<div class="row">
				<div class="col-lg-8 col-md-8">
					<div class="tabs product-description bg-tabs">
						<ul class="nav nav-tabs">
							<li><a data-toggle="tab" href="#web-design-1" class="nav-link active">Description</a></li>
							<li><a data-toggle="tab" href="#graphic-design-1" class="nav-link">Additional Info</a></li>
							<li><a data-toggle="tab" href="#developement-1" class="nav-link">Review</a></li>
						</ul>
						<div class="tab-content">
							<div id="web-design-1" class="tab-pane active">
								<p class="m-b10">Suspendisse et justo. Praesent mattis commyolk augue Aliquam ornare hendrerit augue Cras tellus In pulvinar lectus a est Curabitur eget orci Cras laoreet. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse et justo. Praesent mattis  commyolk augue aliquam ornare augue.</p>
								<p>"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences</p>
								<ul class="list-check primary">
									<li>"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and </li>
									<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </li>
								</ul>
							</div>
							<div id="graphic-design-1" class="tab-pane">
								<table class="table table-bordered" >
									<tr>
										<td>Size</td>
										<td>Small, Medium & Large</td>
									</tr>
									<tr>
										<td>Color</td>
										<td>Pink & White</td>
									</tr>
									<tr>
										<td>Rating</td>
										<td>
											<span class="rating-bx"> 
												<i class="fa fa-star"></i> 
												<i class="fa fa-star"></i> 
												<i class="fa fa-star"></i> 
												<i class="fa fa-star-o"></i> 
												<i class="fa fa-star-o"></i> 
											</span> 
										</td>
									</tr>
									<tr>
										<td>Waist</td>
										<td>26 cm</td>
									</tr>
									<tr>
										<td>Length</td>
										<td>40 cm</td>
									</tr>
									<tr>
										<td>Chest</td>
										<td>33 inches</td>
									</tr>
									<tr>
										<td>Fabric</td>
										<td>Cotton, Silk & Synthetic</td>
									</tr>
									<tr>
										<td>Warranty</td>
										<td>3 Months</td>
									</tr>
									<tr>
										<td>Chest</td>
										<td>33 inches</td>
									</tr>
								</table>
							</div>
							<div id="developement-1" class="tab-pane">
								<div id="comments">
									<ol class="commentlist">
										<li class="comment">
											<div class="comment_container"> 
												<img class="avatar avatar-60 photo" src="images/testimonials/pic1.jpg" alt="">
												<div class="comment-text">
													<div  class="star-rating">
														<div data-rating="3"> 
															<i class="fa fa-star text-yellow" data-alt="1" title="regular"></i> 
															<i class="fa fa-star text-yellow" data-alt="2" title="regular"></i> 
															<i class="fa fa-star-o text-yellow" data-alt="3" title="regular"></i> 
															<i class="fa fa-star-o text-yellow" data-alt="4" title="regular"></i> 
															<i class="fa fa-star-o text-yellow" data-alt="5" title="regular"></i> 
														</div>
													</div>
													<p class="meta"> 
														<strong class="author">Cobus Bester</strong> 
														<span><i class="fa fa-clock-o"></i> December 7, 2020</span> 
													</p>
													<div class="description">
														<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
													</div>
												</div>
											</div>
										</li>
										<li class="comment">
											<div class="comment_container"> 
												<img class="avatar avatar-60 photo" src="images/testimonials/pic2.jpg" alt="">
												<div class="comment-text">
													<div  class="star-rating">
														<div data-rating="3"> 
															<i class="fa fa-star text-yellow" data-alt="1" title="regular"></i> 
															<i class="fa fa-star text-yellow" data-alt="2" title="regular"></i> 
															<i class="fa fa-star text-yellow" data-alt="3" title="regular"></i> 
															<i class="fa fa-star-o text-yellow" data-alt="4" title="regular"></i> 
															<i class="fa fa-star-o text-yellow" data-alt="5" title="regular"></i> 
														</div>
													</div>
													<p class="meta"> 
														<strong class="author">Shailja Reddy</strong> 
														<span><i class="fa fa-clock-o"></i> August 28, 2020</span> 
													</p>
													<div class="description">
														<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
													</div>
												</div>
											</div>
										</li>
										<li class="comment">
											<div class="comment_container"> 
												<img class="avatar avatar-60 photo" src="images/testimonials/pic3.jpg" alt="">
												<div class="comment-text">
													<div  class="star-rating">
														<div data-rating="3"> 
															<i class="fa fa-star text-yellow" data-alt="1" title="regular"></i> 
															<i class="fa fa-star text-yellow" data-alt="2" title="regular"></i> 
															<i class="fa fa-star text-yellow" data-alt="3" title="regular"></i> 
															<i class="fa fa-star text-yellow" data-alt="4" title="regular"></i> 
															<i class="fa fa-star-o text-yellow" data-alt="5" title="regular"></i> 
														</div>
													</div>
													<p class="meta"> 
														<strong class="author">Joshua Weston</strong> 
														<span><i class="fa fa-clock-o"></i> July 18, 2020</span> 
													</p>
													<div class="description">
														<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
													</div>
												</div>
											</div>
										</li>
									</ol>
								</div>
								<div id="review_form_wrapper">
									<div id="review_form">
										<div id="respond" class="comment-respond comments-area" >
											<div class="section-head text-center">
												<span>Add a review</span>
											</div>
											<form class="comment-form" id="commentform" method="post">
												<div class="rating-widget">
													<div class="rating-stars">
														<ul id="stars">
															<li class="star" title="Poor" data-value="1">
																<i class="fa fa-star fa-fw"></i>
															</li>
															<li class="star" title="Fair" data-value="2">
																<i class="fa fa-star fa-fw"></i>
															</li>
															<li class="star" title="Good" data-value="3">
																<i class="fa fa-star fa-fw"></i>
															</li>
															<li class="star" title="Excellent" data-value="4">
																<i class="fa fa-star fa-fw"></i>
															</li>
															<li class="star" title="WOW!!!" data-value="5">
																<i class="fa fa-star fa-fw"></i>
															</li>
														</ul>
													</div>
												</div>
												<p class="comment-form-author">
													<label for="author">Name <span class="required">*</span></label>
													<input type="text" value="" placeholder="Name" id="author">
												</p>
												<p class="comment-form-email">
													<label for="email">Email <span class="required">*</span></label>
													<input type="text" value="" placeholder="Email" id="email">
												</p>
												<p class="comment-form-comment">
													<label for="comment">Comment</label>
													<textarea rows="8" placeholder="Your Review" id="comment"></textarea>
												</p>
												<p class="form-submit">
													<input type="submit" value="Submit" class="btn secondry radius-no" id="submit" name="submit">
												</p>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 m-b30">
					<div class="side-bar sticky-top">
						<div class="widget widget-vlog wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.4s">
							<h6 class="widget-title"><span>Top Products</span></h6>
							<div class="widget-carousel owl-carousel owl-dots-style2 owl-none owl-theme">
								<div class="item">
									<div class="post-box">
										<img src="images/product/product-item/item1.jpg" alt="">
									</div>
								</div>
								<div class="item">
									<div class="post-box">
										<img src="images/product/product-item/item2.jpg" alt="">
									</div>
								</div>
								<div class="item">
									<div class="post-box">
										<img src="images/product/product-item/item3.jpg" alt="">
									</div>
								</div>
								<div class="item">
									<div class="post-box">
										<img src="images/product/product-item/item4.jpg" alt="">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Product Section -->
		<!-- Instagram Post Carousel -->
		<div class="section-full insta-post-carousel owl-carousel owl-none wow fadeIn lightgallery" data-wow-duration="2s" data-wow-delay="0.6s">
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
		</div>
		<!-- Blog Card Carousel End -->
    </div>
    <!-- Content END-->
	<!-- Footer -->
    <footer class="site-footer wow fadeIn" data-wow-duration="2s" data-wow-delay="0.8s">
        <div class="footer-top">
            <div class="container">
				<div class="row">
					<div class="col-md-4 align-self-center">
						<ul class="footer-link m-b0 p-l0">
							<li><a href="index.html">Blog</a></li>
							<li><a href="about-me.html">Shop</a></li>
							<li><a href="contact-me.html">About</a></li>
						</ul>						
					</div>
					<div class="col-md-4">
						<div class="footer-logo">
							<a href="index.html"><img src="images/logo.png" alt=""/></a>
						</div>
					</div>
					<div class="col-md-4 align-self-center">
						<ul class="social-icon m-b0 p-l0">
							<li><a href="javascript:void(0);" class="btn radius-xl"><i class="fa fa-instagram"></i></a></li>
							<li><a href="javascript:void(0);" class="btn radius-xl"><i class="fa fa-twitter"></i></a></li>
							<li><a href="javascript:void(0);" class="btn radius-xl"><i class="fa fa-facebook"></i></a></li>
							<li><a href="javascript:void(0);" class="btn radius-xl"><i class="fa fa-youtube-play"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
        </div>
		<div class="footer-bottom">
			<div class="container">
				<p>© 2020. Copyright MyDiary Template.</p>
			</div>
		</div>
    </footer>
    <!-- Footer END-->
    <button class="scroltop fa fa-chevron-up" ></button>
</div>
<!-- JAVASCRIPT FILES ========================================= -->
<script src="js/jquery.min.js"></script><!-- JQUERY.MIN JS -->
<script src="plugins/wow/wow.js"></script><!-- WOW JS -->
<script src="plugins/bootstrap/js/popper.min.js"></script><!-- BOOTSTRAP.MIN JS -->
<script src="plugins/bootstrap/js/bootstrap.min.js"></script><!-- BOOTSTRAP.MIN JS -->
<script src="plugins/bootstrap-select/bootstrap-select.min.js"></script><!-- FORM JS -->
<script src="plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script><!-- FORM JS -->
<script src="plugins/magnific-popup/magnific-popup.js"></script><!-- MAGNIFIC POPUP JS -->
<script src="plugins/counter/waypoints-min.js"></script><!-- WAYPOINTS JS -->
<script src="plugins/counter/counterup.min.js"></script><!-- COUNTERUP JS -->
<script src="plugins/imagesloaded/imagesloaded.js"></script><!-- IMAGESLOADED -->
<script src="plugins/masonry/masonry-3.1.4.js"></script><!-- MASONRY -->
<script src="plugins/masonry/masonry.filter.js"></script><!-- MASONRY -->
<script src="plugins/owl-carousel/owl.carousel.js"></script><!-- OWL SLIDER -->
<script src="plugins/scroll/scrollbar.min.js"></script><!-- Scroll Bar -->
<script src="plugins/lightgallery/js/lightgallery-all.min.js"></script><!-- Lightgallery -->
<script src="js/custom.js"></script><!-- CUSTOM FUCTIONS  -->
<script src="js/dz.carousel.js"></script><!-- SORTCODE FUCTIONS -->
<script src="js/dz.ajax.js"></script><!-- CONTACT JS  -->
<script src="js/jquery.star-rating-svg.js"></script><!-- CONTACT JS  -->
</body>
</html>
<?php 
include 'footer.php'
?>