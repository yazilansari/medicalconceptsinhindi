<style type="text/css">
    body {
  font-family: 'Open Sans', sans-serif;
  font-size: 14px;
  
  margin-top: 20px;
}

.image-gallery {
  margin: 0 auto;
  width: 1100px;
}

.image-gallery-list {
  border: 0px solid #ccc;
  height: 1000px;
  overflow-y: auto;
  color: #cdcdcd;
}

.image-gallery-ul {
  list-style-type: none;
  padding: 10px;
}
</style>

<div class="image-gallery">
  <div class="image-gallery-list">
    <ul class="image-gallery-ul">
<?php $i = 1; if(sizeof($collection)) : foreach ($collection as $record) { $id = $record->upload_data_id; ?>
<div class="col-md-4 col-sm-6 col-xs-6">
    <!-- Type Post -->
    <div class="type-post larg-post color-2">
        <div class="entry-cover">
            <?php if($record->upload_type=='video' && $record->video_type=='youtube'){?>
                <a href="#" target="_blank"> <img src="https://img.youtube.com/vi/<?php echo $record->youtube_video_id;?>/0.jpg" width="600" height="365" style="height: 265px !important;"></a>
            <?php } else if($record->upload_type=='video' && $record->video_type=='inhouse'){?>
                <a href="#" target="_blank"> <img src="<?php echo $record->thumbnail_path; ?>" width="600" height="365" style="height: 265px !important;"></a>
            <?php } else {?>
                <a href="#" target="_blank"> <img src="<?php echo $record->thumbnail_path; ?>" width="600" height="365" style="height: 265px !important;"></a>
            <?php } ?>
        </div>
        <div class="entry-content">
            <div class="post-category"><a href="<?php echo base_url().'post/'.$record->meta_slug;?>" title="<?php echo ucwords($record->upload_title);?>"><?php echo ucwords($record->upload_type);?></a></div>
            <h3 class="entry-title">
                <a href="<?php echo base_url().'post/'.$record->meta_slug;?>"><?php echo ucwords($record->upload_title);?></a>
            </h3>
            <?php if($record->upload_type=='audio'){?>
                <audio controls style="width: 220px !important;margin-left: -12px !important;">
                    <source src="<?php echo $record->file_path;?>">
                </audio><br>
            <?php }else if($record->upload_type=='text'){?>
                <p><?php echo ucwords($record->short_description);?></p>
            <?php }?>
            
            <a href="<?php echo base_url().'post/'.$record->meta_slug;?>" title="Read More">Read More <i class="fa fa-angle-right"></i></a>
        </div>
    </div>
    <!-- Type Post /- -->
</div>
<?php $i++;  } ?>

<?php else: ?>

<?php endif; ?>
<div class="clearfix"></div>
<!-- <div style="padding-left: 15px !important;">
    <div><?php echo $this->ajax_pagination->create_links(); ?></div>
</div> -->
</ul>
  </div>
</div>

<script type="text/javascript">
var mincount = 6;
var maxcount = 6;

$(".image-gallery-ul li").slice(6).hide();

$(".image-gallery-list").scroll(function() {

  if($(".image-gallery-list").scrollTop() + $(".image-gallery-list").height() >= $(".image-gallery-list")[0].scrollHeight) {
    
    $(".image-gallery-ul li").slice(mincount,maxcount).fadeIn(10);

    mincount = mincount+20;
    maxcount = maxcount+20;

  }
});
</script>