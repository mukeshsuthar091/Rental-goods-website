<!DOCTYPE html>
<html lang="en">

<head>

    <!------------ meta & css link -------------->
    <?php include('../Admin/partials/_head_link.php') ?>

    <title>Products Add Page</title>
</head>

<body>

    <section id="main">

        <?php include('../Admin/partials/_sideMenuBar.php') ?>

        <div class="products_add_form right_container">

            <?php

            if (isset($_GET['Success-Message']) && $_GET['Success-Message'] == true) {
                echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
                <strong>Success!</strong> '.$_GET['Success-Message'].' 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }

            if (isset($_GET['Error-Message']) && $_GET['Error-Message'] == true) {
                echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
                <strong>Error!</strong> ' . $_GET['Error-Message'] . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }

            ?>


            <div class="header">
                <h2>Add Products</h2>
                <button type="button" class="btn btn-outline-primary" onclick="logout()">Logout</button>
            </div>

            <div id="product_upload_form">
                <form action="/RentalGoods/Admin/controller/addProduct.php" method="post" enctype="multipart/form-data">
                    <div>
                        <label for="product_title">Product Title </label>
                        <input type="text" name="product_title" id="product_title">
                    </div>
                    <div>
                        <input type="hidden" name="admin_id" id="admin_id" value="<?php echo $_SESSION['admin_id']; ?>">
                    </div>
                    <div>
                        <label for="product_brandname">Brand Name </label>
                        <input type="text" name="product_brandname" id="product_brandname">
                    </div>
                    <div>
                        <label for="product_desc">Description </label>
                        <textarea name="product_desc" id="product_desc" rows="5" cols="35"></textarea>
                    </div>
                    <div>
                        <label for="product_rent_price">Rent Price </label>
                        <input type="number" name="product_rent_price" id="product_rent_price" placeholder="Example: 120.00">
                    </div>
                    <div>
                        <label for="product_category">Product category </label>
                        <input type="text" name="product_category" id="product_category" placeholder="Example: washing machine">
                    </div>
                    <div>
                        <label for="product_image">Select Image File </label>
                        <input type="file" name="product_image" id="product_image">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Product</button>
                </form>
            </div>
        </div>

    </section>



    <!------------ Javascript -------------->

    <?php include('../Admin/partials/_js_script.php') ?>


</body>

</html>