<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h2><?= $pg_title ?></h2>
			</div>

			<div class="body">
				<?php echo form_open("$controller/save",array('id'=>'save-form')); ?>
				<input type="hidden" name="u_type" value="<?php echo $u_type ?>">

				<label class="form-label">ZSM<span class="required">*</span></label>
				<div class="form-group">
                    <div class="form-line">
						<select name="parent_id" class="form-control" data-placeholder="Select ZSM" id="reporting-mgr" data-role="zsm">
							<option></option>
						</select>
					</div>
				</div>

				<label class="form-label">Zone<span class="required">*</span></label>
				<div class="form-group">
					<div class="form-line">
						<input type="text" name="zone_name" class="form-control fill" disabled="disabled" />
						<input type="hidden" name="users_zone_id" value="" class="fill" />
					</div>
				</div>

				<label class="form-label">Region<span class="required">*</span></label>
				<div class="form-group">
					<div class="form-line">
						<select name="users_region_id" class="form-control" data-placeholder="Select Region" id="region_id">
							<option></option>
						</select>
						<input type="hidden" name="user_record" />
					</div>
				</div>

				<label class="form-label">Division<span class="required">*</span></label>
				<div class="form-group">
                    <div class="form-line">
						<!-- <select name="users_division_id" class="form-control" data-placeholder="Select Division" id="division_id">
							<option></option>
						</select>
						<input type="hidden" name="user_record" /> -->
						<input type="text" name="division_name" class="form-control fill" disabled="disabled" />
						<input type="hidden" name="users_division_id" value="" class="fill" />
					</div>
				</div>

				<label class="form-label"><?php echo strtoupper($u_type) ?> Name<span class="required">*</span></label>
				<div class="form-group">
                    <div class="form-line">
						<input type="text" name="users_name" class="form-control" />
					</div>
				</div>

				<label class="form-label"><?php echo strtoupper($u_type) ?> Mobile<span class="required">*</span></label>
				<div class="form-group">
                    <div class="form-line">
						<input type="text" name="users_mobile" class="form-control" maxlength="10" />
					</div>
				</div>

				<input type="submit" class="btn btn-primary m-t-15 waves-effect" value="Save" />

                <a href="<?php echo base_url("$controller/lists/all/$u_type?c=$timestamp") ?>" class="btn btn-danger m-t-15 waves-effect">Cancel</a>
				
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>