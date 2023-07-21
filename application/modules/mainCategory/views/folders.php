<div class="col-md-8 col-sm-8 col-xs-6 content-area">                     
    <div class="container-fluid no-left-padding no-right-padding largest-post-block">
        <!-- Container -->
        <div class="">
            <!-- Section Header -->
            <div class="section-header">
                <h3> <?= $pg_cord ?></h3>
            </div>
            <!-- Section Header /- -->
            <input type="hidden" id="main_category_id" value="<?php if($main_category_id!=''){echo $main_category_id;}?>">
            <input type="hidden" id="type" value="<?php if($type!=''){echo $type;}?>">
            <div class="row">
                <?php if(!empty($folders)): ?>
                <?php foreach($folders as $folder) : ?>
                    <div class="col-md-3 col-sm-3 col-xs-6 eachsub text-center">
                        <a href="<?php echo base_url('mainCategory/subCategories/').$slug."/".$type."/".$folder->folder_id."/".$folder->category_id ?>">
                            <!--<img src="<?php echo($slug === "health-education") ? base_url("assets/images/upload/no_images/healthedu_no_image.jpg") : base_url("assets/images/upload/no_images/medicaledu_no_image.jpg") ; ?>">-->
                            <img src="<?php echo base_url("assets/images/upload/icons/folder-icon.png") ; ?>">
                            <span><?php echo $folder->folder_name ?></span>
                        </a>
                    </div>
                <?php endforeach; ?>
                <?php else :?>
                    <div class="container nofolder">
                        <p>No folder available for this category(<?php echo $type ?>)</p>
                    </div>
                <?php endif;?>
            </div>
            <!-- Row -->
        </div>
        <!-- Container /- -->
    </div>
</div>

<script type="text/javascript">
	var listing_url = "<?php echo $listing_url ?>";
	var download_url = "<?php echo $download_url ?>";
</script>

<style>
    a{
        overflow:hidden;
        color:black;
    }
    a:hover{
        text-decoration:none;
    }
    span{
        font-weight:bold;
    }
    .nofolder p{
        font-weight:bold;
        font-size:20px;
        text-transform:uppercase;
    }
</style>
