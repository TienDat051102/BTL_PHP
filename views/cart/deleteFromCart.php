<?php
session_start();
if (isset($_GET['MaSP'])) {
    $masp = $_GET['MaSP'];
    if ($masp == 0) {
        unset($_SESSION['cart']);
    } else {
        unset($_SESSION["cart"][$masp]);
    }
}
header("location: cart.php");
