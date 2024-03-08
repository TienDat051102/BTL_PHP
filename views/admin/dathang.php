<?php
session_start();
include_once '../../models/ketnoi.php';
if (isset($_SESSION['nl'])) {
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $sqlinserthd = "INSERT INTO `hoadonnhap` (`MaHoaDonNhap`, `MaNCC`, `UserName`, `NgayNhapHang`, `GhiChu`) VALUES (NULL, '" . $_POST['NCC'] . "', '" . $_SESSION['username'] . "', '" .   date('Y/m/d H:i:s') . "', NULL)";
    $queryhd = mysqli_query($conn, $sqlinserthd);
    $mahdn = mysqli_fetch_array(mysqli_query($conn, "SELECT `MaHoaDonNhap` FROM `hoadonnhap` WHERE MaNCC = " . $_POST['NCC'] . " AND UserName = '" . $_SESSION['username'] . "' AND NgayNhapHang = '" .   date('Y/m/d H:i:s') . "'"))['MaHoaDonNhap'];
    foreach ($_SESSION['nl'] as $key => $value) {
        $sql = "SELECT * FROM `nguyenlieu` WHERE MaNL =" . $key . "";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($query);
        $sqlinsertcthdn = "INSERT INTO `chitiethoadonnhap`(`MaHoaDonNhap`, `MaNL`, `SoLuongNhap`, `TongTien`) VALUES ('" . $mahdn . "','" . $key . "','" . $value . "','" . $value * $row['DonGiaNhap'] . "')";
        $queryinsertcthdn  = mysqli_query($conn, $sqlinsertcthdn);
        $sqlupdatesl = "UPDATE `nguyenlieu` SET `SoLuongCon`= SoLuongCon + " . $value . " WHERE MaNL = " . $key . "";
        $queryupdatesl = mysqli_query($conn, $sqlupdatesl);
    }
    unset($_SESSION["nl"]);
    header("location: quanLyNguyenLieu.php");
} else {
}
