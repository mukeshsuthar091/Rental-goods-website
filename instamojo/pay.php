<?php
session_start();


$name=$_GET['name'];
$phone=$_GET['phone'];
$email=$_GET['email'];
$amount=$_GET['amount'];
$purpose=$_GET['purpose'];
$temp=$_GET['uid'];
$temp=$_GET['temp'];
$_SESSION['TEMP']=$temp;
$_SESSION['UID']=$uid;




$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:test_2a734da2d3b8cc7f8d1b9e81a29",
                  "X-Auth-Token:test_2af56c514668c139c2224a983bc"));
$payload = Array(
    'purpose' => $purpose,
    'amount' => $amount,
    'phone' =>$phone,
    'buyer_name' => $name,
    'redirect_url' => '../instamojo/result.php',
    'send_email' => true,
    'send_sms' => true,
    'email' => $email,
    'allow_repeated_payments' => false
);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
$response = curl_exec($ch);
curl_close($ch); 

$response=json_decode($response);
echo '<pre>';
// print_r($response->payment_request->longurl);
$_SESSION['TID']=$response->payment_request->id;
header('location:'.$response->payment_request->longurl);

?>