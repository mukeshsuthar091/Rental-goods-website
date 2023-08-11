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
        <form action="/RentalGoods/partials/_handleSignup.php" method="post" class="signupForm">
            <div class="top_container">
                <i class="las la-user"></i>
                <h2>Create account!</h2>
            </div>
            <div class="bottom_container">
                <div>
                    <label for="fullName">Full Name</label>
                    <input type="text" name="fullName" id="fullName" required>
                </div>
                <div class="option">
                    Gender
                    <select class="form_select" aria-label="Default select example" name="gender" id="gender" required>
                        <option selected>Open this select menu</option>
                        <option value="male">male</option>
                        <option value="female">female</option>
                    </select>
                </div>
                <div>
                    <label for="DateOfBirth">Date Of Birth</label>
                    <input type="text" name="DateOfBirth" id="DateOfBirth" required maxlength="10">
                </div>
                <div>
                    <label for="aadharCardNo">Aadhar Card Number</label>
                    <input type="text" name="aadharCardNo" id="aadharCardNo" required maxlength="14">
                </div>
                <div>
                    <label for="address">Present Address</label>
                    <input type="text" name="address" id="address" required>
                </div>
                <div>
                    <label for="city">City</label>
                    <input type="text" name="city" id="city" required>
                </div>
                <div>
                    <label for="country">Country</label>
                    <input type="text" name="country" id="country" required>
                </div>
                <div>
                    <label for="postcode">Postcode</label>
                    <input type="text" name="postcode" id="postcode" required>
                </div>
                <div>
                    <label for="mobileNumber">Mobile no.</label>
                    <input type="text" name="mobileNumber" id="mobileNumber" required maxlength="10">
                </div>
                <div>
                    <label for="signUpEmail">Email</label>
                    <input type="email" name="signUpEmail" id="signUpEmail" required>
                </div>
                <div>
                    <label for="signUpPassword">Password</label>
                    <input type="text" name="signUpPassword" id="signUpPassword" required>
                </div>
                <div>
                    <label for="cPassword">Confirm Password</label>
                    <input type="text" name="cPassword" id="cPassword" required>
                </div>
                <p class="option_link">Already have an account? <a href="/RentalGoods/login.php">Login</a></p>
                <button type="submit" class="btn btn-primary signupBtn" onclick="goToHomePage()">Submit</button>
            </div>
        </form>
    </div>

    <!------------ Javascript -------------->

    <?php include('partials/_js_script.php') ?>


</body>

</html>