<div class="col-md-12 col-sm-12 col-xs-12">
<ol class="comment-list">
    <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1 parent">
        <?php if(!empty($comments)){ foreach($comments as $key => $value){?>
            <?php if($key%2==0){?>
                <div class="comment-body">
                    <footer class="comment-meta">
                        <div class="comment-author vcard">
                            <img alt="img" src="<?php echo base_url().'assets/images/user.png'?>" class="avatar avatar-72 photo"/>
                            <b class="fn"><?php echo $value->users_name?></b>
                        </div>
                        <div class="comment-metadata"><a href="javascript://" style="color:darkblue;"><?php echo date('M jS, Y',strtotime($value->comments_dt))?></a></div>
                    </footer>
                    <div class="comment-content" >
                        <p style="color:black;"><?php echo $value->comment?></p>
                    </div>
                </div>
            <?php }?>
            <?php if($key%2!=0){?>
                <ol class="children">
                    <li class="comment byuser comment-author-admin bypostauthor odd alt depth-2 parent">
                        <div class="comment-body">
                            <footer class="comment-meta">
                                <div class="comment-author vcard">
                                    <img alt="img" src="<?php echo base_url().'assets/images/user.png'?>" class="avatar avatar-72 photo"/>
                                    <b class="fn"><?php echo $value->users_name?></b>
                                </div>
                                <div class="comment-metadata"><a href="javascript://" style="color:darkblue;"><?php echo date('M jS, Y',strtotime($value->comments_dt))?></a></div>
                            </footer>
                            <div class="comment-content">
                                <p style="color:black;"><?php echo $value->comment?></p>
                            </div>
                        </div>
                    </li>
                </ol>
            <?php }?>
        <?php } } ?>
    </li>            
</ol>
</div>
<div class="clearfix"></div>
<div style="padding-left: 15px !important;">
    <div><?php echo $this->ajax_pagination->create_links_grid(); ?></div>
</div>