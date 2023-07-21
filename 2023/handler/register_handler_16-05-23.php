<?php

include "conn.php";
if (isset($_POST['submit'])) {

    $name = $_POST["name"];
    $designation = $_POST["designation"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];

    $q = "SELECT * FROM mch_registration WHERE `mobile` = '$mobile'";
    $res = mysqli_query($conn, $q);
    if(mysqli_num_rows($res) > 0) {
        header("Location: ../registration.php?msg=Duplicate");
        exit();
    }

    $q = "SELECT * FROM mch_registration WHERE `email` = '$email'";
    $res = mysqli_query($conn, $q);
    if(mysqli_num_rows($res) > 0) {
        header("Location: ../registration.php?msg=Duplicate");
        exit();
    }

    $num = "INSERT INTO `mch_registration`(`name`, `designation`, `email`, `mobile`, `otp`, `created_at`) VALUES ('$name', '$designation', '$email','$mobile', '123456', '".date('Y-m-d H:i:s')."')";
    // echo $num;die();
    $num_final = mysqli_query($conn, $num);

    if ($num_final) {
        header("Location: ../registration.php?msg=Successfully Added");
        exit();
    } else {
        header("Location: ../registration.php");
        exit();
    }
} else {
     header("Location: ../index.php");
    exit();
}

?>
