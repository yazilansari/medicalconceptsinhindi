
<?php $i = 1; if(sizeof($collection)) : foreach ($collection as $record) { $id = $record->upload_data_id; ?>
<div class="col-md-4 col-sm-6 col-xs-6">
    <!-- Type Post -->
    <div class="type-post larg-post color-2">
                <?php $then = strtotime($record->added_date_time);
                $now = time();
                $difference = $now - $then;
                $days = floor($difference / (60*60*24) );
                if($days <= 7) {?>
                    <div class="ribbon">
                        <div class="txt">New</div>
                    </div>
                <?php }?>
        <div class="entry-cover">

            <?php if($record->video_type=='youtube'){?>
                <a href="<?php echo base_url().'post/'.$record->meta_slug;?>" target="_blank"> <img src="https://img.youtube.com/vi/<?php echo $record->youtube_video_id;?>/0.jpg" width="600" height="365" style="height: 265px !important;" ></a>
            <?php } else if($record->video_type=='inhouse' || $record->video_type==''){?>
                <a href="<?php echo base_url().'post/'.$record->meta_slug;?>" target="_blank"> <img src="<?php echo $record->thumbnail_path; ?>" width="600" height="365" style="height: 265px !important;"></a>
            <?php } ?>
        </div>
        <div class="entry-content">
            <div class="post-category"><a href="<?php echo base_url().'post/'.$record->meta_slug;?>" title="<?php echo ucwords($record->upload_title);?>">Video</a></div>
            
                
             
            
            <h3 class="entry-title">
                <a href="<?php echo base_url().'post/'.$record->meta_slug;?>"><?php echo ucwords($record->upload_title);?></a>
            </h3>
            <a href="<?php echo base_url().'post/'.$record->meta_slug;?>" title="Read More">Read More <i class="fa fa-angle-right"></i></a>
        </div>
    </div>
    <!-- Type Post /- -->
</div>
<?php $i++;  } ?>

<?php else: ?>

<?php endif; ?>
<div class="clearfix"></div>
<div style="padding-left: 15px !important;">
    <div><?php echo $this->ajax_pagination->create_links(); ?></div>
</div> 