<div class="col-md-4 col-sm-4 col-xs-6 widget-area">
    <div>
        <div class="nav-side-menu widget widget_latestposts">
            <div class="widget-title"><a href="<?php echo base_url();?>text/lists">Text</a></div>
            <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
            <div class="menu-list">
                <ul id="menu-content" class="menu-content collapse out">
                    <?php if(!empty($main_category)){ foreach($main_category as $main){?>
                    <li data-toggle="collapse" data-target="#products_<?php echo $main->main_category_id;?>" class="collapsed">
                        <a href="javascript://" class="collapse_product" data-id="products_<?php echo $main->main_category_id?>"><i class="fa fa-globe fa-lg"></i> <?php echo $main->main_category_name;?> <span class="arrow"></span></a>
                    </li>
                    <ul class="sub-menu collapse" id="products_<?php echo $main->main_category_id;?>">
                        <?php if(!empty($text_data)){ foreach($text_data as $text){ if($text->main_category_id==$main->main_category_id){?>
                            <li>
                                <?php if($text->folder_id != "") { ?>

                               <!--   <a href="<?php echo base_url().'text/';?><?php echo $text->sub_category_id;?>"><?php echo $text->folder_name.' ('.$text->total_upload_count.')';?>
                                </a>
                            <?php } else { ?>
                                <a href="<?php echo base_url().'text/';?><?php echo $text->sub_category_id;?>"><?php echo $text->sub_category_name.' ('.$text->total_upload_count.')';?> -->

                                 <a href="<?php echo base_url().'text/index/';?><?php echo $text->sub_category_id;?>/<?php echo $text->folder_id;?>"><?php echo $text->folder_name.' ('.$text->total_upload_count.')';?>
                                </a>
                            <?php } else { ?>
                                <a href="<?php echo base_url().'text/index/';?><?php echo $text->sub_category_id;?>"><?php echo $text->sub_category_name.' ('.$text->total_upload_count.')';?>

                                </a> <?php } ?>
                            </li>
                        <?php } } }?>
                    </ul>
                    <?php } }?>
                </ul>
            </div>
        </div>
    </div>
    <!-- Widget Recent Post -->
    <aside class="widget widget_latestposts" style="margin-top:20px;">
        <h3 class="widget-title">Recent Posts</h3>
        <div class="latest-content-box">
            <?php if(!empty($recent_post[0])){?>
            <div class="latest-content color-5">
                <span><a href="<?php echo base_url().'post/'.$recent_post[0]->meta_slug;?>" title="<?php echo ucfirst($recent_post[0]->sub_category_name);?>"><?php echo ucfirst($recent_post[0]->upload_type);?></a> <a href="<?php echo base_url().'post/'.$recent_post[0]->meta_slug;?>"><?php echo date('jS M,Y',strtotime($recent_post[0]->added_date_time));?></a></span>
                <h5><a title="<?php echo ucwords($recent_post[0]->upload_title);?>" href="<?php echo base_url().'post/'.$recent_post[0]->meta_slug;?>"><?php echo ucwords($recent_post[0]->upload_title);?></a></h5>
            </div>
            <?php }?>
            <?php if(!empty($recent_post[1])){?>
            <div class="latest-content color-2">
                <span><a href="<?php echo base_url().'post/'.$recent_post[1]->meta_slug;?>" title="<?php echo ucfirst($recent_post[1]->sub_category_name);?>"><?php echo ucfirst($recent_post[1]->upload_type);?></a> <a href="<?php echo base_url().'post/'.$recent_post[1]->meta_slug;?>"><?php echo date('jS M,Y',strtotime($recent_post[1]->added_date_time));?></a></span>
                <h5><a title="<?php echo ucwords($recent_post[1]->upload_title);?>" href="<?php echo base_url().'post/'.$recent_post[1]->meta_slug;?>"><?php echo ucwords($recent_post[1]->upload_title);?></a></h5>
            </div>
            <?php }?>
            <?php if(!empty($recent_post[2])){?>
            <div class="latest-content color-3">
                <span><a href="<?php echo base_url().'post/'.$recent_post[2]->meta_slug;?>" title="<?php echo ucfirst($recent_post[2]->sub_category_name);?>"><?php echo ucfirst($recent_post[2]->upload_type);?></a> <a href="<?php echo base_url().'post/'.$recent_post[2]->meta_slug;?>"><?php echo date('jS M,Y',strtotime($recent_post[2]->added_date_time));?></a></span>
                <h5><a title="<?php echo ucwords($recent_post[2]->upload_title);?>" href="<?php echo base_url().'post/'.$recent_post[2]->meta_slug;?>"><?php echo ucwords($recent_post[2]->upload_title);?></a></h5>
            </div>
            <?php }?>
        </div>
        <div class="see-more"><a href="<?php echo base_url().'post/lists'?>" title="SEE MORE POST">SEE MORE POST</a></div>
    </aside>
    <!-- Widget Recent Post -->
    <!-- Widget Recent Post -->
    <aside class="widget widget_latestposts" style="margin-top:20px;">
        <h3 class="widget-title">Vision & Mission</h3>
        <div class="latest-content-box">
            <p style="line-height:20px;"><?php echo substr(str_replace('\r\n', '', $app_vision[0]->app_vision),0,1000);?>
            </p>
            <p class="text-right"><a href="<?php echo base_url().'about-us';?>" class="btn btn-warning">Read More</a></p>
        </div>
    </aside>
    <!-- Widget Recent Post -->
</div>
