<!DOCTYPE html>
<html lang="en">

<head>

    <!------------ meta & css link -------------->
    <?php include('../Admin/partials/_head_link.php') ?>

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
        <form action="/RentalGoods/partials/_handleForgotPass.php" method="post">
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

    <?php include('../Admin/partials/_js_script.php'); ?>


</body>

</html>