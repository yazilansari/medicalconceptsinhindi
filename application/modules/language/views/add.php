<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h2><?= $pg_title ?></h2>
			</div>

			<div class="body">
				<?php echo form_open("$controller/save",array('id'=>'save-form')); ?>
                <label class="form-label">Language Name</label>
				<div class="form-group">
                    <div class="form-line">
                        <input type="text" id="language_name" name="language_name" class="form-control" autocomplete="off">
                    </div>
                </div>

				<label class="form-label">Language Code</label>
				<div class="form-group">
                    <div class="form-line">
                        <input type="text" id="language_code" name="language_code" class="form-control" autocomplete="off" maxlength="2">
                    </div>
                </div>

                <input type="submit" class="btn btn-primary m-t-15 waves-effect" value="Save" />

                <a href="<?php echo base_url("$controller/lists?c=$timestamp") ?>" class="btn btn-danger m-t-15 waves-effect">Cancel</a>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>