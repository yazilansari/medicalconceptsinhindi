<div class="row clearfix">

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h2><?= $pg_title ?></h2>
			</div>
			
			<div class="body">
			<?php if(sizeof($info)) : ?>
				
				<?php echo form_open("$controller/modify_new",array('id'=>'save-form')); ?>
               	<input type="hidden" name="id" value="<?php echo $info[0]->id; ?>"/>


	 			<label class="form-label">Contribution Name<span class="required">*</span></label>
				<div class="input-group">
                    <div class="form-line">
                        <input type="text" id="contributors_name" name="contributors_name" class="form-control" autocomplete="off" maxlength="250" value="<?php echo $info[0]->name; ?>">
                    </div>
                </div> 

               

                <label class="form-label">Contribution Designation<span class="required">*</span></label>
				<div class="input-group">
                    <div class="form-line">
                        <input type="text" id="contributors_designation" name="contributors_designation" class="form-control" autocomplete="off" maxlength="250" value="<?php echo $info[0]->designation; ?>">
                    </div>
                </div> 

                  <label class="form-label">Image (jpg, jpeg, png)</label>
                <div class="input-group">
                    <div class="form-line">
                        <input type="file" id="contributors_image" name="contributors_image" class="form-control" >
                        <?php if($info[0]->image != ""){ ?>
							<img style="width:50px;height:50px;" src="<?php echo $info[0]->image_path?>">
                        <?php }?>
                         
                    </div>
                </div>

                <label class="form-label">Contribution Data<span class="required">*</span></label>
				<div class="input-group">
                    <div class="form-line">
                        <textarea id="contributors_data" name="contributors_data" class="form-control"><?php echo str_replace('\r\n', '', $info[0]->data); ?></textarea>
                    </div>
                </div> 

                <label class="form-label">Meta Title </label>
                <div class="input-group">
                    <div class="form-line">
                        <input type="text" id="meta_title" name="meta_title" class="form-control" autocomplete="off" value="<?php if(!empty($info)){ echo $info[0]->meta_title;}?>">
                    </div>
                </div>
                <label class="form-label">Meta Description </label>
                <div class="input-group">
                    <div class="form-line">
                        <input type="text" id="meta_description" name="meta_description" class="form-control" autocomplete="off" value="<?php if(!empty($info)){ echo $info[0]->meta_description;}?>">
                    </div>
                </div>
                <label class="form-label">Meta Keywords </label>
                <div class="input-group">
                    <div class="form-line">
                        <input type="text" id="meta_keyword" name="meta_keyword" class="form-control" autocomplete="off" value="<?php if(!empty($info)){ echo $info[0]->meta_keyword;}?>">
                    </div>
                </div>
                <label class="form-label">Meta Post Url </label>
                <div class="input-group">
                    <div class="form-line">
                        <input type="text" id="meta_post_url" name="meta_post_url" class="form-control" autocomplete="off" value="<?php if(!empty($info)){ echo $info[0]->meta_post_url;}?>">
                    </div>
                </div>
                <label class="form-label">Meta Slug </label>
                <div class="input-group">
                    <div class="form-line">
                        <input type="text" id="meta_slug" name="meta_slug" class="form-control" autocomplete="off" value="<?php if(!empty($info)){ echo $info[0]->meta_slug;}?>">
                    </div>
                </div>    

                <label class="form-label">Sort Sequence Number <span class="required">*</span></label>
                <div class="input-group">
                    <div class="form-line">
                        <input type="text" id="sort_order" name="sort_order" class="form-control" autocomplete="off" maxlength="10" value="<?php if(!empty($info)){ echo $info[0]->sort_order;}?>">
                    </div>
                </div>          

                <br>

								
				<input type="submit" class="btn btn-primary m-t-15 waves-effect" value="Save" />

                <a href="<?php echo base_url("$controller/lists_new?c=$timestamp") ?>" class="btn btn-danger m-t-15 waves-effect">Cancel</a>
				
				<?php echo form_close(); ?>
				
				<?php else: ?>
					<h4 class="mb">No Record Found !!!</h4>
				<?php endif; ?>
			</div>

		</div>
	</div>
</div>
<script type="text/javascript">
    $(document).ready(function(){

        $(document).on("keydown keyup","input[name=contributors_name]", function(){
        
            var upload_title_data = $("#contributors_name").val();
            var avoid = '.';
            upload_title_data = upload_title_data.replace(avoid,'');
            var regex = new RegExp(' ', 'g');
            var text = upload_title_data.replace(regex, '-');
            $("#meta_title").val(text);
            $("#meta_description").val(upload_title_data);
            $("#meta_slug").val(text);

            var regex1 = new RegExp(' ', 'g');
            var text1 = upload_title_data.replace(regex1, ', ');
            $("#meta_keyword").val(text1);
        });
    });
</script>