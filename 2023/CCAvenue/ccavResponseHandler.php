<?php
	include '../handler/conn.php';
	include('Crypto.php');
	error_reporting(0);
// 	$mch_reg_id = $_POST['reg_id'];
// 	$type = $_POST['type'];
	$workingKey='965EBED0EF92E006DAEA926EAED23F16';		//Working Key should be provided here.
	$encResponse=$_POST["encResp"];			//This is the response sent by the CCAvenue Server
	$rcvdString=decrypt($encResponse,$workingKey);		//Crypto Decryption used as per the specified working key.
	$order_status="";
	$decryptValues=explode('&', $rcvdString);
	$dataSize=sizeof($decryptValues);
	// echo "<center>";

	for($i = 0; $i < $dataSize; $i++) 
	{
		$information=explode('=',$decryptValues[$i]);
		if($i==3)	$order_status=$information[1];
	}

	$inf_order_id = explode('=',$decryptValues[0]);

	$expl_order_id = $inf_order_id[1];



	$inf_tracking_id = explode('=',$decryptValues[1]);

	$expl_tracking_id = $inf_tracking_id[1];



	$inf_bank_ref_no = explode('=',$decryptValues[2]);

	$expl_bank_ref_no = $inf_bank_ref_no[1];



	$inf_payment_mode = explode('=',$decryptValues[5]);

	$expl_payment_mode = $inf_payment_mode[1];



	$inf_card_name = explode('=',$decryptValues[6]);

	$expl_card_name = $inf_card_name[1];



	$inf_status_code = explode('=',$decryptValues[7]);

	$expl_status_code = $inf_status_code[1];



	$inf_status_msg = explode('=',$decryptValues[8]);

	$expl_status_msg = $inf_status_msg[1];



	$inf_amount = explode('=',$decryptValues[10]);

	$expl_amount = $inf_amount[1];



	$inf_billing_name = explode('=',$decryptValues[11]);

	$expl_billing_name = $inf_billing_name[1];



	$inf_billing_address = explode('=',$decryptValues[12]);

	$expl_billing_address = $inf_billing_address[1];



	$inf_billing_city = explode('=',$decryptValues[13]);

	$expl_billing_city = $inf_billing_city[1];



	$inf_billing_state = explode('=',$decryptValues[14]);

	$expl_billing_state = $inf_billing_state[1];



	$inf_billing_zip = explode('=',$decryptValues[15]);

	$expl_billing_zip = $inf_billing_zip[1];



	$inf_billing_country = explode('=',$decryptValues[16]);

	$expl_billing_country = $inf_billing_country[1];



	$inf_billing_tel = explode('=',$decryptValues[17]);

	$expl_billing_tel = $inf_billing_tel[1];



	$inf_billing_email = explode('=',$decryptValues[18]);

	$expl_billing_email = $inf_billing_email[1];



	$inf_shipping_name = explode('=',$decryptValues[19]);

	$expl_shipping_name = $inf_shipping_name[1];



	$inf_shipping_address = explode('=',$decryptValues[20]);

	$expl_shipping_address = $inf_shipping_address[1];



	$inf_shipping_city = explode('=',$decryptValues[21]);

	$expl_shipping_city = $inf_shipping_city[1];



	$inf_shipping_state = explode('=',$decryptValues[22]);

	$expl_shipping_state = $inf_shipping_state[1];



	$inf_shipping_zip = explode('=',$decryptValues[23]);

	$expl_shipping_zip = $inf_shipping_zip[1];



	$inf_shipping_country = explode('=',$decryptValues[24]);

	$expl_shipping_country = $inf_shipping_country[1];



	$inf_shipping_tel = explode('=',$decryptValues[25]);

	$expl_shipping_tel = $inf_shipping_tel[1];



	$inf_type = explode('=',$decryptValues[26]);

	$expl_type = $inf_type[1];


	$inf_reg_id = explode('=',$decryptValues[27]);

	$expl_reg_id = $inf_reg_id[1];



	if($order_status==="Success")
	{
		// echo "<br>Thank you for shopping with us. Your credit card has been charged and your transaction is successful. We will be shipping your order to you soon.";
		$q = "INSERT INTO `mch_orders` (`mch_reg_id`, `order_number`, `tracking_id`, `bank_ref_number`, `payment_mode`, `card_name`, `status_code`, `status_msg`, `order_total`, `order_type`, `billing_name`, `billing_address`, `billing_email`, `billing_mobile`, `billing_country`, `billing_state`, `billing_city`, `billing_zip`, `shipping_name`, `shipping_address`, `shipping_mobile`, `shipping_country`, `shipping_state`, `shipping_city`, `shipping_zip`, `created_at`) VALUES ('$expl_reg_id', '$expl_order_id', '$expl_tracking_id', '$expl_bank_ref_no', '$expl_payment_mode', '$expl_card_name', '$expl_status_code', '$expl_status_msg', '$expl_amount', '$expl_type', '$expl_billing_name', '$expl_billing_address', '$expl_billing_email', '$expl_billing_tel', '$expl_billing_country', '$expl_billing_state', '$expl_billing_city', '$expl_billing_zip', '$expl_shipping_name', '$expl_shipping_address', '$expl_shipping_tel', '$expl_shipping_country', '$expl_shipping_state', '$expl_shipping_city', '$expl_shipping_zip', '".date('Y-m-d H:i:s')."')";

		$num_final = mysqli_query($conn, $num);

		// $_SESSION['reg_id'] = '';

        if ($num_final) {
            header("Location: ../index.php?msg=Paid Successfully");
            exit();
		}
	}
	else if($order_status==="Aborted")
	{
		//echo "<br>Thank you for shopping with us.We will keep you posted regarding the status of your order through e-mail";
		header("Location: ../index.php?msg=Payment Aborted");
        exit();
	
	}
	else if($order_status==="Failure")
	{
		//echo "<br>Thank you for shopping with us.However,the transaction has been declined.";
		header("Location: ../index.php?msg=Payment Failure");
        exit();
	}
	else
	{
		//echo "<br>Security Error. Illegal access detected";
		header("Location: ../index.php?msg=Illegal Access");
        exit();
	
	}

	// echo "<br><br>";

	// echo "<table cellspacing=4 cellpadding=4>";
	// for($i = 0; $i < $dataSize; $i++) 
	// {
	// 	$information=explode('=',$decryptValues[$i]);
	//     	echo '<tr><td>'.$information[0].'</td><td>'.urldecode($information[1]).'</td></tr>';
	// }

	// echo "</table><br>";
	// echo "</center>";
?>
