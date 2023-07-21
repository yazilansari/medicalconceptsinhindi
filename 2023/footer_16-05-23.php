<!-- Footer -->
<footer class="site-footer wow fadeIn" data-wow-duration="1s" data-wow-delay="0.8s">
    <div class="footer-top">
        <div class="container">
			<div class="row">
				<div class="col-md-4 align-self-center">
					<ul class="footer-link m-b0 p-l0">
						<li><a href="index.php">Home</a></li>
						<li><a href="about-me.php">About Us</a></li>
						<li><a href="contact-me.php">Contact Us</a></li>
						<li><a href="#">E-Shop</a></li>
					</ul>						
				</div>
				<div class="col-md-4">
					<div class="footer-logo">
						<a href="index.php"><img src="images/footer-logo.png" alt=""/></a>
					</div>
				</div>
				<div class="col-md-4 align-self-center">
					<ul class="social-icon m-b0 p-l0">
						<li><a href="https://www.facebook.com/profile.php?id=100063935207754" class="btn radius-xl"><i class="fa fa-facebook"></i></a></li>
						<li><a href="https://twitter.com/mch_drpankaj?lang=en" class="btn radius-xl"><i class="fa fa-twitter"></i></a></li>
						<!-- <li><a href="javascript:void(0);" class="btn radius-xl"><i class="fa fa-linkedin"></i></a></li>
						<li><a href="javascript:void(0);" class="btn radius-xl"><i class="fa fa-instagram"></i></a></li>
						<li><a href="javascript:void(0);" class="btn radius-xl"><i class="fa fa-youtube-play"></i></a></li> -->
					</ul>
				</div>					
			</div>
		</div>
    </div>
	<div class="footer-bottom">
		<div class="container">
			<div class="row m-0">
			<div class="col-md-6 col-sm-12 copyrit">
				<p>© 2023. Copyright Medical Concept in Hindi.</p>				
			</div>
			<div class="col-md-6 col-sm-12 termscondn">
				<p>
				<a href="refund-and-cancellation-policy.php">Refund Policy</a> |
				<a href="terms-and-conditions.php">Terms & Conditions</a> |	
				<a href="privacy-policy.php">Privacy Policy</a>		
				</p>				
			</div>	
			<!-----
			<div class="col-md-6 col-sm-12">
				<div class="privacy">
					<p> Medical Concepts In Hindi (MCH) <a href="privacy-policy.php">Privacy Policy</a></p>
				</div>
			</div>----->
			</div>
		</div>
	</div>
</footer>
<!-- Footer END-->
<button class="scroltop fa fa-chevron-up" ></button>
</div>
<!-- JAVASCRIPT FILES ========================================= -->
<script src="js/jquery.min.js"></script><!-- JQUERY.MIN JS -->
<script src="plugins/wow/wow.js"></script><!-- WOW JS -->
<script src="plugins/bootstrap/js/popper.min.js"></script><!-- BOOTSTRAP.MIN JS -->
<script src="plugins/bootstrap/js/bootstrap.min.js"></script><!-- BOOTSTRAP.MIN JS -->
<script src="plugins/bootstrap-select/bootstrap-select.min.js"></script><!-- FORM JS -->
<script src="plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script><!-- FORM JS -->
<script src="plugins/magnific-popup/magnific-popup.js"></script><!-- MAGNIFIC POPUP JS -->
<script src="plugins/counter/waypoints-min.js"></script><!-- WAYPOINTS JS -->
<script src="plugins/counter/counterup.min.js"></script><!-- COUNTERUP JS -->
<script src="plugins/imagesloaded/imagesloaded.js"></script><!-- IMAGESLOADED -->
<script src="plugins/masonry/masonry-3.1.4.js"></script><!-- MASONRY -->
<script src="plugins/masonry/masonry.filter.js"></script><!-- MASONRY -->
<script src="plugins/owl-carousel/owl.carousel.js"></script><!-- OWL SLIDER -->
<script src="plugins/scroll/scrollbar.min.js"></script><!-- Scroll Bar -->
<script src="plugins/lightgallery/js/lightgallery-all.min.js"></script><!-- Lightgallery -->
<script src="js/custom.js"></script><!-- CUSTOM FUCTIONS  -->
<script src="js/dz.carousel.js"></script><!-- SORTCODE FUCTIONS -->
<script src="js/dz.ajax.js"></script><!-- CONTACT JS  -->
</body>
<script>
$(document).ready(function(){
$(".setResizeMargin").css("margin", "0px auto");
});
</script>
<script>
function showpreview() {
document.getElementById("yess").style.display="block";
}
function hidepreview() {
document.getElementById("yess").style.display="none";
}

</script>
<script>
$(".owl-cover-post").owlCarousel({
loop:true,
margin:10,
nav:true,
responsive:{
0:{
	items:1
},
600:{
	items:7
},
1000:{
	items:7	
}
}
}) 
</script>
<script>
$(".owl-carousel1").owlCarousel({
loop:true,
margin:10,
nav:true,
responsive:{
0:{
	items:1
},
600:{
	items:3
},
1000:{
	items:3
}
}
}) 
</script>
<script>
$('.owl-carousel00').owlCarousel({
loop:true,
margin:10,
nav:true,
autoplay:true,
responsive:{
0:{
    items:1
},
600:{
    items:3
},
1000:{
    items:5
}
}
});

$(document).ready(function() {
	if('<?php echo $_GET['msg']; ?>' == 'Successfully Added') {
		$("#registrationmssg").modal("show");
	} else if('<?php echo $_GET['msg']; ?>' == 'Duplicate') {
		$("#duplicate").show();
	} else if('<?php echo $_GET['msg']; ?>' == 'Successfully Login') {
		$("#phoneotp").modal("show");
	} else if('<?php echo $_GET['msg']; ?>' == 'Incorrect Mobile') {
		$("#phoneotp1").modal("show");
		$("#incorrect_mobile").show();
	} else if('<?php echo $_GET['msg']; ?>' == 'Incorrect OTP') {
		$("#phoneotp").modal("show");
		$("#incorrect_otp").show();
	} else if('<?php echo $_GET['msg']; ?>' == 'Valid OTP') {
		$("#valid_otp").modal("show");
	}
});
</script>
</html>
