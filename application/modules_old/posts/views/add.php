<style type="text/css">
    .medium-editor-element"{height:auto !important;}
</style>
<script src="<?php echo base_url();?>assets/js/jQuery.tagify.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/tagify.css">
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
                <label for="category_id">Category Name<span class="required">*</span></label>
                <div class="form-group">
                    <div class="form-line">
                        <select name="category_id" class="form-control" data-placeholder="Select Category" id="category_id">
                            <option></option>
                        </select>
                    </div>
                </div>
                <label for="sub_category_id">Sub Category Name<span class="required">*</span></label>
                <div class="form-group">
                    <div class="form-line">
                        <select name="sub_category_id" class="form-control" data-placeholder="Select Sub Category" id="sub_category_id">
                            <option></option>
                        </select>
                    </div>
                </div>
                <label for="contributors_id">Contributor<span class="required">*</span></label>
                <div class="form-group">
                    <div class="form-line">
                        <select name="contributors_id" class="form-control" data-placeholder="Select Contributor" id="contributors_id">
                            <option></option>
                        </select>
                    </div>
                </div>
                <label class="form-label">Posts Title<span class="required">*</span></label>
                <div class="input-group">
                    <div class="form-line">
                        <input type="text" id="upload_title" name="upload_title" class="form-control" autocomplete="off" maxlength="250">
                    </div>
                </div>
                <label class="form-label">Meta Title <span class="required">*</span></label>
                <div class="input-group">
                    <div class="form-line">
                        <input type="text" id="meta_title" name="meta_title" class="form-control" autocomplete="off">
                    </div>
                </div>
                <label class="form-label">Meta Description <span class="required">*</span></label>
                <div class="input-group">
                    <div class="form-line">
                        <input type="text" id="meta_description" name="meta_description" class="form-control" autocomplete="off">
                    </div>
                </div>
                <label class="form-label">Meta Keywords </label>
                <div class="input-group">
                    <div class="form-line">
                        <input type="text" id="meta_keyword" name="meta_keyword" class="form-control" autocomplete="off">
                    </div>
                </div>
                <label class="form-label">Meta Post Url </label>
                <div class="input-group">
                    <div class="form-line">
                        <input type="text" id="meta_post_url" name="meta_post_url" class="form-control" autocomplete="off" >
                    </div>
                </div>
                <label class="form-label">Meta Slug <span class="required">*</span></label>
                <div class="input-group">
                    <div class="form-line">
                        <input type="text" id="meta_slug" name="meta_slug" class="form-control" autocomplete="off">
                    </div>
                </div>
                <label class="form-label">Short Description<span class="required">*</span></label>
                <div class="input-group">
                    <div class="form-line">
                        <textarea type="text" rows="5" class="form-control" id="short_description" name="short_description"> </textarea>
                    </div>
                </div>
                <label for="upload_for_user_type">Upload Data for User Type<span class="required">*</span></label>
                <div class="demo-radio-button">                    
                    <input name="upload_for_user_type" type="radio" id="radio_1" value="General">
                    <label for="radio_1">General</label>
                    <input name="upload_for_user_type" type="radio" id="radio_2" value="Student">
                    <label for="radio_2">Student</label>
                    <input name="upload_for_user_type" type="radio" id="radio_3" value="Both">
                    <label for="radio_3">Both</label>
                </div>
                <br>            
                <label for="upload_type">Upload Type <span class="required">*</span></label>
                <div class="demo-radio-button">                    
                    <input name="upload_type" class="upload_types" type="radio" id="image" value="image">
                    <label for="image">Image</label>
                    <input name="upload_type" class="upload_types" type="radio" id="audio" value="audio">
                    <label for="audio">Audio</label>
                    <input name="upload_type" class="upload_types" type="radio" id="video" value="video">
                    <label for="video">Video</label>
                    <input name="upload_type" class="upload_types" type="radio" id="pdf" value="pdf">
                    <label for="pdf">PDF</label>
                    <input name="upload_type" class="upload_types" type="radio" id="text" value="text">
                    <label for="text">Text</label>
                </div>
                <br>

                <div id='div_video_type'>
                    <label for="video_type">Video Type<span class="required">*</span></label>
                    <div class="demo-radio-button">                    
                        <input name="video_type" type="radio" id="radio_71" value="inhouse">
                        <label for="radio_71">In House Video</label>
                        <input name="video_type" type="radio" id="radio_72" value="youtube">
                        <label for="radio_72">YouTube Video</label>
                    </div><br>
                </div>

                <div id='div_youtube_video' style="display: none;">
                    <label class="form-label">YouTube Video ID <span class="required">*</span></label>
                    <div class="input-group">
                        <div class="form-line">
                            <input type="text" id="youtube_video_code" name="youtube_video_code" class="form-control" >
                        </div>
                    </div>
                </div>

                <div id="description_div">
                <label class="form-label">Upload Description<span class="required">*</span></label>
                    <div class="input-group">
                        <div class="form-line">
                            <textarea class="form-control" id="upload_description" name="upload_description"> </textarea>
                            <span name="desc_errors" id="desc_errors"></span>
                        </div>
                    </div>
                </div>

                <div id="upload_div">
                    <label class="form-label">Upload File<span class="required">*</span></label>
                    <div class="input-group">
                        <div class="form-line">
                            <input type="file" id="upload_path" name="upload_path" class="form-control" >
                        </div>
                    </div>
                </div>

                <label class="form-label">Thumbnail File<span class="required">*</span></label>
                <div class="input-group">
                    <div class="form-line">
                        <input type="file" id="thumbnail" name="thumbnail" class="form-control" >
                    </div>
                </div>

                <label class="form-label">Upload Tags <span class="required">*</span></label>
                <div class="input-group">
                    <div class="form-line">
                        <input type="text" id="tags" name="tags" class="form-control" >
                        <span name="error_tags" id="error_tags"></span>
                    </div>
                </div>

                <label class="form-label">Sort Sequence Number <span class="required">*</span></label>
                <div class="input-group">
                    <div class="form-line">
                        <input type="text" id="sort_order" name="sort_order" class="form-control" autocomplete="off" maxlength="10">
                    </div>
                </div>

                <input type="submit" class="btn btn-primary m-t-15 waves-effect" value="Save" />
                <a href="<?php echo base_url("$controller/lists?all=all_results") ?>" class="btn btn-danger m-t-15 waves-effect">Cancel</a>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var type='add';
</script>