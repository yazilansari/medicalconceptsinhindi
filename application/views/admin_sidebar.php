<!-- #Top Bar -->
<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar" >
        <!-- User Info -->
        <div class="user-info">
            <div class="image" style="text-align:center">
            </div>
            <div class="info-container">
                <div><?php echo $this->session->get_field_from_session('user_name'); ?></div>
                <!-- <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo ucwords($this->session->get_field_from_session('user_name')) ?></div> -->
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="color:yellow">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                        <li role="seperator" class="divider"></li>
                        <li><a href="<?php echo base_url() ?>admin/logout"><i class="material-icons">input</i>Sign Out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <li>
                    <a href="<?php echo base_url('admin/home') ?>">
                    <i class="material-icons">home</i>
                    <span>Home</span>
                    </a>
                </li>
                <li class="<?php echo ($this->uri->uri_string() == 'App_vision/index') ? 'active' : '';?>">
                    <a href="<?php echo base_url("App_vision/index") ?>">
                        <i class="fas fa-tachometer-alt material-icons" style="font-size:20px"></i>
                        <span>App Vision</span>
                    </a>
                </li>
                <li class="<?php echo ($this->uri->uri_string() == 'App_vision_new/index') ? 'active' : '';?>">
                    <a href="<?php echo base_url("App_vision_new/index") ?>">
                        <i class="fas fa-tachometer-alt material-icons" style="font-size:20px"></i>
                        <span>App Vision New</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url("category/lists?t=1609394548") ?>">
                    <i class="material-icons">public</i>
                    <span>Category</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url("category/lists_new?t=1609394548") ?>">
                    <i class="material-icons">public</i>
                    <span>Category New</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url("folder/lists?t=1609394548") ?>">
                    <i class="material-icons">folder</i>
                    <span>Folder</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url("subcategory/lists?t=1609394548") ?>">
                    <i class="material-icons">account_box</i>
                    <span>Sub Category</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url("subcategory/lists_new?t=1609394548") ?>">
                    <i class="material-icons">account_box</i>
                    <span>Sub Category New</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url("subcategory/lists_image?t=1609394548") ?>">
                    <i class="material-icons">collections</i>
                    <span>Sub Category Images/Video</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url("posts/lists?all=all_results") ?>">
                    <i class="material-icons">comment</i>
                    <span>Posts</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url("posts/lists_new?all=all_results") ?>">
                    <i class="material-icons">comment</i>
                    <span>Posts New</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url("contributors/lists?t=1609394548") ?>">
                    <i class="material-icons">person_add</i>
                    <span>Contributors</span>
                    </a>
                </li>
                 <li>
                    <a href="<?php echo base_url("contributors/lists_new?t=1609394548") ?>">
                    <i class="material-icons">person_add</i>
                    <span>Contributors New</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url("comments/lists?t=1609394548") ?>">
                    <i class="material-icons">public</i>
                    <span>Comments</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url("comments/lists_new?t=1609394548") ?>">
                    <i class="material-icons">public</i>
                    <span>Comments New</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url("gallery/lists?t=1609394548") ?>">
                    <i class="material-icons">collections</i>
                    <span>Gallery</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">assignment</i>
                        <span>Reports</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="<?php echo base_url("reports/view/type/registered") ?>">Users Registered Reports</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url("reports/view/type/registered_new") ?>">New User Registered Reports</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url("reports/view/type/viewed") ?>">Users Posts Viewed Reports</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url("reports/view/type/contact") ?>">Contact Us Reports</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url("reports/view/type/contact_new") ?>">New Contact Us Reports</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal" >
            <div class="copyright" >
                &copy; <?= (date('Y') - 1) ?> - <?= date('Y') ?> <a href="javascript:void(0);" style="color:white !important;">Admin - <?= config_item('title') ?></a>.
            </div>
            <div class="version">
                <b>Version: </b> 1.0
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
    <aside id="rightsidebar" class="right-sidebar">
        <ul class="nav nav-tabs tab-nav-right" role="tablist">
            <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                <ul class="demo-choose-skin">
                    <?php foreach($themes as $key=>$value): ?>
                    <li data-theme="<?= $value ?>" class="<?= ($value == $active_theme) ? 'active' : '' ?> ">
                        <div class="<?= $value ?>"></div>
                        <span><?= ucwords(str_replace('-', ' ', $value)) ?></span>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </aside>
    <!-- #END# Right Sidebar -->
</section>
<script src="https://kit.fontawesome.com/ca92620e44.js" crossorigin="anonymous"></script>