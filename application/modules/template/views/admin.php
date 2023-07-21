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

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/jquery.timepicker.min.css">
    <!-- Custom Css -->
    <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/themes/all-themes.css" rel="stylesheet" />
    <script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery-ui.min.js"></script>
    <link href="<?php echo base_url(); ?>assets/css/mdtimepicker.min.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>assets/js/mdtimepicker.min.js"></script>
    
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
        var baseUrl = "<?php echo base_url() ?>";
    </script>
    <!-- include summernote css/js -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>

        <?php if( isset($plugins) && in_array('medium-editor', $plugins )) : ?>
        <!-- Medium Editor -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/medium-editor/bower_components/medium-editor/dist/css/medium-editor.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/medium-editor/bower_components/medium-editor/dist/css/themes/default.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/medium-editor/dist/css/medium-editor-insert-plugin.min.css">
        <style>
            .medium-insert-images.medium-insert-images-grid.small-grid figure {
                width: 10%;
            }

            @media (max-width: 750px) {
                .medium-insert-images.medium-insert-images-grid.small-grid figure {
                    width: 20%;
                }
            }

            @media (max-width: 450px) {
                .medium-insert-images.medium-insert-images-grid.small-grid figure {
                    width: 25%;
                }
            }

            .required,.error p{
               color: red;
            }
            p{
                color: black !important;
            }
        </style>
    <?php endif; ?>
    <?php if( isset($plugins) && in_array('fancybox', $plugins )) : ?>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fancybox/dist/jquery.fancybox.css">
    <?php endif; ?>
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-4P5E9JR15L"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-4P5E9JR15L');
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
    <?php echo $this->load->view('components/sidebar'); ?>
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
    
<input type="hidden" id="baseurl" value="<?php echo base_url();?>"/>
<!--Read More Modal-->
<div class="modal fade" id="readmorebox" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="readmore_title"></h4>
        </div>
        <div class="modal-body">
          <p id="readmore_content"></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
<!--Read More Modal-->



    <?php if( isset($plugins) && in_array('bootstrap-select', $plugins )) : ?>
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>
    <?php endif; ?>

    <script src="<?php echo base_url() ?>assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <script src="<?php echo base_url() ?>assets/plugins/node-waves/waves.js"></script>

    <script src="<?php echo base_url() ?>assets/plugins/sweetalert/sweetalert2.min.js"></script>

    <script src="<?php echo base_url() ?>assets/plugins/timepicker/jquery.timepicker.min.js"></script>

    <?php if( isset($plugins) && in_array('countTo', $plugins )) : ?>
    <script src="<?php echo base_url() ?>assets/plugins/jquery-countto/jquery.countTo.js"></script>
    <script src="<?php echo base_url() ?>assets/js/pages/index.js"></script>
    <?php endif; ?>
    
    <?php if( isset($plugins) && in_array('select2', $plugins )) : ?>
    <!-- SELECT2 plugins JS loaded -->
    <script src="<?php echo  base_url();?>assets/resources/select2.min-new.js" ></script>
    <?php endif; ?>

    <?php if( isset($plugins) && in_array('formWizard', $plugins )) : ?>
    <!-- SELECT2 plugins JS loaded -->
    <script src="<?php echo  base_url();?>assets/js/pages/forms/form-wizard.js" ></script>
    <?php endif; ?>

    <script src="<?php echo base_url() ?>assets/js/admin.js"></script>
    <script src="<?php echo base_url() ?>assets/js/demo.js"></script>
    <script src="<?php echo base_url() ?>assets/resources/common.js"></script>
    <script src="<?php echo base_url() ?>assets/js/pages/ui/tooltips-popovers.js"></script>
    <script type="text/javascript">var controller = "<?php echo $controller ?>";</script>

    <?php if( isset($plugins) && in_array('paginate', $plugins )) : ?>
    <script src="<?php echo base_url() ?>assets/resources/paginate.js"></script>
    <?php endif;?>
    <script src="<?php echo base_url() ?>assets/resources/clear.js"></script>
    <?php if( isset($plugins) && in_array('comment_paginate', $plugins )) : ?>
    <script src="<?php echo base_url() ?>assets/resources/comment_paginate.js"></script>
    <?php endif;?>

    <?php if(isset($js) && sizeof($js)): foreach($js as $javascript): ?>
    <script type="text/javascript" src="<?php echo base_url()?>assets/resources/<?php echo $javascript ?>?ver=<?php echo $timestamp ?>"></script>
    <?php endforeach; endif; ?>
    <?php if( isset($plugins) && in_array('medium-editor', $plugins )) : ?>
        <script src="<?php echo base_url() ?>assets/plugins/medium-editor/bower_components/blueimp-file-upload/js/vendor/jquery.ui.widget.js"></script>
        <script src="<?php echo base_url() ?>assets/plugins/medium-editor/bower_components/blueimp-file-upload/js/jquery.iframe-transport.js"></script>
        <script src="<?php echo base_url() ?>assets/plugins/medium-editor/bower_components/blueimp-file-upload/js/jquery.fileupload.js"></script>
        <script src="<?php echo base_url() ?>assets/plugins/medium-editor/bower_components/medium-editor/dist/js/medium-editor.js"></script>
        <script src="<?php echo base_url() ?>assets/plugins/medium-editor/bower_components/handlebars/handlebars.runtime.min.js"></script>
        <script src="<?php echo base_url() ?>assets/plugins/medium-editor/bower_components/jquery-sortable/source/js/jquery-sortable-min.js"></script> -->

        <!--<script src="../dist/js/medium-editor-insert-plugin.min.js"></script>-->
        <script src="<?php echo base_url() ?>assets/plugins/medium-editor/js/templates.js"></script>
        <script src="<?php echo base_url() ?>assets/plugins/medium-editor/js/core.js"></script>
        <script src="<?php echo base_url() ?>assets/plugins/medium-editor/js/embeds.js"></script>
        <script src="<?php echo base_url() ?>assets/plugins/medium-editor/js/images.js"></script>
        <script>
            $(document).ready(function() {
              $('#upload_description').summernote({
                tabsize: 5,
                height: 250,
                focus: true
              });

              $('#contributors_data').summernote({
                tabsize: 5,
                height: 250,
                focus: true
              });

            });
           
            
        </script>
        
    <?php endif;?>
    <?php if( isset($plugins) && in_array('fancybox', $plugins )) : ?>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/fancybox/dist/jquery.fancybox.min.js"></script>
    <?php endif;?>
    
</body>
</html>