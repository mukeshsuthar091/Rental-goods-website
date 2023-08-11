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
    <title>Login Page</title>
</head>

<body>
    <?php
    if (isset($_GET['loginFail']) && $_GET['loginFail'] == true) {
        echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
                <strong>Error!</strong> Failed to login because ' . $_GET['loginFail'] . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
    ?>


    <div class="login_container">
        <form action="/RentalGoods/partials/_handleLogin.php" method="post" class="loginForm">
            <div class="top_side">
                <i class="las la-sign-in-alt"></i>
                <h2>Welcome!</h2>
                <p>Sign in to your account</p>
            </div>
            <div class="bottom_side">
                <div>
                    <label for="loginEmail">Email</label>
                    <input type="email" name="loginEmail" id="loginEmail" required>
                    <i class="las la-user"></i>
                </div>
                <div>
                    <label for="loginPassword">Password</label>
                    <input type="text" name="loginPassword" id="loginPassword" required>
                    <i class="las la-lock"></i>
                </div>
                <p class="option_link">Don't have an account? <a href="/RentalGoods/signup.php">Sign Up</a></p>
                <p class="option_link_2"><a href="/RentalGoods/forgotPass.php">Forgot Password</a></p>

                <button type="submit" class="btn btn-primary">Login <i class="las la-arrow-right"></i></button>
            </div>
        </form>
    </div>

   <!------------ Javascript -------------->
    
   <?php include('partials/_js_script.php') ?>

   
</body>

</html>