<?php include '../admin/header.php' ?>
<?php
include_once '../../models/ketnoi.php';
?>
<?php
$thongbao = '';
$id = $_GET['id'];
$sqlnhacungcap = "SELECT `MaNCC`, `TenNCC` FROM `nhacungcap` ";
$queryncc = mysqli_query($conn, $sqlnhacungcap);
$row = mysqli_fetch_array($query);
$sql = "SELECT * FROM `nguyenlieu` WHERE MaNL = " . $id . "";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);
if (isset($_POST['soluongnhapthem'])) {
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $sqlinserthd = "INSERT INTO `hoadonnhap` (`MaHoaDonNhap`, `MaNCC`, `UserName`, `NgayNhapHang`, `GhiChu`) VALUES (NULL, '" . $_POST['NCC'] . "', '" . $_SESSION['username'] . "', '" .   date('Y/m/d H:i:s') . "', NULL)";
    $queryhd = mysqli_query($conn, $sqlinserthd);
    $mahdn = mysqli_fetch_array(mysqli_query($conn, "SELECT `MaHoaDonNhap` FROM `hoadonnhap` WHERE MaNCC = " . $_POST['NCC'] . " AND UserName = '" . $_SESSION['username'] . "' AND NgayNhapHang = '" .   date('Y/m/d H:i:s') . "'"))['MaHoaDonNhap'];
    $sqlinsertcthdn = "INSERT INTO `chitiethoadonnhap`(`MaHoaDonNhap`, `MaNL`, `SoLuongNhap`, `TongTien`) VALUES ('" . $mahdn . "','" . $id . "','" . $_POST['soluongnhapthem'] . "','" . $_POST['soluongnhapthem'] * $row['DonGiaNhap'] . "')";
    $queryinsertcthdn  = mysqli_query($conn, $sqlinsertcthdn);
    $sqlupdatesl = "UPDATE `nguyenlieu` SET `SoLuongCon`= SoLuongCon + " . $_POST['soluongnhapthem'] . " WHERE MaNL = " . $id . "";
    $queryupdatesl = mysqli_query($conn, $sqlupdatesl);
    header("location: quanLyNguyenLieu.php");
}

?>
<div class="content-wrapper">

    <div class="row mt-3">

        <div class="col-lg-12">
            <div class="card">
                <div class="form-group">
                    <label for="SoLuongCon"> <?php echo $thongbao ?></label>
                </div>
                <div class="card-body">

                    <form method="POST" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="SoLuongCon">Tên Nguyên Liệu : <?php echo $row['TenNL'] ?></label>
                        </div>
                        <div class="form-group">
                            <label for="SoLuongCon">Đơn Giá Nhập : <?php echo $row['DonGiaNhap'] ?></label>
                        </div>
                        <div class="form-group">
                            <label for="SoLuongCon">Số lượng còn Lại trong kho: <?php echo $row['SoLuongCon'] ?></label>
                        </div>
                        <div class="form-group">
                            <label for="MaNL">Nhà Cung Cấp</label>
                            <select name="NCC" id="cars" class="form-control">
                                <?php while ($rowsncc = mysqli_fetch_assoc($queryncc)) { ?>
                                    <option value="<?php echo  $rowsncc['MaNCC'] ?>"><?php echo  $rowsncc['TenNCC'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="MaNL">Số Lượng Nhập Thêm</label>
                            <input type="number" name="soluongnhapthem" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" value="Nhập" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>