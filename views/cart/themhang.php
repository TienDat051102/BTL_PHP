<?php
session_start();
if (isset($_GET['MaSP'])) {
    $masp = $_GET['MaSP'];
    if (isset($_SESSION["cart"][$masp])) {
        $_SESSION["cart"][$masp] += 1;
        //echo "" . $_SESSION["cart"][$masp] . "";
    } else {
        $_SESSION["cart"][$masp] = 1;
    }
} else {
}
header("location: ../../index.php?page_layout=cart");
