<!-- #Top Bar -->
<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image" style="text-align:center">
            </div>
            <div class="info-container">
                <div><?php echo $this->session->get_field_from_session('user_name'); ?></div>

                <div class="btn-group user-helper-dropdown">

                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="color:<?= $active_theme ?>">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="javascript:void(0);"><i class="material-icons">person</i><?php echo $this->session->get_field_from_session('user_name'); ?></a></li>
                        <li role="seperator" class="divider"></li>
                        <li><a href="<?php echo base_url() ?>ho/logout"><i class="material-icons">input</i>Sign Out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <li <?php echo ($mainmenu == 'ho') ? 'class="active"': ''; ?>>
                    <a href="<?php echo base_url('ho/home') ?>">
                        <i class="material-icons">home</i>
                        <span>Home</span>
                    </a>
                </li>

                <li <?php echo ($mainmenu == 'doctor') ? 'class="active"': ''; ?>>
                    <a href="<?php echo base_url("doctor/lists?t=$timestamp") ?>">
                        <i class="material-icons">account_box</i>
                        <span>Doctor</span>
                    </a>
                </li>

                <li <?php echo ($mainmenu == 'patient') ? 'class="active"': ''; ?>>
                    <a href="<?php echo base_url("patient/lists?t=$timestamp") ?>">
                        <i class="material-icons">accessible</i>
                        <span>Patient</span>
                    </a>
                </li>

                <li <?php echo ($mainmenu == 'report') ? 'class="active"': ''; ?>>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">assignment</i>
                        <span>Reports</span>
                    </a>
                    <ul class="ml-menu">
                        <li <?php echo ($menu == 'camp') ? 'class="active"': ''; ?>>
                            <a href="<?php echo base_url("reports/view/type/camp") ?>">Camp Reports</a>
                        </li>
                        <li <?php echo ($menu == 'geo_camp') ? 'class="active"': ''; ?>>
                            <a href="<?php echo base_url("reports/view/type/geo_camp") ?>">Geography Wise Camp Reports</a>
                        </li>
                        <li <?php echo ($menu == 'division_camp') ? 'class="active"': ''; ?>>
                            <a href="<?php echo base_url("reports/view/type/division_camp") ?>">Division Wise Camp Reports</a>
                        </li>
                        <li <?php echo ($menu == 'patient') ? 'class="active"': ''; ?>>
                            <a href="<?php echo base_url("reports/view/type/rcpa") ?>">Camp RCPA Reports</a>
                        </li>
                        <li <?php echo ($menu == 'comment') ? 'class="active"': ''; ?>>
                            <a href="<?php echo base_url("reports/view/type/comment") ?>">Camp Comments Reports</a>
                        </li>
                        <li <?php echo ($menu == 'camp_exe') ? 'class="active"': ''; ?>>
                            <a href="<?php echo base_url("reports/view/type/camp_exe") ?>">Camp Execution Reports</a>
                        </li>
                        <li <?php echo ($menu == 'patient') ? 'class="active"': ''; ?>>
                            <a href="<?php echo base_url("reports/view/type/patient") ?>">Patient Reports</a>
                        </li>
                        <li <?php echo ($menu == 'consum') ? 'class="active"': ''; ?>>
                            <a href="<?php echo base_url("reports/view/type/consum") ?>">Consumption Reports</a> 
                        </li>
                    </ul>
                </li>

                <!-- <li <?php echo ($mainmenu == 'report') ? 'class="active"': ''; ?>>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">person_add</i>
                        <span>Reports</span>
                    </a>
                    <ul class="ml-menu">

                        <li <?php echo ($menu == 'asm_wise_patient_count') ? 'class="active"': ''; ?>>
                            <a href="<?php echo base_url("reports/view/type/asm_wise_patient_count?t=$timestamp") ?>">ASM Wise Patient/Drug Count</a>
                        </li>
                    </ul>
                </li> -->
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; <?= (date('Y') - 1) ?> - <?= date('Y') ?> <a href="javascript:void(0);">Admin - <?= config_item('title') ?></a>.
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