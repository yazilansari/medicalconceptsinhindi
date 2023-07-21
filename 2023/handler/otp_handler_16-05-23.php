<?php
// header("Location: ../index.php");exit();
include "conn.php";
// print_r($_SESSION);die();
if (isset($_POST["submit"])) {
    $otp = $_POST["otp"];
    $mobile = $_SESSION['mobile'];
    $q = "SELECT * FROM mch_registration WHERE `mobile` = '$mobile' AND `otp` = '$otp'";
    $res = mysqli_query($conn, $q);
    if(mysqli_num_rows($res) > 0) {
        header("Location: ../index.php?msg=Valid OTP");
        exit();
    } else {
        header("Location: ../index.php?msg=Incorrect OTP");
        exit();
    }
} else {
    header("Location: ../index.php");
    exit();
}

?>
