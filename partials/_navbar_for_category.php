<?php

session_start();

echo '
<section id="header">
    <div class="navbar-container">
        <div class="top">
            <i class="las la-bars" id="menu-bar"></i>' .
    // <i class="las la-times menu-close"></i>
    '<img src="/RentalGoods/img/RG logo/Rental Goods logo2.png" alt="logo" class="navbar-brand" />
        </div>
        <ul class="menu-list">
            <li><a href="/RentalGoods/index.php">Home</a></li>
            <li><a href="/RentalGoods/about.php">About</a></li>
            <li><a href="/RentalGoods/contact.php">Contact</a></li>
            <li class="dropdown">
                <div class="select">
                    <a href="#">Categories</a>
                    <i class="las la-angle-down"></i>
                    <!-- <i class="las la-angle-up"></i> -->
                </div>
                <ul class="c-menu">
                    <li><a href="/RentalGoods/Electronics/washingMachine.php">Electronics</a></li>
                    <li><a href="/RentalGoods/Furnitures/sofa_sets.php">Furniture</a></li>
                    <li><a href="/RentalGoods/Technologies/mobiles.php">Technologies</a></li>
                    <li><a href="">Dresses</a></li>
                    <li><a href="">Decoration Items</a></li>
                    <li><a href="">Medical Checkup Machine</a></li>
                    <li><a href="">Gaming Items</a></li>
                    <li><a href="">Home Appliances</a></li>
                </ul>
            </li>
            <li class="shopping-cart">
                <a href="/RentalGoods/cart.php" title=" Cart "><i class="las la-shopping-cart s-cart"></i>
                <span id="cartCount">0</span>
                </a>
            </li>
        </ul>';

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
    echo '
        <div class="logOutBox">
            <div>
                <i class="las la-user" title="'.$_SESSION['user_name'].'"></i>
                <p>'.$_SESSION['user_name'].'</p>
            </div>
            <a href="/RentalGoods/partials/_logout.php">Logout</a>
        </div>';

} else {
    echo '
        <div class="btns">
            <a href="#" class="shopping-cart-mobile"><i class="las la-shopping-cart s-cart"></i></a>
            <a href="/RentalGoods/Admin/adminLogin.php" class="adminBtn">Admin</a>
            <a href="/RentalGoods/login.php">Login</a>
            <a href="/RentalGoods/signup.php" class="signup">Signup</a>
        </div>';
}


echo '</div>';

if (isset($_GET['signUpSuccess']) && $_GET['signUpSuccess'] == true) {
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
            <strong>Success!</strong> You can now login 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
}



echo '
    </section>';

?>