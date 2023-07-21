<div class="col-md-8 col-sm-8 col-xs-6 content-area">   
    <!-- Container /- -->
    <!-- Recent Post /- -->
    <!-- Largest Post -->
    <div class="container-fluid no-left-padding no-right-padding largest-post-block">
        <!-- Container -->
        <div class="">
            <!-- Section Header -->
            <div class="section-header">
                <h3><?= $pg_title ?> --> Video</h3>
            </div>
            <!-- Section Header /- -->
            <div class="row">
                <?php if(!empty($video_post)){ foreach($video_post as $key => $value){?>
                    <div class="col-md-4 col-sm-6 col-xs-6">
                        <!-- Type Post -->
                        <div class="type-post larg-post color-2">
                            <?php if($value->video_type=='youtube'){?>
                                <div class="entry-cover"><a href="<?php echo base_url().'post/'.$value->meta_slug;?>" target="_blank"> <img src="https://img.youtube.com/vi/<?php echo $value->youtube_video_id;?>/0.jpg" width="600" height="365" style="height: 265px !important;" ></a></div>
                            <?php } else if($value->video_type=='inhouse' || $value->video_type==''){?>
                                <div class="entry-cover"><a href="<?php echo base_url().'post/'.$value->meta_slug;?>"><img src="<?php echo $value->thumbnail_path; ?>" alt="Post" style="width:100%;height:265px" /></a></div>
                            <?php } ?>
                            <div class="entry-content">
                                <div class="post-category"><a href="<?php echo base_url().'post/'.$value->meta_slug;?>" title="<?php echo ucwords($value->upload_title);?>">Video</a></div>
                                <h3 class="entry-title"><a href="<?php echo base_url().'post/'.$value->meta_slug;?>"><?php echo ucwords($value->upload_title);?></a>
                                </h3>
                                <a href="<?php echo base_url().'post/'.$value->meta_slug;?>" title="Read More">Read More <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                        <!-- Type Post /- -->
                    </div>
                <?php }?>
                <div class="col-md-12 col-sm-12 col-xs-12 text-right">
                    <a href="<?php echo base_url().'mainCategory/post/'.$main_category_slug.'/video';?>"  class="btn btn-success">View More</a>
                </div>
                <?php }else{  ?>
                    <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                        No Record Found
                    </div>
                <?php }?>
            </div>
            <!-- Row -->
            <div class="section-header" >
                <h3><?= $pg_title ?> --> Audio</h3>
            </div>
            <div class="row">
                <?php if(!empty($audio_post)){ foreach($audio_post as $key => $value){?>
                    <div class="col-md-4 col-sm-6 col-xs-6">
                        <!-- Type Post -->
                        <div class="type-post small-post color-4">
                            <div class="entry-cover"><a href="<?php echo base_url().'post/'.$value->meta_slug;?>"><img src="<?php echo $value->thumbnail_path; ?>" alt="Post" style="width:100%;height:265px" /></a></div>
                            <div class="entry-content">
                                <div class="post-category"><a href="<?php echo base_url().'post/'.$value->meta_slug;?>" title="<?php echo ucwords($value->upload_title);?>">Audio</a></div>
                                <h3 class="entry-title"><a href="<?php echo base_url().'post/'.$value->meta_slug;?>"><?php echo ucwords($value->upload_title);?></a></h3>
                                <a href="<?php echo base_url().'post/'.$value->meta_slug;?>" title="Read More">Read More <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                        <!-- Type Post /- -->
                    </div>                
                <?php } ?>
                <div class="col-md-12 col-sm-12 col-xs-12 text-right">
                    <a href="<?php echo base_url().'mainCategory/post/'.$main_category_slug.'/audio';?>" class="btn btn-success">View More</a>
                </div>
                <?php } else{  ?>
                    <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                        No Record Found
                    </div>
                <?php }?>
            </div>
            <div class="section-header">
                <h3><?= $pg_title ?> --> CASE STUDY</h3>
            </div>
            <div class="row">
                <?php if(!empty($case_study_post)){ foreach($case_study_post as $key => $value){?>
                    <div class="col-md-4 col-sm-6 col-xs-6">
                        <!-- Type Post -->
                        <div class="type-post larg-post color-3">
                            <div class="entry-cover"><a href="<?php echo base_url().'post/'.$value->meta_slug;?>"><img src="<?php echo $value->thumbnail_path; ?>" alt="Post" style="width:100%;height:265px" /></a></div>
                            <div class="entry-content">
                                <div class="post-category"><a href="<?php echo base_url().'post/'.$value->meta_slug;?>" title="<?php echo ucwords($value->upload_title);?>">Case Study</a></div>
                                <h3 class="entry-title"><a href="<?php echo base_url().'post/'.$value->meta_slug;?>"><?php echo ucwords($value->upload_title);?></a></h3>
                                <p><?php echo ucwords($value->short_description);?></p>
                                <a href="<?php echo base_url().'post/'.$value->meta_slug;?>" title="Read More">Read More <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                        <!-- Type Post /- -->
                    </div>
                <?php }?>
                
                <div class="col-md-12 col-sm-12 col-xs-12 text-right">
                    <a href="<?php echo base_url().'mainCategory/post/'.$main_category_slug.'/caseStudy';?>" class="btn btn-success">View More</a>
                </div>
                <?php }else{  ?>
                    <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                        No Record Found
                    </div>
                <?php }?>
                <div class="clearfix"></div>
            </div>
            <div class="section-header">
                <h3><?= $pg_title ?> --> ARTICLE</h3>
            </div>
            <div class="row">
                <?php if(!empty($text_post)){ foreach($text_post as $key => $value){?>
                    <div class="col-md-4 col-sm-6 col-xs-6">
                        <!-- Type Post -->
                        <div class="type-post larg-post color-3">
                            <div class="entry-cover"><a href="<?php echo base_url().'post/'.$value->meta_slug;?>"><img src="<?php echo $value->thumbnail_path; ?>" alt="Post" style="width:100%;height:265px" /></a></div>
                            <div class="entry-content">
                                <div class="post-category"><a href="<?php echo base_url().'post/'.$value->meta_slug;?>" title="<?php echo ucwords($value->upload_title);?>">Text</a></div>
                                <h3 class="entry-title"><a href="<?php echo base_url().'post/'.$value->meta_slug;?>"><?php echo ucwords($value->upload_title);?></a></h3>
                                <p><?php echo ucwords($value->short_description);?></p>
                                <a href="<?php echo base_url().'post/'.$value->meta_slug;?>" title="Read More">Read More <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                        <!-- Type Post /- -->
                    </div>
                <?php } ?>
                
                <div class="col-md-12 col-sm-12 col-xs-12 text-right">
                    <a href="<?php echo base_url().'mainCategory/post/'.$main_category_slug.'/text';?>" class="btn btn-success">View More</a>
                </div>
                <?php }else{  ?>
                    <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                        No Record Found
                    </div>
                <?php }?>
                <div class="clearfix"></div>
            </div>
            <!-- Row /- -->
        </div>
        <!-- Container /- -->
    </div>
    <!-- Largest Post /- -->
</div>
<!-- Content Area /- -->
<!-- Widget Area -->
