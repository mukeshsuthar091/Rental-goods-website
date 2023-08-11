<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    include('../partials/_dbconnect.php');
    
    $id = $_POST['sno'];

    $sql = "DELETE FROM `category` WHERE `sno.` = '$id';";
    $result = mysqli_query($conn, $sql);

}

header('Location: /RentalGoods/Admin/category.php');

?>