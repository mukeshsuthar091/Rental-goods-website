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
    <title>Checkout Page</title>
</head>

<body>

    <!------------ Navigation bar -------------->
    <?php include('partials/_navbar.php'); ?>



    <!------------------- Checkout  --------------------->

    <section id="productCheckoutList" class="section-p1">
        <h1 class="heading">Checkout</h1>

        <h4 class="listTitle">Product list</h4>

        <div class="list_container">
            <table width="100%" class="left_form">
                <thead>
                    <tr>
                        <td>Image</td>
                        <td>Product</td>
                        <!-- <td>Rent Price/Days</td> -->
                        <td>Rent Days</td>
                        <td>Quantity</td>
                        <td>Subtotal</td>
                    </tr>
                </thead>
                <tbody id="product_list">

                    <!-- <tr>
                        <td><img src="img/products/beds.jpg" alt=""></td>
                        <td>Queen Chloe Upholstered Bed</td>
                        <td>300rs.</td>
                        <td>2</td>
                        <td>5</td>
                        <td>300rs.</td>
                    </tr> -->

                </tbody>
            </table>

            <table class="totalRentPrice">
                <tr>
                    <th colspan="2">Total Rent Price</th>
                </tr>
                <tr>
                    <td>Total Rent : </td>
                    <td class="t_rent">2500.00rs.</td>
                </tr>
                <tr>
                    <td>Shipping Charge : </td>
                    <td class="shipping_charge">0</td>
                </tr>
                <tr>
                    <td><strong>Total : </strong></td>
                    <td><strong class="totalProductRent">2500rs.</strong></td>
                </tr>
            </table>
        </div>
    </section>


    <?php

    include('partials/_dbconnect.php');

    $sql = "SELECT * FROM `usersinfo` WHERE `sno`= " . $_SESSION['sno'];
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);


        echo '<section id="userInfo" class="section-p1">
        <h4>User Details</h4>
        <form action="/RentalGoods/payment.php" method="post" id="deliveryDetail">
            <div class="detailForm">
                <div>
                    <label for="fullName">Full Name : </label>
                    <input type="text" name="fullName" id="fullName" value="' . $row['user_name'] . '" >
                </div>
                <div>
                    <label for="address">Present Address : </label>
                    <input type="text" name="address" id="address" value="' . $row['address'] . '" >
                </div>
                <div>
                    <label for="city">City : </label>
                    <input type="text" name="city" id="city" value="' . $row['city'] . '">
                </div>
                <div>
                    <label for="country">Country : </label>
                    <input type="text" name="country" id="country" value="' . $row['country'] . '">
                </div>
                <div>
                    <label for="postcode">Postcode : </label>
                    <input type="text" name="postcode" id="postcode" value="' . $row['postcode'] . '">
                </div>
                <div>
                    <label for="mobileNumber">Mobile no. : </label>
                    <input type="text" name="mobileNumber" id="mobileNumber" value="' . $row['mobile_no'] . '" maxlength="10">
                </div>
                <div>
                    <label for="email">Email : </label>
                    <input type="email" name="email" id="email" value="' . $row['email'] . '">
                </div>
            </div>
            
            <input type="hidden" name="totalAmountPay" id="totalAmountPay" class="">
            
            <button type="submit" class="btn btn-warning">Place Order</button>
        </form>
    </section>';

    // echo '<section id="userInfo" class="section-p1">
    //     <h4>User Details</h4>
    //     <div class="infoContainer">
    //         <div>
    //             <h6>Full Name : </h6>
    //             <p>' . $row['user_name'] . '</p>
    //         </div>
    //         <div>
    //             <h6>Present Address : </h6>
    //             <p>' . $row['address'] . '</p>
    //         </div>
    //         <div>
    //             <h6>City : </h6>
    //             <p>' . $row['city'] . '</p>
    //         </div>
    //         <div>
    //             <h6>Country : </h6>
    //             <p>' . $row['country'] . '</p>
    //         </div>
    //         <div>
    //             <h6>Postcode : </h6>
    //             <p>' . $row['postcode'] . '</p>
    //         </div>
    //         <div>
    //             <h6>Mobile no. : </h6>
    //             <p>' . $row['mobile_no'] . '</p>
    //         </div>
    //         <div>
    //             <h6>Email : </h6>
    //             <p>' . $row['email'] . '</p>
    //         </div>
    //     </div>

    //         <div id="modal_for_orderPlace">
    //         <!-- Button trigger modal -->
    //         <button type="button" class="btn btn-warning modal_active_btn" data-bs-toggle="modal" data-bs-target="#orderPlace">
    //             Place Order
    //         </button>
    
    //         <!-- Modal -->
    //         <div class="modal fade" id="orderPlace" tabindex="-1" aria-labelledby="orderPlaceModal" aria-hidden="true">
    //             <div class="modal-dialog">
    //                 <div class="modal-content">
    //                     <div class="modal-header">
    //                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    //                     </div>
    //                     <div class="modal-body">
    //                         <i class="lar la-check-circle"></i>
    //                         <p>Your order is place successfully.</p>
    //                         <button type="button" class="btn btn-primary modal_btn" data-bs-dismiss="modal" onclick="goToHomePage()">Go to Home Page</button>
    //                     </div>
    //                 </div>
    //             </div>
    //         </div>
    //     </div>

    // </section>';

    // ?>

    <!-- <button type="submit" class="btn btn-warning">Place Order</button> -->
    

<!------------ Footer -------------->
    <?php include('partials/_footer.php'); ?>


    <!------------ Javascript -------------->

    <?php include('partials/_js_script.php') ?>


</body>

</html>