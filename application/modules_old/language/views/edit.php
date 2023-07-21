<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h2><?= $pg_title ?></h2>
			</div>
			
			<div class="body">
			<?php if(sizeof($info)) : ?>
				<?php echo form_open("$controller/modify",array('id'=>'save-form')); ?>
               	<input type="hidden" name="language_id" value="<?php echo $info[0]->language_id; ?>" />

				<label class="form-label">Language Name</label>
				<div class="form-group">
                    <div class="form-line">
                        <input type="text" id="language_name" name="language_name" class="form-control" autocomplete="off" value="<?php echo $info[0]->language_name; ?>">
                    </div>
                </div>

				<label class="form-label">Language Code</label>
				<div class="form-group">
                    <div class="form-line">
                        <input type="text" id="language_code" name="language_code" class="form-control" autocomplete="off" maxlength="2" value="<?php echo $info[0]->language_code; ?>">
                    </div>
                </div>

                <input type="submit" class="btn btn-primary m-t-15 waves-effect" value="Save" />

                <a href="<?php echo base_url("$controller/lists?c=$timestamp") ?>" class="btn btn-danger m-t-15 waves-effect">Cancel</a>
				<?php echo form_close(); ?>
			<?php else: ?>
				<h4 class="mb">No Record Found !!!</h4>
			<?php endif; ?>
			</div>
		</div>
	</div>
</div>