<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Mã Hóa Đơn</th>
                <th scope="col">Ngày Lập</th>
                <th scope="col">Nhân Viên Thực Hiện</th>
                <th scope="col">Tổng Tiền</th>
                <th scope="col">Chi Tiết</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include_once '../../models/ketnoi.php';
            $sql = "SELECT * FROM baocaodoanhthu Order by MaHoaDon ASC";
            $query = mysqli_query($conn, $sql);
            $tongtienthu = 0;
            while ($rows = mysqli_fetch_array($query)) {
            ?>
            <tr>
                <th scope="row"><?php echo $rows['MaHoaDon'] ?></th>
                <td><?php echo $rows['NgayLap'] ?></td>
                <td><?php echo $rows['Ten'] ?></td>
                <td><?php
                        $TongTienHoaDon = mysqli_fetch_array(mysqli_query($conn, "SELECT (SUM(chitiethoadon.TongTienHD)-SUM(chitiethoadon.TongTienHD)*giamgia.GiamGia/100 )as TongTien FROM chitiethoadon INNER JOIN hoadonban on chitiethoadon.MaHoaDon = hoadonban.MaHoaDon INNER JOIN giamgia on giamgia.MaGiamGia = hoadonban.GiamGia  WHERE hoadonban.MaHoaDon =" . $rows['MaHoaDon']));
                        $tongtienthu += $TongTienHoaDon['TongTien'];
                        echo $TongTienHoaDon['TongTien'];
                        ?></td>
                <td>
                    <div class="icon col-sm-3" data-code="f1f6" data-name="help">
                        <a href="danhmuchoadonbanhang.php?page=chitiethoadon&MaHoaDon= 
                            <?php echo $rows['MaHoaDon'] ?>"><i class="zmdi zmdi-help"></i></a>
                    </div>
                </td>
            </tr>
            <?php
            } ?>
            <tr>
                <th>Tổng Doanh Thu:</th>
                <td></td>
                <td></td>
                <td><?php echo $tongtienthu  ?></td>
            </tr>
        </tbody>
    </table>
</div>