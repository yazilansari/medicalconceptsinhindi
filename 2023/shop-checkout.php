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
					<span>Checkout</span>
				</div>
				<div class="row checkout-bx">
					<div class="col-lg-6 m-b30">
						<h5 class="title-head"><span>Billing details</span></h5>
						<form class="billing-detail">
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group"> 
										<label>First name </label>
										<input required="required" class="form-control">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label>Last name </label>
										<input required="required" class="form-control">
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group"> 
										<label>Company name </label>
										<input required="required" class="form-control">
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group"> 
										<label>Country </label>
										<select>
											<option>Select a country...</option>
											<option>Usa</option>
											<option>India</option>
											<option>China</option>
										</select>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group"> 
										<label>Street address </label>
										<input required="required" class="form-control" placeholder="House number and street name">
										<input required="required" class="form-control" placeholder="Apartment, suite, unit etc.">
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<label>Town / City </label>										
										<input required="required" class="form-control">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group"> 
										<label>State / County </label>	
										<input required="required" class="form-control">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group"> 
										<label>Postcode / ZIP</label>	
										<input required="required" class="form-control">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group"> 
										<label>Phone </label>	
										<input required="required" class="form-control">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group"> 
										<label>Email address </label>	
										<input required="required" class="form-control">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-check">
										<input type="checkbox" class="form-check-input" id="exampleCheck1">
										<label class="form-check-label" for="exampleCheck1">Create an account?</label>
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="col-lg-6 m-b30">
						<h5 class="title-head"><span>Additional information</span></h5>
						<form class="additional-info">
							<div class="form-group"> 
								<label>Order notes </label>	
								<textarea class="form-control" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
							</div>
						</form>
						<h5 class="title-head"><span>Your order</span></h5>
						<div class="product-bx widget widget-product">
							<div class="product-item clearfix">
								<div class="product-img">
									<img src="images/product/pic1.jpg" alt="">
								</div>
								<div class="product-info">
									<ul>
										<li class="product-title"><a href="shop-product-details.html">Emerald Raincoat</a></li>
										<li class="product-quality">x1</li>
										<li class="product-price">$140</li>
									</ul>
								</div>
							</div>
							<div class="checkout-list clearfix">
								<ul class="checkout-title">
									<li class="title">Total</li>
									<li class="price">$140</li>
								</ul>
							</div>
						</div>
						<div class="order-pay-bx">
							<h5 class="title-head"><span>Payment method</span></h5>
							<form>
								<div class="form-group">
									<div class="custom-control custom-radio">
										<input type="radio" class="custom-control-input" id="cheque-payment" name="example1">
										<label class="custom-control-label" for="cheque-payment">Cheque Payment</label>
										<p>Please send your cheque Store Name, Store Street, Store Town, Store State County, Store Postcode.</p>
									</div>
									<div class="custom-control custom-radio">
										<input type="radio" class="custom-control-input" id="paypal" name="example1">
										<label class="custom-control-label" for="paypal"> PayPal</label>
									</div>
									<button class="btn btn-block m-t30 radius-no secondry">Place Order</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Checkout Section End -->
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
<?php 
include 'footer.php'
?>