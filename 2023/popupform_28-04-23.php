<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">			
<title>MCH - Medical Concepts in Hindi By Dr Pankaj Agarwal</title>
<meta name="viewport" content="width=device-width, initial-scale=1">	
<link rel="stylesheet" type="text/css" href="css/plugins.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/templete.css">
<link class="skin" rel="stylesheet" type="text/css" href="css/skin/skin-1.css">
<style>
.bookcover a { width: 100px; height: 38px; line-height: 38px; font-size: 15px; font-weight: 500; }

a.phonemodal-menu { width: 100%; height: 84%; margin-top: 0; background: none; border: none; }
.phonemodal-menu { position: absolute; top: 0; left: 0; width: 100%; height: 90%; }
.bookcover { position: relative; }
a.phonemodal { width: 100%; height: 90%; margin-top: 0; background: none; border: none; }
a.phonemodal:hover { background: none; }
.phonemodal { position: absolute; top: 0; left: 0; width: 100%; height: 90%; }
.modal-header.phoneline { border-bottom: 1px solid #b9b3b3; box-shadow: 0 0 2px #000;
padding-top: 20px; padding-bottom: 5px; }
.subscribe-form .modal-header .close.phoneclose { position: absolute; top: 28px; font-weight: 200; }
.subscribe-form .sub-title.phonecolor .title { font-size: 24px; }
.phnetext input[type="number"] { background: #fff; color: #000; outline-color: #6868688c; margin-top: 10px;
font-size: 15px; border: 1px solid #a19e9e; width: 100%; border-radius: 5px; height: 45px; font-weight: 500; }
.phnetext input[type="number"]::-webkit-inner-spin-button, input[type="number"]::-webkit-outer-spin-button { display: none; }
.phnetext input[type="submit"] { width: 95px; height: 40px; background: #000; color: #fff;
margin: 12px auto; display: block; margin-bottom: 0; border-radius: 5px; font-size: 16px; padding: 0; }


@media(max-width: 1280px) {

}

@media(max-width: 1024px) {
}

@media(max-width: 575.98px) {
}	
</style>	
</head>
<body>
<!-- <div id="loading-area"></div> -->
<div class="modal fade subscribe-modal-bx" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content subscribe-form">
			<div class="modal-header">
				<div class="sub-title">
					<h3 class="title">Join Us To Day</h3>
					<p>Receive Only The Best Posts Via Email</p>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="script/mailchamp.php" method="post" class="dzSubscribe row align-items-center">
					<div class="col-lg-12 col-md-12">
						<div class="form-group">
							<input name="dzName" required="required" type="text" class="form-control" placeholder="Your Name ">
						</div>
					</div>
					<div class="col-lg-12 col-md-12">
						<div class="form-group">
							<input name="dzEmail" required="required" type="email" class="form-control" placeholder="Your Email Address">
						</div>
					</div>
					<div class="col-lg-12 col-md-12">
						<div class="form-group m-b0">
							<button name="submit" value="Submit" type="submit" class="btn secondry radius-no btn-block">Subscribe</button>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="dzSubscribeMsg"></div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!------Phone-Otp-Modal---->
<div class="modal fade subscribe-modal-bx" id="phoneotp1" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content subscribe-form popupphonecss">
			<div class="modal-header phoneline">
				<div class="sub-title phonecolor">
					<h3 class="title">Login</h3>
					<!-- <p>Receive Only The Best Posts Via Email</p> -->
				</div>
				<button type="button" class="close phoneclose" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form>
					<div class="row">
						<div class="col-md-12">
							<div class="phnetext">
								<input type="number" placeholder="enter your phone no*" onkeydown="return event.keyCode !== 69" name="" required>
								<p><a href="registration.php">New User</a></p>
								<!-- <input type="submit" value="Login"> -->
								<a href="#" data-toggle="modal" data-target="#phoneotp" data-dismiss="modal">Login</a>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade subscribe-modal-bx" id="phoneotp" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content subscribe-form popupphonecss">
			<div class="modal-header phoneline">
				<div class="sub-title phonecolor">
					<h3 class="title">Enter OTP</h3>
					<p>check your mobile for the otp</p>
				</div>
				<button type="button" class="close phoneclose" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form>
					<div class="row">
						<div class="col-md-12">
							<div class="phnetext">
								<input type="number" placeholder="One Time Password*" onkeydown="return event.keyCode !== 69" name="" required>
								<input type="submit" value="Submit">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!------END----->
</body>