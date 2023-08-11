<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Forgot Password Page</title>
</head>

<body>
    <?php
    if (isset($_GET['message']) && $_GET['message'] == true) {
        echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
        <strong>Success! </strong>'.$_GET["message"].' 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    
    if (isset($_GET['showError']) && $_GET['showError'] == true) {
        echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
                <strong>Error!</strong> Failed to change password because ' . $_GET['showError'] . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
    ?>


    <div class="login_container">
        <form action="/RentalGoods/partials/_handleForgotPass.php" method="post" class="passResetForm">
            <div class="top_side">
                <i class="las la-sign-in-alt"></i>
                <h2>Forgot Password</h2>
                <p>Enter your details to get new password</p>
            </div>
            <div class="bottom_side">
                <div>
                    <label for="fpEmail">Email</label>
                    <input type="email" name="fpEmail" id="fpEmail" required>
                    <i class="las la-user"></i>
                </div>
                <div>
                    <label for="fpPassword">Password</label>
                    <input type="text" name="fpPassword" id="fpPassword" required>
                    <i class="las la-lock"></i>
                </div>
                <div>
                    <label for="fpConfirmPassword">Confirm Password</label>
                    <input type="text" name="fpConfirmPassword" id="fpConfirmPassword" required>
                    <i class="las la-lock"></i>
                </div>
                <p class="option_link">Login your account? <a href="/RentalGoods/login.php">Login</a></p>
                <button type="submit" class="btn btn-primary">submit</button>
            </div>
        </form>
    </div>

   <!------------ Javascript -------------->
    
   <?php include('partials/_js_script.php') ?>

   
</body>

</html>