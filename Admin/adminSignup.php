<!DOCTYPE html>
<html lang="en">

<head>
    <!------------ meta & css link -------------->
    <?php include('../Admin/partials/_head_link.php') ?>

    <title>SignUp Page</title>
</head>

<body>

    <?php

    if (isset($_GET['signUpSuccess']) && $_GET['signUpSuccess'] == true) {
        echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
                <strong>Success!</strong> You can now login 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }

    if (isset($_GET['signUpFail']) && $_GET['signUpFail'] == true) {
        echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
        <strong>Error!</strong> Failed to signup because ' . $_GET['signUpFail'] . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }

    ?>

    <div class="signUp_container">
        <form action="/RentalGoods/Admin/partials/_handleAdminSignup.php" method="post">
            <div class="top_container">
                <i class="las la-user"></i>
                <h2>Create your admin account!</h2>
            </div>
            <div class="bottom_container">
                <div>
                    <label for="admin_fullName">Full Name</label>
                    <input type="text" name="admin_fullName" id="admin_fullName" required>
                </div>
                <div class="option">
                    Gender
                    <select class="form_select" aria-label="Default select example" name="admin_gender" id="admin_gender" required>
                        <option selected>Open this select menu</option>
                        <option value="male">male</option>
                        <option value="female">female</option>
                    </select>
                </div>
                <div>
                    <label for="admin_DateOfBirth">Date Of Birth</label>
                    <input type="text" name="admin_DateOfBirth" id="admin_DateOfBirth" required maxlength="10">
                </div>
                <div>
                    <label for="admin_aadharCardNo">Aadhar Card Number</label>
                    <input type="text" name="admin_aadharCardNo" id="admin_aadharCardNo" required maxlength="16">
                </div>
                <div>
                    <label for="admin_address">Present Address</label>
                    <input type="text" name="admin_address" id="admin_address" required>
                </div>
                <div>
                    <label for="admin_city">City</label>
                    <input type="text" name="admin_city" id="admin_city" required>
                </div>
                <div>
                    <label for="admin_country">Country</label>
                    <input type="text" name="admin_country" id="admin_country" required>
                </div>
                <div>
                    <label for="admin_postcode">Postcode</label>
                    <input type="text" name="admin_postcode" id="admin_postcode" required>
                </div>
                <div>
                    <label for="admin_mobileNumber">Mobile no.</label>
                    <input type="text" name="admin_mobileNumber" id="admin_mobileNumber" required maxlength="10">
                </div>
                <div>
                    <label for="admin_signUpEmail">Email</label>
                    <input type="email" name="admin_signUpEmail" id="admin_signUpEmail" required>
                </div>
                <div>
                    <label for="admin_signUpPassword">Password</label>
                    <input type="text" name="admin_signUpPassword" id="admin_signUpPassword" required>
                </div>
                <div>
                    <label for="admin_cPassword">Confirm Password</label>
                    <input type="text" name="admin_cPassword" id="admin_cPassword" required>
                </div>
                <p class="option_link">Already have an account? <a href="/RentalGoods/Admin/adminLogin.php">Login</a></p>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

    <!------------ Javascript -------------->

    <?php include('../Admin/partials/_js_script.php'); ?>


</body>

</html>