<?php
if (isset($_GET["page_layout"])) {
    switch ($_GET["page_layout"]) {
        case 'index':
            header('location: ../admin/index.php');
            break;
        case 'danhmucmonan':
            header('location: ../admin/danhmucmonan.php');
            break;
        case 'quanlytaikhoan':
            header('location: ../admin/quanlytaikhoan.php');
            break;
        case 'them':
            header('location: ../admin/them.php');
            break;
        case 'SuaUser':
            header('location: ../admin/SuaUser.php');
            break;
        case 'XoaUser':
            header('location: ../admin/XoaUser.php');
            break;
        case 'quanLyNguyenLieu':
            header('location: ../admin/quanLyNguyenLieu.php');
            break;
        case 'danhmuchoadonbanhang':
            header('location: ../admin/danhmuchoadonbanhang.php');
            break;
        case 'chiTietHoaDonNhap':
            header('location: ../admin/chiTietHoaDonNhap.php');
            break;
        case 'congThucMon':
            header('location: ../admin/congThucMon.php');
            break;
        case 'giamGia':
            header('location: ../admin/giamGia.php');
            break;
        case 'hoaDonBan':
            header('location: ../admin/quanLyHoaDonBan.php');
            break;
        case 'loaiSP':
            header('location: ../admin/loaisanpham.php');
            break;
        case 'NCC':
            header('location: ../admin/quanlinhacungcap.php');
            break;
        case 'logout':
            $_SESSION['username'];
            header('location: ../../login.php');
            break;
        default:
            include_once '../index.php';
    }
}
ob_start();
session_start();
$path = "../../models/ketnoi.php";
if (file_exists($path)) {
    include $path;
    if (isset($_SESSION["username"])) {
        $username = $_SESSION["username"];
        $sql = "SELECT * From user WHERE UserName = '$username'";
        $query = mysqli_query($conn, $sql);
        $rows = mysqli_num_rows($query);
        $rows = $query->fetch_array();
        $tennhanvien = $rows['Ten'];
    } else {
    }
} else {
    die("{$path} không tồn tại");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashtreme Admin - Free Dashboard for Bootstrap 4 by Codervent</title>
    <!-- loader-->
    <link href="../assets/css/pace.min.css" rel="stylesheet" />
    <script src="../assets/js/pace.min.js"></script>
    <!--favicon-->
    <link rel="icon" href="../assets/images/favicon.ico" type="image/x-icon">
    <!-- Vector CSS -->
    <!-- <link href="../assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" /> -->
    <!-- simplebar CSS-->
    <link href="../assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <!-- Bootstrap core CSS-->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <!-- animate CSS-->
    <link href="../assets/css/animate.css" rel="stylesheet" type="text/css" />
    <!-- Icons CSS-->
    <link href="../assets/css/icons.css" rel="stylesheet" type="text/css" />
    <!-- Sidebar CSS-->
    <link href="../assets/css/sidebar-menu.css" rel="stylesheet" />
    <!-- Custom Style-->
    <link href="../assets/css/app-style.css" rel="stylesheet" />

</head>

<body class="bg-theme bg-theme1">

    <!-- Start wrapper-->
    <div id="wrapper">
        <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
            <div class="brand-logo">
                <a href="index.php?page_layout=index">
                    <img src="../assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
                    <h5 class="logo-text">Dashtreme Admin</h5>
                </a>
            </div>
            <ul class="sidebar-menu do-nicescrol">
                <li class="sidebar-header">MAIN NAVIGATION</li>
                <li>
                    <a href="index.php?page_layout=danhmucmonan">
                        <i class="zmdi zmdi-view-dashboard"></i> <span>Danh Mục Món Ăn</span>
                    </a>
                </li>
                <li>
                    <a href="index.php?page_layout=quanlytaikhoan">
                        <i class="zmdi zmdi-view-dashboard"></i> <span>Quản Lý Tài Khoản</span>
                    </a>
                </li>
                <li>
                    <a href="index.php?page_layout=quanLyNguyenLieu">
                        <i class="zmdi zmdi-view-dashboard"></i> <span>Quản Lý Nguyên liệu</span>
                    </a>
                </li>
                <li>
                    <a href="index.php?page_layout=danhmuchoadonbanhang">
                        <i class="zmdi zmdi-view-dashboard"></i> <span>Danh mục hóa đơn bán</span>
                    </a>
                </li>
                <li>
                    <a href="index.php?page_layout=chiTietHoaDonNhap">
                        <i class="zmdi zmdi-view-dashboard"></i> <span>Quản lý nhập hàng</span>
                    </a>
                </li>
                <li>
                    <a href="index.php?page_layout=congThucMon">
                        <i class="zmdi zmdi-view-dashboard"></i> <span>Công thức món</span>
                    </a>
                </li>
                <li>
                    <a href="index.php?page_layout=giamGia">
                        <i class="zmdi zmdi-view-dashboard"></i> <span>Giảm giá</span>
                    </a>
                </li>
                <li>
                    <a href="index.php?page_layout=loaiSP">
                        <i class="zmdi zmdi-view-dashboard"></i> <span>Quản lý loại sản phẩm</span>
                    </a>
                </li>
                <li>
                    <a href="index.php?page_layout=NCC">
                        <i class="zmdi zmdi-view-dashboard"></i> <span>Quản lý nhà cung cấp</span>
                    </a>
                </li>
            </ul>

        </div>
        <header class="topbar-nav">
            <nav class="navbar navbar-expand fixed-top">
                <ul class="navbar-nav mr-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link toggle-menu" href="javascript:void();">
                            <i class="icon-menu menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <form class="search-bar">
                            <input type="text" class="form-control" placeholder="Enter keywords">
                            <a href="javascript:void();"><i class="icon-magnifier"></i></a>
                        </form>
                    </li>
                </ul>

                <ul class="navbar-nav align-items-center right-nav-link">
                    <li class="nav-item dropdown-lg">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
                            <i class="fa fa-envelope-open-o"></i></a>
                    </li>
                    <li class="nav-item dropdown-lg">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
                            <i class="fa fa-bell-o"></i></a>
                    </li>
                    <li class="nav-item language">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();"><i class="fa fa-flag"></i></a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item"> <i class="flag-icon flag-icon-gb mr-2"></i> English</li>
                            <li class="dropdown-item"> <i class="flag-icon flag-icon-fr mr-2"></i> French</li>
                            <li class="dropdown-item"> <i class="flag-icon flag-icon-cn mr-2"></i> Chinese</li>
                            <li class="dropdown-item"> <i class="flag-icon flag-icon-de mr-2"></i> German</li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
                            <span class="user-profile"><img src="https://via.placeholder.com/110x110" class="img-circle" alt="user avatar"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item user-details">
                                <a href="javaScript:void();">
                                    <div class="media">
                                        <div class="avatar"><img class="align-self-start mr-3" src="https://via.placeholder.com/110x110" alt="user avatar"></div>
                                        <div class="media-body">
                                            <?php
                                            if (isset($tennhanvien)) {
                                                echo '<h6 class="mt-2 user-title">Xin Chào</h6> <p class="user-subtitle">' . $tennhanvien . '</p>';
                                            } else {
                                                echo '<h6 class="mt-2 user-title">Xin Chào</h6> <p class="user-subtitle"> không</p>';
                                            }
                                            // $username = $_POST["username"];
                                            // $sql2 = "SELECT nhanvien.TenNhanVien from user inner join nhanvien ON nhanvien.UserName = user.UserName WHERE user.UserName = '$username';";
                                            // $query2 = mysqli_query($conn, $sql2);
                                            // $rows2 = $query2->fetch_array();
                                            // $_SESSION["tennhanvien"] = $rows2[0];
                                            // echo '<h6 class="mt-2 user-title">Xin Chào</h6>
                                            // <p class="user-subtitle">' . $_SESSION["tennhanvien"] . '</p>'
                                            ?>

                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="dropdown-divider"></li>
                            <li class="dropdown-item"><i class="icon-envelope mr-2"></i> Inbox</li>
                            <li class="dropdown-divider"></li>
                            <li class="dropdown-item"><i class="icon-wallet mr-2"></i> Account</li>
                            <li class="dropdown-divider"></li>
                            <li class="dropdown-item"><i class="icon-settings mr-2"></i> Setting</li>
                            <li class="dropdown-divider"></li>
                            <a href="index.php?page_layout=logout" class="dropdown-item"><i class="icon-power mr-2"></i>
                                Logout</a>
                        </ul>
                    </li>
                </ul>
            </nav>
        </header>
        <div class="clearfix">