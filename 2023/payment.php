<?php
if(isset($_GET['type']) && !empty($_GET['type']))  {
	$base_decode = base64_decode($_GET['type']);
	if($base_decode == 'ebook' || $base_decode == 'ejournal' || $base_decode == 'health video') {
		$base_encode = $_GET['type'];
	} else {
		header('Location: index.php?msg=Invalid Type');exit();
	}
}
include 'header.php';
include 'handler/conn.php';
$id = $_SESSION['reg_id'];
$_SESSION['type'] = $base_decode;
// print_r($_SESSION);
$q = "SELECT * FROM mch_registration WHERE `id` = '$id'";
// echo $q;die();
    $res = mysqli_query($conn, $q);
    if(mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
        	// echo "<pre>";print_r($row);
        	$name = $row['name'];
        	$address = $row['address'];
        	$city = $row['city'];
        	$state = $row['state'];
        	$pincode = $row['pincode'];
        	$mobile = $row['mobile'];
        	$email = $row['email'];
        }
    }
?>
<!-- header END -->
<div class="modal fade subscribe-modal-bx" id="registrationmssg" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content subscribe-form popupphonecss">
			<div class="modal-header">
				<div class="sub-title phonecolor">
					<!-- <h3 class="title"></h3> -->
					<!-- <p>check your mobile for the otp</p> -->
				</div>
				<!-- <button type="button" class="close phoneclose" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button> -->
			</div>
			<div class="modal-body okthanks">				
				<div class="row">
					<div class="col-md-12">
						<div class="thankyu">
							<p><i class="fa fa-check-square" aria-hidden="true"></i> Thank you for submitting form details.</p>
							<a href="#" id="ok" onclick="window.location.href='payment.php?type=<?php echo $base_encode; ?>'" data-dismiss="modal">Ok</a>
						</div>
					</div>
				</div>				
			</div>
		</div>
	</div>
</div>
<!------END----->
    <!-- Content -->
    <div class="page-content bg-white">
		<!-- Post Standart -->
		<div class="section-full content-inner bg-white">
			<div class="container">
				<div class="row">					
					<!-- Form -->
					<div class="col-lg-12 col-md-12">						
						<div class="section-head newuser text-center">
							<span>Payment Form</span>
						</div>

						<div class="registernow">
							<form method="POST" name="customerData" action="CCAvenue/ccavRequestHandler.php">
								<div class="row">
									<input type="hidden" name="tid" id="tid" />
									<input type="hidden" name="merchant_id" value="2305330"/>
									<input type="hidden" name="order_id" id="order_id"/>
									<input type="hidden" name="amount" value="100.00"/>
									<input type="hidden" name="currency" value="INR"/>
									<input type="hidden" name="redirect_url" value="https://medicalconceptsinhindi.in/2023/CCAvenue/ccavResponseHandler.php"/>
									<input type="hidden" name="cancel_url" value="https://medicalconceptsinhindi.in/2023/CCAvenue/ccavResponseHandler.php"/>
									<!-- <input type="hidden" name="type" value="<?php echo $type; ?>"/> -->
			 						<input type="hidden" name="language" value="EN"/>
		        					Billing Name: <input type="text" name="billing_name" value="<?php echo $name; ?>" required/>
		        					Billing Address: <textarea name="billing_address" required><?php echo $address; ?></textarea>
		        					Billing City: <input type="text" name="billing_city" value="<?php echo $city; ?>" required/>
		        					Billing State: <input type="text" name="billing_state" value="<?php echo $state; ?>" required/>
		        					Billing Zip: <input type="text" name="billing_zip" value="<?php echo $pincode; ?>" required/>
		        					Billing Country: <input type="text" name="billing_country" value="India" required/>
		        					Billing Mobile: <input type="number" name="billing_tel" value="<?php echo $mobile; ?>" required/>
		        					Billing Email: <input type="EMAIL" name="billing_email" value="<?php echo $email; ?>" required/>
		        					<input type="hidden" name="delivery_name" value="<?php echo $name; ?>"/>
		        					<input type="hidden" name="delivery_address" value="<?php echo $address; ?>"/>
		        					<input type="hidden" name="delivery_city" value="<?php echo $city; ?>"/>
		        					<input type="hidden" name="delivery_state" value="<?php echo $state; ?>"/>
		        					<input type="hidden" name="delivery_zip" value="<?php echo $pincode; ?>"/>
		        					<input type="hidden" name="delivery_country" value="India"/>
		        					<input type="hidden" name="delivery_tel" value="<?php echo $mobile; ?>"/>
		        					<input type="hidden" name="delivery_email" value="<?php echo $email; ?>"/>
		        					<div class="col-md-12">
										<input type="submit" value="SUBMIT" name="submit">
										<!-- <a href="#" data-toggle="modal" data-target="#registrationmssg">SUBMIT</a> -->
									</div>
								</div>
							</form>
						</div>								
					</div>
					<!-- Form END -->
				</div><!------col-8-end--->
				</div>
			</div>
		</div>
		<!-- Post Standart End -->
		<!-- Instagram Post Carousel -->
		
		<!-- Blog Card Carousel End -->
    </div>
    <!-- Content END-->
<!-- Footer -->
<?php 
include 'footer.php';
?>