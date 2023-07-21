<div class="col-md-8 col-sm-8 col-xs-6 content-area">                       
    <div class="container-fluid no-left-padding no-right-padding largest-post-block">
        <!-- Container -->
        <div class="">
            <!-- Section Header -->
            <div class="section-header">
                <h3> <?= $pg_title ?></h3>
            </div>
            <!-- Section Header /- -->
            <input type="hidden" id="sub_category_id" value="">
            <div class="row">
                <ul class="sub-menu" >
                    
                     <?php foreach($sub_category_data as $text) {?>
                            <li>
                                
                                 <a href="<?php echo base_url().'text/index/';?><?php echo $text->sub_category_id;?>"><?php echo $text->sub_category_name.' ('.$text->total_upload_count.')';?>
                                </a> 
                                </a>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
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
