<style type="text/css">
    .medium-editor-element"{height:auto !important;}
.disabled-select {
        background-color: #d5d5d5;
        opacity: 0.5;
        border-radius: 3px;
        cursor: not-allowed;
        position: absolute;
        top: 0;
        bottom: 0;
        right: 0;
        left: 0;
    }
</style>
<script src="<?php echo base_url(); ?>assets/js/jQuery.tagify.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/tagify.css">
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2><?= $pg_title ?></h2>
            </div>
            <div class="body">
                <?php echo form_open("$controller/modify", array('id' => 'save-form')); ?>

                <input type="hidden" name="upload_data_id" value="<?php echo $info[0]->upload_data_id ?>">

                <label for="main_category_id">Main Category Name<span class="required">*</span></label>
                <div class="form-group">
                    <div class="form-line">
                        <select name="main_category_id" class="form-control" data-placeholder="Select Main Category" id="main_category_id">
                            <option></option>
                            <?php if ($info[0]->category_id != "") { ?>
                                <option value="<?php echo $info[0]->main_category_id ?>" selected="selected"><?php echo $info[0]->main_category_name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>


                <label for="category_id">Category Name</label>
                <div class="form-group">
                    <div class="form-line">
                        <select name="category_id" class="form-control" data-placeholder="Select Category" id="category_id" readonly="readonly">
                            <option></option>
                            <?php if ($info[0]->category_id != "") { ?>
                                <option value="<?php echo $info[0]->category_id ?>" selected="selected"><?php echo $info[0]->category_name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <label for="sub_category_id">Sub Category Name</label>
                <div class="form-group">
                    <div class="form-line">
                        <select name="sub_category_id" class="form-control" data-placeholder="Select Sub Category" id="sub_category_id" readonly="readonly">
                            <option></option>
                            <?php if ($info[0]->sub_category_id != "") { ?>
                                <option value="<?php echo $info[0]->sub_category_id ?>" selected="selected"><?php echo $info[0]->sub_category_name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <?php if (($info[0]->event_date > "0000:00:00") && ($info[0]->event_time > "00:00:00")) : ?>
                    <label for="eventdate" class="eventdate">Event Date<span class="required">*</span></label>
                    <div class="form-group">
                        <input type="date" class="form-control eventdate" id="eventdate" name="eventdate" value="<?php if (!empty($info)) {
                                                                                                                        echo $info[0]->event_date;
                                                                                                                    } ?>">
                    </div>

                    <label for="eventtime" class="eventtime">Event Time<span class="required">*</span></label>
                    <div class="form-group">
                        <input type="time" class="form-control eventtime" id="eventtime" name="eventtime" value="<?php if (!empty($info)) {
                                                                                                                        echo $info[0]->event_time;
                                                                                                                    } ?>">
                    </div>

                    <label for="event_link" class="event_link">Event Link</label>
                    <div class="input-group">
                        <div class="form-line">
                            <input type="text" class="form-control event_link" id="event_link" name="event_link" value="<?php if (!empty($info)) {
                                                                                                                            echo $info[0]->event_link;
                                                                                                                        } ?>">
                        </div>
                    </div>
                <?php endif; ?>

                <label for="contributors_id">Contributors</label>
                <div class="form-group">
                    <div class="form-line">
                        <select name="contributors_id" class="form-control" data-placeholder="Select Contributor" id="contributors_id">
                            <option></option>
                            <?php if ($info[0]->contributors_id != "") { ?>
                                <option value="<?php echo $info[0]->contributors_id ?>" selected="selected"><?php echo $info[0]->contributors_name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <label class="form-label">Posts Title<span class="required">*</span></label>
                <div class="input-group">
                    <div class="form-line">
                        <input type="text" id="upload_title" name="upload_title" class="form-control" autocomplete="off" maxlength="250" value="<?php if (!empty($info)) {
                                                                                                                                                    echo $info[0]->upload_title;
                                                                                                                                                } ?>">
                    </div>
                </div>
                <label class="form-label">Meta Title <span class="required">*</span></label>
                <div class="input-group">
                    <div class="form-line">
                        <input type="text" id="meta_title" name="meta_title" class="form-control" autocomplete="off" value="<?php if (!empty($info)) {
                                                                                                                                echo $info[0]->meta_title;
                                                                                                                            } ?>">
                    </div>
                </div>
                <label class="form-label">Meta Description <span class="required">*</span></label>
                <div class="input-group">
                    <div class="form-line">
                        <input type="text" id="meta_description" name="meta_description" class="form-control" autocomplete="off" value="<?php if (!empty($info)) {
                                                                                                                                            echo $info[0]->meta_description;
                                                                                                                                        } ?>">
                    </div>
                </div>
                <label class="form-label">Meta Keywords </label>
                <div class="input-group">
                    <div class="form-line">
                        <input type="text" id="meta_keyword" name="meta_keyword" class="form-control" autocomplete="off" value="<?php if (!empty($info)) {
                                                                                                                                    echo $info[0]->meta_keyword;
                                                                                                                                } ?>">
                    </div>
                </div>
                <label class="form-label">Meta Post Url </label>
                <div class="input-group">
                    <div class="form-line">
                        <input type="text" id="meta_post_url" name="meta_post_url" class="form-control" autocomplete="off" value="<?php if (!empty($info)) {
                                                                                                                                        echo $info[0]->meta_post_url;
                                                                                                                                    } ?>">
                    </div>
                </div>
                <label class="form-label">Meta Slug <span class="required">*</span></label>
                <div class="input-group">
                    <div class="form-line">
                        <input type="text" id="meta_slug" name="meta_slug" class="form-control" autocomplete="off" value="<?php if (!empty($info)) {
                                                                                                                                echo $info[0]->meta_slug;
                                                                                                                            } ?>">
                    </div>
                </div>
                <label class="form-label">Short Description<span class="required">*</span></label>
                <div class="input-group">
                    <div class="form-line">
                        <textarea type="text" rows="5" class="form-control" id="short_description" name="short_description"><?php if (!empty($info)) {
                                                                                                                                echo $info[0]->short_description;
                                                                                                                            } ?> </textarea>
                    </div>
                </div>
                <label for="upload_for_user_type">Upload Data for User Type<span class="required">*</span></label>
                <div class="demo-radio-button">
                    <input name="upload_for_user_type" type="radio" id="radio_1" value="General" <?php if ($info[0]->upload_for_user_type == 'General') {
                                                                                                        echo "checked='checked'";
                                                                                                    } ?>>
                    <label for="radio_1">General</label>
                    <input name="upload_for_user_type" type="radio" id="radio_2" value="Student" <?php if ($info[0]->upload_for_user_type == 'Student') {
                                                                                                        echo "checked='checked'";
                                                                                                    } ?>>
                    <label for="radio_2">Student</label>
                    <input name="upload_for_user_type" type="radio" id="radio_3" value="Both" <?php if ($info[0]->upload_for_user_type == 'Both') {
                                                                                                    echo "checked='checked'";
                                                                                                } ?>>
                    <label for="radio_3">Both</label>
                </div>
                <br>
                <label for="upload_type">Upload Type <span class="required">*</span></label>
                <div class="demo-radio-button">
                    <input name="upload_type" class="upload_types" type="radio" id="image" value="image" <?php if ($info[0]->upload_type == 'image') {
                                                                                                                echo "checked='checked'";
                                                                                                            } ?>>
                    <label for="image">Image</label>
                    <input name="upload_type" class="upload_types" type="radio" id="audio" value="audio" <?php if ($info[0]->upload_type == 'audio') {
                                                                                                                echo "checked='checked'";
                                                                                                            } ?>>
                    <label for="audio">Audio</label>
                    <input name="upload_type" class="upload_types" type="radio" id="video" value="video" <?php if ($info[0]->upload_type == 'video') {
                                                                                                                echo "checked='checked'";
                                                                                                            } ?>>
                    <label for="video">Video</label>
                    <input name="upload_type" class="upload_types" type="radio" id="pdf" value="pdf" <?php if ($info[0]->upload_type == 'pdf') {
                                                                                                            echo "checked='checked'";
                                                                                                        } ?>>
                    <label for="pdf">PDF</label>
                    <input name="upload_type" class="upload_types" type="radio" id="text" value="text" <?php if ($info[0]->upload_type == 'text') {
                                                                                                            echo "checked='checked'";
                                                                                                        } ?>>
                    <label for="text">Text</label>
                </div>
                <br>

                <div id='div_video_type'>
                    <label for="video_type">Video Type<span class="required">*</span></label>
                    <div class="demo-radio-button">
                        <input name="video_type" type="radio" id="radio_71" value="inhouse" <?php if ($info[0]->video_type == 'inhouse') {
                                                                                                echo "checked='checked'";
                                                                                            } ?>>
                        <label for="radio_71">In House Video</label>
                        <input name="video_type" type="radio" id="radio_72" value="youtube" <?php if ($info[0]->video_type == 'youtube') {
                                                                                                echo "checked='checked'";
                                                                                            } ?>>
                        <label for="radio_72">YouTube Video</label>
                    </div><br>
                </div>

                <div id='div_youtube_video' style="display: none;">
                    <label class="form-label">YouTube Video ID <span class="required">*</span></label>
                    <div class="input-group">
                        <div class="form-line">
                            <input type="text" id="youtube_video_code" name="youtube_video_code" class="form-control" value="<?php if (!empty($info)) {
                                                                                                                                    echo $info[0]->youtube_video_id;
                                                                                                                                } ?>">
                        </div>
                    </div>
                </div>

                <div id="description_div">
                    <label class="form-label">Upload Description<span class="required">*</span></label>
                    <div class="input-group">
                        <div class="form-line">
                            <textarea class="form-control" id="upload_description" name="upload_description">
                                <?php if (!empty($info)) {
                                    echo str_replace('\r\n', '', $info[0]->upload_description);
                                } ?></textarea>
                            <span name="desc_errors" id="desc_errors"></span>
                        </div>
                    </div>
                </div>

                <div id="upload_div">
                    <label class="form-label">Upload File<span class="required">*</span></label>
                    <div class="input-group">
                        <div class="form-line">
                            <input type="file" id="upload_path" name="upload_path" class="form-control">
                            <input type="hidden" name="upload_path_name" value="<?php if (!empty($info)) {
                                                                                    echo $info[0]->upload_path;
                                                                                } ?>">
                        </div>
                        <span><?php if (!empty($info)) {
                                    echo $info[0]->upload_path;
                                } ?></span>
                    </div>
                </div>

                <label class="form-label">Thumbnail File<span class="required">*</span></label>
                <div class="input-group">
                    <div class="form-line">
                        <input type="file" id="thumbnail" name="thumbnail" class="form-control">
                        <input type="hidden" name="thumbnail_name" value="<?php if (!empty($info)) {
                                                                                echo $info[0]->upload_path;
                                                                            } ?>">
                    </div>
                    <span><?php if (!empty($info)) {
                                echo $info[0]->thumbnail;
                            } ?></span>
                </div>

                <label class="form-label">Upload Tags <span class="required">*</span></label>
                <div class="input-group">
                    <div class="form-line">
                        <input type="text" id="tags" name="tags" class="form-control" value="<?php if (!empty($info)) {
                                                                                                    echo $info[0]->tags;
                                                                                                } ?>">
                        <span name="error_tags" id="error_tags"></span>
                    </div>
                </div>

                <!-- <label class="form-label">Sort Sequence Number <span class="required">*</span></label>
                <div class="input-group">
                    <div class="form-line">
                        <input type="text" id="sort_order" name="sort_order" class="form-control" autocomplete="off" maxlength="10" value="<?php if (!empty($info)) {
                                                                                                                                                echo $info[0]->sort_order;
                                                                                                                                            } ?>">
                    </div>
                </div>
 -->
                <input type="submit" class="btn btn-primary m-t-15 waves-effect" value="Save" />
                <a href="<?php echo base_url("$controller/lists?c=$timestamp") ?>" class="btn btn-danger m-t-15 waves-effect">Cancel</a>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var type = 'edit';
</script>