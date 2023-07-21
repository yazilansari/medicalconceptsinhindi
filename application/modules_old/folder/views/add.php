<div class="row clearfix">

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h2><?= $pg_title ?></h2>
			</div>

		<div class="body">

				<?php echo form_open("$controller/save",array('id'=>'save-form')); ?>
                <label for="main_category_id">Main Category Name<span class="required">*</span></label>
                <div class="form-group">
                    <div class="form-line">
                        <select name="main_category_id" class="form-control" data-placeholder="Select Main Category" id="main_category_id">
                            <option></option>
                        </select>
                    </div>
                </div>
             
               <label for="category_id">Category Name</label>
                <div class="form-group">
                    <div class="form-line">
                        <select name="category_id" class="form-control" data-placeholder="Select Category" id="category_id">
                            <option></option>
                        </select>
                    </div>
                </div>

                <label class="form-label">Folder Name<span class="required">*</span></label>
                <div class="input-group">
                    <div class="form-line">
                        <input type="text" id="folder_name" name="folder_name" class="form-control" autocomplete="off" maxlength="250">
                    </div>
                </div>

                <label class="form-label">Thumbnail File<span class="required">*</span></label>
                <div class="input-group">
                    <div class="form-line">
                        <input type="file" id="thumbnail" name="thumbnail" class="form-control" >
                    </div>
                </div> 
                <br>

                <input type="submit" class="btn btn-primary m-t-15 waves-effect" value="Save" />

                <a href="<?php echo base_url("$controller/lists") ?>" class="btn btn-danger m-t-15 waves-effect">Cancel</a>
				<?php echo form_close(); ?>

			</div>



		</div>
	</div>
</div>
<script type="text/javascript">
    var type='add';
</script>