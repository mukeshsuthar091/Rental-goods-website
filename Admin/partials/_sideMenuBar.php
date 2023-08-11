<?php
    
echo '    
<div class="menu_container">
    <ul class="sideMenu">   
        <li class="profile-img">
            <i class="las la-user"></i>
            <h2>'.$_SESSION['admin_name'].'</h2>
        </li>
        <li><a href="/RentalGoods/Admin/dashboard.php">Dashboard</a></li>
        <li><a href="/RentalGoods/Admin/orderDetails.php">Order Details</a></li>
        <li><a href="/RentalGoods/Admin/customers.php">Customers</a></li>
        <li><a href="/RentalGoods/Admin/category.php">Category</a></li>
        <li><a href="/RentalGoods/Admin/viewProducts.php">View Products</a></li>
        <li><a href="/RentalGoods/Admin/addProducts.php">Add Products</a></li>
        <li><a href="/RentalGoods/Admin/profileDetails.php">Profile</a></li>
    </ul>
    
</div>';

?>