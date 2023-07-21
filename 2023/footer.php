<!-- Footer -->
<?php //print_r($_SESSION);?>
<footer class="site-footer wow fadeIn" data-wow-duration="1s" data-wow-delay="0.8s">
    <div class="footer-top">
        <div class="container">
			<div class="row">
				<div class="col-md-4 align-self-center">
					<ul class="footer-link m-b0 p-l0">
						<li><a href="index.php">Home</a></li>
						<li><a href="about-me.php">About Us</a></li>
						<li><a href="contact-me.php">Contact Us</a></li>
						<li><a href="gallery.php">Gallery</a></li>
					</ul>						
				</div>
				<?php 
					$count = 0;
					$q = "SELECT count(*) as count FROM mch_registration";
    				$res = mysqli_query($conn, $q);
    				if(mysqli_num_rows($res) > 0) {
    					while ($row = mysqli_fetch_assoc($res)) {
	            			$count = $row['count'];
    					}
    				}
    			?>
				<div class="col-md-4">
					<div class="footer-logo">
						<a href="index.php"><img src="images/footer-logo.png" alt=""/></a>
						<p>Total Registration Count: <?php echo $count; ?></p>
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
				<p>© 2023. Copyright MCH PRAKASHAN.</p>				
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
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="js/jquery.rwdImageMaps.min.js"></script>
<script type="text/javascript">	
$(document).ready(function(e) {
   $('img[usemap]').rwdImageMaps();    
});
</script>	
</body>
<script>
// function paynow(product_name) {
// 	var options = {
// 	    "key": "rzp_test_kueQzX1Pk53ZLa", // Test Mode
// 	    // "key": "rzp_live_JEh9uIfQPfWlTY",
// 	    "amount": 100 * 100,
// 	    "currency": 'INR',
// 	    "name": "MCH 2023 Payment",
// 	    "email": "mchprakashan@gmail.com",
// 	    "description": "Test Transaction",
// 	    "image": "http://medicalconceptsinhindi.in/2023/images/logo.png",
// 	    "prefill":
// 	    {
// 	    	"contact": "<?php echo $_SESSION['mobile']; ?>",
// 	      	"email": "<?php echo $_SESSION['email']; ?>",
// 	    },
// 	    "callback_url": "https://eneqd3r9zrjok.x.pipedream.net/",
// 	    "handler": function (response) {
// 	        console.log(response);
// 	        var obj = {
// 				'product_name': product_name,
// 				'razorpay_payment_id': response.razorpay_payment_id
// 			};
// 			if(response.razorpay_payment_id) {
// 				$.ajax({
// 					type: "POST",
// 					contentType: "application/json; charset=utf-8",
// 					url: "handler/payment.php",
// 					data: JSON.stringify(obj),
// 					cache: false,
// 					success: function(result) {
// 						//alert('Payment successfully');
// 						window.location.href = 'index.php';
// 					},
// 					error: function(err) {
// 						alert(err);
// 					}
// 				});
// 			}
// 	    },
// 	    "modal": {
// 	      "ondismiss": function () {
// 	        if (confirm("Are you sure, you want to close the form?")) {
// 	          txt = "You pressed OK!";
// 	          console.log("Checkout form closed by the user");
// 	        } else {
// 	          txt = "You pressed Cancel!";
// 	          console.log("Complete the Payment")
// 	        }
// 	      }
// 	    },
// 	    "notes": {
// 	        "address": "Razorpay Corporate Office"
// 	    },
// 	    "theme": {
// 	        "color": "#528FF0"
// 	    }
// 	};
// 	var rzp1 = new Razorpay(options);
// 	rzp1.open();
// }
function showpreview() {
document.getElementById("yess").style.display="block";
$("#referral_code").attr("required", "true");
}
function hidepreview() {
$("#referral_code").removeAttr("required");
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
$(".owl-category").owlCarousel({
loop:true,
autoplay: false,
margin:20,
nav:true,
navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
responsive:{
0:{
	items:1
},
600:{
	items:4
},
1000:{
	items:4	
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
		rzp1.open();
	} else if('<?php echo $_GET['msg']; ?>' == 'Error Occurred While Sending OTP') {
		$("#phoneotp1").modal("show");
		$("#error_while").show();
	} else if('<?php echo $_GET['msg']; ?>' == 'Invalid Referral Code') {
		$("#invalid_referral_code").show();
	} else if('<?php echo $_GET['msg']; ?>' == 'Expired Referral Code') {
		$("#expired_referral_code").show();
	}  else if('<?php echo $_GET['msg']; ?>' == 'Paid Successfully') {
		$("#payment_modal").modal("show");
	} else if('<?php echo $_GET['msg']; ?>' == 'Payment Aborted') {
		$("#payment_regarding").modal("show");
	} else if('<?php echo $_GET['msg']; ?>' == 'Payment Failure') {
		$("#payment_regarding").modal("show");
	} else if('<?php echo $_GET['msg']; ?>' == 'Illegal Access') {
		$("#payment_regarding").modal("show");
	}
});

window.onload = function() {
	var d = new Date().getTime();
	document.getElementById("tid").value = d;
	document.getElementById("order_id").value = 'MCH'+d;
};
</script>
</html>
