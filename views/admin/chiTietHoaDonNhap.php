<!--Start topbar header-->
<?php include '../admin/header.php'
?>
<div class="content-wrapper">

    <div class="row mt-3">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Chi tiết hóa đơn nhập</h5>
                    <form method="POST">
                        <label for="MaNL">Từ ngày</label>
                        <input type="date" name="tungay" id="">

                        <label for="MaNL">Đến ngày</label>
                        <input type="date" name="denngay" id="">
                        <input type="submit" value="Xuất Dữ Liệu" name="submit">
                    </form>
                    <table class="table table-bordered">

                        <thead>
                            <tr>
                                <th scope="col">Mã Hóa Đơn</th>
                                <th scope="col">Người Nhập</th>
                                <th scope="col">Ngày nhập</th>
                                <th scope="col">Tổng tiền hóa dơn</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_POST['submit'])) {
                                $timetu = strtotime($_POST['tungay']);
                                $timeden = strtotime($_POST['denngay']);
                                $sql1 = "SELECT `MaHoaDonNhap`, `Ho`, `Ten`, `NgayNhapHang` FROM `baocaohoadonnhap` WHERE DAY(NgayNhapHang) BETWEEN " . date('d', $timetu) . " AND " . date('d', $timeden) . " AND MONTH(NgayNhapHang) BETWEEN " . date('m', $timetu) . " AND " . date('m', $timeden) . " AND YEAR(NgayNhapHang) BETWEEN " . date('Y', $timetu) . " AND " . date('Y', $timeden) . " Order by MaHoaDonNhap ASC ";
                                $query1 = mysqli_query($conn, $sql1);
                                $tongtiennhap = 0;
                                while ($rows = mysqli_fetch_assoc($query1)) { ?>
                                    <tr>
                                        <td><?php echo $rows['MaHoaDonNhap']; ?></td>
                                        <td><?php echo $rows['Ho'] . ' ' . $rows['Ten'] ?></td>
                                        <td><?php echo $rows['NgayNhapHang'];  ?></td>
                                        <td><?php $TongTienHoaDon = mysqli_fetch_array(mysqli_query($conn, "SELECT  SUM(TongTien) AS TongTien FROM hoadonnhap inner JOIN chitiethoadonnhap on chitiethoadonnhap.MaHoaDonNhap = hoadonnhap.MaHoaDonNhap WHERE hoadonnhap.MaHoaDonNhap =" . $rows['MaHoaDonNhap'] . ""))['TongTien'];
                                            $tongtiennhap += $TongTienHoaDon;
                                            echo $TongTienHoaDon; ?>
                                        </td>
                                    </tr>
                                <?php }
                                ?>
                                <tr>
                                    <th>Tổng tiền Nhập hàng :</th>
                                    <td></td>
                                    <td></td>
                                    <td><?php echo $tongtiennhap ?></td>
                                </tr>
                            <?php } else {
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<?php include '../admin/footer.php' ?>