<?php
session_start();
if (!isset($_SESSION['giohang'])) $_SESSION['giohang'] = [];
if (isset($_GET['idsp'])  && isset($_POST['TenSP']) && isset($_POST['GiaBan'])) {
    if ($_POST['SoLuong'] == "" || (int)$_POST['SoLuong'] <= 0) {
        $_POST['SoLuong'] = "1";
    }
    $masp = (int)$_GET['idsp'];
    $tensp = $_POST['TenSP'];
    $soluong = (int)$_POST['SoLuong'];
    $giaban = (float)$_POST['GiaBan'];
    $sp = [$masp, $tensp, $soluong, $giaban];
    $kiemtra = 0;
    $id = (int)$_GET['idsp'];
    foreach ($_SESSION['giohang'] as $key => $value) {
        if ($id == $value[0]) {
            $kiemtra++;
            $_SESSION['giohang'][$key][2] += $_POST['SoLuong'];
        }
    }
    if ($kiemtra != 0) {
        header('location: manhinhoder.php');
    } else {
        $_SESSION['giohang'][] = $sp;
        header('location: manhinhoder.php');
    }
} else {
}