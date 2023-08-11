<!DOCTYPE html>
<html lang="en">

<head>
    <!------------ meta & css link -------------->
    <?php include('../Admin/partials/_head_link.php') ?>

    <title>Profile Page</title>
</head>

<body>

    <section id="main">

        <?php include('../Admin/partials/_sideMenuBar.php') ?>

        <div class="profileInfo_container right_container">
            <div class="header">
                <h2>Profile</h2>
                <button type="button" class="btn btn-outline-primary" onclick="logout()">Logout</button>
            </div>


            <?php

            include('partials/_dbconnect.php');

            $sql = "SELECT * FROM `admin_user_info` WHERE `sno`= " . $_SESSION['admin_id'];
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            
            
            
            echo '<div id="profile_details">
                    <div>
                        <h6>Full Name </h6>
                        <span>:</span>
                        <p> ' . $row['user_name'] . '</p>
                    </div>
                    <div>
                        <h6>Gender </h6>
                        <span>:</span>
                        <p> ' . $row['gender'] . '</p>
                    </div>
                    <div>
                        <h6>Date of Birth </h6>
                        <span>:</span>
                        <p> ' . $row['date_of_birth'] . '</p>
                    </div>
                    <div>
                        <h6>Aadhar Card no. </h6>
                        <span>:</span>
                        <p> ' . $row['aadhar_card_no'] . '</p>
                    </div>
                    <div>
                        <h6>Present Address </h6>
                        <span>:</span>
                        <p> ' . $row['address'] . '</p>
                    </div>
                    <div>
                        <h6>City </h6>
                        <span>:</span>
                        <p> ' . $row['city'] . '</p>
                    </div>
                    <div>
                        <h6>Country </h6>
                        <span>:</span>
                        <p> ' . $row['country'] . '</p>
                    </div>
                    <div>
                        <h6>Postcode </h6>
                        <span>:</span>
                        <p> ' . $row['postcode'] . '</p>
                    </div>
                    <div>
                        <h6>Mobile no. </h6>
                        <span>:</span>
                        <p> ' . $row['mobile_no'] . '</p>
                    </div>
                    <div>
                        <h6>Email </h6>
                        <span>:</span>
                        <p> ' . $row['email'] . '</p>
                    </div>
                </div>';
            ?>
        </div>
    </section>

    <!------------ Javascript -------------->

    <?php include('../Admin/partials/_js_script.php') ?>


</body>

</html>
