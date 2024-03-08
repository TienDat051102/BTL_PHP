<?php
session_start();
if (isset($_GET["page_layout"])) {
    switch ($_GET["page_layout"]) {
        case 'hoanthanh':
            unset($_SESSION['giohang']);
            header("location: ./manhinhoder.php");
            break;
        default:
            include_once './man.php';
    }
}
include_once '../models/ketnoi.php';
$username = $_SESSION["username"];
$phuongthuctt = $_POST['pttt'];
$ban = $_POST['maban'];
$sql = "SELECT * FROM `giamgia` Where MaGiamGia = " . $_POST['giamgia'] . "";
$query = mysqli_query($conn, $sql);
$rows = mysqli_fetch_array($query);
$giamgia = $rows['GiamGia'];
date_default_timezone_set('Asia/Ho_Chi_Minh');
$sqlinsert = "INSERT INTO `hoadonban` (`MaHoaDon`, `NgayLap`, `UserName`, `MaBan`, `GiamGia`, `PhuongThucTT`, `GhiChu`) VALUES (NULL, '" . date('Y/m/d H:i:s') . "', '" . $username . "', '" . $ban . "', '" . $_POST['giamgia'] . "', b'" . $phuongthuctt . "', NULL)";
$query1 = mysqli_query($conn, $sqlinsert);
$sqllaygiatri = "SELECT MaHoaDon FROM `hoadonban` WHERE NgayLap = '" . date('Y/m/d H:i:s') . "' AND UserName = '" . $username . "' AND MaBan = '" . $ban . "' AND GiamGia ='" . $_POST['giamgia'] . "' ";
$query2 = mysqli_query($conn, $sqllaygiatri);
$rows2 = mysqli_fetch_array($query2);
$mahd = $rows2['MaHoaDon'];
if (isset($_SESSION['giohang']) && (is_array($_SESSION['giohang']))) {
    foreach ($_SESSION['giohang'] as $key => $value) {
        $tien = $value[2] * $value[3];
        $sqlinsertchitiet = "INSERT INTO `chitiethoadon` (`MaHoaDon`, `MaChiTietSP`, `SoLuong`, `TongTienHD`) VALUES ('" . $mahd . "', '" . $value[0] . "', '" . $value[2] . "', '" . $tien . "')";
        $query3 = mysqli_query($conn, $sqlinsertchitiet);
        $sqlnl = "SELECT MaNL,SoLuongCanDung FROM `congthucmon` WHERE MaSP =  " . $value[0] . "";
        $querynl = mysqli_query($conn, $sqlnl);
        while ($rowsnl = mysqli_fetch_array($querynl)) {
            $sqlupdate = "UPDATE `nguyenlieu` SET `SoLuongCon`= SoLuongCon - " . $rowsnl['SoLuongCanDung'] * $value[2] . " WHERE MaNL = " . $rowsnl['MaNL'] . "";
            $queryupdate = mysqli_query($conn, $sqlupdate);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hóa đơn</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        .form-group {
            display: flex;
            align-items: center;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <h1 class="text-center">HÓA ĐƠN</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p><strong>Địa chỉ:</strong> Số 3 Cầu Giấy</p>
                <p><strong>Điện Thoại:</strong> 012347JQK</p>
            </div>
            <div class="col">
                <p><strong>Số hóa đơn:</strong> <?php echo $mahd  ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Món Ăn</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Đơn giá</th>
                            <th scope="col">Tổng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $tongtienhoadon = 0;
                        foreach ($_SESSION['giohang'] as $key => $value) {
                            $tien = $value[2] * $value[3];
                            $tongtienhoadon += $tien ?>
                            <tr>
                                <td><?php echo $value[1] ?></td>
                                <td><?php echo $value[2] ?></td>
                                <td><?php echo $value[3] ?></td>
                                <td><?php echo $tien ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p><strong>Giảm giá:</strong> <?php echo $giamgia . ' %'; ?></p>
                <p><strong>Tiền thu khách :</strong><?php $tiensaugiamgia = $tongtienhoadon - $tongtienhoadon * ($giamgia / 100);
                                                    echo $tiensaugiamgia ?>
                </p>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for=""><strong>Ngày:</strong> <?php echo date('d') ?></label>
                    <label for=""><strong>, Tháng:</strong> <?php echo date('m') ?></label>
                    <label for=""><strong>, Năm:</strong> <?php echo date('Y') ?></label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <p><strong>Tên nhân viên thực hiện : </strong> <?php $sqlten = "SELECT * From user WHERE UserName = '$username'";
                                                                $query5 = mysqli_query($conn, $sqlten);
                                                                $rows5 = mysqli_fetch_array($query5);
                                                                echo $rows5['Ho'] . ' ' . $rows5['Ten'] ?></p>
            </div>
        </div>
        <hr>
        <a type="button" href="hoadon.php?page_layout=hoanthanh" class="btn btn-success">Hoàn Thành</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>