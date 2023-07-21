<?php

include "conn.php";
// print_r($_SESSION);die();
if (isset($_POST["submit"])) {
    $mobile = $_POST["mobile"];
    $q = "SELECT * FROM mch_registration WHERE `mobile` = '$mobile'";
    $res = mysqli_query($conn, $q);
    if(mysqli_num_rows($res) > 0) {
        $otp = rand(1000, 9999);
        $message = 'Dear user , '.$otp. ' is your SECRET OTP (One Time Password) to authenticate your login. Regards, MCHSMS';
        // $numbers = array('91'.$mobile);
        // print_r($numbers);die();
        $sender = 'MCHSMS';
        // $message = urlencode($message);
        // $numbers = implode(',', $numbers);

        $curl = curl_init();

        $headers = array(
            'Content-Type: application/json',
            'apikey: eyJ4NXQiOiJOVGRtWmpNNFpEazNOalkwWXpjNU1tWm1PRGd3TVRFM01XWXdOREU1TVdSbFpEZzROemM0WkE9PSIsImtpZCI6ImdhdGV3YXlfY2VydGlmaWNhdGVfYWxpYXMiLCJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJzdWIiOiJhcGltX3B1YkBjYXJib24uc3VwZXIiLCJhcHBsaWNhdGlvbiI6eyJvd25lciI6ImFwaW1fcHViIiwidGllclF1b3RhVHlwZSI6bnVsbCwidGllciI6IlVubGltaXRlZCIsIm5hbWUiOiJFbnZpc2FnZS1hcHBvbmUiLCJpZCI6NjcsInV1aWQiOiJjNzMzZjNmNi0wZDgxLTRkZGUtYjc4Zi1hNzc5YTNjZjY3NzIifSwiaXNzIjoiaHR0cHM6XC9cLzEwLjAuMS4yMjI6OTQ0M1wvb2F1dGgyXC90b2tlbiIsInRpZXJJbmZvIjp7IlVubGltaXRlZCI6eyJ0aWVyUXVvdGFUeXBlIjoicmVxdWVzdENvdW50IiwiZ3JhcGhRTE1heENvbXBsZXhpdHkiOjAsImdyYXBoUUxNYXhEZXB0aCI6MCwic3RvcE9uUXVvdGFSZWFjaCI6dHJ1ZSwic3Bpa2VBcnJlc3RMaW1pdCI6MCwic3Bpa2VBcnJlc3RVbml0IjpudWxsfX0sImtleXR5cGUiOiJQUk9EVUNUSU9OIiwicGVybWl0dGVkUmVmZXJlciI6IiIsInN1YnNjcmliZWRBUElzIjpbeyJzdWJzY3JpYmVyVGVuYW50RG9tYWluIjoiY2FyYm9uLnN1cGVyIiwibmFtZSI6InNtcyIsImNvbnRleHQiOiJcL3YxXC9zbXMiLCJwdWJsaXNoZXIiOiJhcGltX3B1YiIsInZlcnNpb24iOiJ2MSIsInN1YnNjcmlwdGlvblRpZXIiOiJVbmxpbWl0ZWQifV0sInBlcm1pdHRlZElQIjoiIiwiaWF0IjoxNjM5NjU4NTc4LCJqdGkiOiI5NzE4ZWUyYS1lYTBkLTRiNjAtYWM2Yy0zZTgxZjkxYzFlZTIifQ==.bH5H56PZUxnFBNYn3WHTng8MgQuTpJlINWYECtSpukMhbVnpMTCCASsyspw3nRjjQmHOiWOVOQRsrfQXr9sKvc_jezY3Kfmj7G9x4Xn5rwaDFb1bigiY1tKHN7HVzY7rDcNPoqSBag7zZ-zyqll8YUyRp8j9ihbpBBTteLhjg_q6FUmDfERDIwq6mdMmE_-s90Yea64_3_Xi3YZDWeENDKXKFEpXJMT6tRN6Oa9kxpwGnw8XZInsJmdU5lVfw8V8k2pF5HGpWsg60mrhx8F19L_LuTqu-WRJO6yiRigoktlAPqzrA41WO2b4AoBI9Fuz3RqAsEIyxigtoIabt5Y-Ow==',
        );

        $curl_arr = array(
            'sender_id' => $sender,
            'type' => 'SMS',
            'message' => $message,
            'recipient' => array(
                array(
                    'to' => array(
                        '91'.$mobile,
                    ),
                    'variables' => array(
                        'NAME' => 'MCH',
                    ),
                )
            ),
            'country_specific' => array(
                array(
                    'country' => '91',
                    'entity_id' => '1301159051311269663',
                    'template_id' => '1207168319510942288',
                )
            ),
        );
        // echo "<pre>";print_r(json_encode($curl_arr));die();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.koreroplatforms.com/v1/sms/send',
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => json_encode($curl_arr),
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 0,
        ));

        $curl_response = curl_exec($curl);
        $decoded_res = json_decode($curl_response);
        // echo "<pre>";print_r($decoded_res);die();
        if($decoded_res && $decoded_res->status == 'success') {
            $q = "UPDATE mch_registration SET `otp` = $otp WHERE `mobile` = '$mobile'";
            mysqli_query($conn, $q);
            $_SESSION["mobile"] = $mobile;
            header("Location: ../index.php?msg=Successfully Login");
            exit();
        } else {
            header("Location: ../index.php?msg=Error Occurred While Sending OTP");
            exit();
        }
    } else {
        header("Location: ../index.php?msg=Incorrect Mobile");
        exit();
    }
} else {
    header("Location: ../index.php");
    exit();
}

?>
