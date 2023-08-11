<?php

$showAlert = false;
$showError = false;

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    include('_dbconnect.php');

    $email = $_POST['loginEmail'];
    $pass = $_POST['loginPassword'];

    $sql = "SELECT * FROM `usersinfo` WHERE `email`='$email'";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);
    if($numRows == 1){
        $row = mysqli_fetch_assoc($result);

        if (password_verify($pass, $row['password'])) {
            session_start();
            $_SESSION['logged_in'] = true;
            $_SESSION['sno'] = $row['sno'];
            $_SESSION['user_name'] = $row['user_name'];
            header('Location: /RentalGoods/index.php');
        }
        else{
            // echo "password incorrect";
            header('Location: /RentalGoods/login.php?loginFail=You entered incorrect password.');
        }
    }
    else{
        // echo "user does not exist";
        header('Location: /RentalGoods/login.php?loginFail=User does not exist.');
    }
}


?>