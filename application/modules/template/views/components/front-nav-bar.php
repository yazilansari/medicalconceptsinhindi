<nav class="navbar ownavigation">
    <!-- Container -->
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url() ?>front_assets/images/logo-2.png" alt="logo"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="dropdown active">
                    <a href="<?php echo base_url(); ?>" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false">Home</a>
                </li>
                <?php if (!empty($main_category)) {
                    foreach ($main_category as $main) { ?>
                        <li class="dropdown mega-dropdown">
                            <a href="javascript://" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false" title="<?php echo ucwords($main->main_category_name); ?>"><?php echo ucwords($main->main_category_name); ?></a>
                            <i class="ddl-switch fa fa-angle-down"></i>
                            <div class="dropdown-menu megamenu">
                                <div class="col-md-2 col-sm-12 megamenu-categories">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <?php if (!empty($category)) {
                                            foreach ($category as $c) {
                                                if ($main->main_category_id == $c->main_category_id) { ?>
                                                    <li role="presentation"><a href="#design-<?php echo $main->main_category_id ?>-<?php echo $c->category_id ?>" role="tab" data-toggle="tab" title="<?php echo ucwords($c->category_name) ?>"><?php echo ucwords($c->category_name); ?></a></li>
                                        <?php }
                                            }
                                        } ?>
                                    </ul>
                                </div>
                                <div class="col-md-10 col-sm-12 col-xs-12 megamenu-post tab-content">
                                    <?php foreach ($upload_data as $key => $ud) {
                                        if ($main->main_category_id == $key) { ?>
                                            <?php foreach ($ud as $key1 => $u1) {
                                                $i = 0; ?>
                                                <div role="tabpanel" class="tab-pane <?php if ($main->main_category_id == $key && $key1 == 1) {
                                                                                            echo 'active';
                                                                                        } ?>" id="design-<?php echo $key; ?>-<?php echo $key1; ?>">
                                                    <?php foreach ($u1 as $key2 => $u2) {
                                                        $i++; ?>
                                                        <div class="col-md-3 col-sm-4 col-xs-4">
                                                            <div class="type-post">
                                                                <div class="entry-cover">
                                                                    <a href="<?php echo base_url() . 'post/' . $u2->meta_slug; ?>">
                                                                        <?php if ($u2->upload_type == "text" || $u2->upload_type == "audio") : ?>
                                                                            <img src="<?php echo (isset($u2->thumbnail)) ? base_url("uploads/assets/uploaded_data/posts_thumbnail/" . $u2->sub_category_id . "/" . $u2->thumbnail) : base_url("assets/images/medicalDirectors.jpg"); ?>" alt="<?php echo $u2->upload_type; ?>" style="width: 205px; height: 205px;" />
                                                                        <?php endif; ?>
                                                                        <?php if ($u2->upload_type == "video") : ?>
                                                                            <img src="<?php echo $u2->thumbnail_path; ?>" alt="<?php echo $u2->upload_type; ?>" style="width: 205px; height: 205px;" />
                                                                        <?php endif; ?>
                                                                        <?php if ($u2->upload_type == "image") : ?>
                                                                            <img src="<?php echo (isset($u2->thumbnail)) ? base_url("uploads/assets/uploaded_data/posts_thumbnail/" . $u2->sub_category_id . "/" . $u2->thumbnail) : base_url("assets/images/medicalDirectors.jpg"); ?>" alt="<?php echo $u2->upload_type; ?>" style="width: 205px; height: 205px;" />
                                                                        <?php endif; ?>
                                                                        <?php if ($u2->upload_type == "pdf") : ?>
                                                                            <img src="<?php echo base_url("assets/images/pdfthumbnail.png") ?>" alt="<?php echo $u2->upload_type; ?>" style="width: 205px; height: 205px;" />
                                                                        <?php endif; ?>
                                                                    </a>
                                                                </div>
                                                                <h3 class="entry-title"><a href="<?php echo base_url() . 'post/' . $u2->meta_slug; ?>"><?php echo $u2->upload_title; ?></a></h3>
                                                                <?php if ($i == 3) {
                                                                    $v2 = '';
                                                                    if ($u2->category_name == 'Text') {
                                                                        $v2 = 'text';
                                                                    }
                                                                    if ($u2->category_name == 'Audio') {
                                                                        $v2 = 'audio';
                                                                    }
                                                                    if ($u2->category_name == 'Video') {
                                                                        $v2 = 'video';
                                                                    }
                                                                    if ($u2->category_name == 'Case Study') {
                                                                        $v2 = 'caseStudy';
                                                                    }
                                                                    if ($u2->category_name == 'Student and Resident Forum') {
                                                                        $v2 = 'forum';
                                                                    }
                                                                    if ($u2->category_name == 'Online event diary') {
                                                                        $v2 = 'event';
                                                                    } ?>
                                                                    <!-- <p style="text-align:right;margin-top:20px;"><a href="<?php echo base_url() . 'mainCategory/post/' . $main->meta_slug . '/' . $v2; ?>" style="color:#000">View all </a></p> -->
                                                                    <p style="text-align:right;margin-top:20px;"><a href="<?php echo base_url() . 'mainCategory/folders/' . $main->meta_slug . '/' . $v2; ?>" style="color:#000">View all </a></p>
                                                                <?php } ?>

                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            <?php } ?>
                                    <?php }
                                    } ?>
                                </div>
                            </div>
                        </li>
                <?php }
                } ?>
                <li><a href="<?php echo base_url() . 'contributor/lists'; ?>" title="Contributors">Contributors</a></li>
                <li>
                    <a href="<?php echo base_url() . 'about-us'; ?>" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false">About Us
                    </a>
                </li>
                </li>
                <li><a href="<?php echo base_url() . 'contact'; ?>" title="Contact Us">Contact Us</a></li>
                <li>
                    <?php if ($controller != 'front' && $controller != 'mainCategory') { ?>
                        <div class="navbar-form navbar-right navbar-form-search" role="search">
                            <?php echo form_open("$controller/search", array('id' => 'collectinfo')); ?>
                            <div class="search-form-container hdn" id="search-input-container">
                                <div class="search-input-group">
                                    <button type="button" class="btn btn-success" id="hide-search-input-container"><span class="glyphicon glyphicon-option-horizontal" aria-hidden="true"></span></button>
                                    <div class="form-group">
                                        <input type="text" name="keywords" class="form-control" placeholder="Search for...">
                                    </div>
                                </div>
                            </div>
                            <a class="btn btn-warning" id="search-button"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a>
                            <?php echo form_close(); ?>
                        </div>
                    <?php } ?>
                </li>
            </ul>
        </div>
        <div id="loginpanel" class="desktop-hide">
            <div class="right" id="toggle">
                <a id="slideit" href="#slidepanel"><i class="fo-icons fa fa-inbox"></i></a>
                <a id="closeit" href="#slidepanel"><i class="fo-icons fa fa-close"></i></a>
            </div>
        </div>
    </div>
    <!-- Container /- -->
</nav>