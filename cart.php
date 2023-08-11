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
    <title>Cart Page</title>
</head>

<body>

    <!------------ database connecting -------------->
    <?php include('partials/_dbconnect.php'); ?>

    <!------------ Navigation bar -------------->
    <?php include('partials/_navbar.php'); ?>



    <!------------------- cart --------------------->

    <section id="page-header" class="about-header">
        <h2>#let's_rent_goods</h2>
        <p>Rent a product you want in low prize and enjoy!</p>
    </section>

    <section id="cart" class="section-p1">
        <table width="100%">
            <thead>
                <tr>
                    <td>Remove</td>
                    <td>Image</td>
                    <td>Product</td>
                    <td>Rent Price/Days</td>
                    <td>Rent Days</td>
                    <td>Quantity</td>
                    <td>Subtotal</td>
                </tr>
            </thead>
            <tbody id="tableBody">

                <!-- <tr class="no-result">
                    <td colspan="7"><h3>Your cart is empty.</h3></td>
                </tr> -->


            </tbody>
        </table>
    </section>

    <section id="cart-add" class="section-p1">
        <div id="coupon">
            <h3>Apply Coupon</h3>
            <div>
                <input type="text" placeholder="Enter your coupon">
                <button class="btn btn-primary">Apply</button>
            </div>
        </div>

        <div id="subtotal">
            <h3>Cart Total</h3>
            <table>
                <tr>
                    <td>Cart Subtotal</td>
                    <td id="subTotalRent">-</td>
                </tr>
                <tr>
                    <td>Shipping Charge</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td><strong>Total</strong></td>
                    <td><strong id="totalProductRent">-</strong></td>
                </tr>
            </table>

            <?php
            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {

                echo '<button class="btn btn-primary" onclick="checkout(true)">Proceed to Checkout</button>';
            } else {

                echo '<button class="btn btn-primary" onclick="checkout(false)">Proceed to Checkout</button>';
                // echo '<button class="btn btn-primary">Proceed to Checkout</button>';
                // header("Location: /RentalGoods/index.php");
            }
            ?>
        </div>
    </section>


    <!------------ Footer -------------->
    <?php include('partials/_footer.php'); ?>


    <!------------ Javascript -------------->

    <?php include('partials/_js_script.php') ?>


</body>

</html>