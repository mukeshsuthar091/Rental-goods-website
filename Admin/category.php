<!DOCTYPE html>
<html lang="en">

<head>

    <!------------ meta & css link -------------->
    <?php include('../Admin/partials/_head_link.php') ?>

    <title>Category Page</title>
</head>

<body>

    <?php include('../Admin/controller/countCategoryItems.php') ?>

    <?php
    $showAlert = false;

    $adminId = $_SESSION['admin_id']; 

    include('../Admin/partials/_dbconnect.php');

    if ($_SERVER['REQUEST_METHOD']  == 'POST') {
        $category_name = $_POST['categoryName'];
        
        
        // ---- Items content count ----
        $sql = "SELECT * FROM `products` WHERE `category` = '$category_name' And `admin_id` = '$adminId'";
        $result = mysqli_query($conn, $sql);
        $rows = mysqli_num_rows($result);


        // ------- creating category ----- 
        $sql = "SELECT * FROM `category` WHERE `category_name` = '$category_name' And `admin_id` = '$adminId'";
        $result = mysqli_query($conn, $sql);
        $row2 = mysqli_num_rows($result);

        if ($row2 > 0) {
            $showAlert = true;
        } else {
            if ($rows > 0) {
                $sql = "INSERT INTO `category` (`category_name`, `item_contains`, `admin_id`) VALUES ('$category_name', '$rows', '$adminId')";
                $result = mysqli_query($conn, $sql);
            } else {
                $sql = "INSERT INTO `category` (`category_name`, `item_contains`, `admin_id`) VALUES ('$category_name', '0', '$adminId')";
                $result = mysqli_query($conn, $sql);
            }
        }
    }

    ?>



    <section id="main">

        <?php include('../Admin/partials/_sideMenuBar.php') ?>

        <div class="category_container right_container">
            <?php
            if ($showAlert) {
                echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
                            <strong>Error! </strong>' . $category_name . ' is already created.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
            }
            ?>

            <div class="header">
                <h2> Category Items</h2>
                <button type="button" class="btn btn-outline-primary" onclick="logout()">Logout</button>
            </div>


            <div class="add_category">
                <!-- Button trigger modal -->
                <button type="button" class="btn add-category-btn" data-bs-toggle="modal" data-bs-target="#categoryInsert">
                    Add Category
                </button>

                <!-- Modal -->
                <div class="modal fade" id="categoryInsert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <!-- <h1 class="modal-title fs-5" id="exampleModalLabel"></h1> -->
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="<?php echo $_SERVER["REQUEST_URI"]; ?>" method="post">
                                    <div class="mb-3">
                                        <label for="categoryName" class="form-label fs-4 fw-semibold">Category Name</label>
                                        <input type="text" class="form-control" id="categoryName" name="categoryName">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div id="category_table">
                <table id="MyTable">
                    <thead>
                        <tr>
                            <td>sno.</td>
                            <td>Category Name</td>
                            <td>Item Contains</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody class="c-items">

                        <?php

                        $sql = "SELECT * FROM `category` WHERE `admin_id` = '$adminId'";
                        $result = mysqli_query($conn, $sql);
                        $sno = 0;

                        // echo $adminId;

                        while ($row = mysqli_fetch_assoc($result)) {
                            $sno += 1;
                            $categoryName = $row['category_name'];
                            $items = $row['item_contains'];

                            echo '
                                <tr>
                                    <td>' . $sno . '</td>
                                    <td>' . $categoryName . '</td>
                                    <td>' . $items . '</td>
                                    <td>
                                        <form action="/RentalGoods/Admin/controller/removeCategory.php" method="POST">
                                            <input type="hidden" name="sno" value="' . $row['sno.'] . '">
                                            <button type="submit" class="btn btn-danger delete-btn">Remove</button>
                                        </form>
                                    </td>
                                </tr>';
                        }
                        ?>
                        <!-- <tr>
                            <td>1</td>
                            <td>Washing Machine</td>
                            <td>5</td>
                            <td>
                                <button type="button" class="btn btn-danger delete-btn" onclick="deleteCategory()">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>tv</td>
                            <td>8</td>
                            <td>
                                <button type="button" class="btn btn-danger delete-btn" onclick="deleteCategory()">Delete</button>
                            </td>
                        </tr> -->
                        <!-- <form action="/RentalGoods/Admin/controller/deleteCategory.php">
                            <input type="hidden" name="sno" value="">
                            <button type="button" class="btn btn-danger delete-btn">Delete</button>
                        </form> -->

                    </tbody>
                </table>
            </div>

        </div>
    </section>



    <!------------ Javascript -------------->

    <?php include('../Admin/partials/_js_script.php') ?>


</body>

</html>