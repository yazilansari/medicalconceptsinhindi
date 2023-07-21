<footer id="footer-main" class="container-fluid no-left-padding no-right-padding footer-main">
    <!-- Top Footer -->
    <div class="container-fluid no-left-padding no-right-padding top-footer">
        <!-- Container -->
        <div class="container">
            <!-- Row -->
            <div class="row">
                <!-- Widget About -->
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <aside class="widget widget_about">
                        <h3 class="widget-title">ABOUT US</h3>
                        <div class="logo-block"><a href="<?php echo base_url() ?>"><img src="<?php echo base_url() ?>front_assets/images/logo-2.png" alt="Logo" /></a></div>
                        <p>
                            MCH, medical science में समझ विकसित करने का ही एक छोटा सा प्रयास है| इसका उद्देश्य मेडिकल कॉलेज के किसी सबसे कमजोर
                            दिखते हुए student में भी वही समझ विकसित करना है जो केवल language barrier अथवा हमारे education system में रटंत शैली के
                            कारण पिछड़ रहा है| MCH का उद्देश्य पोथियों का पुलिंदा बनाना तो है ही नहीं| Medical science की अथाह जानकारियो से बचते
                            हुये किसी विषय के मूल तत्व को भली भांति के मन में उतार पाने में मदद करना पाना संभवतः एक बेहतर चिकित्सक के निर्माण में
                            अधिक मदद कर सकेगा।
                        </p>
                    </aside>
                </div>
                <!-- Widget About /- -->
                <!-- Widget Links -->
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <aside class="widget widget_categories">
                        <h3 class="widget-title">categories</h3>
                        <ul>
                            <?php if(!empty($main_category)){ foreach($main_category as $main_cat){?>
                                <li><a href="<?php echo base_url().'mainCategory/type/'.$main_cat->meta_slug;?>" title="<?php echo $main_cat->main_category_name;?>"><?php echo $main_cat->main_category_name;?> </a></li>
                            <?php } }?>
                        </ul>
                    </aside>
                </div>
                <!-- Widget Links /- -->
                <!-- Widget Category -->
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <a href="https://play.google.com/store/apps/details?id=com.techizer.usv.chikitsashastra" target="_blank"><img src="<?php echo base_url() ?>front_assets/images/download-app.png"></a>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <a href="https://itunes.apple.com/us/app/medical-concepts-in-hindi/id1406319037?ls=1&mt=8" target="_blank" style="margin-left: 11px !important;"><img src="<?php echo base_url() ?>front_assets/images/app-store-1.png"></a>
                </div>
                <!-- Widget Category /- -->
            </div>
            <!-- Row /- -->
        </div>
        <!-- Container /- -->
    </div>
    <!-- Top Footer -->
    <!-- Bottom Footer -->
    <div class="container-fluid bottom-footer">
        <p>&copy; 2018. All Rights Reserved. </p>
    </div>
    <!-- Bottom Footer /- -->
</footer>