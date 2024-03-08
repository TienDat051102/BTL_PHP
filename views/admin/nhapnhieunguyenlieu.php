<?php include '../admin/header.php' ?>
<?php
include_once '../../models/ketnoi.php';
?>
<?php
if (isset($_POST['soluong']) && (isset($_GET['id']))) {
    foreach ($_SESSION['nl'] as $key => $value) {
        if ($_GET['id'] == $key) {
            $_SESSION['nl'][$key] = $_POST['soluong'];
            if ((int)$_POST['soluong'] < 1) {
                unset($_SESSION['nl'][$key]);
            }
        }
    }
} else {
}
?>
<div class="content-wrapper">
    <a href="quanLyNguyenLieu.php" class="btn btn-light btn-round px-5" type="submit">Quay lại</a>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Bảng Mua Nguyên Liệu</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Tên Nguyên Liệu</th>
                                    <th scope="col">Đơn giá nhập</th>
                                    <th scope="col">Số Lượng</th>
                                    <th scope="col">Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($_SESSION['nl']) && (is_array($_SESSION['nl']))) {
                                    $so = 1;
                                    $tongtien = 0;
                                    foreach ($_SESSION['nl'] as $key => $value) {
                                        $sql = "SELECT * FROM `nguyenlieu` WHERE MaNL =" . $key . "";
                                        $query = mysqli_query($conn, $sql);
                                        $row = mysqli_fetch_assoc($query);
                                ?>
                                        <tr>
                                            <th scope="row"><?php echo $so ?></th>
                                            <td><?php echo $row['TenNL'] ?></td>
                                            <td><?php echo $row['DonGiaNhap'] ?></td>
                                            <td>
                                                <form action="nhapnhieunguyenlieu.php?id=<?php echo $key ?>" method="post">
                                                    <input type="number" name="soluong" class="form-control" placeholder="<?php echo $value ?>" />
                                                </form>
                                            </td>
                                            <td><?php echo $row['DonGiaNhap'] * $value;
                                                $tongtien += $row['DonGiaNhap'] * $value ?>
                                            </td>
                                        </tr>
                                <?php $so++;
                                    }
                                } ?>
                                <tr>
                                    <th>Tổng tiền</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><?php echo $tongtien ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <form action="dathang.php" method="post">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Nhà Cung Cấp</h5>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <div class="form-group">
                                    <select name="NCC" id="cars" class="form-control">
                                        <?php $sqlnhacungcap = "SELECT `MaNCC`, `TenNCC` FROM `nhacungcap` ";
                                        $queryncc = mysqli_query($conn, $sqlnhacungcap);
                                        while ($rowsncc = mysqli_fetch_assoc($queryncc)) { ?>
                                            <option value="<?php echo  $rowsncc['MaNCC'] ?>">
                                                <?php echo  $rowsncc['TenNCC'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Row-->
    </div>
    <input class="btn btn-light btn-round px-5" type="submit" value="Đặt Hàng">
    </form>
</div>