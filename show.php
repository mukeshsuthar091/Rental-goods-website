<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="css/style.css" />
    <!-- for icons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Product Show Page</title>
</head>

<body>

    <!------------ database connecting -------------->
    <?php include('partials/_dbconnect.php'); ?>

    <!------------ Navigation bar -------------->
    <?php include('partials/_navbar.php'); ?>



    <!------------ product show -------------->

    <?php

        $id = $_GET['productId'];
        $imageURL = $_GET['imageURL'];
        $sql = "SELECT * FROM `products` WHERE id = $id ";
        $result = mysqli_query($conn, $sql);

        $row = mysqli_fetch_assoc($result);

        $p_id = $row['id'];
        $p_title = $row['title'];
        $p_rent = $row['rent'];
        // $p_img = $row['image'];
        $p_desc = $row['description'];
        $brandname = $row['brandname'];

    ?>

    <section id="main" class="show">
        <div class="show-container">
            <div class="img-container">
                <div class="product-imgs">
                    <img src="<?php echo $imageURL; ?>" alt="" id="big-img">
                </div>

            </div>

            <div class="product-detail">
                <p class="brand"><?php echo $brandname; ?></p>
                <h3 class="product-name"><?php echo $p_title; ?></h3>
                <p class="about-product"><?php echo $p_desc; ?></p>
                <h4 class="productRent">Rent: <?php echo $p_rent; ?>rs/day</h4>
                <div class="ATK-details" >
                    <div class="rent-info">
                        <div class="number_of_product">
                            <p>Quantity:</p>
                            <input type="number" name="no_of_product" id="no_of_product" value="1" min="0">
                        </div>
                        <!-- <div class="days_to_rent">
                            <p>Rent Days:</p>
                            <input type="number" name="days" id="days" value="1" min="0">
                        </div> -->
                    </div>
                    <button type="button" id="addToCard_btn" class="btn btn-warning m-2" onclick="productAddedInCart(<?php echo $p_id; ?>)">Add to cart</button>
                    <button type="button" id="goToCard_btn" class="btn btn-warning m-2" onclick="window.location.href = '/RentalGoods/cart.php'">Go to cart</button>
                </div>
            </div>
        </div>
    </section>


    <!------------ Footer -------------->
    <?php include('partials/_footer.php'); ?>


    <!------------ Javascript -------------->
    
    <?php include('partials/_js_script.php') ?>
</body>

</html>