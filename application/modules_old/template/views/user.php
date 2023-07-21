<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title><?= $pg_title ?></title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url() ?>assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    
    <!-- Waves Effect Css -->
    <link href="<?php echo base_url() ?>assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url() ?>assets/plugins/animate-css/animate.css" rel="stylesheet" />
    
    <?php if( isset($plugins) && in_array('bootstrap-select', $plugins )) : ?>
    <!-- Bootstrap Select Css -->
    <link href="<?php echo base_url() ?>assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
    <?php endif; ?>

    <!-- Sweet Alert Css -->
    <link href="<?php echo base_url() ?>assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" />

    <?php if( isset($plugins) && in_array('select2', $plugins )) : ?>
    <!-- SELECT2 plugins CSS loaded -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/select2-materialize.css" />
    <?php endif; ?>
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/datepicker.css">
    <!-- Custom Css -->
    <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/themes/all-themes.css" rel="stylesheet" />
    <script type="text/javascript">
        var baseUrl = "<?php echo base_url() ?>";
    </script>
</head>
<body class="theme-<?= $active_theme ?>">
    <?php echo $this->load->view('components/loader'); ?>

    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->

    <!-- Search Bar -->
    <?php echo $this->load->view('components/site-search'); ?>
    <!-- #END# Search Bar -->

    <!-- Top Bar -->
    <?php echo $this->load->view('components/top-bar'); ?>
    <!-- #Top Bar -->
    
    <!-- Side Bar -->
    <?php echo $this->load->view('components/user-sidebar'); ?>
    <!-- #Side Bar -->

    <!-- Page Content -->
    <section class="content">
        <div class="container-fluid">
            <?php
            if(!isset($module)){
                $module = $this->uri->segment(1);
            }

            if(!isset($viewFile)){
                $viewFile = $this->uri->segment(2);
            }

            if( $module != '' && $viewFile != '' ){
                $path = $module. '/' . $viewFile;
                echo $this->load->view($path);
            }
            ?>
        </div>
    </section>
    <!-- #Page Content -->

    <!-- Jquery Core Js -->
    <script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery-ui.min.js"></script>
    
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.js"></script>

    <?php if( isset($plugins) && in_array('bootstrap-select', $plugins )) : ?>
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>
    <?php endif; ?>

    <script src="<?php echo base_url() ?>assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <script src="<?php echo base_url() ?>assets/plugins/node-waves/waves.js"></script>

    <script src="<?php echo base_url() ?>assets/plugins/sweetalert/sweetalert2.min.js"></script>

    <?php if( isset($plugins) && in_array('countTo', $plugins )) : ?>
    <script src="<?php echo base_url() ?>assets/plugins/jquery-countto/jquery.countTo.js"></script>
    <script src="<?php echo base_url() ?>assets/js/pages/index.js"></script>
    <?php endif; ?>
    
    <?php if( isset($plugins) && in_array('select2', $plugins )) : ?>
    <!-- SELECT2 plugins JS loaded -->
    <script src="<?php echo  base_url();?>assets/resources/select2.min-new.js" ></script>
    <?php endif; ?>

    <script src="<?php echo base_url() ?>assets/js/admin.js"></script>
    <script src="<?php echo base_url() ?>assets/js/demo.js"></script>
    <script src="<?php echo base_url() ?>assets/resources/common.js"></script>
    <script src="<?php echo base_url() ?>assets/js/pages/ui/tooltips-popovers.js"></script>
    <script type="text/javascript">var controller = "<?php echo $controller ?>";</script>

    <?php if( isset($plugins) && in_array('paginate', $plugins )) : ?>
    <script src="<?php echo base_url() ?>assets/resources/paginate.js"></script>
    <?php endif;?>

    <?php if(isset($js) && sizeof($js)): foreach($js as $javascript): ?>
    <script type="text/javascript" src="<?php echo base_url()?>assets/resources/<?php echo $javascript ?>?ver=<?php echo $timestamp ?>"></script>
    <?php endforeach; endif; ?>
</body>
</html>