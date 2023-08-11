<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/pCategoryStyle.css" />
    <!-- for icons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Rental Goods - online products renting system</title>
</head>

<body>

    <!------------ database connecting -------------->
    <?php include('../partials/_dbconnect.php'); ?>
 
    <!------------ Navigation bar -------------->
    <?php include('../partials/_navbar_for_category.php'); ?>

    

    <!------------ Product categories list -------------->

    <section id="electronic-product-category" class="section-p2">
        <div class="product-container">
            <div class="products-category-list">
                <h4>Technology Categories</h4>
                <ul class="pc-list">
                    <a href="mobiles.php">
                        <li class="active-li">Mobile</li>
                    </a>
                    <a href="tablets.php">
                        <li>Tablet</li>
                    </a>
                    <a href="computers.php">
                        <li>Computer</li>
                    </a>
                    <a href="drones.php">
                        <li>Drone</li>
                    </a>
                    <a href="games.php">
                        <li>Game</li>
                    </a>
                </ul>
            </div>
            <div class="products-display">
    
            <?php

                $sql = "SELECT * FROM `products` WHERE category = 'mobile'";
                $result = mysqli_query($conn, $sql);
                $noResult = true;
                while ($row = mysqli_fetch_assoc($result)) {
                    $noResult = false;

                    $p_id = $row['id'];
                    $p_title = $row['title'];
                    $p_rent = $row['rent'];
                    $p_img = $row['image'];
                    // $p_desc = $row['description'];

                    echo '
                    <a href="/RentalGoods/show.php?productId=' . $p_id . '&imageURL=\RentalGoods\img\products\\' . $p_img . '" class="link" >
                        <div class="p-card">
                            <div class="image">
                                <img src="\RentalGoods\img\products\\' . $p_img . '" alt="' . $p_title . '" title="' . $p_title . '">
                            </div>
                            <div class="p-detail">
                                <div class="reting">';

                    //---------- product rating ------------ 
                    $rating = 2;
                    
                    for ($i = 0; $i < 5; $i++) {
                        if ($i < $rating) {
                            echo '<i class="las la-star"></i>';
                        } else {
                            echo '<i class="lar la-star"></i>';
                        }
                    }

                    // <p class="p-info">' . substr($p_desc, 0, 85) . ' . . . .</p>
                            echo ' <small>Rating: ' . $rating . '</small>
                                </div>
                                <h6 class="p-name">' . $p_title . '</h6>
                                <h5 class="p-prize">Rent - ' . $p_rent . 'rs/day</h5>
                            </div>
                        </div>
                    </a>';
                }
                if ($noResult) {
                    echo '<div class="no-result">
                            <h3>No Result Found!</h3>
                        </div>';
                }

                ?>

                <!-- <a href="#" class="link">
                    <div class="p-card">
                        <div class="image">
                            <img src="../img/product/Apple-iphone-12-mini-image.jpg" alt="">
                        </div>
                        <div class="p-detail">
                            <div class="reting">
                                <i class="las la-star"></i>
                                <i class="las la-star"></i>
                                <i class="las la-star"></i>
                                <i class="las la-star"></i>
                                <i class="lar la-star"></i>
                            </div>
                            <h6 class="p-name">Apple iphone 12 Mini</h6>
                            <h5 class="p-prize">Rent - 300rs/day</h5>
                            <p class="p-info">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                        </div>
                    </div>
                </a> -->
                
                
            </div>
        </div>
    </section>

    <!------------ Footer -------------->
    <?php include('../partials/_footer_for_category.php'); ?>

    <!------------ Javascript -------------->

    <?php include('../partials/_js_script_for_category.php') ?>


</body>

</html>