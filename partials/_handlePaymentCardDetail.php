<?php 

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $cardholder_name = $_POST['cardholder-name'];
        $card_no = $_POST['card-no'];
        $card_month = $_POST['card-m'];
        $card_year = $_POST['card-y'];
        $card_cvc_no = $_POST['card-cvc-no'];
        
        // echo $cardholder_name;
        // echo $card_no;
        // echo $card_month;
        // echo $card_year;
        // echo $card_cvc_no;
        // header("Location: /RentalGoods/payment.php?message=Payment successfully done!");
        // header("Location: /RentalGoods/payment.php?message=Payment successfully done!");

    }
?>
