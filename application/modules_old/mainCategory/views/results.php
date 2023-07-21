<?php $i = 1; if(sizeof($collection)) : foreach ($collection as $record) { $id = $record->upload_data_id; ?>
<div class="col-md-4 col-sm-6 col-xs-6">
    <!-- Type Post -->
    <div class="type-post larg-post color-2">
        <div class="entry-cover">
                <a href="<?php echo base_url().'post/'.$record->meta_slug;?>" target="_blank"> <img src="<?php echo $record->thumbnail_path; ?>" width="600" height="365" style="height: 265px !important;"></a>
        </div>
        <div class="entry-content">
            <div class="post-category"><a href="<?php echo base_url().'post/'.$record->meta_slug;?>" title="<?php echo ucwords($record->upload_title);?>">Text</a></div>
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
<div class="clearfix"></div>
<div style="padding-left: 15px !important;">
    <div><?php echo $this->ajax_pagination->create_links(); ?></div>
</div>