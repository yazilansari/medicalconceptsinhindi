<!--<?php print_r($collection); ?>-->
<?php if(!empty($_SESSION['folder_id']) && !empty($_SESSION['category_id'])):?>

<?php
    if($slug === "health-education"){
        $imgurl= base_url("assets/images/upload/no_images/healthedu_no_image.jpg");
    }elseif($slug === "medical-education"){
        $imgurl= base_url("assets/images/upload/no_images/medicaledu_no_image.jpg");
    }
?>

<?php foreach($collection as $sub) : ?>
    <div class="col-md-4 eachsub text-center">
        <div class="imgdiv">
            <!--<img src="<?php echo $imgurl; ?>">-->
            <img src="<?php echo base_url("assets/images/upload/no_images/medicaledu_no_image.jpg"); ?>">
        </div>
        <div class="linkdiv">
            <a href="<?php echo base_url('mainCategory/subCategory/').$slug."/".$type."/".$sub->category_id."/".$sub->sub_category_id ?>"><?php echo $sub->sub_category_name ?></a>
        </div>
    </div>
<?php endforeach; ?>

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

<?php elseif(!empty($_SESSION['category_id']) && !empty($_SESSION['sub_category_id'])): ?>

<?php $i = 1; if(sizeof($collection)) : foreach ($collection as $record) { $id = $record->upload_data_id; ?>
<div class="col-md-4 col-sm-6 col-xs-6">
<!-- Type Post -->
<div class="type-post larg-post color-2">
    <div class="entry-cover">
            <a href="<?php echo base_url().'post/'.$record->meta_slug;?>" target="_blank"> <img src="<?php echo $record->thumbnail_path; ?>" width="600" height="365" style="height: 265px !important;" th="<?php echo $record->thumbnail_path; ?>" ud_id="<?php echo $record->upload_data_id; ?>"></a>
    </div>
    <div class="entry-content">
        <div class="post-category"><a href="<?php echo base_url().'post/'.$record->meta_slug;?>" title="<?php echo ucwords($record->upload_title);?>"><?php echo $record->upload_type;?></a></div>
        <h3 class="entry-title">
            <a href="<?php echo base_url().'post/'.$record->meta_slug;?>"><?php echo ucwords($record->upload_title);?></a>
        </h3>
        <p><?php echo ucwords($record->short_description);?></p>
        <a href="<?php echo base_url().'post/'.$record->meta_slug;?>" title="Read More">Read More <i class="fa fa-angle-right"></i></a>
    </div>
</div>
<!-- Type Post /- -->
</div>
<?php $i++;  } ?>

<?php else: ?>

<?php endif; ?>

<?php endif; ?>
<div class="clearfix"></div>
<div style="padding-left: 15px !important;">
<div><?php echo $this->ajax_pagination->create_links_grid(); ?></div>
</div>