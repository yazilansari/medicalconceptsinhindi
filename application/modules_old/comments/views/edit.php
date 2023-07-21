<div class="row clearfix">

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h2><?= $pg_title ?></h2>
			</div>
			
			<div class="body">
			<?php if(sizeof($info)) : ?>
				
				<?php echo form_open("$controller/modify",array('id'=>'save-form')); ?>
               	<input type="hidden" name="contributors_id" value="<?php echo $info[0]->contributors_id; ?>"/>


	 			<label class="form-label">Contribution Name<span class="required">*</span></label>
				<div class="input-group">
                    <div class="form-line">
                        <input type="text" id="contributors_name" name="contributors_name" class="form-control" autocomplete="off" maxlength="250" value="<?php echo $info[0]->contributors_name; ?>">
                    </div>
                </div> 

               

                <label class="form-label">Contribution Designation<span class="required">*</span></label>
				<div class="input-group">
                    <div class="form-line">
                        <input type="text" id="contributors_designation" name="contributors_designation" class="form-control" autocomplete="off" maxlength="250" value="<?php echo $info[0]->contributors_designation; ?>">
                    </div>
                </div> 

                  <label class="form-label">Image (jpg, jpeg, png)</label>
                <div class="input-group">
                    <div class="form-line">
                        <input type="file" id="contributors_image" name="contributors_image" class="form-control" >
                        <?php if($info[0]->contributors_image != ""){ ?>
							<img style="width:50px;height:50px;" src="<?php echo $info[0]->contributors_image?>">
                        <?php }?>
                         
                    </div>
                </div>

                <label class="form-label">Contribution Data<span class="required">*</span></label>
				<div class="input-group">
                    <div class="form-line">
                        <textarea id="contributors_data" name="contributors_data" class="form-control"><?php echo $info[0]->contributors_data; ?></textarea>
                    </div>
                </div> 

              

                <br>

								
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