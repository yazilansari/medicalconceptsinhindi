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
							<a href="#" id="ok" onclick="window.location.href='index.php'" data-dismiss="modal">Ok</a>
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
							<span>Registration Form</span>
						</div>

						<div class="registernow">
							<form method="POST" action="handler/register_handler.php">
								<div class="row">
									<p id="duplicate" style="color: red; display: none;">Mobile Number or Email Id Already Exist.</p>
									<p id="invalid_referral_code" style="color: red; display: none;">Referral Code is Invalid. Try Different One.</p>
									<p id="expired_referral_code" style="color: red; display: none;">Referral Code is Expired.</p>
									<div class="col-md-12">
										<label>Name:</label>
										<input type="text" name="name" required>
										<input type="hidden" name="type" value="<?php echo $base_decode; ?>">
									</div>
									
									<div class="col-md-12">
										<label>Designation:</label>
										<select name="designation" required>
											<option value="">Select Option</option>
											<option>Student</option>
											<option>Resident</option>
											<option>Faculty</option>
											<option>Practitioner</option>
										</select>
									</div>

									<div class="col-md-6">
										<label>Email Id:</label>
										<input type="email" name="email" required>
									</div>
									<div class="col-md-6">
										<label>Mobile no:</label>
										<input type="text" name="mobile" title="Only Number ALlowed/Max 10 Digits Allowed/First Digit is Not 0" pattern="[1-9]{1}[0-9]{9}" required>
									</div>
									
									<div class="col-md-6" id="yess" style="display:none;">
										<label>Enter your referral code:</label>
										<input type="text" id="referral_code" name="referral_code">
									</div>
									
                                    <div class="col-md-6">
										<label>City:</label>
										<input type="text" name="city" required>
									</div> 
									<div class="col-md-6">
										<label>State:</label>
										<input type="text" name="state" required>
									</div>
									<div class="col-md-6">
										<label>Pincode:</label>
										<input type="text" name="pincode" required>
									</div>
									
									<div class="col-md-12">
										<label>Address:</label>
										<textarea name="address"></textarea> 
										<!-- <a href="#" data-toggle="modal" data-target="#registrationmssg">SUBMIT</a> -->
									</div>
									<div class="col-md-6">
										<div class="membership">
										<label>Amount:</label>
										<p><img src="images/rupees-symbol.png">100</p>	
										</div>	
									</div>

									<div class="col-md-6">
										<label>Do you have referral code:</label>
										<div class="row">
											<div class="col-md-4 referral" onclick="showpreview()">
												<label><input type="radio" name="is_referral_code" value="Yes" required> Yes</label>	
											</div>

											<div class="col-md-4 referral" onclick="hidepreview()">
												<label><input type="radio" name="is_referral_code" value="No" required> No</label>	
											</div>
										</div>
									</div>
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