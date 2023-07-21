<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="<?= ($this->session->get_field_from_session('role') !='HO') ? base_url('admin/home') : base_url('ho/home') ?>"><?php echo config_item('title') ?></a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <?php if($this->uri->segment(2)!="add" && $this->uri->segment(2)!="edit" && $this->uri->segment(2)!="view"){?>
                <ul class="nav navbar-nav navbar-right">
                <?= ($this->session->get_field_from_session('role') =='DR') ? "<li><a href=".base_url('doctor/logout').">Logout</a></li>" : '<li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>' ?>
                </ul>
            <?php } else {?>
                <ul class="nav navbar-nav navbar-right">
                
                </ul>
            <?php }?>
        </div>
    </div>
</nav>