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
                        <div class="logo-block"><a href="<?php echo base_url() ?>"><img src="<?php echo base_url() ?>front_assets/images/logo.png" alt="Logo" /></a></div>
                        <p style="color:black">
                            MCH, medical science में समझ विकसित करने का ही एक छोटा सा प्रयास है| इसका उद्देश्य मेडिकल कॉलेज के किसी सबसे कमजोर
                            दिखते हुए student में भी वही समझ विकसित करना है जो केवल language barrier अथवा हमारे education system में रटंत शैली के
                            कारण पिछड़ रहा है| MCH का उद्देश्य पोथियों का पुलिंदा बनाना तो है ही नहीं| Medical science की अथाह जानकारियो से बचते
                            हुये किसी विषय के मूल तत्व को भली भांति के मन में उतार पाने में मदद करना पाना संभवतः एक बेहतर चिकित्सक के निर्माण में
                            अधिक मदद कर सकेगा।
                        </p>
                    </aside>
                    <a href="" class="policy_a" id="policy_a" style="color:black;text-decoration:none;font-weight:bolder">Privacy Policy</a>
                </div>
                <!-- Widget About /- -->
                <!-- Widget Links -->
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <aside class="widget widget_categories">
                        <h3 class="widget-title">categories</h3>
                        <ul>
                            <?php if (!empty($main_category)) {
                                foreach ($main_category as $main_cat) { ?>
                                    <li><a href="<?php echo base_url() . 'mainCategory/type/' . $main_cat->meta_slug; ?>" title="<?php echo $main_cat->main_category_name; ?>"><?php echo $main_cat->main_category_name; ?> </a></li>
                            <?php }
                            } ?>
                        </ul>
                    </aside>
                </div>
                <!-- Widget Links /- -->
                <!-- Widget Category -->
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <a href="https://play.google.com/store/apps/details?id=com.techizer.usv.chikitsashastra" target="_blank"><img src="<?php echo base_url() ?>front_assets/images/download-app.png"></a>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-6" style="display: none;">
                    <a href="https://itunes.apple.com/us/app/medical-concepts-in-hindi/id1406319037?ls=1&mt=8" target="_blank" style="margin-left: 11px !important;"><img src="<?php echo base_url() ?>front_assets/images/app-store-1.png"></a>
                </div>
                <!-- Widget Category /- -->
            </div>
            <!-- Row /- -->
            <div style="color:white" class="soc_links_div">
                <a href="mailto:info@medicalconceptsinhindi.com"><i class="fas fa-envelope"></i></a>
                <a href="https://www.facebook.com/MCH-Medical-Concepts-in-Hindi-106283164695886/"><i class="fab fa-facebook"></i></a>
                <a href="https://twitter.com/mchindiaapp"><i class="fab fa-twitter"></i></a>
                <a href="https://www.google.com/url?q=https://www.instagram.com/mchindiaapp/&sa=D&source=hangouts&ust=1608629247992000&usg=AFQjCNHiBcs_pYTSUhDwpkEq48yxP69Hfw"><i class="fab fa-instagram"></i></a>
                <a href="https://www.youtube.com/channel/UCRw96Otfjs8Yb5_x6aFIpCA/"><i class="fab fa-youtube"></i></a>
                <a href="https://www.google.com/url?q=https://www.linkedin.com/company/mch&sa=D&source=hangouts&ust=1608629247992000&usg=AFQjCNETxtrLIcrsqeHDCNujaJ3Ey2TH1A"><i class="fab fa-linkedin"></i></a>
            </div>
        </div>
        <!-- Container /- -->
    </div>
    <!-- Top Footer -->
    <!-- Bottom Footer -->
    <div class="container-fluid bottom-footer" style="font-weight: bold;">
        <p>&copy; 2018-2021. All copyright reserved to Dr. Pankaj Agarwal.</p>
	<p>Designed & Developed by <a href="https://nktech.in/" target="_blank" style="text-decoration:none">NKTech</a></p>
    </div>
    <!-- Bottom Footer /- -->
</footer>

<div class="policy_modal_wrapper">
    <span class="privacy_close_icon">
        <i class="fas fa-times-circle policy_close_btn"></i>
    </span>
    <div class="policy_modal">
        <h4 style="text-align:center;text-decoration:underline">Medical Concepts In Hindi (MCH) Privacy Policy</h4>
        Medical Concepts In Hindi (MCH) understands how important the privacy of personal information is to our users. This Privacy Policy will tell you what information we collect about you and about your use of Medical Concepts In Hindi (MCH) and its services. It will explain the choices you have about how your personal information is used and how we protect that information. We urge you to read this Privacy Policy carefully.
        <p>This Privacy Policy applies to websites owned and operated by Medical Concepts In Hindi (MCH) that are intended for use by consumers (non-professionals) for non-commercial personal, family or household purposes, including Medical Concepts In Hindi (MCH).com and the mobile optimized versions of these sites and our Mobile Device Applications or "Apps" (we refer to these sites and Apps collectively as the “Medical Concepts In Hindi (MCH) Sites”). We refer to the Medical Concepts In Hindi (MCH) Sites and Apps, along with the information and services made available to you through the Medical Concepts In Hindi (MCH) Sites and Apps, as the “Services.”</p>
        <p>Except where noted, statements in this Privacy Policy with respect to the Medical Concepts In Hindi (MCH) Sites also apply to the Apps. If you do not want us to collect, use or disclose information about you and your use of the Services as described in this Privacy Policy, then you should not use the Services. By using the Services, you must agree to the Medical Concepts In Hindi (MCH) Terms of Use, which is the contract betweenus and users of the Services. By accepting the Medical Concepts In Hindi (MCH) Terms of Use, you confirm that you have read and understand this Privacy Policy and the Medical Concepts In Hindi (MCH) Cookie Policyand you acknowledge that we will store, use and otherwise process your information in the United States where we are located.</p>
        <p>References to "Medical Concepts In Hindi (MCH)," “we” or “us” mean Medical Concepts In Hindi (MCH) , including any company that Medical Concepts In Hindi (MCH) controls (for example, a subsidiary that Medical Concepts In Hindi (MCH) owns). Medical Concepts In Hindi (MCH) may share information among its subsidiaries or websites that it owns or controls, but information collected under this Privacy Policy isalways protected under the terms of this Privacy Policy. Except as otherwise noted in this Privacy Policy, Medical Concepts In Hindi (MCH) is the data controller responsible for the processing of your personal information as described in this Privacy Policy.</p>
        <p>When you use the Services, we collect information as follows:</p>
        <strong>Registration</strong>
        <p>While you may use most of the Services without registering, certain Services do require that you registerwith Medical Concepts In Hindi (MCH) for them to function properly. If you choose to register or update an existing account with Medical Concepts In Hindi (MCH) or access certain Services, you may be required to provide certain personal information, such as your name, address, telephone number, gender, email address and date of birth, and a username and password to access your Medical Concepts In Hindi (MCH) account. You are responsible for ensuring the accuracy of the personal information that you submit to Medical Concepts In Hindi (MCH).</p>
        <p>This Privacy Policy does not apply to information, content, business information, ideas, concepts or inventions that you send to Medical Concepts In Hindi (MCH) by email. If you want to keep content or businessinformation, ideas, concepts or inventions private or proprietary, do not send them in an email to Medical Concepts In Hindi (MCH).</p>
        Services and Device Information
        <p>When you access and use the Services, Medical Concepts In Hindi (MCH) automatically collects and stores in its server logs information from your browser or mobile device such as your IP address or unique device identifier, browser information (including referring URL), your preferences and settings, cookies and information about the content you have viewed and actions taken (e.g., search queries, ad engagement, clicks and the associated dates and times). Medical Concepts In Hindi (MCH) may also collect device-specific information when you install and use an App including your device model, operating system information, advertising ID (which is a unique, user-resettable identification number for advertising associated with a mobiledevice) and App version and usage information. When enabled by you, we collect precise location information provided by your mobile device, which you may disable through the device settings.</p>
        For more information about our how cookies and other tracking technologies are used in connection with the Services, please read our Cookie Policy.
        <p>When you download and install one of our Apps onto your mobile device we assign a random number toyour App installation. This number cannot be used to identify you personally, and we cannot identify you personally unless you choose to become a registered user of the App. We use this random number in a manner similar to our use of cookies as described in this Privacy Policy and in our Cookie Policy. Unlike cookies, the random number is assigned to your installation of the App itself and not a browser, because the App does not work through your browser. Therefore the random number cannot be removed through settings. If you do not want us to use the random number for the purposes for which we use cookies, please do not use the Apps. Our use of cookies and other tracking technologies on our mobile optimized sites and our flagship Medical ConceptsIn Hindi (MCH) App are similar to our use on our desktop sites. Your choices to reject cookies, use the NetworkAdvertising Initiative and the opt-out mechanism described below in the section "Your Choices and Rights" are available on our flagship Medical Concepts In Hindi (MCH) App and on our mobile optimized sites.</p>
        <strong>How Information Collected About You Is Used</strong>
        <p>Information about your use of the Services may be used for the following purposes: </p>
        to provide, improve and create new Services,<br>
        to respond to your inquiries and to send you administrative communications about the Medical Concepts In Hindi (MCH) Sites and Services,<br>
        to obtain your feedback about the Medical Concepts In Hindi (MCH) Sites and Services,<br>
        to offer lead generation services,<br>
        to detect and defend against fraud and other threats to the Services and our users,<br>
        to identify issues with the Services,<br>
        to conduct research and measurement activities, including those described below, and to administer your account.<br>
        <p>In addition, Medical Concepts In Hindi (MCH) may use personal information about you for other purposes that are disclosed to you at the time we collect the information and/or with your consent.</p>
        <strong>Sharing Your Information</strong>
        <p>Medical Concepts In Hindi (MCH) Subsidiaries and Corporate Affiliates</p>
        <p>We may also include social widgets on the Medical Concepts In Hindi (MCH) Sites which enable you tointeract with the associated social media services, e.g., to share an article. These widgets may collect browsing data which may be received by the third party that provided the widget, and are controlled by these third parties.You may be able to manage your privacy preferences directly with the applicable social network platform.</p>
        Compliance with Law, Regulation, and Law Enforcement Requests
        <p>To cooperate with government and law enforcement officials and private parties to enforce and comply with law, we may release personal information to third parties: (1) to comply with legal requirements such as a law, regulation, search warrant, subpoena or court order; (2) when we believe in good faith that disclosure is necessary to protect our rights, protect your safety or the safety of others, investigate fraud, or respond to a government request; or (3) in special cases, such as in response to a physical threat to you or others, to protect property or defend or assert legal rights. In addition, we may disclose personal information as described below.How Your Information is Secured and Retained</p>
        <p> We take reasonable security measures to protect the security of your personal information. Despite Medical Concepts In Hindi (MCH)'s efforts to protect your personal information, there is always some risk that an unauthorized third party may find a way around our security systems or that transmissions of your information over the Internet may be intercepted.</p>
        <p>The security of your personal information is important to us. When you enter personal information (including personal health information in various Services), we encrypt the transmission of that information or use SSL connections (Secure Socket Layer) technology.</p>
        <p>We will retain your personal information as long as your account is active or as needed to provide you Services. At any time you can remove your personal information or instruct us to remove it, but you should be aware that it is not technologically possible to remove each and every record of the information you have provided to Medical Concepts In Hindi (MCH) from our servers. See “Your Choices and Rights” below for more information on how you can update or remove your personal information. We will also retain your personal information as necessary to comply with legal obligations, resolve disputes and enforce our agreements.</p>
        <strong>Your Choices and Rights</strong>
        <p>Updating/Removing Your Personal Information</p>
        <p>If you do not want your personal information used by Medical Concepts In Hindi (MCH) as provided in this Privacy Policy, you should not use the Medical Concepts In Hindi (MCH) Sites, Apps and Services. You can correct, update or review personal information you have previously submitted by going back to the specific Service, logging-in and making the desired change. You can also update any personal information you have submitted by contacting us using the contact information listed below or through the Contact Us link provided at the bottom of every page of the Medical Concepts In Hindi (MCH) Sites.</p>
        <p>If you have registered and desire to delete any of your registration information you have provided to us from our systems please contact us using the contact information listed below in the “Contacting Medical Concepts In Hindi (MCH) About Your Personal Information or Privacy” section or through the Contact Us link provided at the bottom of every page of the Medical Concepts In Hindi (MCH) Sites. Upon your request, we will delete your registration information from our active databases and where feasible from our back-up media. You should be aware that it is not technologically possible to remove each and every record of the information you have provided to the Medical Concepts In Hindi (MCH) Sites from our servers.</p>
        <strong>Cookies</strong>
        <p>Most browser software can be set to reject Cookies. Most browsers offer instructions on how to reset thebrowser to reject Cookies in the "Help" or “Settings” or “Preferences” section of your browser’s toolbar. Refer to our Cookie Policy for additional information about opting out of Cookies.</p>
        <p>Interest-Based Advertising Opt-Out</p>
        <p>When you use the Services, we collect, store, use and otherwise process your personal information as described in this Privacy Policy. We rely on a number of legal bases to process your information, including where: (i) necessary for our legitimate interests in providing and improving the Services including offering you content and advertising that may be of interest to you; (ii) necessary for our legitimate interest in keeping the Services, Sites and Apps safe and secure; (iii) necessary for the legitimate interests of our service providers and partners; (iv) necessary to perform our contractual obligations in the Medical Concepts In Hindi (MCH) Terms of Use; (v) you have consented to the processing, which you can revoke at any time (however a revocation doesnot affect the lawfulness of processing of your personal data that occurred prior to the date of revocation); (vi) you have expressly made the information public, e.g., in public forums; (vii) necessary to comply with a legal obligation such as a law, regulation, search warrant, subpoena or court order or to exercise or defend legal claims; and (viii) necessary to protect your vital interests, or those of others.</p>
        <p>We will retain your personal information for as long as necessary to provide the Services to you and fulfill the purposes described in this Privacy Policy. This is also the case for third parties within whom we share your information to perform services on our behalf. When we no longer need to use your personal information and there is no need for us to keep it to comply with our legal or regulatory obligations, we will either remove it from our systems or anonymize it. If you have registered with Medical Concepts In Hindi (MCH) and you no longer want us to use your registration information to provide the Services to you, you may close your account.</p>
        <p>We reserve the right to change or modify this Privacy Policy and any of our Services at any time and any changes will be effective upon being posted unless we advise otherwise. If we make any material changes to this Privacy Policy we will notify you by means of a notice on the Medical Concepts In Hindi (MCH) Sites and/or by email to our registered users (sent to the email address specified when you register) prior to the change becoming effective. By continuing to use the Services after changes are made to this Privacy Policy, youagree to such changes. We encourage you to periodically review this Privacy Policy for the latest information on our privacy practices. If you do not accept the terms of this Privacy Policy, we ask that you do not register with us and that you do not use the Medical Concepts In Hindi (MCH) Sites. Please exit the Medical Concepts In Hindi (MCH) Sites immediately if you do not agree to the terms of this Privacy Policy.</p>
    </div>
</div>
<script src="https://kit.fontawesome.com/ca92620e44.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.policy_a').click(function(e) {
            e.preventDefault();
            $('.policy_modal_wrapper').fadeIn();
        });
        $('i.policy_close_btn').click(function() {
            $('.policy_modal_wrapper').fadeOut();
        });
    });
</script>