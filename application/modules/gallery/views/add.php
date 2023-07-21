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
                <label class="form-label">Title<span class="required">*</span></label>
                <div class="input-group">
                    <div class="form-line">
                        <input type="text" id="upload_title" name="upload_title" class="form-control" autocomplete="off" maxlength="250">
                    </div>
                </div>

                <div id="upload_div">
                    <label class="form-label">Upload File<span class="required">*</span></label>
                    <div class="input-group">
                        <div class="form-line">
                            <input type="file" id="upload_path" name="upload_path" class="form-control" required>
                        </div>
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
    $(document).ready(function(){
        $('#sub_category_id').change(function(){
            var category= $('#category_id :selected').text();
            var sub_category= $('#sub_category_id :selected').text();
            
            if((category == 'Online event diary') && (sub_category == 'Upcoming events')){
                $('label.eventdate,#eventdate,label.eventtime,#eventtime').show();
            }else{
                $('label.eventdate,#eventdate,label.eventtime,#eventtime').hide();
            }
        });
    });
</script>

