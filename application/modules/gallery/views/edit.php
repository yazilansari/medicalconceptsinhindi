<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h2><?= $pg_title ?></h2>
			</div>
			
			<div class="body">
			<?php if(sizeof($info)) : ?>
				<?php echo form_open("$controller/modify",array('id'=>'save-form')); ?>
               	<input type="hidden" name="id" value="<?php echo $info[0]->id; ?>" />
               	<!-- <input type="hidden" name="main_category_id_1" value="<?php echo $info[0]->parent_category_id; ?>" /> -->
               	
				<!-- <label for="main_category_id">Main Category Name<span class="required">*</span></label>
                <div class="form-group">
                    <div class="form-line">
                        <select name="main_category_id" class="form-control" data-placeholder="Select Main Category" id="main_category_id">
                            <option></option>
                            <?php if($info[0]->main_category_id!=""){?>
                                <option value="<?php echo $info[0]->main_category_id?>" selected="selected"><?php echo $info[0]->main_category_name;?></option>                           
                            <?php }?>
                        </select>
                    </div>
                </div> -->
				
				<label for="upload_title">Title</label>
				<div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" id="upload_title" name="upload_title" class="form-control" autocomplete="off" value="<?php echo $info[0]->title; ?>">
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
<script type="text/javascript">
    var type='edit';
</script>