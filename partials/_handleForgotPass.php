<?php

$showAlert = false;
$showError = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include('_dbconnect.php');

    $email = $_POST['fpEmail'];
    $pass = $_POST['fpPassword'];
    $cpass = $_POST['fpConfirmPassword'];

    $sql = "SELECT * FROM `usersinfo` WHERE `email`='$email'";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);
    if ($numRows == 1) {

        $row = mysqli_fetch_assoc($result);
        $userID = $row['sno'];

        if ($pass == $cpass) {
            $hash = password_hash($pass, PASSWORD_DEFAULT);

            $sql2 = "UPDATE `usersinfo` SET `password` = '$hash' WHERE `sno` = '$userID'";
            $result2 = mysqli_query($conn, $sql2);
            if ($result2) {
                $showAlert = "Your password is successfully changed";
                header("Location: /RentalGoods/forgotPass.php?message=$showAlert");
                exit();
            }
            
        } else {
            $showError = "Passwords do not match";
            header("Location: /RentalGoods/forgotPass.php?showError=$showError");
        }
    } else {
        echo $showError = "user does not exist";
        header("Location: /RentalGoods/forgotPass.php?showError=$showError");
    }
}

?>

