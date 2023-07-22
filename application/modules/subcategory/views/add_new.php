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
             
               <label for="category_id">Category Name<span class="required">*</span></label>
				<div class="form-group">
                    <div class="form-line">
						<select name="category_id" class="form-control" data-placeholder="Select Category" id="category_id">
							<option></option>
						</select>
					</div>
				</div>

                <!-- <label for="folder_id">Folder Name</label>
                <div class="form-group">
                    <div class="form-line">
                        <select name="folder_id" class="form-control" data-placeholder="Select Folder" id="folder_id">
                            <option></option>
                        </select>
                    </div>
                </div> -->

                <label class="form-label">Sub Category Name<span class="required">*</span></label>
				<div class="input-group">
                    <div class="form-line">
                        <input type="text" id="sub_category_name" name="sub_category_name" class="form-control" autocomplete="off" maxlength="250">
                    </div>
                </div> 

                 <label for="contributors_data" class="form-label">Sub Category Description<span class="required">*</span></label>
				<div class="input-group">
                    <div class="form-line">
                        <textarea id="contributors_data" name="description" class="form-control"></textarea>
                    </div>
                </div> 
				
			    <label class="form-label">Thumbnail Image (jpg, jpeg, png)<span class="required">*</span></label>
                <div class="input-group">
                    <div class="form-line">
                        <input type="file" id="sub_category_image" name="sub_category_image" class="form-control" >
                    </div>
                </div>

                <label class="form-label">Ebook Ejournal URL</label>
                <div class="input-group">
                    <div class="form-line">
                        <input type="text" id="ebook_ejournal_url" name="ebook_ejournal_url" class="form-control" autocomplete="off" maxlength="250">
                    </div>
                </div> 

                <label class="form-label">Video URL</label>
                <div class="input-group">
                    <div class="form-line">
                        <input type="text" id="video_url" name="video_url" class="form-control" autocomplete="off" maxlength="250">
                    </div>
                </div> 

                <!-- <label for="upload_for_user_type">Upload Data for User Type<span class="required">*</span></label> -->
                <!-- <div class="demo-radio-button">                    
                   
                    <input name="upload_for_user_type" type="radio" id="radio_1" value="General">
                    <label for="radio_1">General</label>
                   
                    <input name="upload_for_user_type" type="radio" id="radio_2" value="Student">
                    <label for="radio_2">Student</label>

                    <input name="upload_for_user_type" type="radio" id="radio_3" value="Both">
                    <label for="radio_3">Both</label>
                     
                </div> -->
                <!--  <label class="form-label">Sort Sequence Number <span class="required">*</span></label>
                <div class="input-group">
                    <div class="form-line">
                        <input type="text" id="sort_order" name="sort_order" class="form-control" autocomplete="off" maxlength="10">
                    </div>
                </div> -->
                <!-- <br> -->

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