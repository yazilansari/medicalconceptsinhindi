<div class="col-md-8 col-sm-8 col-xs-6 content-area">                     
    <div class="container-fluid no-left-padding no-right-padding largest-post-block">
        <!-- Container -->
        <div class="">
            <!-- Section Header -->
            <div class="section-header">
                <h3> <?= $pg_title ?></h3>
            </div>
            <!-- Section Header /- -->
            <input type="hidden" id="main_category_id" value="<?php if($main_category_id!=''){echo $main_category_id;}?>">
            <input type="hidden" id="type" value="<?php if($type!=''){echo $type;}?>">
            <div class="row">
                <?php if($main_category_id!='' && $type!=''){?>
                	<div id="listing_div_ajax">
                    </div>
                <?php } ?>
            	
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
