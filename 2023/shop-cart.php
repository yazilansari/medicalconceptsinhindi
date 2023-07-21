<?php 
include 'header.php'
?>
    <!-- header END -->
    <!-- Content -->
    <div class="page-content bg-white">
		<!-- Checkout Section -->
		<div class="section-full content-inner">
			<div class="container">
				<div class="section-head text-center">
					<span>Shopping Cart</span>
				</div>
				<div class="row">
					<div class="col-lg-8 col-md-8 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s">
						<div class="product-bx shopping-cart">
							<div class="product-item clearfix">
								<div class="product-img">
									<img src="images/product/pic1.jpg" alt="">
								</div>
								<div class="product-info">
									<ul>
										<li class="product-title"><a href="shop-product-details.html">T-shirt with Print</a></li>
										<li class="product-item-quantity">
											<div class="quantity btn-quantity style-1">
												<input id="demo_vertical2" type="text" value="01" name="demo_vertical2"/>
											</div>
										</li>
										<li class="product-price">$140</li>
										<li class="product-close"><a href="javascript:void(0);" class="la la-close"></a></li>
									</ul>
								</div>
							</div>
							<div class="product-item clearfix">
								<div class="product-img">
									<img src="images/product/pic2.jpg" alt="">
								</div>
								<div class="product-info">
									<ul>
										<li class="product-title"><a href="shop-product-details.html">Classic Men's Golf</a></li>
										<li class="product-item-quantity">
											<div class="quantity btn-quantity style-1">
												<input id="demo_vertical3" type="text" value="01" name="demo_vertical2"/>
											</div>
										</li>
										<li class="product-price">$94</li>
										<li class="product-close"><a href="javascript:void(0);" class="la la-close"></a></li>
									</ul>
								</div>
							</div>
							<ul class="checkout-list">
								<li class="costs-subtotal">SubTotal: <span class="price">$196</span></li>
								<li class="checked-costs">Shipping costs: <span class="price">$0</span></li>
								<li class="checked-total">Total: <span class="price">$196</span></li>
							</ul>
						</div>
						<form class="product-coupon-bx">
							<div class="row">
								<div class="form-group col-xl-6 col-lg-6 col-md-12 col-sm-6">
									<button class="btn outline radius-no black">Continue Shopping</button>
								</div>
								<div class="form-group col-xl-6 col-lg-6 col-md-12 col-sm-6">
									<button class="btn radius-no secondry float-right">Update Cart</button>
								</div>
							</div>
						</form>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12 col-12">
						<?php
						include 'sidebar.php';
						?>
					</div><!------col-4-end--->
				</div>
			</div>
		</div>
		<!-- Checkout Section End -->
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
include 'footer.php'
?>