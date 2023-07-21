<?php
include "conn.php";
$data = json_decode(file_get_contents("php://input", true));
// echo "<pre>";print_r($data);die();
$product_name = $data->product_name;
$payment_id = $data->razorpay_payment_id;
$mobile = $_SESSION['mobile'];
// echo "INSERT INTO `mch_orders` (`mobile`, `product_name`, `payment_id`, `payment_status`) VALUES ('$mobile', '$product_name', '$payment_id', 'success')";die();
$num = "INSERT INTO `mch_orders` (`mobile`, `product_name`, `payment_id`, `payment_status`, `created_at`) VALUES ('$mobile', '$product_name', '$payment_id', 'success', '".date('Y-m-d H:i:s')."')";
$num_final = mysqli_query($conn, $num);
$symbol = "";
if ($num_final) {
    $symbol = "success";
} else {    
    $symbol = "error";
}
json_encode($symbol);
?>
