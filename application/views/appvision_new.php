<?php if($this->session->flashdata("update_app_vision")): ?>
    <div style="text-align:right;color:green;font-weight:bold;">
        <?php echo $this->session->flashdata("update_app_vision") ?>
    </div>
<?php endif; ?>
<?php if($this->session->flashdata("update_app_vision_failed")): ?>
    <div style="text-align:right;color:red;font-weight:bold;">
        <?php echo $this->session->flashdata("update_app_vision_failed") ?>
    </div>
<?php endif; ?>

<form action="<?php echo base_url("App_vision_new/update_app_vision_new"); ?>" method="post" >
    <h5 class="text-light" style="font-weight:bolder">App Vision</h5>
    <textarea class="form-control app_vision" name="app_vision_new" cols="100" rows="10" placeholder="App Vision"><?php echo $visions->about?></textarea>
    
    <div class="save_btn_div" style="text-align:right;margin-top:15px;">
        <button class="btn save_btn" type="submit" style="background-color:#FF9800">Update</button>
    </div>
</form>

<script src="//cdn.ckeditor.com/4.15.1/full/ckeditor.js"></script>
<!--<script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>-->
<script>CKEDITOR.replace( 'editor1' );</script>