<?php
session_start();
$MaNL = $_GET['MaNL'];
if (isset($_SESSION["nl"][$MaNL])) {
    $_SESSION["nl"][$MaNL] += 1;
    //echo "" . $_SESSION["cart"][$masp] . "";
} else {
    $_SESSION["nl"][$MaNL] = 1;
}
header("location: quanLyNguyenLieu.php");
