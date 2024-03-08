<?php
session_start();
include_once("../../models/ketnoi.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['cart'])) {
        $arrID = array();
        foreach ($_SESSION['cart'] as $id => $quantity) {
            $arrID[] = $id;
        }
        ///hoa don ban
        $un = $_POST['username'];
        $gg = $_POST['discount'];
        $pttt = $_POST['paymentMethod'];
        $gc = $_POST['ghichu'];
        $stringID = implode(',', $arrID);
        if ($pttt == '') {
            $sql = "INSERT INTO `hoadonban` (`NgayLap`, `UserName`, `GiamGia,`PhuongThucTT`, `GhiChu`) VALUES (NOW(), '$un', 0, b'$pttt', '$gc');";
        }
        $sql = "INSERT INTO `hoadonban` (`NgayLap`, `UserName`, `GiamGia`, `PhuongThucTT`, `GhiChu`) VALUES (NOW(), '$un', '$gg', b'$pttt', '$gc');";
        echo $sql;
        $result0 = $conn->query($sql);
        /////chi tiet hoa don ban
        $sql = "SELECT * FROM hoadonban ORDER BY MaHoaDon DESC LIMIT 1;";
        $result1 = $conn->query($sql);
        $x = $result1->fetch_assoc();
        $MaHD = $x["MaHoaDon"];
        $sql = "SELECT * FROM danhmucsp WHERE MaSP IN($stringID) ORDER BY MaSP DESC";
        //echo $sql;
        $result2 = $conn->query($sql);
        while ($row = $result2->fetch_assoc()) {
            $totalPrice = $row["GiaBan"] * $_SESSION["cart"][$row["MaSP"]];
            $MaSP = $row['MaSP'];
            $SoLuong = $_SESSION["cart"][$row["MaSP"]];
            $sql = "INSERT INTO `chitiethoadon`(`MaHoaDon`, `MaChiTietSP`, `SoLuong`, `TongTienHD`) VALUES ($MaHD, $MaSP, $SoLuong, $totalPrice);";

            $result3 = $conn->query($sql);
            //echo $result3->fetch_assoc();
        }
        unset($_SESSION['cart']);
        header("location: ../../index.php");
    }
} else {
    echo 404;
}
?>
Thanh toán thành công