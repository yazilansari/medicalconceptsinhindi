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
            <?php
                if($slug === "health-education"){
                    $imgurl= base_url("assets/images/upload/no_images/healthedu_no_image.jpg");
                }elseif($slug === "medical-education"){
                    $imgurl= base_url("assets/images/upload/no_images/medicaledu_no_image.jpg");
                }
            ?>
            <div class="row">
                <?php foreach($subcategories as $sub) : ?>
                    <div class="col-md-4 eachsub text-center">
                        <div class="imgdiv">
                            <img src="<?php echo $imgurl; ?>">
                        </div>
                        <div class="linkdiv">
                            <a href="<?php echo base_url('mainCategory/subCategory/').$slug."/".$type."/".$sub->category_id."/".$sub->sub_category_id ?>"><?php echo $sub->sub_category_name ?></a>
                        </div>
                    </div>
                <?php endforeach; ?>
                
                
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
    .eachsub{
        height:200px;
        background:white;
        margin:0 !important;
    }
    .imgdiv img{
        height:150px;
    }
    a{
        overflow:hidden;
        color:black;
        font-size:14px;
        font-weight:bolder;
    }
    a:hover{
        text-decoration:none;
    }
</style>
