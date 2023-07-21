<div class="col-xs-12 map-section">
	<img src="<?php echo base_url();?>front_assets/images/contact.jpg">
</div><!-- Map Section /- -->

<!-- Contact Form -->
<div class="col-sm-6 col-xs-12">
	<div class="contact-form" id="contact_123">
		<h3>Send Us An E-mail</h3>
		
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Your Name *" name="contact_name" id="contact_name" />
			</div>
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Your E-Mail*" name="contact_email" id="contact_email"  />
			</div>
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Mobile Number" name="contact_number" id="contact_number" />
			</div>
			<div class="form-group">
				<textarea class="form-control" placeholder="Message" name="contact_message" id="contact_message"></textarea>
			</div>
			<div class="clearfix"></div>
			<input name="submit" class="submit btn btn-warning" value="Send Message" type="submit"/>

			<div class="clearfix"></div>
			<div style="display: none;" id="contact_success">
				<h4>Thank You for Contacting Us!!</h4>
			</div>
		
	</div>
</div><!-- Contact Form /- -->
<!-- Contact Details -->
<div class="col-sm-6 col-xs-12">
	<div class="contact-detail">
		<h3>Visit Us</h3>
		<p><?php echo $this->config->item('title');?></p>
		<div class="detail-box">
			<p><i class="fa fa-map-marker"></i><?php echo $address['name'];?></p>
			<p><i class="fa fa-facebook"></i>Facebook : <a href="<?php echo $facebook['url'];?>"><?php echo $facebook['name'];?></a></p>
			<p><i class="fa fa-envelope-o"></i>E-mail : <a href="<?php echo $mail['url'];?>"><?php echo $mail['name'];?></a></p>
		</div>
	</div>
</div>