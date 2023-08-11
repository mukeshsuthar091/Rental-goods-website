<?php

$showAlert = false;
$showError = false;

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    include('_dbconnect.php');

    $user_name = $_POST['fullName'];
    $gender = $_POST['gender'];
    $DOB = $_POST['DateOfBirth'];
    $A_card = $_POST['aadharCardNo'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $postcode = $_POST['postcode'];
    $mobileNo = $_POST['mobileNumber'];
    $email = $_POST['signUpEmail'];
    $pass = $_POST['signUpPassword'];
    $cPass = $_POST['cPassword'];

    // Check whether this email exists
    $existSql = "SELECT * FROM `usersinfo` WHERE `email` = '$email'";
    $result = mysqli_query($conn, $existSql);
    $numRows = mysqli_fetch_assoc($result);

    if($numRows > 0){
        $showError = "Email already in use!";
    }
    else{
        if($pass == $cPass){
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            
            $sql = "INSERT INTO `usersinfo` (`user_name`, `gender`, `date_of_birth`, `aadhar_card_no`, `address`, `city`, `country`, `postcode`, `mobile_no`, `email`, `password`, `timestamp`) VALUES ('$user_name', '$gender', '$DOB', '$A_card', '$address', '$city', '$country', '$postcode', '$mobileNo', '$email', '$hash', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if($result){
                $showAlert = true;
                header("Location: /RentalGoods/signup.php?signUpSuccess=$showAlert");
                exit();
            }
        }
        else{
            $showError = "Passwords do not match";
        } 
    }
    header("Location: /RentalGoods/signup.php?signUpFail=$showError");
    
}

?>
