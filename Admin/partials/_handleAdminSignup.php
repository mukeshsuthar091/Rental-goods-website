<?php

$showAlert = false;
$showError = false;

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    include('../partials/_dbconnect.php');

    $user_name = $_POST['admin_fullName'];
    $gender = $_POST['admin_gender'];
    $DOB = $_POST['admin_DateOfBirth'];
    $A_card = $_POST['admin_aadharCardNo'];
    $address = $_POST['admin_address'];
    $city = $_POST['admin_city'];
    $country = $_POST['admin_country'];
    $postcode = $_POST['admin_postcode'];
    $mobileNo = $_POST['admin_mobileNumber'];
    $email = $_POST['admin_signUpEmail'];
    $pass = $_POST['admin_signUpPassword'];
    $cPass = $_POST['admin_cPassword'];

    // Check whether this email exists
    $existSql = "SELECT * FROM `admin_user_info` WHERE `email` = '$email'";
    $result = mysqli_query($conn, $existSql);
    $numRows = mysqli_fetch_assoc($result);

    if($numRows > 0){
        $showError = "Email already in use!";
    }
    else{
        if($pass == $cPass){
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            
            $sql = "INSERT INTO `admin_user_info` (`user_name`, `gender`, `date_of_birth`, `aadhar_card_no`, `address`, `city`, `country`, `postcode`, `mobile_no`, `email`, `password`, `timestamp`) VALUES ('$user_name', '$gender', '$DOB', '$A_card', '$address', '$city', '$country', '$postcode', '$mobileNo', '$email', '$hash', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if($result){
                $showAlert = true;
                header("Location: /RentalGoods/Admin/adminSignup.php?signUpSuccess=$showAlert");
                exit();
            }
        }
        else{
            $showError = "Passwords do not match";
        } 
    }
    header("Location: /RentalGoods/Admin/adminSignup.php?signUpFail=$showError");
    
}

?>
