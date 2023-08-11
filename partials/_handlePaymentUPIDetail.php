<?php 

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $upi = $_POST['upiID'];
        
        echo $upi;

    }
?>