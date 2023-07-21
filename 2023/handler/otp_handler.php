<?php
// header("Location: ../index.php");exit();
include "conn.php";
// print_r($_SESSION);die();
if (isset($_POST["submit"])) {
    $otp = $_POST["otp"];
    $mobile = $_SESSION['mobile'];
    $q = "SELECT * FROM `mch_registration` WHERE `mobile` = '$mobile' AND `otp` = '$otp'";
    $res = mysqli_query($conn, $q);
    if(mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            // print_r($row);
            // $_SESSION["email"] = $row['email'];
            $_SESSION['reg_id'] = $row['id'];
            $id = $_SESSION['reg_id'];
            if($row['is_referral_code'] == 'No') {
                $q2 = "SELECT * FROM `mch_orders` WHERE `mch_reg_id` = '$id'";
                $res2 = mysqli_query($conn, $q2);
                if(mysqli_num_rows($res2) > 0) {
                    $_SESSION['payment'] = 'Done';
                }
            } else {
                $_SESSION['is_referral_code'] = 'Yes';
            }

        }
        // die();
        header("Location: ../index.php?msg=Valid OTP");
        exit();
    } else {
        header("Location: ../ejournals-feb-2023.php?msg=Incorrect OTP");
        exit();
    }
} else {
    header("Location: ../index.php");
    exit();
}

?>
