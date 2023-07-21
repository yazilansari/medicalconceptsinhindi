<?php 
include 'header.php'
?>
<?php
include 'popupform-article.php';
?>
    <!-- header END -->
    <!-- Content -->
    <div class="page-content bg-white">
		<!-- Post Standart -->
		<div class="section-full content-inner bg-white">
			<div class="container">
				<!-----heading--->
				<div class="row">					
					<div class="col-lg-12 col-md-12">						
						<div class="section-head newuser text-center">
							<span>E Journals</span>
						</div>													
					</div>					
				</div>
				<!------end--->
				<!-- Ebooks -->
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 allebooks">
						<div class="bookcover e-books headline">
							<h4>Punarnava Sep 2022</h4>
							<hr>
	                        <?php if(!isset($_SESSION['reg_id']) && empty($_SESSION['reg_id'])) { ?>
							<!----<a href="#" class="registersubscribe" data-toggle="modal" data-target="#phoneotp1">Register For Membership</a>----->
							<a href="https://medicalconceptsinhindi.in/2023/registration.php?type=ZWpvdXJuYWw=" class="registersubscribe">Register For Membership</a>
							<?php } else { ?>
							<?php if((!isset($_SESSION['payment']) && empty($_SESSION['payment'])) && (!isset($_SESSION['is_referral_code']) && empty($_SESSION['is_referral_code']))) { ?>
							<a href="http://localhost/medicalconceptsinhindi/2023/payment.php?type=ZWpvdXJuYWw=" class="registersubscribe">Pay Now</a>
							<?php } else { ?>
							<!-- <a href="#" class="registersubscribe" onclick="paynow('ejournal-sep-2022');">Pay Now</a> -->
							<a href="ebook/2022/Sept" class="registersubscribe">View Book</a>
							<?php } } ?>
							<div class="pdfindex">
								<?php if(!isset($_SESSION['reg_id']) && empty($_SESSION['reg_id'])) { ?>
								<p>	
									<a href="#" data-toggle="modal" data-target="#readarticle">
										<img src="images/ejournals/15-sep-2022_Page_1.jpg">								
										<img src="images/ejournals/15-sep-2022_Page_2.jpg">
									</a>								
								</p>
								<?php } else { ?>
								<p>	
									<a href="#">
										<img src="images/ejournals/15-sep-2022_Page_1.jpg">								
										<img src="images/ejournals/15-sep-2022_Page_2.jpg">
									</a>								
								</p>
								<?php } ?>
							</div>
						
							<!-- <p class="mb-0">Jan 2023</p>
							<img src="images/book-cover2.jpg" alt="">
							<a href="#">Buy Now</a>
							<a href="#" class="phonemodal" data-toggle="modal" data-target="#phoneotp1"></a> -->
						</div>
					</div>					
				</div>
				<!------end--->
			</div>
		</div>
	</div>
		<!-- Post Standart End -->
<!-- Footer -->
<?php 
include 'footer.php'
?>