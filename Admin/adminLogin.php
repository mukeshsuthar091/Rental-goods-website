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
        <form action="/RentalGoods/Admin/partials/_handleAdminLogin.php" method="post">
            <div class="top_side">
                <i class="las la-sign-in-alt"></i>
                <h2>Welcome!</h2>
                <p>Sign in to your admin account</p>
            </div>
            <div class="bottom_side">
                <div>
                    <label for="admin_loginEmail">Email</label>
                    <input type="email" name="admin_loginEmail" id="admin_loginEmail" required>
                    <i class="las la-user"></i>
                </div>
                <div>
                    <label for="admin_loginPassword">Password</label>
                    <input type="text" name="admin_loginPassword" id="admin_loginPassword" required>
                    <i class="las la-lock"></i>
                </div>
                <p class="option_link">Don't have an account? <a href="/RentalGoods/Admin/adminSignup.php">Sign Up</a></p>
                <p class="option_link_2"><a href="/RentalGoods/Admin/adminForgotPass.php">Forgot Password</a></p>
                
                <button type="submit" class="btn btn-primary">Login <i class="las la-arrow-right"></i></button>
            </div>
        </form>
    </div>

    <!------------ Javascript -------------->

    <?php include('../Admin/partials/_js_script.php'); ?>


</body>

</html>