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

        <div class="right_container">
            <div class="header">
                <h2>Order Details</h2>
                <button type="button" class="btn btn-outline-primary" onclick="logout()">Logout</button>
            </div>

            <!-- <div id="order_info">
                <table id="MyTable">
                    <thead>
                        <tr>
                            <td>sno.</td>
                            <td>Rented Item</td>
                            <td>Rent Days</td>
                            <td>Quantity</td>
                            <td>Date&Time</td>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div> -->

            
            <!-- <div id="Delivery_Info">
                <table id="MyTable-2">
                    <thead>
                        <tr>
                            <td>sno.</td>
                            <td>Customer Name</td>
                            <td>Address</td>
                            <td>City</td>
                            <td>Country</td>
                            <td>Mobile No.</td>
                            <td>Email</td>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div> -->
        </div>

    </section>

    <!------------ Javascript -------------->

    <?php include('../Admin/partials/_js_script.php') ?>


</body>

</html>