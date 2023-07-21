<div class="row clearfix">

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h2><?= $pg_title ?></h2>
			</div>

		<div class="body">

				<?php echo form_open("$controller/save",array('id'=>'save-form')); ?>
             
               <label for="contributors_name">Contributors Name</label>
				<div class="form-group">
                    <div class="form-line">
						 <input type="text" id="contributors_name" name="contributors_name" class="form-control" autocomplete="off" maxlength="250">
					</div>
				</div>

                 <label for="contributors_designation">Contributors Designation</label>
                <div class="form-group">
                    <div class="form-line">
                       <input type="text" id="contributors_designation" name="contributors_designation" class="form-control" autocomplete="off" maxlength="250">
                    </div>
                </div>

               <label class="form-label">Contributors Image (jpg, jpeg, png)</label>
                <div class="input-group">
                    <div class="form-line">
                        <input type="file" id="contributors_image" name="contributors_image" class="form-control" >
                    </div>
                </div>



                 <label for="contributors_data">Contributors Data</label>
                <div class="form-group">
                    <div class="form-line">
                        <textarea id="contributors_data" name="contributors_data" class="form-control"></textarea>
                    </div>
                </div>



              <br>

                <input type="submit" class="btn btn-primary m-t-15 waves-effect" value="Save" />

                <a href="<?php echo base_url("$controller/lists?c=$timestamp") ?>" class="btn btn-danger m-t-15 waves-effect">Cancel</a>
				<?php echo form_close(); ?>

			</div>



		</div>
	</div>
</div>