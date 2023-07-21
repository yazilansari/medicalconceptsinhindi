<div class="col-md-8 col-sm-8 col-xs-6 content-area">                       
    <div class="container-fluid no-left-padding no-right-padding largest-post-block">
        <!-- Container -->
        <div class="">
            <!-- Section Header -->
            <div class="section-header">
                <h3> <?= $pg_title ?></h3>
            </div>
            <!-- Section Header /- -->
            <input type="hidden" id="sub_category_id" value="<?php if($sub_category_id!=''){echo $sub_category_id;}?>">
            <div class="row">
                <?php if($sub_category_id==''){?>
                	<div id="listing_div">
                		<?php include_once 'results.php'; ?>	
                	</div>
                <?php } else {?>
                    <div id="listing_div_ajax">
                    </div>
                <?php }?>
            	
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
