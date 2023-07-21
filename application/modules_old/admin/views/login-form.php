<?php echo form_open('admin/submit',array('class'=>'form-login')); ?>
	<div class="msg"><img src="<?php echo base_url();?>assets/images/user-img-background_old.jpg" class="image_size"></div>
	<div class="msg">Sign in</div>
	<div class="login-wrap">

		<?php if( !empty($error_msg) || !empty(validation_errors()) ) : ?>
		<div class="alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
			<?php echo validation_errors(); ?>
			<?php echo (!empty($error_msg)) ? '<p>' . $error_msg . '</p>' : '' ?>
		</div>
		<?php endif; ?>
		
		<div class="input-group">
			<span class="input-group-addon">
				<i class="material-icons">person</i>
			</span>
			<div class="form-line">
				<input type="text" name="username" class="form-control" placeholder="Username" autofocus value="<?php echo set_value('username') ?>" />
			</div>
        </div>
		
		<div class="input-group">
			<span class="input-group-addon">
				<i class="material-icons">lock</i>
			</span>
			<div class="form-line">
				<input name="password" type="password" class="form-control" placeholder="Password" />
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-8 p-t-5">&nbsp;</div>
		<div class="col-xs-4">
			<button class="btn btn-block bg-<?php echo $active_theme ?> waves-effect" type="submit">SIGN IN</button>
		</div>
	</div>
<?php form_close(); ?>
			