<?php

include('../partials/_dbconnect.php');

// $category_name = $_GET['categoryName'];


$sql = "SELECT * FROM `category`";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)){
    // echo $row['category_name'];
    $c_name = $row['category_name'];
    // echo $c_name;
    
    $sql2 = "SELECT * FROM `products` WHERE `category` = '$c_name'";
    $result2 = mysqli_query($conn, $sql2);
    $rows = mysqli_num_rows($result2);
    // echo $rows;

    
    $sql3 = "UPDATE `category` SET `item_contains` = '$rows' WHERE `category_name` = '$c_name'";
    $result3 = mysqli_query($conn, $sql3);

}

?>