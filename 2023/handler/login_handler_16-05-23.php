<?php

include "conn.php";
// print_r($_SESSION);die();
if (isset($_POST["submit"])) {
    $mobile = $_POST["mobile"];
    $q = "SELECT * FROM mch_registration WHERE `mobile` = '$mobile'";
    $res = mysqli_query($conn, $q);
    if(mysqli_num_rows($res) > 0) {
        $_SESSION["mobile"] = $mobile;
        header("Location: ../index.php?msg=Successfully Login");
        exit();
    } else {
        header("Location: ../index.php?msg=Incorrect Mobile");
        exit();
    }
} else {
    header("Location: ../index.php");
    exit();
}

?>
