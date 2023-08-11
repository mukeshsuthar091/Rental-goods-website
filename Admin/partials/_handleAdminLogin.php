<?php

$showAlert = false;
$showError = false;

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    include('../partials/_dbconnect.php');

    $email = $_POST['admin_loginEmail'];
    $pass = $_POST['admin_loginPassword'];

    $sql = "SELECT * FROM `admin_user_info` WHERE `email`='$email'";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);
    if($numRows == 1){
        $row = mysqli_fetch_assoc($result);

        if (password_verify($pass, $row['password'])) {
            session_start();
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_id'] = $row['sno'];
            $_SESSION['admin_name'] = $row['user_name'];
            $_SESSION['admin_email'] = $row['email'];
            header('Location: /RentalGoods/Admin/dashboard.php');
        }
        else{
            // echo "password incorrect";
            header('Location: /RentalGoods/Admin/adminLogin.php?loginFail=You entered incorrect password.');
        }
    }
    else{
        // echo "user does not exist";
        header('Location: /RentalGoods/Admin/adminLogin.php?loginFail=User does not exist.');
    }
}


?>