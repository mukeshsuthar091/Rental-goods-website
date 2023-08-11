<!DOCTYPE html>
<html lang="en">

<head>
    <!------------ meta & css link -------------->
    <?php include('../Admin/partials/_head_link.php') ?>

    <title>View Products Page</title>
</head>

<body>

    <section id="main">

        <?php include('../Admin/partials/_sideMenuBar.php') ?>

        <div class="viewProduct_container right_container">
            <div class="header">
                <h2>View Products</h2>
                <button type="button" class="btn btn-outline-primary" onclick="logout()">Logout</button>
            </div>

            <div id="product_info_table">
                <table id="MyTable">
                    <thead>
                        <tr>
                            <td>sno.</td>
                            <td>Product Image</td>
                            <td>Brand Name</td>
                            <td>Product Title</td>
                            <td>Description</td>
                            <td>Category Type</td>
                            <td>Rent Price</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody class="product-info">

                        <?php
                        $adminID = $_SESSION['admin_id'];

                        include('../Admin/partials/_dbconnect.php');

                        $sql = "SELECT * FROM `products` WHERE `admin_id`='$adminID'";
                        $result = mysqli_query($conn, $sql);
                        $sno = 0;

                        while ($row = mysqli_fetch_assoc($result)) {
                            $sno += 1;

                            echo '
                            <tr>
                                <td>'.$sno.'</td>
                                <td>'.$row['image'].'</td>
                                <td>'.$row['brandname'].'</td>
                                <td>'.$row['title'].'</td>
                                <td>'.$row['description'].'</td>
                                <td>'.$row['category'].'</td>
                                <td>'.$row['rent'].'</td>
                                <td>
                                    <form action="/RentalGoods/Admin/controller/removeProduct.php" method="POST">
                                        <input type="hidden" name="sno" value="' . $row['id'] . '">
                                        <button type="submit" class="btn btn-danger delete-btn">Remove</button>
                                    </form>
                                </td>
                            </tr>';
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </section>



    <!------------ Javascript -------------->

    <?php include('../Admin/partials/_js_script.php') ?>

</body>

</html>