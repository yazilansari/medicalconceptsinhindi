<?php if (!empty($collection)) { ?>
    <div class="col-md-8 col-sm-8 col-xs-6 content-area">
        <div class="section-header">
            <h3 style="text-align: center"><?php echo ucwords($collection[0]->upload_title); ?></h3>
        </div>
        <article class="type-post format-audio">
            <input type="hidden" id="upload_data_id" value="<?php echo $collection[0]->upload_data_id; ?>">
            <input type="hidden" id="type" value="post">

            <?php if ($collection[0]->upload_type == 'video') { ?>
                <?php if ($collection[0]->video_type == 'youtube') { ?>
                    <iframe width="100%" height="565" src="https://www.youtube.com/embed/<?php echo $collection[0]->youtube_video_id ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <?php } else if ($collection[0]->video_type == 'inhouse') { ?>
                    <video width="100%" height="565" controls>
                        <source src="<?php echo base_url("uploads/assets/uploaded_data/posts_video/".$collection[0]->sub_category_id."/".$collection[0]->upload_path); ?>">
                    </video>
                <?php } ?>
                <div class="entry-footer">
                    <span class="post-user"><a href="javascript://" style="color:#000"><strong>Posted By: </strong><?php echo $collection[0]->contributors_name; ?></a></span>
                    <span class="post-date"><a href="javascript://" style="color:#000"><strong>Posted On: </strong> <?php echo date('jS M,Y', strtotime($collection[0]->added_date_time)); ?></a></span>
                    <!-- <span class="post-like"><i class="fa fa-heart-o"></i><a href="#" style="color:#000">0</a></span> -->
                </div>
                <span class="post-view" style="display:block;text-align:right;color:green;">
                    <i class="fa fa-eye"></i><a href="javascript://" style="color:#000;margin-left:5px"><?php echo $seen_count; ?></a>
                </span>
                <div class="entry-content">
                    <div class="keywords-mch">
                        <?php if ($collection[0]->tags != '') {
                            $tags = explode(',', $collection[0]->tags);
                            foreach ($tags as $t) { ?>
                                <a href="javascript://"><?php echo $t . ', '; ?></a>
                        <?php }
                        } ?>
                    </div>
                    <h3><?php echo ucwords($collection[0]->upload_title); ?></h3>
                    <p><?php echo ucwords($collection[0]->short_description); ?></p>
                </div>
            <?php } else if ($collection[0]->upload_type == 'text') { ?>

                <div style="display:block">
                    <img src="<?php echo base_url("uploads/assets/uploaded_data/posts_thumbnail/".$collection[0]->sub_category_id."/".$collection[0]->thumbnail); ?>" width="600" height="365">
                </div>

                <div class="entry-footer">
                    <span class="post-user"><a href="javascript://" style="color:#000"><strong>Posted By: </strong><?php echo $collection[0]->contributors_name; ?></a></span>
                    <span class="post-date"><a href="javascript://" style="color:#000"><strong>Posted On: </strong> <?php echo date('jS M,Y', strtotime($collection[0]->added_date_time)); ?></a></span>
                    <!-- <span class="post-like"><i class="fa fa-heart-o"></i><a href="#" style="color:#000">0</a></span> -->
                </div>
                <span class="post-view" style="display:block;text-align:right;color:green;">
                    <i class="fa fa-eye"></i><a href="javascript://" style="color:#000;margin-left:5px"><?php echo $seen_count; ?></a>
                </span>
                <div class="entry-content">
                    <div class="keywords-mch">
                        <?php if ($collection[0]->tags != '') {
                            $tags = explode(',', $collection[0]->tags);
                            foreach ($tags as $t) { ?>
                                <a href="javascript://"><?php echo $t . ', '; ?></a>
                        <?php }
                        } ?>
                    </div>
                    <h3><?php echo ucwords($collection[0]->upload_title); ?></h3>
                    <p><?php echo ucwords($collection[0]->short_description); ?></p>
                    <p><?php echo str_replace('\r\n', '', $collection[0]->upload_description); ?></p>
                </div>
            <?php } else if ($collection[0]->upload_type == 'audio') { ?>

                <audio controls style="margin-left: 20px;outline: none;">
                    <source src="<?php echo base_url("uploads/assets/uploaded_data/posts_audio/".$collection[0]->sub_category_id."/".$collection[0]->upload_path); ?>">
                </audio>
                <br>
                <div class="entry-footer">
                    <span class="post-user"><a href="javascript://" style="color:#000"><strong>Posted By: </strong><?php echo $collection[0]->contributors_name; ?></a></span>
                    <span class="post-date"><a href="javascript://" style="color:#000"><strong>Posted On: </strong> <?php echo date('jS M,Y', strtotime($collection[0]->added_date_time)); ?></a></span>
                    <!-- <span class="post-like"><i class="fa fa-heart-o"></i><a href="#" style="color:#000">0</a></span> -->
                </div>
                <span class="post-view" style="display:block;text-align:right;color:green;">
                    <i class="fa fa-eye"></i><a href="javascript://" style="color:#000;margin-left:5px"><?php echo $seen_count; ?></a>
                </span>
                <div class="entry-content">
                    <div class="keywords-mch">
                        <?php if ($collection[0]->tags != '') {
                            $tags = explode(',', $collection[0]->tags);
                            foreach ($tags as $t) { ?>
                                <a href="javascript://"><?php echo $t . ', '; ?></a>
                        <?php }
                        } ?>
                    </div>
                    <h3><?php echo ucwords($collection[0]->upload_title); ?></h3>
                    <p><?php echo ucwords($collection[0]->short_description); ?></p>
                    <p><?php echo str_replace('\r\n', '', $collection[0]->upload_description); ?></p>
                </div>
            <?php } else if ($collection[0]->upload_type == 'image') { ?>

                <a href="javascript://" target="_blank">
                    <img src="<?php echo base_url('uploads/assets/uploaded_data/posts_img/' . $collection[0]->sub_category_id."/".$collection[0]->upload_path); ?>" width="600" height="365" style="margin-bottom:20px">
                </a>
                <div class="entry-footer">
                    <span class="post-user"><a href="javascript://" style="color:#000"><strong>Posted By: </strong><?php echo $collection[0]->contributors_name; ?></a></span>
                    <span class="post-date"><a href="javascript://" style="color:#000"><strong>Posted On: </strong> <?php echo date('jS M,Y', strtotime($collection[0]->added_date_time)); ?></a></span>
                    <!-- <span class="post-like"><i class="fa fa-heart-o"></i><a href="#" style="color:#000">0</a></span> -->
                </div>
                <span class="post-view" style="display:block;text-align:right;color:green;">
                    <i class="fa fa-eye"></i><a href="javascript://" style="color:#000;margin-left:5px"><?php echo $seen_count; ?></a>
                </span>
                <div class="entry-content">
                    <div class="keywords-mch">
                        <?php if ($collection[0]->tags != '') {
                            $tags = explode(',', $collection[0]->tags);
                            foreach ($tags as $t) { ?>
                                <a href="javascript://"><?php echo $t . ', '; ?></a>
                        <?php }
                        } ?>
                    </div>
                    <h3><?php echo ucwords($collection[0]->upload_title); ?></h3>
                    <p><?php echo ucwords($collection[0]->short_description); ?></p>
                </div>
            <?php } else if ($collection[0]->upload_type == 'pdf') { ?>
                <div style="text-align:center;font-size: 20px;margin-bottom:20px">
                    <a href="<?php echo base_url("uploads/assets/uploaded_data/posts_pdf/".$collection[0]->sub_category_id."/".$collection[0]->upload_path); ?>" target="_blank" style="text-decoration:none;color:black">
                        <i class="fas fa-file-pdf" style="margin-right:5px;color:red"></i><?php echo $collection[0]->upload_path; ?>
                    </a>
                </div>
                <div class="entry-footer">
                    <span class="post-user"><a href="javascript://" style="color:#000"><strong>Posted By: </strong><?php echo $collection[0]->contributors_name; ?></a></span>
                    <span class="post-date"><a href="javascript://" style="color:#000"><strong>Posted On: </strong> <?php echo date('jS M,Y', strtotime($collection[0]->added_date_time)); ?></a></span>
                    <!-- <span class="post-like"><i class="fa fa-heart-o"></i><a href="#" style="color:#000">0</a></span> -->
                </div>
                <span class="post-view" style="display:block;text-align:right;color:green;">
                    <i class="fa fa-eye"></i><a href="javascript://" style="color:#000;margin-left:5px"><?php echo $seen_count; ?></a>
                </span>
                <div class="entry-content">
                    <div class="keywords-mch">
                        <?php if ($collection[0]->tags != '') {
                            $tags = explode(',', $collection[0]->tags);
                            foreach ($tags as $t) { ?>
                                <a href="javascript://"><?php echo $t . ', '; ?></a>
                        <?php }
                        } ?>
                    </div>
                    <h3><?php echo ucwords($collection[0]->upload_title); ?></h3>
                    <p><?php echo ucwords($collection[0]->short_description); ?></p>
                </div>
            <?php } ?>
            <div class="about-author-box">
                <h3>About Author</h3>
                <div class="author">
                    <div class="comment-author vcard">
                        <img alt="img" src="<?php echo $collection[0]->contributors_image_path ?>" class="avatar avatar-72 photo" />
                    </div>
                    <h4><?php echo $collection[0]->contributors_name ?></h4>
                    <ul>
                        <li><a target="_blank" href="https://www.facebook.com/MCH-Medical-Concepts-in-Hindi-106283164695886/" class="fb" title="Facebook">
                                <i class="fab fa-facebook-f"></i></a></li>
                        <li><a target="_blank" href="https://twitter.com/mchindiaapp" class="tw" title="Twitter">
                                <i class="fab fa-twitter" style="color:white"></i></a></li>
                        <li><a href="mailto:info@medicalconceptsinhindi.com" class="go" title="Google">
                                <i class="fa fa-google"></i></a></li>
                        <!-- <li><a href="javascript://" class="ln" title="Linkedin"><i class="fa fa-linkedin"></i></a></li> -->
                    </ul>

                </div>
            </div>
        </article>
        <div id="comments" class="comments-area">

            <div id="post_comments_ajax">
            </div>
            <?php if ($collection[0]->comments_count > 3) { ?>
                <a style="float: right;" href="<?php echo base_url(); ?>post/comment/<?php echo $collection[0]->upload_data_id; ?>">View All Comments</a>
            <?php } ?>
            <!-- .comment-list -->
            <!-- Comment Form -->
            <div id="respond" class="comment-respond">
                <h2 id="reply-title" class="comment-reply-title">Leave a comment</h2>
                <div id="commentform" class="comment-form">
                    <p class="comment-form-author">
                        <input id="users_name" name="users_name" placeholder="Your Name *" required="required" type="text" />
                    </p>
                    <p class="comment-form-email">
                        <input id="email" name="email" placeholder="example@domain-name.com *" required="required" type="email" />
                    </p>
                    <p class="comment-form-comment">
                        <textarea id="comment" placeholder="Your Comment" name="comment" rows="5" required="required"></textarea>
                    </p>
                    <p class="form-submit">
                        <input name="submit" class="submit btn btn-warning" value="Post Comment" type="submit" />
                    </p>
                </div>
            </div>
            <div class="clearfix"></div>
            <div style="display: none;" id="contact_success_1">
                <h4>Comment has been saved successfully!! It will be shown once it is approved from Admin!!</h4>
            </div>
            <!-- Comment Form /- -->
        </div>
    </div>
<?php } else { ?>
    <div class="container-fluid no-left-padding no-right-padding largest-post-block">
        <!-- Container -->
        <div class="">
            <!-- Section Header -->
            <div class="section-header">
                <h3> No Post Found</h3>
            </div>
        </div>
        <!-- Container /- -->
    </div>
<?php } ?>