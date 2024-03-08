<?php
session_start();
if (isset($_GET['masp'])) {
    $id = $_GET['masp'];
    foreach ($_SESSION['giohang'] as $key => $value) {
        if ($id == $value[0]) {
            unset($_SESSION['giohang'][$key]);
            header('location: giohang.php');
        }
    }
}
