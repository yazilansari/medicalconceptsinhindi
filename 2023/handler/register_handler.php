<?php

include "conn.php";
if (isset($_POST['submit'])) {

    $name = $_POST["name"];
    $designation = $_POST["designation"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $is_referral_code = $_POST["is_referral_code"];
    $referral_code = strtoupper(trim($_POST["referral_code"]));
    $city = $_POST["city"];
    $state = $_POST["state"];
    $pincode = $_POST["pincode"];
    $address = $_POST["address"];
    $type = $_POST["type"];
    $encode_type = base64_encode($_POST["type"]);

    $q = "SELECT * FROM mch_registration WHERE `mobile` = '$mobile'";
    $res = mysqli_query($conn, $q);
    if(mysqli_num_rows($res) > 0) {
        header("Location: ../registration.php?type=".$encode_type."&msg=Duplicate");
        exit();
    }

    $q = "SELECT * FROM mch_registration WHERE `email` = '$email'";
    $res = mysqli_query($conn, $q);
    if(mysqli_num_rows($res) > 0) {
        header("Location: ../registration.php?type=".$encode_type."&msg=Duplicate");
        exit();
    }

    $count = 0;
    if($is_referral_code == 'Yes') {
        if($referral_code != 'THYRONORM' && $referral_code != 'INSUGEN' && $referral_code != 'TELMIKIND' && $referral_code != 'DLS' && $referral_code != 'ZUCANORM' && $referral_code != 'OXRA' && $referral_code != 'ALKEM' && $referral_code != 'ZORYL' && $referral_code != 'MCH' && $referral_code != 'HBC' && $referral_code != 'MCHUSV' && $referral_code != 'ELIXIR' && $referral_code != '9310442098' && $referral_code != 'EMCURE') {
            header("Location: ../registration.php?type=".$encode_type."&msg=Invalid Referral Code");exit();
        }

        $count = 1;
        $sql = "SELECT MAX(count) AS count FROM `mch_registration` WHERE `referral_code` = '$referral_code'";
        $query = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($query);
        if(mysqli_num_rows($query)) {
            $count = $data["count"] + 1;
        }
    }

    if($referral_code == 'THYRONORM') {
        $max_count = 2000;
    } else if($referral_code == 'INSUGEN') {
        $max_count = 1600;
    } else if($referral_code == 'TELMIKIND') {
        $max_count = 1000;
    } else if($referral_code == 'DLS') {
        $max_count = 1000;
    } else if($referral_code == 'ZUCANORM') {
        $max_count = 500;
    } else if($referral_code == 'OXRA') {
        $max_count = 500;
    } else if($referral_code == 'ALKEM') {
        $max_count = 500;
    } else if($referral_code == 'ZORYL') {
        $max_count = 500;
    } else if($referral_code == 'MCH') {
        $max_count = 100;
    } else if($referral_code == 'HBC') {
        $max_count = 1000;
    } else if($referral_code == 'MCHUSV') {
        $max_count = 5000;
    } else if($referral_code == 'ELIXIR') {
        $max_count = 5000;
    } else if($referral_code == '9310442098') {
        $max_count = 5000;
    } else if($referral_code == 'EMCURE') {
        $max_count = 250;
    }

    if($count > $max_count) {
        header("Location: ../registration.php?type=".$encode_type."&msg=Expired Referral Code");
        exit();
    } else {
        $num = "INSERT INTO `mch_registration`(`name`, `designation`, `email`, `mobile`, `type`, `city`, `state`, `pincode`, `address`, `is_referral_code`, `referral_code`, `count`, `created_at`) VALUES ('$name', '$designation', '$email','$mobile', '$type', '$city', '$state', '$pincode', '$address', '$is_referral_code', '$referral_code', '$count', '".date('Y-m-d H:i:s')."')";
        // echo $num;die();
        $num_final = mysqli_query($conn, $num);

        if ($num_final) {
            $_SESSION['reg_id'] = mysqli_insert_id($conn);
            if($is_referral_code == 'No') {
                $_SESSION['type'] = $type;
                header("Location: ../payment.php?type=".$encode_type."&msg=Successfully Added");
            } else {
                $_SESSION['is_referral_code'] = 'Yes';
                header("Location: ../index.php?msg=Successfully Added");
            }
            exit();
        } else {
            header("Location: ../registration.php?type=".$encode_type);
            exit();
        }
    }
} else {
     header("Location: ../index.php");
    exit();
}

?>
