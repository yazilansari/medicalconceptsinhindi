<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h2><?= $pg_title ?></h2>
			</div>

			<div class="body">
				<?php echo form_open("$controller/save_new",array('id'=>'save-form')); ?>
				<label for="main_category_id">Main Category Name<span class="required">*</span></label>
                <div class="form-group">
                    <div class="form-line">
                        <select name="main_category_id" class="form-control" data-placeholder="Select Main Category" id="main_category_id">
                            <option></option>
                        </select>
                    </div>
                </div>
				<label for="category_name">Category Name</label>
				<div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" id="category_name" name="category_name" class="form-control" autocomplete="off" value="">
                    </div>
                </div>
				<input type="submit" class="btn btn-primary m-t-15 waves-effect" value="Save" />

                <a href="<?php echo base_url("$controller/lists_new?c=$timestamp") ?>" class="btn btn-danger m-t-15 waves-effect">Cancel</a>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
    var type='add';
</script>