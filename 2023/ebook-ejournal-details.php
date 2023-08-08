<?php 
include 'header.php';
if((!isset($_GET['id']) || empty($_GET['id'])) && (!isset($_GET['type']) || empty($_GET['type']))) {
	header('Location: index.php');exit();
}
$id = base64_decode($_GET['id']);
// echo $id;
$q = "SELECT `mch_sub_categories`.*, `mch_categories`.`name` AS `category_name` FROM `mch_sub_categories` LEFT JOIN `mch_categories` ON `mch_categories`.`id` = `mch_sub_categories`.`category_id` WHERE `mch_sub_categories`.`is_active` = 1 AND `mch_sub_categories`.`id` = $id";
$res = mysqli_query($conn, $q);
$row = mysqli_fetch_assoc($res);
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
							<span><?php echo $row['category_name']; ?></span>
						</div>													
					</div>					
				</div>
				<!------end--->
				<!-- Ebooks -->
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 allebooks">
						<div class="bookcover e-books headline">
							<h4><?php echo $row['name']; ?></h4>
							<hr>
								<?php if(!isset($_SESSION['reg_id']) && empty($_SESSION['reg_id'])) { ?>
							<!----<a href="#" class="registersubscribe" data-toggle="modal" data-target="#phoneotp1">Register For Membership</a>---->
							<a href="http://localhost/medicalconceptsinhindi/2023/registration.php?type=<?php echo $_GET['type']; ?>" class="registersubscribe">Register For Membership</a>
							<?php } else { ?>
							<?php if((!isset($_SESSION['payment']) && empty($_SESSION['payment'])) && (!isset($_SESSION['is_referral_code']) && empty($_SESSION['is_referral_code']))) { ?>
							<a href="http://localhost/medicalconceptsinhindi/2023/payment.php?type=<?php echo $_GET['type']; ?>" class="registersubscribe">Pay Now</a>
							<?php } else { ?>
							<!-- <a href="#" class="registersubscribe" onclick="paynow('ejournal-april-2023');">Pay Now</a> -->
							<a href="ebook/2023/Jun" class="registersubscribe">View Book</a>
							<?php } } ?>
							<div class="pdfindex">
								<?php if(!isset($_SESSION['reg_id']) && empty($_SESSION['reg_id'])) { ?>
								<p>	
									<a href="#" data-toggle="modal" data-target="#readarticle">
										<?php $q8 = "SELECT * FROM `mch_sub_category_images` WHERE `sub_category_id` = '".$row['id']."'";
											  $res8 = mysqli_query($conn, $q8); 
											  if(mysqli_num_rows($res8) > 0) {
												while ($row8 = mysqli_fetch_assoc($res8)) { ?>
													<img src="../uploads/assets/uploaded_data/subcategory_img/<?php echo $row8['image']; ?>">
										<?php } } ?>
									</a>
								</p>
								<?php } else { ?>
								<p>	
									<a href="#">
										<?php $q8 = "SELECT * FROM `mch_sub_category_images` WHERE `sub_category_id` = '".$row['id']."'";
											  $res8 = mysqli_query($conn, $q8); 
											  if(mysqli_num_rows($res8) > 0) {
												while ($row8 = mysqli_fetch_assoc($res8)) { ?>
													<img src="../uploads/assets/uploaded_data/subcategory_img/<?php echo $row8['image']; ?>">
										<?php } } ?>
									</a>
								</p>
								<?php } ?>							
							</div>
						
							<!-- <p class="mb-0">Jan 2023</p>
							<img src="images/book-cover2.jpg" alt="">
							<a href="#">Buy Now</a>
							<a href="#" class="phonemodal" data-toggle="modal" data-target="#phoneotp1"></a> -->
						</div>
						<!-- <div class="bookcover">
						<a href="#" class="registersubscribe" data-toggle="modal" data-target="#phoneotp1">Register For Membership</a>
						</div> -->	
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