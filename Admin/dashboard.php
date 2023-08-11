<!DOCTYPE html>
<html lang="en">

<head>
    <!------------ meta & css link -------------->
    <?php include('../Admin/partials/_head_link.php') ?>

    <title>Dashboard Page</title>
</head>

<body>

    <?php include('../Admin/partials/_dbconnect.php'); ?>

    <section id="main">

        <?php include('../Admin/partials/_sideMenuBar.php') ?>

        <div class="dashboard_container right_container">
            <div class="header">
                <h2>Dashboard</h2>
                <button type="button" class="btn btn-outline-primary" onclick="logout()">Logout</button>
            </div>

            <div id="main-content">
                <div class="row g-4">
                    <div class="col-md-3 m-0">
                        <div class="d-card">
                            <img src="/RentalGoods/img/icons/category-icon.png" alt="category-icon">
                            <h4>Total Categories</h4>

                            <?php
                                $adminId = $_SESSION['admin_id'];
                                
                                $sql = "SELECT * FROM `category` WHERE `admin_id` = $adminId";
                                $result = mysqli_query($conn, $sql);
                                $rows = mysqli_num_rows($result);
                                
                                echo '<p>'.$rows.'</p>';
                            ?>

                        </div>
                    </div>

                    <div class="col-md-3 m-0">
                        <div class="d-card">
                            <img src="/RentalGoods/img/icons/product-icon-2.png" alt="product-icon">
                            <h4>Total Products</h4>
                            
                            <?php
                                $sql2 = "SELECT * FROM `products` WHERE `admin_id` = $adminId";
                                $result2 = mysqli_query($conn, $sql2);
                                $rows2 = mysqli_num_rows($result2);

                                echo '<p>'.$rows2.'</p>';
                            ?>

                        </div>
                    </div>

                    <div class="col-md-3 m-0">
                        <div class="d-card">
                            <img src="/RentalGoods/img/icons/customer-icon.png" alt="customer-icon">
                            <h4>Total Customers</h4>
                            
                            <?php
                                $sql2 = "SELECT * FROM `customers` WHERE `admin_id` = $adminId";
                                $result2 = mysqli_query($conn, $sql2);
                                $rows2 = mysqli_num_rows($result2);

                                echo '<p>'.$rows2.'</p>';
                                
                            ?>

                        </div>
                    </div>

                    <div class="col-md-3 m-0">
                        <div class="d-card">
                            <img src="/RentalGoods/img/icons/order-icon.png" alt="order-icon">
                            <h4>Total Orders</h4>

                            <!-- <?php
                                // $sql4 = "SELECT * FROM `orders` WHERE `admin_id` = $adminId";
                                // $result4 = mysqli_query($conn, $sql2);
                                // $rows4 = mysqli_num_rows($result4);

                                // echo '<p>'.$rows4.'</p>';
                            ?> -->

                            <p>0</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>



    <!------------ Javascript -------------->

    <?php include('../Admin/partials/_js_script.php') ?>


</body>

</html>