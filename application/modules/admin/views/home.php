<div class="container-fluid">
    <div class="block-header">
        <h2>DASHBOARD</h2>
    </div>

    <!-- Widgets -->
    <div class="row clearfix">
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="info-box hover-zoom-effect">
                <div class="icon bg-orange">
                    <i class="material-icons">person_add</i>
                </div>
                <div class="content">
                    <div class="text">TOTAL CATEGORY</div>
                    <div class="number count-to" data-from="0" data-to="<?= $categoryCount ?>" data-speed="15" data-fresh-interval="10"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="info-box hover-zoom-effect">
                <div class="icon bg-white">
                    <i class="material-icons" style="color: #00008B;">person_add</i>
                </div>
                <div class="content">
                    <div class="text">TOTAL SUB CATEGORY</div>
                    <div class="number count-to" data-from="0" data-to="<?= $subCategoryCount ?>" data-speed="15" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="info-box hover-zoom-effect">
                <div class="icon bg-green">
                    <i class="material-icons">person_add</i>
                </div>
                <div class="content">
                    <div class="text">TOTAL POSTS</div>
                    <div class="number count-to" data-from="0" data-to="<?= $postsCount ?>" data-speed="15" data-fresh-interval="10"></div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="info-box hover-zoom-effect">
                <div class="icon bg-orange">
                    <i class="material-icons">person_add</i>
                </div>
                <div class="content">
                    <div class="text">TOTAL USERS</div>
                    <div class="number count-to" data-from="0" data-to="<?= $usersCount ?>" data-speed="15" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="info-box hover-zoom-effect">
                <div class="icon bg-white">
                    <i class="material-icons" style="color:#00008B;">person_add</i>
                </div>
                <div class="content">
                    <div class="text">TOTAL MEDICO USERS</div>
                    <div class="number count-to" data-from="0" data-to="<?= $medicoCount ?>" data-speed="15" data-fresh-interval="10"></div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="info-box hover-zoom-effect">
                <div class="icon bg-green">
                    <i class="material-icons">person_add</i>
                </div>
                <div class="content">
                    <div class="text">TOTAL GENERAL USERS</div>
                    <div class="number count-to" data-from="0" data-to="<?= $generalCount ?>" data-speed="15" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
    </div>
</div>
            <!-- #END# Widgets -->