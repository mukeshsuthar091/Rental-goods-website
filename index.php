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
    <title>Rental Goods - online products renting system</title>
</head>

<body>

    <!------------ database connecting -------------->
    <?php include('partials/_dbconnect.php'); ?>

    <!------------ Navigation bar -------------->
    <?php include('partials/_navbar.php'); ?>



    <!------------ hero -------------->

    <section id="hero">
        <div class="start-banner">
            <h1>Pay small amount of rent and enjoy using top branded items.</h1>
            <p>Products are affordable and in top Conditions to rent them. Delivery service is available and 24x7 customer service.</p>
        </div>
    </section>


    

    <!------------ Features -------------->
    <section id="feature" class="section-p1">
        <div class="container-fluid f-container">
            <div class="fe-box">
                <img src="/RentalGoods/img/features/f1.png" alt="">
                <h6>Free Shipping</h6>
            </div>

            <div class="fe-box">
                <img src="/RentalGoods/img/features/f2.png" alt="">
                <h6>Online Order</h6>
            </div>

            <div class="fe-box">
                <img src="/RentalGoods/img/features/f3.png" alt="">
                <h6>Save Money</h6>
            </div>

            <div class="fe-box">
                <img src="/RentalGoods/img/features/f7.png" alt="">
                <h6>Cash/Online Payment</h6>
            </div>

            <div class="fe-box">
                <img src="/RentalGoods/img/features/f5.png" alt="">
                <h6>Happy Sell</h6>
            </div>

            <div class="fe-box">
                <img src="/RentalGoods/img/features/f6.png" alt="">
                <h6>F24/7 Support</h6>
            </div>
        </div>
    </section>


    <!------------ Product categories list -------------->

    <section id="product-category" class="section-p1">
        <div class="container-fluid">
            <h2>Product Categories</h2>
            <p>All kind of products which you are looking for to rent.</p>
            <div class="pro-container">
                <div class="category">
                    <a href="/RentalGoods/Electronics/washingMachine.php">
                        <img src="img/categories/appliances.jpg" alt="">
                        <h4>Electronic</h4>
                    </a>
                </div>
                <div class="category">
                    <a href="/RentalGoods/Furnitures/sofa_sets.php">
                        <img src="img/categories/furniture.jpg" alt="">
                        <h4>Furnitures</h4>
                    </a>
                </div>
                <div class="category">
                    <a href="/RentalGoods/Technologies/mobiles.php">
                        <img src="img/categories/technology.webp" alt="">
                        <h4>Technologies</h4>
                    </a>
                </div>
                <div class="category">
                    <a href="">
                        <img src="img/categories/wedding dresses.jpg" alt="">
                        <h4>Dresses</h4>
                    </a>
                </div>
                <div class="category">
                    <a href="">
                        <a href="">
                            <img src="img/categories/decoration-1.jpg" alt="">
                            <h4>Decoration Items</h4>
                        </a>
                    </a>
                </div>
                <div class="category">
                    <a href="">
                        <img src="img/categories/medical-checkup.jpg" alt="">
                        <h4>Medical Checkup Machine</h4>
                    </a>
                </div>
                <div class="category">
                    <a href="">
                        <img src="img/categories/gaming1.jpeg" alt="">
                        <h4>Gaming Items</h4>
                    </a>
                </div>
                <div class="category">
                    <a href="">
                        <img src="img/categories/home_appliances.png" alt="">
                        <h4>Home Appliances</h4>
                    </a>
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