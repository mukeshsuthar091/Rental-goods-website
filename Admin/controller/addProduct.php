<?php

$showAlert = false;
$showError = false;


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include('../partials/_dbconnect.php');

    $title = $_POST['product_title'];
    $brandName = $_POST['product_brandname'];
    $desc = $_POST['product_desc'];
    $rentPrice = $_POST['product_rent_price'];
    $category = $_POST['product_category'];
    $adminID = $_POST['admin_id'];

    $imageInfo = $_FILES['product_image'];

    // print_r($image['type']);

    // Get file info
    if (!empty($imageInfo['name'])) {
        $fileName = basename($imageInfo['name']);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        // Allow certain file formats
        $allowTypes = array('jpg', 'png', 'jpeg');
        if (in_array($fileType, $allowTypes)) {

            if ($imageInfo['size'] > 1000000) {
                $showError = 'Image size is too big.';
                header("location: /RentalGoods/Admin/addProducts.php?Error-Message=$showError");
            } else {
                $imgTempName = $imageInfo['tmp_name'];

                $newImageName = uniqid();
                $newImageName .= "." . $fileType;

                $destinationPath = dirname(__FILE__, 3) . '/img/products/' . $newImageName;
                
                
                $sql = "SELECT * FROM `products` WHERE `title` = '$title' And `admin_id` = '$adminID'";
                $result = mysqli_query($conn, $sql);
                $row2 = mysqli_num_rows($result);

                if($row2>0){
                    $showError = "This product is already exist.";
                    header("location: /RentalGoods/Admin/addProducts.php?Error-Message=$showError");
                    
                }
                else{
                    move_uploaded_file($imgTempName, $destinationPath);
                    
                    $sql2 = "INSERT INTO `products` (`id`, `admin_id`, `title`, `brandname`, `description`, `image`, `rent`, `category`) VALUES (NULL, '$adminID', '$title', '$brandName', '$desc', '$newImageName', '$rentPrice', '$category')";
                    $result2 = mysqli_query($conn, $sql2);
                    
                    $showAlert = 'Product successfully added.';
                    header("location: /RentalGoods/Admin/addProducts.php?Success-Message=$showAlert");
                }
                // echo $adminID, $title, $brandName, $desc, $newImageName, $rentPrice, $category;


            }
        } else {
            $showError = 'Invalid Image Extension.';
            header("location: /RentalGoods/Admin/addProducts.php?Error-Message=$showError");
        }
    } else {

        $showError = 'Image does not exist.';
        header("location: /RentalGoods/Admin/addProducts.php?Error-Message=$showError");
    }
}



// INSERT INTO `products` (`id`, `admin_id`, `title`, `brandname`, `description`, `image`, `rent`, `category`) VALUES (NULL, '$adminID', '$title', '$brandName', '$desc', '$newImageName', '$rentPrice', '$category');