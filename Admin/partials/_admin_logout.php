<?php
session_start();

// session_unset();
// session_destroy();
// unset($_SESSION['admin_logged_in']);

$_SESSION['admin_logged_in'] = false;


if ($_SESSION['admin_logged_in'] == false && $_SESSION['logged_in'] == false) {
    session_destroy();
}

header("Location: /RentalGoods/index.php")


?>


