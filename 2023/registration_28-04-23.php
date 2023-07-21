<?php 
include 'header.php'
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
				<button type="button" class="close phoneclose" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body okthanks">				
				<div class="row">
					<div class="col-md-12">
						<div class="thankyu">
							<p><i class="fa fa-check-square" aria-hidden="true"></i> Thank you for submitting form details.</p>
							<a href="#" data-dismiss="modal">Ok</a>
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
							<form>
								<div class="row">
									<div class="col-md-12">
										<label>Name:</label>
										<input type="text" name="" required>
									</div>
									
									<div class="col-md-12">
										<label>Designation:</label>
										<select>
											<option style="display:none;">Select Option</option>
											<option>Student</option>
											<option>Resident</option>
											<option>Faculty</option>
											<option>Practitioner</option>
										</select>
									</div>

									<div class="col-md-6">
										<label>Email Id:</label>
										<input type="email" name="" required>
									</div>
									<div class="col-md-6">
										<label>Mobile no:</label>
										<input type="number" name="" oninput="maxLengthCheck(this)" maxlength="10" required="">
									</div>

									<!-- <div class="col-md-6">
										<label>State:</label>
										<input type="text" name="" required>
									</div>
									<div class="col-md-6">
										<label>City:</label>
										<input type="number" name="" required>
									</div> -->
									<div class="col-md-12">
										<!-- <label>Address:</label>
										<textarea></textarea> -->
										<!-- <input type="submit" value="SUBMIT" name=""> -->
										<a href="#" data-toggle="modal" data-target="#registrationmssg">SUBMIT</a>
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
include 'footer.php'
?>