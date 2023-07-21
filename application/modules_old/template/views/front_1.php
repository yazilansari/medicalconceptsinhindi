<!DOCTYPE html>
<!--[if lt IE 7 ]> 
<html class="ie6">
    <![endif]-->
    <!--[if IE 7 ]>    
    <html class="ie7">
        <![endif]-->
        <!--[if IE 8 ]>    
        <html class="ie8">
            <![endif]-->
            <!--[if IE 9 ]>    
            <html class="ie9">
                <![endif]-->
                <!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en">
    <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title><?= $pg_title ?></title>
        <!-- Standard Favicon -->
        <link rel="icon" type="image/x-icon" href="<?php echo base_url() ?>front_assets/images/favicon.ico" />
        <!-- For iPhone 4 Retina display: -->
        <link rel="apple-touch-icon-precomposed" href="<?php echo base_url() ?>front_assets/images/apple-touch-icon-114x114-precomposed.png">
        <!-- For iPad: -->
        <link rel="apple-touch-icon-precomposed" href="<?php echo base_url() ?>front_assets/images/apple-touch-icon-72x72-precomposed.png">
        <!-- For iPhone: -->
        <link rel="apple-touch-icon-precomposed" href="<?php echo base_url() ?>front_assets/images/apple-touch-icon-57x57-precomposed.png">
        <!-- Library - Google Font Familys -->      
        <link href="https://fonts.googleapis.com/css?family=Bentham|Fira+Sans:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Lato:100,100i,300,300i,400,400i,700,700i,900,900i|Montserrat:400,700|Noto+Serif:400,400i,700,700i|Oswald:200,300,400,500,600,700|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
        <!-- Library -->
        <link href="<?php echo base_url() ?>front_assets/css/lib.css" rel="stylesheet">
        <!-- Custom - Common CSS -->
        <link href="<?php echo base_url() ?>front_assets/css/plugins.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>front_assets/css/elements.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>front_assets/css/rtl.css" rel="stylesheet"><!-- 
        <link href="<?php echo base_url() ?>front_assets/css/waves.min.css" rel="stylesheet">
        <link rel='stylesheet' href='https://michael-zhigulin.github.io/mz-codepen-projects/Material%20Design%20UI%20Audio%20Player/font/font.css'> -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>front_assets/css/style.css">
        <script type="text/javascript">
            var baseUrl = "<?php echo base_url() ?>";
        </script>
        <script type="text/javascript">var controller = "<?php echo $controller ?>";</script>
        <style type="text/css">
            .pagination{padding-left: 13px !important;}
            .pagination>li>a, .pagination>li>span{color: #FF9800 !important;}
            .pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover, .pagination>.active>li>a{z-index: 3;color: white !important;cursor: default;background-color: darkorange !important;border-color: darkorange !important;}

        </style>
        <!--[if lt IE 9]>
        <script src="js/html5/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <!-- Loader -->
        <?php echo $this->load->view('components/front_loader'); ?>
        <!-- Loader /- -->    
        <!-- Header Section -->
        <header class="header_s header_s1">
            <!-- SidePanel -->
            <?php echo $this->load->view('components/front-top-bar'); ?>
            <!-- SidePanel /- -->
            <!-- Ownavigation -->
            <?php echo $this->load->view('components/front-nav-bar'); ?>
            <!-- Ownavigation /- -->
        </header>
        <!-- Header Section /- --> 
        <div class="main-container">
        <main class="site-main">
        <!-- Single Post -->
            <div class="container-fluid no-left-padding no-right-padding single-post">
                <!-- Container -->
                <?php if( isset($plugins) && (in_array('contact', $plugins )) || (in_array('about-us', $plugins ))) : ?>
                <div class="container">
                <?php endif;?>

                <?php if( isset($plugins) && !in_array('contact', $plugins )) : ?>
                <div class="container-fluid">
                <?php endif;?>
                
                    <div class="row">
                        <div class="col-md-12 text-center" style="padding-bottom:50px;"><img src="<?php echo base_url() ?>front_assets/images/header-img.png"></div>
                        <!-- Content Area -->
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

                            <?php if( isset($plugins) && in_array('contact', $plugins )) { ?>
                                
                            <?php } else if( isset($plugins) && in_array('about-us', $plugins )){?>

                            <?php } else {?>      
                                <?php echo $this->load->view('components/front-widget-area'); ?> 
                            <?php }?>
                        <!-- Widget Area /- -->
                    </div>
                </div>
                <!-- Container /- -->
            </div>
        </main>
        </div>
        <!-- Single Post /- -->
        <!-- Footer Main -->
        <?php echo $this->load->view('components/front-footer'); ?>
        <!-- Footer Main /- -->    
        <!-- JQuery v1.12.4 -->
        <script src="<?php echo base_url() ?>front_assets/js/jquery-1.12.4.min.js"></script>
        <!-- Library - Js -->
        <script src="<?php echo base_url() ?>front_assets/js/lib.js"></script>
        <!-- Library - Theme JS -->
        <script src="<?php echo base_url() ?>front_assets/js/functions.js"></script><!-- 
        <script src="<?php echo base_url() ?>front_assets/js/waves.min.js"></script>
        <script src="<?php echo base_url() ?>front_assets/js/index.js"></script> -->

        <?php if( isset($plugins) && in_array('front_paginate', $plugins )) : ?>
            <script src="<?php echo base_url() ?>assets/resources/front_paginate.js"></script>
        <?php endif;?>
        <?php if( isset($plugins) && in_array('consum', $plugins )) : ?>
            <script src="<?php echo base_url() ?>assets/resources/consum.js"></script>
        <?php endif;?>
        <?php if( isset($plugins) && in_array('main_category_post', $plugins )) : ?>
            <script src="<?php echo base_url() ?>assets/resources/main_category_post.js"></script>
        <?php endif;?>

        <?php if( isset($plugins) && in_array('post_comment', $plugins )) : ?>
            <script src="<?php echo base_url() ?>assets/resources/post_comment.js"></script>
        <?php endif;?>
        <?php if( isset($plugins) && in_array('contact', $plugins )) : ?>
            <script src="<?php echo base_url() ?>assets/resources/contact.js"></script>
        <?php endif;?>
        <script type="text/javascript">
            $(document).ready(function(){
                $(document).on("click", ".collapse_product", function(){

                    var id = $(this).attr('data-id');
                    
                    $(this).closest('ul').toggleClass('collapse in');
                    
                });
            });
        </script>
    </body>
</html>